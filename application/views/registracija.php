	<style type="text/css">
   body{




  </style>

<div class="container">
       <div class="page-header">
    <h1>Registration <small>Register to post your own events</small></h1>
</div>
			<div class="row main">
				<div class="panel-heading">

	            </div>
				<div class="main-login main-center">
        	<?php print validation_errors('<div class="alert alert-danger" role="alert">','</div>');?>
					  <?php print form_open_multipart('strane/registracija',$formaAttr); ?>


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

									 <?php print form_upload(array('name'=>'fKorSlika', 'class'=>'form-control')); ?>

					 </div>






						<div class="form-group">
							    <?php print form_submit($registruj);?>
                	<?php echo $this->session->flashdata('uspesno');?>
						</div>
					<?php print form_close(); ?>
                                    <?php echo anchor('event/index/', 'Go to homepage', 'class="link-class"') ?>
				</div>
			</div>
		</div>
