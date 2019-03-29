<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <!-- page content -->
     <div class="row">
    	<div class="col-lg-6">
		   	<?= $this->session->flashdata('message') ?>
    		<?= form_open('user/changepassword') ?> <!-- form open -->
    			<div class="form-group">
				    <label for="">Current Password</label>
				    <input type="password" class="form-control" id="current_password" name="current_password">
				    <?= form_error('current_password','<small class="text-danger">',' </small>') ?>
			  	</div>
			  	<div class="form-group">
				    <label for="">New Password</label>
				    <input type="password" class="form-control" id="new_password1" name="new_password1">
				    <?= form_error('new_password1','<small class="text-danger">',' </small>') ?>
			  	</div>
			  	<div class="form-group">
				    <label for="">Repeat Password</label>
				    <input type="password" class="form-control" id="new_password2" name="new_password2">
				    <?= form_error('new_password2','<small class="text-danger">',' </small>') ?>
			  	</div>
			  	<button type="submit" class="btn btn-primary">Change Password</button>
		  </div>
		</div>	
		<!-- end page content -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 