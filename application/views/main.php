
    <!-- Page Content -->
    <div class="container">

        <div class="row">



            <div class="col-md-12">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                 <div class="jumbotron">

  <h1>Looking for event? </h1>
  <h2>We are here for you. Take a look! </h2>




</div>
                       <?php if(!$this->session->userdata('isLoggedIn') ) {?>
                        <div id="login">

                        <?php print form_open('event/index',$formaAttr); ?>
                    <div class="form-group">
                       <?php print form_input($username); ?>
                    </div>
                    <div class="form-group">
                        <?php print form_input($password); ?>
                    </div>
                      <?php print form_button($dugme);?>

                <?php print form_close(); ?>

                 <p>Sign in to post your own events!   </p>

                        </div>
                        <div id="registration">
                            <p>Don't have an account?</p>     <?php echo anchor('strane/registracija', 'Register here');?>
                            </div>


                 <?php   } ?>



    </div>

                </div>

                <div class="row">
                    <?php foreach($desavanja as $d){?>
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">

							 <div class="hovereffect">
        <img class="img-responsive" src="<?php echo base_url();?><?php echo $d->slika;?>"/>

        <div class="overlay">
           <h2><?php echo $d->naziv;?></h2>

           <?php echo anchor('desavanje/event/'.$d->id_desavanje, 'details', array('class' => 'info'));?>
        </div>
    </div>


                            <div class="caption">

                                <h4><a href="#"><?php echo $d->tip;?></a>
                                </h4>
                                <h4>Number of ticket's: <?php echo $d->broj_karata;?></h4>
                                <p></p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right"><?php echo $d->datum;?></p>
                                <p>
                                    <?php echo $d->grad;?>
                                </p>

                            </div>
                        </div>


                    </div>
                    <?php }?>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                         <?php echo anchor('desavanje/svi_dogadjaji', 'See more', array('class'=>'btn btn-primary btn-lg btn-block')); ?>
                      </div>


                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->
