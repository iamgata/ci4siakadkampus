<div class="modal fade" id="insertModalPrody" tabindex="-1" aria-labelledby="insertModalProdyLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Prodi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>

         <?php echo form_open('prody/insertsave', ['id'   => 'insertSavePrody']) ?>
         <div class="modal-body">

            <div class="form-group">
               <label for="idFaculity">Nama Fakultas</label>
               <select class="form-control" id="idFaculity" name="id_faculity">
                  <option value=""> - Pilih Fakultas -</option>
                  <?php foreach ($faculityprodies as $faculityprody) : ?>
                     <option value="<?php echo $faculityprody['id_faculity'] ?>"><?php echo $faculityprody['name_faculity'] ?></option>
                  <?php endforeach ?>
               </select>
               <div class="invalid-feedback" id="idFaculityFeedback"></div>
            </div>

            <div class="form-group">
               <label for="namePrody">Nama Prodi</label>
               <input type="text" class="form-control" id="namePrody" name="name_prody">
               <div class="invalid-feedback" id="nameProdyFeedback"></div>
            </div>

            <div class="form-group">
               <label for="codePrody">Kode Prodi</label>
               <input type="text" class="form-control" id="codePrody" name="code_prody">
               <div class="invalid-feedback" id="codeProdyFeedback"></div>
            </div>

            <div class="form-group">
               <label for="degreePrody">Tingkat Prodi</label>
               <select class="form-control" id="degreePrody" name="degree_prody">
                  <option value=""> - Pilih Tingkat -</option>
                  <option value="D4">D4</option>
                  <option value="S1">S1</option>
                  <option value="S2">S2</option>
                  <option value="S3">S3</option>
               </select>
               <div class="invalid-feedback" id="degreeProdyFeedback"></div>
            </div>

            <div class="form-group">
               <label for="headPrody">Ketua Prodi</label>
               <select class="form-control" id="headPrody" name="head_prody">
                  <option value=""> - Pilih Ketua Prodi -</option>
                  <?php foreach ($lecturers as $lecturer) : ?>
                     <option value="<?php echo $lecturer['name_lecturer'] ?>"><?php echo $lecturer['name_lecturer'] ?></option>
                  <?php endforeach ?>
               </select>
               <div class="invalid-feedback" id="headProdyFeedback"></div>
            </div>

         </div>

         <div class="modal-footer">
            <button type="button" class="btn btn-secondary " data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary" id="insertSaveProdyBtn">Tambah Prodi</button>
         </div>
         <?php form_close() ?>

      </div>
   </div>
</div>

<script>
   $('#insertSavePrody').submit(function(e) {
      e.preventDefault();
      $.ajax({
         url: $(this).attr('action'),
         type: 'post',
         dataType: 'json',
         data: $(this).serialize(),
         beforeSend: function() {
            $('#insertSaveRoomBtn').html('<i class="fa fa-spin fa-spinner"></i>')
         },
         complete: function() {
            $('#insertSaveRoomBtn').html('Tambah Ruangan')
         },
         success: function(res) {
            if (res.success) {
               Swal.fire(
                  'Berhasil!',
                  res.success,
                  'success'
               );

               $('#insertModalPrody').modal('hide');
               getPrody();
            } else if (res.errors) {
               if (res.errors.id_faculity) {
                  $('#idFaculity').addClass('is-invalid');
                  $('#idFaculityFeedback').html(res.errors.id_faculity)
               }
               if (res.errors.name_prody) {
                  $('#namePrody').addClass('is-invalid');
                  $('#nameProdyFeedback').html(res.errors.name_prody)
               }
               if (res.errors.code_prody) {
                  $('#codePrody').addClass('is-invalid');
                  $('#codeProdyFeedback').html(res.errors.code_prody)
               }
               if (res.errors.degree_prody) {
                  $('#degreePrody').addClass('is-invalid');
                  $('#degreeProdyFeedback').html(res.errors.degree_prody)
               }
               if (res.errors.head_prody) {
                  $('#headPrody').addClass('is-invalid');
                  $('#headProdyFeedback').html(res.errors.head_prody)
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