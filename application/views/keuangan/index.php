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
                            <th>Opsi</th>
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
                                <td><?= date('d M Y', strtotime($mpk['mulai'])) ?></td>
                                <td><?= date('d M Y', strtotime($mpk['selesai'])) ?></td>
                                <td><?= $mpk['status'] == 1 ? '<span class="badge rounded-pill bg-danger text-white">Menunggu Konfirmasi</span>' : '<span class="badge rounded-pill bg-success text-white">Di Konfirmasi</span>' ?></td>
                                <td>
                                    <button type="button" data-uraian="<?= $mpk['uraian'] ?>" class="btn btn-info btn-sm getModal" data-toggle="modal" data-target="#detail"> Detail </button>
                                    <?php if ($mpk['status'] == 1) { ?>
                                        <a href="detail/<?= $mpk['id'] ?>" class="btn btn-primary btn-sm">Konfirmasi</a>
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