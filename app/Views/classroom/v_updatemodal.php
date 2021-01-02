<div class="modal fade" id="updateModalClassroom" tabindex="-1" aria-labelledby="updateModalClassroomLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Kelas</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>

         <?php echo form_open('classroom/updatesave', ['id'   => 'updateSaveClassroom']) ?>
         <input type="hidden" name="id_classroom" value="<?php echo $classroom['id_classroom'] ?>">
         <div class="modal-body">

            <div class="form-group">
               <label for="nameClassroom">Nama Kelas</label>
               <input type="text" class="form-control" id="nameClassroom" name="name_classroom" value="<?php echo $classroom['name_classroom'] ?>">
               <div class="invalid-feedback" id="nameClassroomFeedback"></div>
            </div>

            <div class="form-group">
               <label for="idPrody">Pilih Prodi</label>
               <select class="form-control" id="idPrody" name="id_prody">
                  <option value="<?php echo $classroom['id_prody'] ?>"><?php echo $classroom['name_prody'] ?></option>
                  <?php foreach ($prodies as $prody) : ?>
                     <option value="<?php echo $prody['id_prody'] ?>"><?php echo $prody['degree_prody'] ?> - <?php echo $prody['name_prody'] ?> (<?php echo $prody['code_prody'] ?>)</option>
                  <?php endforeach ?>
               </select>
               <div class="invalid-feedback" id="idProdyFeedback"></div>
            </div>

            <div class="form-group">
               <label for="idLecturer">Pilih Dosen</label>
               <select class="form-control" id="idLecturer" name="id_lecturer">
                  <option value="<?php echo $classroom['id_lecturer'] ?>"><?php echo $classroom['name_lecturer'] ?></option>
                  <?php foreach ($lecturers as $lecturer) : ?>
                     <option value="<?php echo $lecturer['id_lecturer'] ?>"><?php echo $lecturer['name_lecturer'] ?></option>
                  <?php endforeach ?>
               </select>
               <div class="invalid-feedback" id="idLecturerFeedback"></div>
            </div>

            <div class="form-group">
               <label for="yearClassroom">Tahun Kelas</label>
               <select class="form-control" id="yearClassroom" name="year_classroom">
                  <option value="<?php echo $classroom['year_classroom'] ?>"><?php echo $classroom['year_classroom'] ?></option>
                  <?php for ($i = date('Y'); $i >= date('Y') - 10; $i--) : ?>
                     <option value="<?php echo $i ?>"><?php echo $i ?></option>
                  <?php endfor ?>
               </select>
               <div class="invalid-feedback" id="yearClassroomFeedback"></div>
            </div>
         </div>

         <div class="modal-footer">
            <button type="button" class="btn btn-secondary " data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary" id="updateSaveClassroomBtn">Update Kelas</button>
         </div>
         <?php form_close() ?>

      </div>
   </div>
</div>

<script>
   $('#updateSaveClassroom').submit(function(e) {
      e.preventDefault();

      $.ajax({
         url: $(this).attr('action'),
         type: 'post',
         dataType: 'json',
         data: $(this).serialize(),
         beforeSend: function() {
            $('#updateSaveClassroomBtn').html('<i class="fa fa-spin fa-spinner"></i>')
         },
         complete: function() {
            $('#updateSaveClassroomBtn').html('Tambah Kelas')
         },
         success: function(res) {
            if (res.success) {
               Swal.fire(
                  'Berhasil!',
                  res.success,
                  'success'
               );

               $('#updateModalClassroom').modal('hide');
               getClassroom();

            } else if (res.errors) {
               if (res.errors.name_classroom) {
                  $('#nameClassroom').addClass('is-invalid');
                  $('#nameClassroomFeedback').html(res.errors.name_classroom);
               }

               if (res.errors.id_prody) {
                  $('#idPrody').addClass('is-invalid');
                  $('#idProdyFeedback').html(res.errors.id_prody);
               }

               if (res.errors.id_lecturer) {
                  $('#idLecturer').addClass('is-invalid');
                  $('#idLecturerFeedback').html(res.errors.id_lecturer);
               }

               if (res.errors.year_classroom) {
                  $('#yearClassroom').addClass('is-invalid');
                  $('#yearClassroomFeedback').html(res.errors.year_classroom);
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