<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
		<div class="row">
			<div class="col-lg-6">
				<?= form_error('menu','<div class="alert alert-danger" role="alert">',' </div>') ?>
				<?= $this->session->flashdata('message'); ?>
				<table class="table table-hover">
				  <thead>
				  	<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal" id="addnewmenu">Add New Menu</a>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Role</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $no = 1; foreach($roles as $item) : ?>
				    <tr>
				      <th scope="row"><?= $no ?></th>
				      <td><?= $item['roles'] ?></td>
				      <td>
				      	<a href="<?= base_url('admin/roleaccess/') . $item['id'] ?>"><span class="badge badge-pill badge-warning">Access</span></a>
				      	<a href="<?= base_url('admin/edit/') . $item['id'] ?>"><span class="badge badge-pill badge-success">Edit</span></a>
				      	<?php if ($item['id'] == 1) : ?>
				      		<a href="#"><span class="badge badge-pill badge-secondary" style="cursor: not-allowed;">Delete</span></a>
								<?php else: ?>
					      	<a href="<?= base_url('admin/delete/') . $item['id'] ?>" onclick="return confirm('Are you Sure?')"><span class="badge badge-pill badge-danger">Delete</span></a>
				      	<?php endif; ?>
				      </td>
				    </tr>
				   	<?php  $no++; endforeach; ?>
				  </tbody>
				</table>
			</div>
		</div>
    <!-- page content -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 

<!-- Modal For Add New Menu -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('admin/role') ?>" method="post">
      <div class="modal-body">
        <input class="form-control" type="text" id="role" name="role" placeholder="Role name">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>