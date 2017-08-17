<!-- Page Content -->
      <div id="page-wrapper">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-12">
                      <h1 class="page-header">
                        Edit menu
                      </h1>
<div class="col-lg-4"></div>
                      <div class="col-lg-4">

    <?php print form_open('admin/apuloge/izmeniUlogu/'.$id,$formaAttr); ?>


                                <div class="form-group">
      <?php echo form_label('Role name:', 'name'); ?>
      <div class="cols-sm-10">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-graduation-cap fa-lg" aria-hidden="true"></i></span>
                <?php print form_input($naziv); ?>
        </div>
      </div>
    </div>

    <div class="form-group">
          <?php print form_submit($promeni);?>

    </div>
  <?php print form_close(); ?>
                      </div>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
      </div>
      <!-- /#page-wrapper -->
