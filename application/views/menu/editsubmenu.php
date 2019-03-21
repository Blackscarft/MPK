<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="row">
    	<div class="col-lg-6">
				<form action="<?= base_url('menu/editsubmenu/') . $getidsubmenu['id'] ?>" method="post">
				  <div class="form-group">
				    <label> Title </label>
				    <input type="text" class="form-control" id="title" name="title" value="<?= $getidsubmenu['title'] ?>">
				     <?= form_error('title','<small class="text-danger pl-3">','</small>') ?>
				  </div>
				  <div class="form-group">
				  	<label> Menu </label>
				    <select name="menu_id" id="menu_id" class="form-control">
				    	<?php foreach($menu as $item) : ?>
				    	<?php if($item['id'] == $getidsubmenu['menu_id']) : ?>
				    		<option value="<?= $item['id'] ?>" selected><?= $item['menu']?></option>
				    	<?php else : ?>
					    	<option value="<?= $item['id'] ?>"><?= $item['menu'] ?></option>
				    	<?php endif; ?>
					    <?php endforeach; ?>
				    </select>
				    <?= form_error('menu_id','<small class="text-danger pl-3">','</small>') ?>
			  </div>
			  <div class="form-group">
				  	<label> Url </label>
				    <input type="text" class="form-control" id="url" name="url" placeholder="url" value="<?= $getidsubmenu['url'] ?>">
				    <?= form_error('url','<small class="text-danger pl-3">','</small>') ?>
			  </div>
			  <div class="form-group">
				  	<label> Icon </label>
				    <input type="text" class="form-control" id="icon" name="icon" placeholder="icon" value="<?= $getidsubmenu['icon'] ?>">
			  </div>
			  <div class="form-group">
			  	<div class="form-check">
			  		<?php if ($getidsubmenu['is_active'] == 1) : ?>
				  		<input type="hidden" name="is_active" value="0">
				  		<input type="checkbox" name="is_active" id="is_active" class="forrm-check-input" value="1" for="is_active" checked> Active ?
				  	<?php else : ?>
				  		<input type="hidden" name="is_active" value="0">
				  		<input type="checkbox" name="is_active" id="is_active" class="forrm-check-input" value="1" for="is_active"> Active ?
				  	<?php endif; ?>

			  	</div>
			 	<input type="hidden" name="id" value="<?= $getidsubmenu['id'] ?>">
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