<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <!-- form -->

    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">Form input</div>
                <div class="card-body">
                    <form method="post" action="<?= base_url($urlSubmit) ?>">
                        <div class="form-group">
                            <label for="nmPelanggan">Nama Pelanggan</label>
                            <input type="text" class="form-control" id="nmPelanggan" name="nmPelanggan" value="<?= @$detail['nama'] ? $detail['nama'] : set_value('nmPelanggan') ?>">
                            <?= form_error('nmPelanggan', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>

                        <button type="submit" class="btn btn-primary mb-3"><?= $title ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</div>