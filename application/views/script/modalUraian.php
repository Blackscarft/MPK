 <!-- Modal -->
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
                     <div class="card-body getUraian">

                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <script>
     $('.getModal').on('click', function() {
         let uraian = $(this).data('uraian');
         $('.getUraian').html(uraian);
     })
 </script>