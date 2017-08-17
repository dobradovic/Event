
    <!-- Page Content -->
    <div class="container">

        <div class="row">



            <div class="col-md-12">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div class="col-md-3">
                  <div class="page-header">
    <h1>All events</h1>
</div>
                        </div>
                        <div class="col-md-9">
                            <div class="page-header">
                                <?php echo form_open('desavanje/filter'); ?>
                                <h1>
                                    <select name="ddlGrad" class='btn btn-default dropdown-toggle'>
                                <?php
                            foreach($gradovi as $grad)
                            {
                            ?>
                            <option value = "<?php echo $grad->id_grad?>"><?php echo $grad->grad; ?></option>
                            <?php
                            }
                            ?>
                            </select>
                                    <select name="ddlTip" class='btn btn-default dropdown-toggle'>
                                <?php
                            foreach($tipovi as $tip)
                            {
                            ?>
                            <option value ="<?php echo $tip->id_tip?>"><?php echo $tip->tip; ?></option>
                            <?php
                            }
                            ?>
                            </select>

                          <?php echo form_submit(array('class'=>'btn btn-primary','name'=>'btnFilter'),'Filter'); ?>
  <?php echo anchor('demand/svi_demandovi', 'Demanded events', array('class'=>'btn btn-warning','name'=>'btnFilter')); ?>
                                </h1>
                                <?php echo form_close(); ?>

                            </div>



                        </div>

    </div>

                </div>

                <div class="row">
                    <?php foreach($desavanja as $d){?>
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
                    <div class="col-md-4"></div>
                    <div class="col-md-4">

                      </div>


                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->
