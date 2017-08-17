  <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                          Users
                        </h1>

                        <div class="col-lg-12">
                          <?php echo $tabela; ?>
                            <div class="col-lg-4">
                          <?php print form_open('admin/appocetna/adminpanel/',$formaAttr); ?>


                          <div class="form-group">
                            <?php echo form_label('Username:', 'username'); ?>
                            <div class="cols-sm-10">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                 <?php print form_input($username); ?>
                              </div>
                            </div>
                          </div>

                                                      <div class="form-group">
                            <?php echo form_label('Password:', 'password'); ?>
                            <div class="cols-sm-10">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                      <?php print form_password($password); ?>
                              </div>
                            </div>
                          </div>


                          <div class="form-group">
                            <?php echo form_label('Email:', 'email'); ?>
                            <div class="cols-sm-10">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                      <?php print form_input($email); ?>
                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <?php echo form_label('User role:', 'role'); ?>
                            <div class="cols-sm-10">
                              <div class="input-group">
                                <select name="ddlUloge" class='btn btn-default dropdown-toggle'>
                            <?php
                        foreach($uloge as $u)
                        {
                        ?>
                        <option value = "<?php echo $u->id_uloga?>"><?php echo $u->naziv; ?></option>
                        <?php
                        }
                        ?>
                        </select>
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
