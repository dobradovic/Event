<div class="container">

        <div class="row">

            <div class="col-md-3">

                <div class="list-group">
                     <?php echo anchor('desavanje/svi_dogadjaji/', 'Back to all events',array('class'=>'list-group-item')); ?>
                       <?php echo anchor('desavanje/dogadjaji/', 'Post your event',array('class'=>'list-group-item')); ?>
                        <?php echo anchor('demand/demandevent/', 'Demand event',array('class'=>'list-group-item')); ?>
                          <?php echo anchor('demand/svi_demandovi/', 'Demanded events',array('class'=>'list-group-item')); ?>

                </div>
            </div>
            <?php foreach($desavanja as $d){ ?>
            <div class="col-md-9">

                <div class="thumbnail">
                  <div class="poster">
                    <img class="img-responsive" src="<?php echo base_url();?><?php echo $d->slika;?>">
                  </div>
                    <div class="caption-full">
                        <h4 class="pull-right"></h4>
                        <h4><a href="#"><?php echo $d->naziv;?></a>
                        </h4>
                        <p><?php echo $d->opis;?></p>

                    </div>
                    <div class="ratings">

                   <?php echo $d->grad;?>

                   <?php if($this->session->userdata('id_kor')){?>
                   <p class="pull-right"><?php echo $d->datum;?>    <p> Number of tickets:<?php echo$d->broj_karata;?></p>
                   <?php echo anchor('desavanje/kupi_kartu/'.$d->id_desavanje.'/'.$this->session->userdata('id_kor'), 'Buy a ticket', 'attributes'); ?>
                   <?php }?>
                    </div>
                </div>



            </div>
            <?php }?>
        </div>

    </div>
    <!-- /.container -->
