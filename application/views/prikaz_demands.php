<div class="container">



<!-- Contact Form - START -->
<div class="container">
    <div class="row">
      <div class="col-md-12">

          <div class="row carousel-holder">

            <div class="col-md-12">
                <div class="col-md-4">
          <div class="page-header">
<h1>Demanded events</h1>
</div>
                </div>
                <div class="col-md-8">
                     <div class="page-header">
                         <?php echo form_open('demand/svi_demandovi'); ?>                 <h1>



<?php echo anchor('demand/demandevent', 'Demand an event', array('class'=>'btn btn-warning','name'=>'btnFilter')); ?>
                         </h1>
                         <?php echo form_close(); ?>

                     </div>



                 </div>

</div>

          </div>

          <div class="row">
              <?php foreach($demended as $d){?>
              <div class="col-sm-4 col-lg-4 col-md-4">
                  <div class="thumbnail">

         <div class="hovereffect">
  <img class="img-responsive" src="<?php echo base_url();?><?php echo $d->demand_slika_thumb;?>">
  <div class="overlay">
     <h2><?php echo $d->demand_naziv;?></h2>


  </div>
</div>



                      <div class="ratings">

                          <p>
                              <?php echo $d->demand_naziv;?>
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

<style>
    .header {
        color: #36A0FF;
        font-size: 27px;
        padding: 10px;
    }

    .bigicon {
        font-size: 35px;
        color: #36A0FF;
    }
</style>

<!-- Contact Form - END -->

</div>
