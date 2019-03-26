<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="row">
    	<div class="col-lg-6">
				<form action="<?= base_url('admin/edit/') . $getid['id'] ?>" method="post">
				  <div class="form-group">
				    <label> Role name </label>
				    <input type="text" class="form-control" id="role" name="role" value="<?= $getid['roles'] ?>">
				     <?= form_error('role','<small class="text-danger pl-3">','</small>') ?>
				    <input type="hidden" name="id" value="<?= $getid['id'] ?>" placeholder="">
				  </div>
				  
				  <button type="submit" class="btn btn-primary">Edit</button>
				</form>
    		
    	</div>
    </div>
    <!-- page content -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 