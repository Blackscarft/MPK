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
                            <label for="kodeArea">Kode Area</label>
                            <input type="text" class="form-control" id="kodeArea" name="kodeArea" value="<?= @$detail['kode'] ? $detail['kode'] : set_value('kodeArea') ?>">
                            <?= form_error('kodeArea', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="namaArea">Nama Area</label>
                            <input type="text" class="form-control" id="namaArea" name="namaArea" value="<?= @$detail['nama'] ? $detail['nama'] : set_value('namaArea') ?>">
                            <?= form_error('namaArea', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>

                        <button type="submit" class="btn btn-primary mb-3"><?= $title ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</div>