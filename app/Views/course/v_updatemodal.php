<div class="modal fade" id="updateModalCourse" tabindex="-1" aria-labelledby="updateModalCourseLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Matkul</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>

         <?php echo form_open('course/updatesave', ['id'   => 'updateSaveCourse']) ?>

         <input type="hidden" name="id_prody" value="<?php echo $id_prody ?>">
         <input type="hidden" name="id_course" value="<?php echo $id_course ?>">

         <div class="modal-body">

            <div class="form-group">
               <label for="codeCourse">Kode Matkul</label>
               <input type="text" class="form-control" id="codeCourse" name="code_course" value="<?php echo $courseUpdate['code_course'] ?>">
               <div class="invalid-feedback" id="codeCourseFeedback"></div>
            </div>

            <div class="form-group">
               <label for="nameCourse">Nama Matkul</label>
               <input type="text" class="form-control" id="nameCourse" name="name_course" value="<?php echo $courseUpdate['name_course'] ?>">
               <div class="invalid-feedback" id="nameCourseFeedback"></div>
            </div>

            <div class="form-group">
               <label for="sksCourse">SKS Matkul</label>
               <select class="form-control" id="sksCourse" name="sks_course">
                  <option value="<?php echo $courseUpdate['sks_course'] ?>"><?php echo $courseUpdate['sks_course'] ?></option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
               </select>
               <div class="invalid-feedback" id="sksCourseFeedback"></div>
            </div>

            <div class="form-group">
               <label for="smtCourse">Kategori Matkul</label>
               <select class="form-control" id="categoryCourse" name="category_course">
                  <option value="<?php echo $courseUpdate['category_course'] ?>"><?php echo $courseUpdate['category_course'] ?></option>
                  <option value="Wajib">Wajib</option>
                  <option value="Pilihan">Pilihan</option>
               </select>
               <div class="invalid-feedback" id="categoryCourseFeedback"></div>
            </div>

            <div class="form-group">
               <label for="smtCourse">Semester Matkul</label>
               <select class="form-control" id="smtCourse" name="smt_course">
                  <option value="<?php echo $courseUpdate['smt_course'] ?>"><?php echo $courseUpdate['smt_course'] ?></option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
               </select>
               <div class="invalid-feedback" id="smtCourseFeedback"></div>
            </div>

         </div>

         <div class="modal-footer">
            <button type="button" class="btn btn-secondary " data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary" id="updateSaveCourseBtn">Update Matkul</button>
         </div>
         <?php form_close() ?>

      </div>
   </div>
</div>


<script>
   $('#updateSaveCourse').submit(function(e) {
      e.preventDefault();

      $.ajax({
         url: $(this).attr('action'),
         type: 'post',
         dataType: 'json',
         data: $(this).serialize(),
         beforeSend: function() {
            $('#updateSaveCourseBtn').html('<i class="fa fa-spin fa-spinner"></i>')
         },
         complete: function() {
            $('#updateSaveCourseBtn').html('Update Matkul')
         },
         success: function(res) {
            if (res.success) {
               Swal.fire(
                  'Berhasil!',
                  res.success,
                  'success'
               );

               $('#updateModalCourse').modal('hide');

               setTimeout(function() {
                  location.reload();
               }, 2000)
            } else if (res.errors) {
               if (res.errors.code_course) {
                  $('#codeCourse').addClass('is-invalid');
                  $('#codeCourseFeedback').html(res.errors.code_course)
               }

               if (res.errors.name_course) {
                  $('#nameCourse').addClass('is-invalid');
                  $('#nameCourseFeedback').html(res.errors.name_course)
               }

               if (res.errors.sks_course) {
                  $('#sksCourse').addClass('is-invalid');
                  $('#sksCourseFeedback').html(res.errors.sks_course)
               }

               if (res.errors.category_course) {
                  $('#categoryCourse').addClass('is-invalid');
                  $('#categoryCourseFeedback').html(res.errors.category_course)
               }

               if (res.errors.smt_course) {
                  $('#smtCourse').addClass('is-invalid');
                  $('#smtCourseFeedback').html(res.errors.smt_course)
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