<div class="container">
       <div class="page-header">
    <h1>Demand event <small>Post your demand</small></h1>
</div>


<!-- Contact Form - START -->
<div class="container">
      <div class="well well-sm">
    <div class="row">
        <div class="col-md-12">

                <div class="col-md-4">
              <?php print validation_errors('<div class="alert alert-danger" role="alert">','</div>');?>
                <?php print form_open_multipart('demand/demandevent',$formaAttr); ?>


                <div class="form-group">
                  <?php echo form_label('Event name:', 'naziv'); ?>
                  <div class="cols-sm-10">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                       <?php print form_input($naziv); ?>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                        <?php echo form_label('Picture of event:', 'naziv'); ?>
                       <?php print form_upload(array('name'=>'fKorSlika', 'class'=>'form-control')); ?>

               </div>


                <div class="form-group">
                      <?php print form_submit($btnDemand);?>
                      <?php echo $this->session->flashdata('uspesno');?>
                </div>
              <?php print form_close(); ?>
            </div>

        </div>
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
