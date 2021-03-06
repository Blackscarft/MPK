<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
		<div class="row">
			<div class="col-lg">
				<?php if (validation_errors()) : ?>
					<div class="alert alert-danger" role="alert">
							<?= validation_errors(); ?>
					</div>
				<?php endif; ?>
				<?= $this->session->flashdata('message'); ?>
				<table class="table table-hover">
				  <thead>
				  	<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal" id="addnewmenu">Add new Submenu</a>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Title</th>
				      <th scope="col">Menu</th>
				      <th scope="col">Url</th>
				      <th scope="col">Icon</th>
				      <th scope="col">Active</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $no = 1; foreach($subMenu as $item) : ?>
				    <tr>
				      <th scope="row"><?= $no ?></th>
				      <td><?= $item['title'] ?></td>
				      <td><?= $item['menu'] ?></td>
				      <td><?= $item['url'] ?></td>
				      <td><?= $item['icon'] ?></td>
				      <td><?= $item['is_active'] ?></td>
				      <td>
				      	<a href="<?= base_url('menu/editsubmenu/') . $item['id'] ?>"><span class="badge badge-pill badge-success">Edit</span></a>
				      	<a href="<?= base_url('menu/deletesubmenu/') . $item['id'] ?>" onclick="return confirm('Are you Sure?')"><span class="badge badge-pill badge-danger">Delete</span></a>
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
        <h5 class="modal-title" id="exampleModalLabel">Add new submenu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('menu/submenu') ?>" method="post">
      <div class="modal-body">
        <div class="form-group">
				    <input type="text" class="form-control" id="title" name="title" placeholder="title">
				    <?= form_error('title','<small class="text-danger pl-3">','</small>') ?>
			  </div>
			  <div class="form-group">
				    <select name="menu_id" id="menu_id" class="form-control">

				    	<option value="">Select Menu</option>
				    	<?php foreach($menu as $item) : ?>
				    	<option value="<?= $item['id'] ?>"><?= $item['menu'] ?></option>
					    <?php endforeach; ?>

				    </select>
			  </div>
			  <div class="form-group">
				    <input type="text" class="form-control" id="url" name="url" placeholder="url">
			  </div>
			  <div class="form-group">
				    <input type="text" class="form-control" id="icon" name="icon" placeholder="icon">
			  </div>
			  <div class="form-group">
			  	<div class="form-check">
			  		<input type="checkbox" name="is_active" id="is_active" class="forrm-check-input" value="1" for="is_active" checked> Active ?
			  	</div>
			  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>