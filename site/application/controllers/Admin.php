<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $data = array('dashboard'=>'true');
		$this->load->view('admin/dashboard',$data);
	}

    // template 2 - registration code example
    // template 5 - fill in form code most likely
    // template 7 - grid views / listing runners & races

    public function manage_marathons() {
        $this->load->model('Race');

        $data = array('manage_marathons'=>'true');
        $data['races'] = $this->Race->get_races();

        $this->load->view('admin/manage_marathons',$data);
    }

    public function add_marathons() {
        $data = array('add_marathons'=>'true');
        $this->load->view('admin/add_marathons',$data);
    }

    public function manage_runners() {
        $data = array('manage_runners'=>'true');
        $this->load->view('admin/manage_runners',$data);
    }

    public function registration_form() {
        $data = array('registration_form'=>'true');
        $this->load->view('admin/registration_form',$data);
    }

    public function add_race(){
        $this->load->model('Race');

        $this->Race->add_races($this->input->post('txtName'),$this->input->post('txtLocation'),$this->input->post('txtDescription'),$this->input->post('txtDate'));
        redirect("admin/manage_marathons","refresh");
    }

    public function delete_race($id) {
        $this->load->model('Race');
        $this->Race->delete_race($id);

        redirect("admin/manage_marathons","refresh");

    }

    public function update_race($id) {
        $this->load->model('Race');
        $data['race'] = $this->Race->get_race($id);

        $this->load->view('admin/update_marathon',$data);


    }
    public function edit_race(){
        $this->load->model('Race');

        $this->Race->update_race($this->input->post('txtName'),$this->input->post('txtLocation'),$this->input->post('txtDescription'),$this->input->post('txtDate'),$this->input->post('txtID'));
        redirect("admin/manage_marathons","refresh");
    }

}
