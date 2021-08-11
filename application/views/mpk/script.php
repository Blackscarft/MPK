<!-- handle bell notif -->
<script>
    $(document).ready(function() {

        function getData(view = '') {
            $.ajax({
                url: "<?= base_url('/mpk/notif') ?>",
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

        // every 10s will refresh
        setInterval(function() {
            getData();;
        }, 10000);

    });
</script>