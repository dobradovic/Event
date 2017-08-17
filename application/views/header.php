
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>css/shop-homepage.css" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
 <!-- Navigation -->
 <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>



    </div>

 <?php if(isset($session['uloga'])){ ?>
    <ul class="nav navbar-nav navbar-right">
         <li class="dropdown">
             <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                 <span class="glyphicon glyphicon-user"></span> 
                 <strong><?php echo $this->session->userdata('korisnik');?></strong>
                 <span class="glyphicon glyphicon-chevron-down"></span>
             </a>
             <ul class="dropdown-menu">
                 <li>
                     <div class="navbar-login">
                         <div class="row">
                             <div class="col-lg-4">
                                 <p class="text-center">
                                   <?php echo img( $this->session->userdata('avatarkorisnik'));?>

                                 </p>
                             </div>
                             <div class="col-lg-8">
                                 <p class="text-left"><strong><?php echo $this->session->userdata('korisnik');?></strong></p>
                                 <p class="text-left small"><?php echo $this->session->userdata('uloga');?></p>
                                  <p class="text-left small"><?php echo $this->session->userdata('email');?></p>

                             </div>
                         </div>
                     </div>
                 </li>
                 <li class="divider"></li>
                 <li>
                     <div class="navbar-login navbar-login-session">
                         <div class="row">
                             <div class="col-lg-12">
                                 <p>
                                  <?php echo  anchor('event/moj_event', 'My events',array('class'=>'btn btn-warning btn-block')); ?>

                                 </p>
                             </div>
                         </div>
                     </div>
                 </li>
             </ul>
         </li>
     </ul>
     <?php }?>



<div class="container">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
           <?php if(isset($session['uloga'])){ ?>
                     <?php if($session['uloga']=='admin'){ ?>
                             <?php foreach($meniAdmin as $m){ ?>
                                 <li><?php echo anchor($m->putanja,$m->naziv); ?></li>
                             <?php } ?>

                     <?php } else if ($session['uloga']=='korisnik'){ ?>
                             <?php foreach($meniKorisnik as $m){ ?>
                                 <li><?php echo anchor($m->putanja,$m->naziv); ?></li>

               <?php }}}else {
                   foreach($meni as $m){ ?>

                    <li><?php echo anchor($m->putanja,$m->naziv); ?></li>

                    <?php }   ?>
                    <?php
               }
                      ?>


      </ul>

    </div>

    </div>

  </div>


</nav>
