<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Event - Admin panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url(); ?>admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">


            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li>
                            <a href="<?php echo base_url();?>"><i class="fa fa-backward fa-fw"></i> Back to website</a>
                          <?php echo  anchor('admin/appocetna/adminpanel', 'Users', 'users'); ?>
                        </li>
                        <li>

                          <?php echo  anchor('admin/apmeni/meni', 'Menu', 'menu'); ?>
                        </li>

                        <li>
                          <?php echo  anchor('admin/apuloge/uloge', 'Roles', 'roles'); ?>
                        </li>
                        <li>
                            <?php echo  anchor('admin/apevents/event', 'Events', 'events'); ?>
                        </li>
                        <li>
                            <?php echo  anchor('admin/apgrad/gradovi', 'Cities', 'cities'); ?>
                        </li>
                        <li>
                            <?php echo  anchor('admin/aptip/tipovi', 'Type of event', 'type'); ?>
                        </li>
                        <li>
                              <?php echo  anchor('admin/apdemand/admin_demand', 'Demanded events', 'demand'); ?>
                        </li>


                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
