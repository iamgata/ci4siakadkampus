<?php echo $this->extend('templates/v_template') ?>

<?php echo $this->section('content') ?>
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header">
               <button type="button" id="insertLecturer" class="btn btn-primary btn-icon-split">
                  <span class="icon text-white-50" id="insertIconLecturer">
                     <i class="fas fa-plus"></i>
                  </span>
                  <span class="text">Tambah Dosen</span>
               </button>
            </div>
            <div class="card-content py-3 px-4" id="viewDataLecturer">

            </div>
         </div>
      </div>
   </div>

   <div id="viewModalLecturer" style="display: none;"></div>

</div>

<script>
   function getLecturer() {
      $.ajax({
         url: '/lecturer/getlecturer',
         type: 'post',
         dataType: 'json',
         success: function(res) {
            $('#viewDataLecturer').html(res.data);
         },
         error: function(xhr, ajaxOption, throwError) {
            alert(`${xhr.status}
                        ${xhr.responseText}
                        ${throwError}`)
         }
      })
   }

   $(document).ready(function() {
      getLecturer();

      $('#insertLecturer').click(function(e) {
         e.preventDefault();

         $.ajax({
            url: '/lecturer/insertview',
            type: 'post',
            dataType: 'json',
            beforeSend: function() {
               $('#insertIconLecturer').html(' <i class="fas fa-spin fa-spinner"></i>')
            },
            success: function(res) {
               $('#viewModalLecturer').html(res.data).show();
               $('#insertModalLecturer').modal('show');

               $('#insertIconLecturer').html(' <i class="fas fa-plus"></i>')
            },
            error: function(xhr, ajaxOption, throwError) {
               alert(`${xhr.status}
                        ${xhr.responseText}
                        ${throwError}`)
            }
         })
      })
   })
</script>
<?php echo $this->endSection() ?>