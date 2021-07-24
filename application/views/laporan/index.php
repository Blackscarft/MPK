<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="row">
        <div class="col-lg-12">
            <?= $this->session->flashdata('message') ?>
        </div>
    </div>

    <!-- Filter -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            Filter Data Laporan
        </div>
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="col">
                        <label for="pelanggan">Pelanggan</label>
                        <select name="" class="form-control form-select" required id="pelanggan">
                            <option value=""> -- Pilih Pelanggan -- </option>
                            <?php foreach ($pelanggans as $pelanggan) { ?>
                                <option value="<?= $pelanggan['id'] ?>"><?= $pelanggan['nama'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col">
                        <label for="dates">Rentang Waktu</label>
                        <input type="text" class="form-control" id="dates" name="date" required>
                    </div>
                </div>

                <input type="hidden" name="startDate" id="startDate">
                <input type="hidden" name="endDate" id="endDate">

                <button type="button" class="btn btn-primary btn-sm" id="filter">
                    <i class="fas fa-filter"></i> Filter
                </button>
                <button type="button" class="btn btn-primary btn-sm" id="FilterUlang">
                    <i class="fas fa-filter"></i> Filter Ulang
                </button>
            </form>
        </div>
    </div>
    <!-- End Filter -->

    <!-- Data table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            Data Laporan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataLaporan" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>area</th>
                            <th>Tgl Mulai</th>
                            <th>Tgl Selesai</th>
                            <th>Status</th>
                            <th>uraian</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    <!-- end data table -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->