<!-- Notification -->
<div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 10px;" class="tNotif">
    <div style="position: absolute; top: 0; right: 20px; z-index:999">
        <div id="toast"></div>
    </div>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="row">
        <div class="col-lg-12">
            <?= $this->session->flashdata('message') ?>
        </div>
    </div>

    <!-- Data table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            Data pengajuan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>pelanggan</th>
                            <th>area</th>
                            <th>Tgl Mulai</th>
                            <th>Tgl Selesai</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($mpks as $mpk) :
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $mpk['pelanggan'] ?></td>
                                <td><?= $mpk['area'] ?></td>
                                <td><?= date('d-m-Y', strtotime($mpk['mulai'])) ?></td>
                                <td><?= date('d-m-Y', strtotime($mpk['selesai'])) ?></td>
                                <td><?= $mpk['status'] == 1 ? '<span class="badge rounded-pill bg-danger text-white">Menunggu Konfirmasi</span>' : ($mpk['status'] == 2 ? '<span class="badge rounded-pill bg-warning text-white">Konfirmasi Keuangan</span>' : ($mpk['status'] == 3  ? '<span class="badge rounded-pill bg-info text-white">Konfirmasi Operasional</span>' : ($mpk['status'] == 4  ? '<span class="badge rounded-pill bg-success text-white">Konfirmasi Printing</span>' : '<span class="badge rounded-pill bg-success text-white">Konfirmasi Supervisor</span>'))) ?></td>
                                <td>
                                    <button type="button" data-uraian="<?= $mpk['uraian'] ?>" class="btn btn-info btn-sm getModal" data-toggle="modal" data-target="#detail"> Detail </button>
                                    <?php if ($mpk['status'] == 1) { ?>
                                        <a href="editMpk/<?= $mpk['id'] ?>"><span class="btn btn-primary btn-sm">Edit</span></a>
                                        <a onclick="return confirm('Data yang dihapus dapat mempengaruhi table yang lain. Apakah anda yakin ?')" href="deleteMpk/<?= $mpk['id'] ?>"><span class="btn btn-danger btn-sm">Hapus</span></a>
                                    <?php } else {
                                    } ?>
                                </td>
                            </tr>
                        <?php
                            $no++;
                        endforeach;
                        ?>
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