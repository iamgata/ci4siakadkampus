<div class="modal fade" id="insertModalColleger" tabindex="-1" aria-labelledby="insertModalCollegerLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Mahasiswa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>

         <?php echo form_open('colleger/insertsave', ['id'   => 'insertSaveColleger']) ?>
         <div class="modal-body">
            <div class="form-row">
               <div class="form-group col-sm-6">
                  <label for="nimColleger">NIM Mahasiswa</label>
                  <input type="text" class="form-control" id="nimColleger" name="nim_colleger">
                  <div class="invalid-feedback" id="nimCollegerFeedback"></div>
               </div>

               <div class="form-group col-sm-6">
                  <label for="nameColleger">Nama Mahasiswa</label>
                  <input type="text" class="form-control" id="nameColleger" name="name_colleger">
                  <div class="invalid-feedback" id="nameCollegerFeedback"></div>
               </div>
            </div>

            <div class="form-group">
               <label for="idPrody">Pilih Prodi</label>
               <select class="form-control" id="idPrody" name="id_prody">
                  <option value="">-- Pilih Program Studi --</option>
                  <?php foreach ($collegerProdies as $collegerPrody) : ?>
                     <option value="<?php echo $collegerPrody['id_prody'] ?>"><?php echo $collegerPrody['degree_prody'] ?> - <?php echo $collegerPrody['name_prody'] ?></option>
                  <?php endforeach ?>
               </select>
               <div class="invalid-feedback" id="idProdyFeedback"></div>
            </div>

            <div class="form-row">
               <div class="form-group col-sm-6">
                  <label for="emailColleger">Email Mahasiswa</label>
                  <input type="text" class="form-control" id="emailColleger" name="email_colleger">
                  <div class="invalid-feedback" id="emailCollegerFeedback"></div>
               </div>

               <div class="form-group col-sm-6">
                  <label for="passwordColleger">Password Mahasiswa</label>
                  <input type="password" class="form-control" id="passwordColleger" name="password_colleger">
                  <div class="invalid-feedback" id="passwordCollegerFeedback"></div>
               </div>
            </div>

            <div class="form-group">
               <label for="imageColleger">Foto Mahasiswa</label>
               <input type="text" class="form-control" id="imageColleger" name="image_colleger">
               <div class="invalid-feedback" id="imageCollegerFeedback"></div>
            </div>
         </div>


         <div class="modal-footer">
            <button type="button" class="btn btn-secondary " data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary" id="insertSaveCollegerBtn">Tambah Mahasiswa</button>
         </div>
         <?php form_close() ?>

      </div>
   </div>
</div>

<script>
   $('#insertSaveColleger').submit(function(e) {
      e.preventDefault();

      $.ajax({
         url: $(this).attr('action'),
         type: 'post',
         dataType: 'json',
         data: $(this).serialize(),
         beforeSend: function() {
            $('#insertSaveCollegerBtn').html('<i class="fa fa-spin fa-spinner"></i>')
         },
         complete: function() {
            $('#insertSaveCollegerBtn').html('Tambah Mahasiswa')
         },
         success: function(res) {
            if (res.success) {
               Swal.fire(
                  'Berhasil!',
                  res.success,
                  'success'
               );

               $('#insertModalColleger').modal('hide');
               getColleger();

            } else if (res.errors) {
               if (res.errors.nim_colleger) {
                  $('#nimColleger').addClass('is-invalid');
                  $('#nimCollegerFeedback').html(res.errors.nim_colleger)
               }

               if (res.errors.name_colleger) {
                  $('#nameColleger').addClass('is-invalid');
                  $('#nameCollegerFeedback').html(res.errors.name_colleger)
               }

               if (res.errors.id_prody) {
                  $('#idPrody').addClass('is-invalid');
                  $('#idProdyFeedback').html(res.errors.id_prody)
               }

               if (res.errors.email_colleger) {
                  $('#emailColleger').addClass('is-invalid');
                  $('#emailCollegerFeedback').html(res.errors.email_colleger)
               }

               if (res.errors.password_colleger) {
                  $('#passwordColleger').addClass('is-invalid');
                  $('#passwordCollegerFeedback').html(res.errors.password_colleger)
               }

               if (res.errors.image_colleger) {
                  $('#imageColleger').addClass('is-invalid');
                  $('#imageCollegerFeedback').html(res.errors.image_colleger)
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