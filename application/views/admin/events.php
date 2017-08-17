<!-- Page Content -->
      <div id="page-wrapper">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-12">
                      <h1 class="page-header">
                        Events
                      </h1>

                      <div class="col-lg-12">
                        <?php echo $tabela; ?>


                          <div class="col-lg-4">
                            <?php print form_open_multipart('admin/apevents/event',$formaAttr); ?>
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

                                               <?php print form_submit($btnUnesi);?>


                                     </div>
                                 </fieldset>
                          <?php print form_close(); ?>

                             <!-- Kraj forme -->
                                        </div>
                                    </div>
                      </div>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
      </div>
      <!-- /#page-wrapper -->
