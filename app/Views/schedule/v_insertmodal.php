<div class="modal fade" id="insertModalSchedule" tabindex="-1" aria-labelledby="insertModalScheduleLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Jadwal Kuliah</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>

         <?php echo form_open('schedule/insertsave', ['id'   => 'insertSaveSchedule']) ?>
         <input type="hidden" value="<?php echo $idPrody ?>" name="id_prody">

         <div class="modal-body">

            <div class="form-row">
               <div class="form-group col-sm-6">
                  <label for="daySchedule">Hari</label>
                  <select class="form-control" id="daySchedule" name="day_schedule">
                     <option value=""> - Pilih Hari -</option>
                     <option value="Senin">Senin</option>
                     <option value="Selasa">Selasa</option>
                     <option value="Rabu">Rabu</option>
                     <option value="Kamis">Kamis</option>
                     <option value="Jumat">Jumat</option>
                     <option value="Sabtu">Sabtu</option>
                     <option value="Minggu">Minggu</option>
                  </select>
                  <div class="invalid-feedback" id="dayScheduleFeedback"></div>
               </div>

               <div class="form-group col-sm-6">
                  <label for="timeSchedule">Waktu</label>
                  <input type="text" class="form-control" id="timeSchedule" name="time_schedule" placeholder="ex : 06.xx-10.xx">
                  <div class="invalid-feedback" id="timeScheduleFeedback"></div>
               </div>
            </div>

            <div class="form-group">
               <label for="idCourse">Mata Kuliah</label>
               <select class="form-control" id="idCourse" name="id_course">
                  <option value=""> - Pilih Mata Kuliah -</option>
                  <?php foreach ($courses as $course) : ?>
                     <option value="<?php echo $course['id_course'] ?>"><?php echo $course['name_course'] ?></option>
                  <?php endforeach ?>
               </select>
               <div class="invalid-feedback" id="idCourseFeedback"></div>
            </div>

            <div class="form-row">

               <div class="form-group col-sm-6">
                  <label for="idLecturer">Nama Dosen</label>
                  <select class="form-control" id="idLecturer" name="id_lecturer">
                     <option value=""> - Pilih Dosen Pengajar-</option>
                     <?php foreach ($lecturers as $lecturer) : ?>
                        <option value="<?php echo $lecturer['id_lecturer'] ?>"><?php echo $lecturer['name_lecturer'] ?></option>
                     <?php endforeach ?>
                  </select>
                  <div class="invalid-feedback" id="idLecturerFeedback"></div>
               </div>

               <div class="form-group col-sm-6">
                  <label for="idClassroom">Kelas</label>
                  <select class="form-control" id="idClassroom" name="id_classroom">
                     <option value=""> - Pilih Kelas-</option>
                     <?php foreach ($classrooms as $classroom) : ?>
                        <option value="<?php echo $classroom['id_classroom'] ?>"><?php echo $classroom['name_classroom'] ?></option>
                     <?php endforeach ?>
                  </select>
                  <div class="invalid-feedback" id="idClassroomFeedback"></div>
               </div>
            </div>

            <div class="form-row">

               <div class="form-group col-sm-6">
                  <label for="idRoom">Ruangan</label>
                  <select class="form-control" id="idRoom" name="id_room">
                     <option value=""> - Pilih Ruangan -</option>
                     <?php foreach ($rooms as $room) : ?>
                        <option value="<?php echo $room['id_room'] ?>"><?php echo $room['name_room'] ?></option>
                     <?php endforeach ?>
                  </select>
                  <div class="invalid-feedback" id="idRoomFeedback"></div>
               </div>

               <div class="form-group col-sm-6">
                  <label for="quotaSchedule">Kuota Mahasiswa</label>
                  <select class="form-control" id="quotaSchedule" name="quota_schedule">
                     <option value=""> - Pilih Kuota Mahasiswa -</option>
                     <?php for ($i = 1; $i <= 30; $i++) : ?>
                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                     <?php endfor ?>
                  </select>
                  <div class="invalid-feedback" id="quotaScheduleFeedback"></div>
               </div>
            </div>




         </div>

         <div class="modal-footer">
            <button type="button" class="btn btn-secondary " data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary" id="insertSaveScheduleeBtn">Tambah Jadwal Kuliah</button>
         </div>
         <?php form_close() ?>

      </div>
   </div>
</div>

<script>
   $('#insertSaveSchedule').submit(function(e) {
      e.preventDefault();

      $.ajax({
         url: $(this).attr('action'),
         type: 'post',
         dataType: 'json',
         data: $(this).serialize(),
         beforeSend: function() {
            $('#insertSaveScheduleeBtn').html('<i class="fa fa-spin fa-spinner"></i>')
         },
         complete: function() {
            $('#insertSaveScheduleeBtn').html('Tambah Matkul')
         },
         success: function(res) {
            if (res.success) {
               Swal.fire(
                  'Berhasil!',
                  res.success,
                  'success'
               );

               $('#insertModalSchedule').modal('hide');

               setTimeout(function() {
                  location.reload();
               }, 2000)

            } else if (res.errors) {
               if (res.errors.day_schedule) {
                  $('#daySchedule').addClass('is-invalid');
                  $('#dayScheduleFeedback').html(res.errors.day_schedule)
               }

               if (res.errors.time_schedule) {
                  $('#timeSchedule').addClass('is-invalid');
                  $('#timeScheduleFeedback').html(res.errors.time_schedule)
               }

               if (res.errors.id_course) {
                  $('#idCourse').addClass('is-invalid');
                  $('#idCourseFeedback').html(res.errors.id_course)
               }

               if (res.errors.id_lecturer) {
                  $('#idLecturer').addClass('is-invalid');
                  $('#idLecturerFeedback').html(res.errors.id_lecturer)
               }

               if (res.errors.id_classroom) {
                  $('#idClassroom').addClass('is-invalid');
                  $('#idClassroomFeedback').html(res.errors.id_classroom)
               }

               if (res.errors.id_room) {
                  $('#idRoom').addClass('is-invalid');
                  $('#idRoomFeedback').html(res.errors.id_room)
               }

               if (res.errors.quota_schedule) {
                  $('#quotaSchedule').addClass('is-invalid');
                  $('#quotaScheduleFeedback').html(res.errors.quota_schedule)
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