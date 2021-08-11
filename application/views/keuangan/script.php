<!-- handle bell notif -->
<script>
    $(document).ready(function() {

        function getData(view = '') {
            $.ajax({
                url: "<?= base_url('/keuangan/notif') ?>",
                method: "POST",
                data: {
                    view: view
                },
                dataType: "json",
                success: function(data) {
                    $('#toast').html(data.notif);
                    $('.toast').toast('show');
                }
            });
        }
        getData();

        function toast(data) {
            return `
                <div role="alert" aria-live="assertive" aria-atomic="true" class="toast" data-autohide="false">
                    <div class="toast-header">
                        <i class="fas fa-file-alt text-dark mr-3"></i>
                        <strong class="mr-auto">Mpk Baru</strong>
                        <small>11 mins ago</small>
                        <button type="button" class="ml-2 mb-1 close updateNotif" data-dismiss="toast" aria-label="Close" id="" data-id=${data.id}>
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body">
                        Area : ${data.area} , Tgl mulai : ${data.mulai}
                    </div>
                </div>
            `
        }

        // every 10s will refresh
        setInterval(function() {
            getData();;
        }, 10000);

    });
</script>