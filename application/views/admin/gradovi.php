<!-- Page Content -->
      <div id="page-wrapper">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-12">
                      <h1 class="page-header">
                    Roles
                      </h1>

                      <div class="col-lg-12">
                        <?php echo $tabela; ?>
                          <div class="col-lg-4">
                        <?php print form_open('admin/apgrad/gradovi/',$formaAttr); ?>


                        <div class="form-group">
                          <?php echo form_label('City:', 'city'); ?>
                          <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-university fa" aria-hidden="true"></i></span>
                               <?php print form_input($naziv); ?>
                            </div>
                          </div>
                        </div>






                      <div class="form-group">
                                <br>
                            <?php print form_submit($dodaj);?>

                      </div>
                    <?php print form_close(); ?>
                    </div>
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
