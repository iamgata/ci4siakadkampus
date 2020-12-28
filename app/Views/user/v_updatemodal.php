<div class="modal fade" id="updateModalUser" tabindex="-1" aria-labelledby="updateModalUserLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>

         <?php echo form_open('user/updatesave', ['id'   => 'updateSaveUser']) ?>
         <input type="hidden" name="id_user" value="<?php echo $userUpdate['id_user'] ?>">
         <div class="modal-body">
            <div class="form-group">
               <label for="nameUser">Nama User</label>
               <input type="text" class="form-control" id="nameUser" name="name_user" value="<?php echo $userUpdate['name_user'] ?>">
               <div class="invalid-feedback" id="nameUserFeedback"></div>
            </div>

            <div class="form-group">
               <label for="emailUser">Email User</label>
               <input type="text" class="form-control" id="emailUser" name="email_user" value="<?php echo $userUpdate['email_user'] ?>">
               <div class="invalid-feedback" id="emailUserFeedback"></div>
            </div>


            <div class="form-group">
               <label for="passwordUser">Password User</label>
               <input type="text" class="form-control" id="passwordUser" name="password_user" value="<?php echo $userUpdate['password_user'] ?>">
               <div class="invalid-feedback" id="passwordUserFeedback"></div>
            </div>

            <div class="form-group">
               <label for="levelUser">Pilih Level</label>
               <select class="form-control" id="levelUser" name="level_user">
                  <option value="<?php echo $userUpdate['level_user'] ?>"><?php echo $userUpdate['level_user'] ?></option>
                  <option value="1">Admin</option>
                  <option value="2">Dosen</option>
                  <option value="3">Mahasiswa</option>
               </select>
               <div class="invalid-feedback" id="levelUserFeedback"></div>
            </div>

            <div class="form-group">
               <label for="imageUser">Foto User</label>
               <input type="text" class="form-control" id="imageUser" name="image_user" value="<?php echo $userUpdate['image_user'] ?>">
               <div class="invalid-feedback" id="imageUserFeedback"></div>
            </div>
         </div>


         <div class="modal-footer">
            <button type="button" class="btn btn-secondary " data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary" id="updateSaveUserBtn">Update User</button>
         </div>
         <?php form_close() ?>

      </div>
   </div>
</div>

<script>
   $('#updateSaveUser').submit(function(e) {
      e.preventDefault();

      $.ajax({
         url: $(this).attr('action'),
         type: 'post',
         dataType: 'json',
         data: $(this).serialize(),
         beforeSend: function() {
            $('#updateSaveUserBtn').html('<i class="fa fa-spin fa-spinner"></i>')
         },
         complete: function() {
            $('#updateSaveUserBtn').html('Update User')
         },
         success: function(res) {
            if (res.success) {
               Swal.fire(
                  'Berhasil!',
                  res.success,
                  'success'
               );

               $('#updateModalUser').modal('hide');
               getUser();
            } else if (res.errors) {
               if (res.errors.name_user) {
                  $('#nameUser').addClass('is-invalid');
                  $('#nameUserFeedback').html(res.errors.name_user)
               }

               if (res.errors.email_user) {
                  $('#emailUser').addClass('is-invalid');
                  $('#emailUserFeedback').html(res.errors.email_user)
               }

               if (res.errors.password_user) {
                  $('#passwordUser').addClass('is-invalid');
                  $('#passwordUserFeedback').html(res.errors.password_user)
               }

               if (res.errors.level_user) {
                  $('#levelUser').addClass('is-invalid');
                  $('#levelUserFeedback').html(res.errors.level_user)
               }

               if (res.errors.image_user) {
                  $('#imageUser').addClass('is-invalid');
                  $('#imageUserFeedback').html(res.errors.image_user)
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