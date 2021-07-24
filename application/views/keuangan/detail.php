<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <!-- form -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Form Konfirmasi</div>
                <div class="card-body">
                    <form method="post" action="<?= base_url($urlSubmit) ?>">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="kodeArea">Area</label>
                                    <input name="area" type="text" class="form-control" value="<?= $mpks['area'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="kodePelanggan">Pelanggan</label>
                                    <input type="text" class="form-control" value="<?= $mpks['pelanggan'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="dates">Tangal Mulai - Selesai</label>
                                    <input type="text" class="form-control" readonly value="<?= date('d M Y', strtotime($mpks['mulai'])) ?> - <?= date('d M Y', strtotime($mpks['selesai'])) ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="uraian">Urain</label>
                                    <textarea name="uraian" id="uraian" class="form-control" rows="5" readonly><?= $mpks['uraian'] ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary mb-3"><?= $title ?></button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</div>