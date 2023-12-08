<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=asset_url()?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=asset_url()?>css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=asset_url()?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <?php
            $this->load->view('includes/header');
            $this->load->view('includes/menu');

            ?>

        </nav>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Update Race
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="home.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Forms
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">

                        <form method="post" action="/site/admin/edit_race" role="form">

                            <div class="form-group">
                                <label>Race Name</label>
                                <input name="txtName" value="<?=$race[0]['raceName']?>" class="form-control" placeholder="Enter Race Name">
                            </div>

                            <div class="form-group">
                                <label>Race Location</label>
                                <input name = "txtLocation" value="<?=$race[0]['raceLocation']?>" class="form-control" placeholder="Enter Race location">
                            </div>

                            <div class="form-group">
                                <label>Race Description</label>
                                <input name="txtDescription" value="<?=$race[0]['raceDescription']?>" class="form-control" placeholder="Enter Race Description">
                            </div>

                            <div class="form-group">
                                <label>Race Time</label>
                                <input name="txtDate" value="<?=$race[0]['raceDateTime']?>" class="form-control" placeholder="Enter Race Start Time">
                            </div>




                            <button type="submit" class="btn btn-default">Update Marathon</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                            <input type="hidden" name="txtID" value="<?=$race[0]['raceID']?>">

                        </form>

                    </div>


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?=asset_url()?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=asset_url()?>js/bootstrap.min.js"></script>

</body>

</html>
