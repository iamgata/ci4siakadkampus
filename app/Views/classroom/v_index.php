<?php echo $this->extend('templates/v_template') ?>

<?php echo $this->section('content') ?>
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header">
               <button type="button" id="insertClassroom" class="btn btn-primary btn-icon-split">
                  <span class="icon text-white-50" id="insertIconClassroom">
                     <i class="fas fa-plus"></i>
                  </span>
                  <span class="text">Tambah Kelas</span>
               </button>
            </div>
            <div class="card-content py-3 px-4" id="viewDataClassroom">

            </div>
         </div>
      </div>
   </div>

   <div id="viewModalClassroom" style="display: none;"></div>

</div>


<script>
   function getClassroom() {
      $.ajax({
         url: '/classroom/getclassroom',
         type: 'post',
         dataType: 'json',
         success: function(res) {
            $('#viewDataClassroom').html(res.data);
         },
         error: function(xhr, ajaxOption, throwError) {
            alert(`${xhr.status}
                        ${xhr.responseText}
                        ${throwError}`)
         }
      })
   }

   $(document).ready(function() {
      getClassroom();

      $('#insertClassroom').click(function(e) {
         e.preventDefault();

         $.ajax({
            url: '/classroom/insertview',
            type: 'post',
            dataType: 'json',
            beforeSend: function() {
               $('#insertIconClassroom').html(' <i class="fas fa-spin fa-spinner"></i>')
            },
            success: function(res) {
               $('#viewModalClassroom').html(res.data).show();
               $('#insertModalClassroom').modal('show');

               $('#insertIconClassroom').html(' <i class="fas fa-plus"></i>')
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