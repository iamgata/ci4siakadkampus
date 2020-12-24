<div class="modal fade" id="insertModalSchoolyear" tabindex="-1" aria-labelledby="insertModalSchoolyearLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Tahun Ajaran</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>

         <?php echo form_open('schoolyear/insertsave', ['id'   => 'insertSaveSchoolyear']) ?>
         <div class="modal-body">
            <div class="form-group">
               <label for="nameSchoolyear">Tahun Ajaran</label>
               <input type="text" class="form-control" id="nameSchoolyear" name="name_schoolyear" placeholder="contoh: 20xx/20xx">
               <div class="invalid-feedback" id="nameSchoolyearFeedback"></div>
            </div>

            <div class="form-group">
               <label for="semesterSchoolyear">Semester Ajaran</label>
               <select class="form-control" id="semesterSchoolyear" name="semester_schoolyear">
                  <option value=""> - Pilih Semester -</option>
                  <option value="Ganjil">Ganjil</option>
                  <option value="Genap">Genap</option>
               </select>
               <div class="invalid-feedback" id="semesterSchoolyearFeedback"></div>
            </div>
         </div>

         <div class="modal-footer">
            <button type="button" class="btn btn-secondary " data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary" id="insertSaveSchoolyearBtn">Tambah Tahun Ajaran</button>
         </div>
         <?php form_close() ?>

      </div>
   </div>
</div>

<script>
   $('#insertSaveSchoolyear').submit(function(e) {
      e.preventDefault();

      $.ajax({
         url: $(this).attr('action'),
         type: 'post',
         dataType: 'json',
         data: $(this).serialize(),
         beforeSend: function() {
            $('#insertSaveSchoolyearBtn').html('<i class="fa fa-spin fa-spinner"></i>')
         },
         complete: function() {
            $('#insertSaveSchoolyearBtn').html('Tambah Tahun Ajaran')
         },
         success: function(res) {
            if (res.success) {
               Swal.fire(
                  'Berhasil!',
                  res.success,
                  'success'
               );

               $('#insertModalSchoolyear').modal('hide');
               getSchoolyear();
            } else if (res.errors) {
               if (res.errors.name_schoolyear) {
                  $('#nameSchoolyear').addClass('is-invalid');
                  $('#nameSchoolyearFeedback').html(res.errors.name_schoolyear);
               }

               if (res.errors.semester_schoolyear) {
                  $('#semesterSchoolyear').addClass('is-invalid');
                  $('#semesterSchoolyearFeedback').html(res.errors.semester_schoolyear);
               }
            }
         },
         error: function(xhr, ajaxOption, throwError) {
            alert(`${xhr.status}
                        ${xhr.responseText}
                        ${throwError}`)
         }
      })
   })
</script>