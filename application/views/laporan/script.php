<!-- Date Range picker setup -->
<script src="<?= base_url('assets/') ?>js/moment.min.js"></script>
<script src="<?= base_url('assets/') ?>js/daterangepicker.min.js"></script>

<script>
    $(function() {
        // Date rang Picker
        $('input[name="date"]').daterangepicker({
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear',
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

        // all data



        // Handle filter

        $('#FilterUlang').hide();

        let table = $('#dataLaporan').DataTable();

        $('#filter').on('click', function() {
            $.ajax({
                url: "<?= base_url('laporan/getLaporan'); ?>",
                type: "post",
                data: {
                    'mulai': $("#startDate").val(),
                    'selesai': $("#endDate").val(),
                    'pelanggan': $('#pelanggan').val()
                },
                success: function(data) {
                    data = JSON.parse(data)
                    let row = '';
                    $.each(data, function(i, data) {
                        table.row.add($(`
                        <tr>
                            <td>${i+1}</td>
                            <td>${data.area}</td>
                            <td>${data.mulai}</td>
                            <td>${data.selesai}</td>
                            <td>${parseInt(data.status) == 4 ? '<span class="badge rounded-pill bg-success text-white">Konfirmasi Printing</span>' : '<span class="badge rounded-pill bg-success text-white">Konfirmasi Supervisor</span>'}</td>
                            <td> <button type="button" data-uraian="${data.uraian}" class="btn btn-info btn-sm getModal" data-toggle="modal" data-target="#detail"> Detail </button></td>
                        </tr>
                        `)).draw();
                    });

                    $('#FilterUlang').show()
                    $('#filter').hide()

                    $('.getModal').on('click', function() {
                        let uraian = $(this).data('uraian');
                        $('#getUraian').html(uraian);
                    });
                }
            });
        });

        $('#FilterUlang').on('click', function() {
            $('#FilterUlang').hide()
            $('#filter').show()
            $("#pelanggan").find('option :eq(0)').attr('selected', true);
            $("#dates").val("");
            table
                .clear()
                .draw()
        })
    });;
</script>
<!-- modal -->
<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="detailLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="detailLabel">Detail Uraian</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body" id="getUraian">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>