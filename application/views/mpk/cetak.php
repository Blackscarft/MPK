<!-- Begin Page Content -->
<div class="container-fluid px-4 py-2" style="border: 2px solid #5a5c69;">

    <!-- header -->
    <div class="row" style="border-bottom: 3px solid #5a5c69;max-height: 110px;">
        <div class="col-6">
            <div class="row">
                <div class="col-6" style="border-right: 2px solid #5a5c69;max-height: 90px;">
                    <img src="<?= base_url('assets/') ?>img/tecma-logo.jpg" alt="tecma adv logo" class="img-fluid">
                    <p style="font-size: 0.75rem;"><b>PT. TECMA MITRATAMA ADVERTINDO</b></p>
                </div>
                <div class="col-6" style="line-height: 0px;">
                    <h3 style="line-height: 25px;"><b>The <br /> Advertising <br /> Solution</b></h3>
                    <p>www.tecma-adv.com</p>
                </div>
            </div>
        </div>
        <div class="col-6 d-flex justify-content-end" style="line-height: 17px;">
            <p align="center"><b>PT. TECMA MITRATAMA ADVERTINDO</b> <br />
                Jl. Lempuyangan 1/3 Kwarasan, Solo Baru <br />
                Sukoharjo 57552 <br />
                Telp 0271-625645, 025646, 025650 <br />
                Fax. 0271625647 <br />
                email : info@tecma-adv.com
            </p>
        </div>
    </div>
    <!-- end header -->

    <!-- heading konten -->
    <h1 class="fw-bolder mt-3">MEMO PERINTAH KERJA</h1>
    <div class="row">
        <div class="col-6">
            <table border="0">
                <tr>
                    <td>
                        <h5><b>Pemesan</b></h5>
                    </td>
                    <td>
                        <h5><b> : </b></h5>
                    </td>
                    <td>
                        <h5> <?= $mpk['pelanggan'] ?></h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h5><b>Tanggal</b></h5>
                    </td>
                    <td>
                        <h5><b> : </b></h5>
                    </td>
                    <td>
                        <h5> <?= date('d-m-Y', strtotime($mpk['mulai'])) ?></h5>
                    </td>
                </tr>

            </table>
        </div>
        <div class="col-6">
            <table border="0">
                <tr>
                    <td>
                        <h5><b>No MPK</b></h5>
                    </td>
                    <td>
                        <h5><b> : </b></h5>
                    </td>
                    <td>
                        <h5></h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h5><b>Area</b></h5>
                    </td>
                    <td>
                        <h5><b> : </b></h5>
                    </td>
                    <td>
                        <h5> <?= $mpk['area'] ?></h5>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <!-- end heading konten -->

    <!-- uraian -->
    <div class="row">
        <div class="col-9">
            <div class="p-2" id="uraianId" style="border:2px solid #5a5c69;min-height:568px">
                <label for="uraian">
                    <h5><b>Uraian Kerja : </b></h5>
                </label>
                <textarea style="font-size: 1.5rem;border:none" readonly class="form-control" id="uraian" rows="<?= strlen($mpk['uraian']) / 50 ?>"> <?= $mpk['uraian'] ?> </textarea>
            </div>
        </div>
        <div class="col-3">
            <div class="row">
                <div class="col-12 mb-3" style="border: 2px solid #5a5c69; height:130px">
                    <div class="text-center">
                        <h5>Pemesan</h5>
                        <h1><i class="fa fas-fw fa-signature"></i></h1>
                        <p class="text-uppercase" style="font-size: 0.7rem;font-family: monospace !important;">Di Konfirmasi melalui Sistem MPK</p>
                    </div>
                </div>
                <div class="col-12 mb-3" style="border: 2px solid #5a5c69; height:130px">
                    <div class="text-center">
                        <h5>Keuangan</h5>
                        <h1><i class="fa fas-fw fa-signature"></i></h1>
                        <p class="text-uppercase" style="font-size: 0.7rem;font-family: monospace !important;">Di Konfirmasi melalui Sistem MPK</p>
                    </div>
                </div>
                <div class="col-12 mb-3" style="border: 2px solid #5a5c69; height:130px">
                    <div class="text-center">
                        <h5>Operasional</h5>
                        <h1><i class="fa fas-fw fa-signature"></i></h1>
                        <p class="text-uppercase" style="font-size: 0.7rem;font-family: monospace !important;">Di Konfirmasi melalui Sistem MPK</p>
                    </div>
                </div>
                <div class="col-12" style=" border: 2px solid #5a5c69; height:130px">
                    <div class="text-center">
                        <h5><?= $mpk['status'] == 4 ? 'Printing' : ($mpk['status'] == 5 ? 'SPV OD' : '') ?></h5>
                        <h1><i class="fa fas-fw fa-signature"></i></h1>
                        <p class="text-uppercase" style="font-size: 0.7rem;font-family: monospace !important;">Di Konfirmasi melalui Sistem MPK</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end uraian -->

    <!-- note -->
    <h6 class="fw-bolder mt-3">Distribusi: Putih - Adminstrasi, Merah - Keuangan, Biru - Marketing, Hijau - Sekertaris, Kuning - Produksi</h6>

</div>
<!-- /.container-fluid -->
<script>
    window.print();
</script>
</div>
<!-- End of Main Content -->