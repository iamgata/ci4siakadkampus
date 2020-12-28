<?php echo $this->extend('templates/v_template') ?>

<?php echo $this->section('content') ?>
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header">
               <button type="button" id="insertColleger" class="btn btn-primary btn-icon-split">
                  <span class="icon text-white-50" id="insertIconColleger">
                     <i class="fas fa-plus"></i>
                  </span>
                  <span class="text">Tambah Mahasiswa</span>
               </button>
            </div>
            <div class="card-content py-3 px-4" id="viewDataColleger">

            </div>
         </div>
      </div>
   </div>

   <div id="viewModalColleger" style="display: none;"></div>

</div>

<script>
   function getColleger() {
      $.ajax({
         url: '/colleger/getcolleger',
         type: 'post',
         dataType: 'json',
         success: function(res) {
            $('#viewDataColleger').html(res.data).show();
         },
         error: function(xhr, ajaxOption, throwError) {
            alert(`${xhr.status}
                        ${xhr.responseText}
                        ${throwError}`)
         }
      })
   }

   $(document).ready(function() {
      getColleger();

      $('#insertColleger').click(function(e) {
         e.preventDefault();

         $.ajax({
            url: '/colleger/insertview',
            type: 'post',
            dataType: 'json',
            beforeSend: function() {
               $('#insertIconColleger').html(' <i class="fas fa-spin fa-spinner"></i>')
            },
            success: function(res) {
               $('#viewModalColleger').html(res.data).show();
               $('#insertModalColleger').modal('show');

               $('#insertIconColleger').html(' <i class="fas fa-plus"></i>')
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