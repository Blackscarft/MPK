<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Develop By Drevi 2021</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/') ?>js/demo/datatables-demo.js"></script>

<!-- select2 js -->
<script src="<?= base_url('assets/') ?>js/select2.min.js"></script>


<script>
    $('.custom-file-input').on('change', function() {
        //ambli nama filenya
        let filename = $(this).val().split('\\').pop();
        //filenya simpan di inputnya
        $(this).next('.custom-file-label').addClass("selected").html(filename);
    });

    $('.change-access').on('click', function() {
        const menuid = $(this).data('menu'); //ambil dari "data-....." di view
        const roleid = $(this).data('role');

        $.ajax({
            url: "<?= base_url('admin/changeaccess') ?>", //post atau tujuan
            type: 'post', // type post ,get, dl;
            data: {
                // objeck data : variable const
                menuid: menuid,
                roleid: roleid
            },
            success: function() {
                document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleid;
            }
        });
    });

    //  select2 js library
    $('.form-select').select2();
</script>



</body>

</html>