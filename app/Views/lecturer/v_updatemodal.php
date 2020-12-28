<div class="modal fade" id="updateModalLecturer" tabindex="-1" aria-labelledby="updateModalLecturerLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Dosen</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>

         <?php echo form_open('lecturer/updatesave', ['id'   => 'updateSaveLecturer']) ?>
         <input type="hidden" name="id_lecturer" value="<?php echo $lecturerUpdate['id_lecturer'] ?>">
         <div class="modal-body">
            <div class="form-row">
               <div class="form-group col-sm-6">
                  <label for="codeLecturer">Kode Dosen</label>
                  <input type="text" class="form-control" id="codeLecturer" name="code_lecturer" value="<?php echo $lecturerUpdate['code_lecturer'] ?>" readonly>
                  <div class="invalid-feedback" id="codeLecturerFeedback"></div>
               </div>

               <div class="form-group col-sm-6">
                  <label for="nidnLecturer">NIDN Dosen</label>
                  <input type="text" class="form-control" id="nidnLecturer" name="nidn_lecturer" value="<?php echo $lecturerUpdate['nidn_lecturer'] ?>" readonly>
                  <div class="invalid-feedback" id="nidnLecturerFeedback"></div>
               </div>
            </div>

            <div class="form-row">
               <div class="form-group col-sm-6">
                  <label for="nameLecturer">Nama Dosen</label>
                  <input type="text" class="form-control" id="nameLecturer" name="name_lecturer" value="<?php echo $lecturerUpdate['name_lecturer'] ?>">
                  <div class="invalid-feedback" id="nameLecturerFeedback"></div>
               </div>

               <div class="form-group col-sm-6">
                  <label for="emailLecturer">Email Lecturer</label>
                  <input type="text" class="form-control" id="emailLecturer" name="email_lecturer" value="<?php echo $lecturerUpdate['email_lecturer'] ?>">
                  <div class="invalid-feedback" id="emailLecturerFeedback"></div>
               </div>
            </div>

            <div class="form-group">
               <label for="passwordLecturer">Password Lecturer</label>
               <input type="password" class="form-control" id="passwordLecturer" name="password_lecturer" value="<?php echo $lecturerUpdate['password_lecturer'] ?>">
               <div class="invalid-feedback" id="passwordLecturerFeedback"></div>
            </div>


            <div class="form-group">
               <label for="imageLecturer">Foto Lecturer</label>
               <input type="text" class="form-control" id="imageLecturer" name="image_lecturer" value="<?php echo $lecturerUpdate['image_lecturer'] ?>">
               <div class="invalid-feedback" id="imageLecturerFeedback"></div>
            </div>
         </div>


         <div class="modal-footer">
            <button type="button" class="btn btn-secondary " data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary" id="updateSaveLecturerBtn">Update Dosen</button>
         </div>
         <?php form_close() ?>

      </div>
   </div>
</div>

<script>
   $('#updateSaveLecturer').submit(function(e) {
      e.preventDefault();

      $.ajax({
         url: $(this).attr('action'),
         type: 'post',
         dataType: 'json',
         data: $(this).serialize(),
         beforeSend: function() {
            $('#updateSaveLecturerBtn').html('<i class="fa fa-spin fa-spinner"></i>')
         },
         complete: function() {
            $('#updateSaveLecturerBtn').html('Update Dosen')
         },
         success: function(res) {
            if (res.success) {
               Swal.fire(
                  'Berhasil!',
                  res.success,
                  'success'
               );

               $('#updateModalLecturer').modal('hide');
               getLecturer();

            } else if (res.errors) {
               if (res.errors.code_lecturer) {
                  $('#codeLecturer').addClass('is-invalid');
                  $('#codeLecturerFeedback').html(res.errors.code_lecturer)
               }

               if (res.errors.nidn_lecturer) {
                  $('#nidnLecturer').addClass('is-invalid');
                  $('#nidnLecturerFeedback').html(res.errors.nidn_lecturer)
               }

               if (res.errors.name_lecturer) {
                  $('#nameLecturer').addClass('is-invalid');
                  $('#nameLecturerFeedback').html(res.errors.name_lecturer)
               }

               if (res.errors.email_lecturer) {
                  $('#emailLecturer').addClass('is-invalid');
                  $('#emailLecturerFeedback').html(res.errors.email_lecturer)
               }

               if (res.errors.password_lecturer) {
                  $('#passwordLecturer').addClass('is-invalid');
                  $('#passwordLecturerFeedback').html(res.errors.password_lecturer)
               }

               if (res.errors.image_lecturer) {
                  $('#imageLecturer').addClass('is-invalid');
                  $('#imageLecturerFeedback').html(res.errors.image_lecturer)
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