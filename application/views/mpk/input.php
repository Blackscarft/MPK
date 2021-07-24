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
                            <label for="kodeArea">Area</label>
                            <select name="kodeArea" class="form-control form-select">

                                <option value="">-- Pilih Area --</option>

                                <?php
                                foreach ($areas as $area) :
                                ?>
                                    <option <?= @$mpks['areaId'] == $area['id'] ? 'selected' : '' ?> value="<?= $area['id'] ?>"><?= $area['nama'] ?></option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                            <?= form_error('kodeArea', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="kodePelanggan">Pelanggan</label>
                            <select name="kodePelanggan" class="form-control form-select">
                                <option value="">-- Pilih Pelanggan --</option>
                                <?php
                                foreach ($pelanggans as $pelanggan) :
                                ?>
                                    <option <?= @$mpks['pelangganId'] == $pelanggan['id'] ? 'selected' : '' ?> value="<?= $pelanggan['id'] ?>"><?= $pelanggan['nama'] ?></option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                            <?= form_error('kodePelanggan', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="dates">Tangal Mulai - Selesai</label>
                            <input type="text" class="form-control" id="dates" name="date">
                            <?= form_error('dates', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>

                        <?php if (@$mpks['mulai']) : ?>
                            <span id="dateEdit" data-mulai="<?= date('d/m/Y', strtotime($mpks['mulai'])) ?>" data-selesai="<?= date('d/m/Y', strtotime($mpks['selesai'])) ?>"></span>
                        <?php endif; ?>

                        <div class="form-group">
                            <label for="uraian">Urain</label>
                            <textarea name="uraian" id="uraian" class="form-control" rows="5"><?= @$mpks['uraian'] ? $mpks['uraian'] : '' ?></textarea>
                            <?= form_error('dates', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>

                        <input type="hidden" name="startDate" id="startDate" value="<?= @$mpks['mulai'] ? date('d-m-Y', strtotime($mpks['mulai'])) : '' ?>">
                        <input type="hidden" name="endDate" id="endDate" value="<?= @$mpks['selesai'] ? date('d-m-Y', strtotime($mpks['selesai'])) : '' ?>">

                        <button type="submit" class="btn btn-primary mb-3"><?= $title ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</div>