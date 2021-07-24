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
            <a href="<?= base_url('master/addPelanggan') ?>"><button class="btn btn-success"> Tambah Data </button></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pelanggans as $pelanggan) :
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $pelanggan['nama'] ?></td>
                                <td>
                                    <a href="editPelanggan/<?= $pelanggan['id'] ?>"><span class="badge badge-primary">Edit</span></a>
                                    <a onclick="return confirm('Data yang dihapus dapat mempengaruhi table yang lain. Apakah anda yakin ?')" href="deletePelangan/<?= $pelanggan['id'] ?>"><span class="badge badge-danger">Hapus</span></a>
                                </td>
                            </tr>
                        <?php $no++;
                        endforeach; ?>
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