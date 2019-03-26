<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
		<div class="row">
			<div class="col-lg-6">
				<?= form_error('menu','<div class="alert alert-danger" role="alert">',' </div>') ?>
				<?= $this->session->flashdata('message'); ?>
				<h5>Role : <?= $getid['roles'] ?></h5>
				<table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Menu</th>
				      <th scope="col">Access</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $no = 1; foreach($menu as $item) : ?>
				    <tr>
				      <th scope="row"><?= $no ?></th>
				      <td><?= $item['menu'] ?></td>
				      <td>
				      	<div class="form-check">
								  <input class="form-check-input change-access" type="checkbox" <?= check_access($getid['id'], $item['id'])?> data-role="<?=$getid['id']?>" data-menu="<?=$item['id']?>" >
								</div>
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
