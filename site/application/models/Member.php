<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Model {

    public function user_login($email,$pwd) {

        $this->load->database();
        $this->load->library('session');


        try {

            $db = new PDO($this->db->dsn, $this->db->username, $this->db->password, $this->db->db_options);


            $sql = $db->prepare("select memberID,memberPassword, MemberKey from memberLogin where memberEmail = :Email and RoleID=2");
            $sql->bindValue(":Email", $email);

            $sql->execute();
            $row = $sql->fetch();

            if ($row != null) {

                $hashedPassword = md5($pwd . $row["MemberKey"]);


                if ($hashedPassword == $row["memberPassword"]) {
                    $this->session->set_userdata(array("UID"=>$row["memberID"]));

                   return true;
                }else {
                    return false;
                }
            } else {
                return false;
            }



        } catch (PDOException $e) {
            return false;
        }



    }

    public function create_user($full_name,$email,$pwd)
    {

       // session_start();
        $errmsg = "";
        $key = sprintf('%04X%04X%04X%04X%04X%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));

        $this->load->database();
        $this->load->library('session');


        try {

            $db = new PDO($this->db->dsn, $this->db->username, $this->db->password, $this->db->db_options);

            $sql = $db->prepare("insert into memberLogin (memberName,memberEmail,memberPassword,RoleID,MemberKey) 
                                       values (:Name,:Email,:Password,:RID,:Key)");
            $sql->bindValue(":Name",$full_name);
            $sql->bindValue(":Email",$email);
            $sql->bindValue(":Password",md5($pwd.$key));
            $sql->bindValue(":RID","2");
            $sql->bindValue(":Key", $key);




            $sql->execute();

            return true;

        } catch (PDOException $e) {
            return false;
        }
        }

}
