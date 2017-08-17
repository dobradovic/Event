<div class="container">
       <div class="page-header">
    <h1>Post your event <small>for free</small></h1>
</div>


<!-- Contact Form - START -->
<div class="container">
    <div class="col-md-12">

                <div class="col-md-3"></div>

                <!-- Forma za registraciju -->
                    <div class="col-md-6">
                        <div class="tile">

                              <?php print validation_errors('<div class="alert alert-danger" role="alert">','</div>');?>
               <?php print form_open_multipart('desavanje/dogadjaji',$formaAttr); ?>
                    <fieldset>
                        <legend class="text-center header">Post new event</legend>



                        <div class="form-group">

                              <?php print form_input($naziv); ?>

                        </div>


                        <div class="form-group">


                             <?php print form_input($izvodjac); ?>

                        </div>



                        <div class="form-group">

                                <?php print form_input($broj_karata); ?>

                        </div>

                          <div class="form-group">


                                <?php print form_input($datum); ?>
                                

                          </div>



                         <div class="form-group">

                                <?php print form_upload(array('name'=>'fSlika', 'class'=>'form-control')); ?>

                        </div>

                            <div class="form-group">

                                <?php print form_textarea($opis); ?>

                            </div>
                            <br>


                             <div class="form-group">

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




                        </div>

                            <div class="form-group">

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
                            </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                  <?php print form_submit($btnUnesi);?>
                                 <?php echo $this->session->flashdata('uspesno');?>
                            </div>
                        </div>
                    </fieldset>
             <?php print form_close(); ?>

                <!-- Kraj forme -->
                <div class="col-md-3"></div>
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







			</div>
