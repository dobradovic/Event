<div class="container">
       <div class="page-header">
    <h1>Contact <small>Be free to contact us</small></h1>
</div>


<!-- Contact Form - START -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                   <?php print validation_errors('<div class="alert alert-danger" role="alert">','</div>');?>
               <?php print form_open('strane/kontakt',$formaAttr); ?>
                    <fieldset>
                        <legend class="text-center header">Contact us</legend>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                              <?php print form_input($ime); ?>     
                            </div>
                        </div>
                    

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
                             <?php print form_input($email); ?>     
                            </div>
                        </div>

                      

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                            <div class="col-md-8">
                                <?php print form_textarea($poruka); ?>     
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                  <?php print form_submit($kontakt);?>
                                 <?php echo $this->session->flashdata('uspesno');?>
                            </div>
                        </div>
                    </fieldset>
             <?php print form_close(); ?>
                
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