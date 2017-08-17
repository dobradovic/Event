
    <!-- Page Content -->
    <div class="container">

        <div class="row">



            <div class="col-md-12">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div class="col-md-3">
                  <div class="page-header">
    <h1>Filtered events
      <h1>


<i class="fa fa-backward" aria-hidden="true"></i>
<?php echo anchor('desavanje/svi_dogadjaji', 'Back to all events', array('class'=>'btn btn-primary','name'=>'btnFilter')); ?>
     </h1>
    </h1>
</div>
                        </div>
                        <div class="col-md-9">

                        </div>

    </div>

                </div>

                <div class="row">
                    <?php foreach($desavanjaFilter as $d){?>
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">

							 <div class="hovereffect">
        <img class="img-responsive" src="<?php echo base_url();?><?php echo $d->slika;?>">
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
                    <?php if($desavanjaFilter==null){?>
                    <h3>your search has no results</h3>
                      <?php }?>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">

                      </div>


                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->
