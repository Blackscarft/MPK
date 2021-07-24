<!-- Date Range picker setup -->
<script src="<?= base_url('assets/') ?>js/moment.min.js"></script>
<script src="<?= base_url('assets/') ?>js/daterangepicker.min.js"></script>

<script>
    $(function() {
        let status = <?= @$mpks['mulai'] ? 'true' : 'false' ?>;
        $('input[name="date"]').daterangepicker({
            autoUpdateInput: status,
            <?php if (@$mpks['mulai']) : ?>
                startDate: $('#dateEdit').data('mulai'),
                endDate: $('#dateEdit').data('selesai'),
            <?php endif; ?>
            locale: {
                cancelLabel: 'Clear',
                format: "DD/MM/YYYY",
            },
        });

        $('input[name="date"]').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
            $("#startDate").val(picker.startDate.format('DD-MM-YYYY'));
            $("#endDate").val(picker.endDate.format('DD-MM-YYYY'));
        });

        $('input[name="date"]').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });
    });
</script>