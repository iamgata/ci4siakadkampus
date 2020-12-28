<?php echo $this->extend('templates/v_template') ?>

<?php echo $this->section('content') ?>
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header">
               <button type="button" id="insertUser" class="btn btn-primary btn-icon-split">
                  <span class="icon text-white-50" id="insertIconUser">
                     <i class="fas fa-plus"></i>
                  </span>
                  <span class="text">Tambah User</span>
               </button>
            </div>
            <div class="card-content py-3 px-4" id="viewDataUser">

            </div>
         </div>
      </div>
   </div>

   <div id="viewModalUser" style="display: none;"></div>

</div>

<script>
   function getUser() {
      $.ajax({
         url: '/user/getuser',
         type: 'post',
         dataType: 'json',
         success: function(res) {
            $('#viewDataUser').html(res.data);
         },
         error: function(xhr, ajaxOption, throwError) {
            alert(`${xhr.status}
                        ${xhr.responseText}
                        ${throwError}`)
         }
      })
   }

   $(document).ready(function() {
      getUser();

      $('#insertUser').click(function() {
         $.ajax({
            url: '/user/insertview',
            type: 'post',
            dataType: 'json',
            beforeSend: function() {
               $('#insertIconUser').html(' <i class="fas fa-spin fa-spinner"></i>')
            },
            success: function(res) {
               $('#viewModalUser').html(res.data).show();
               $('#insertModalUser').modal('show');

               $('#insertIconUser').html(' <i class="fas fa-plus"></i>')
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