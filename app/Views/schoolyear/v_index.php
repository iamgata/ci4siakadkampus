<?php echo $this->extend('templates/v_template') ?>

<?php echo $this->section('content') ?>
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header">
               <button type="button" id="insertSchoolyear" class="btn btn-primary btn-icon-split">
                  <span class="icon text-white-50" id="insertIconSchoolyear">
                     <i class="fas fa-plus"></i>
                  </span>
                  <span class="text">Tahun Ajaran</span>
               </button>
            </div>
            <div class="card-content py-3 px-4" id="viewDataSchoolyear">

            </div>
         </div>
      </div>
   </div>

   <div id="viewModalSchoolyear" style="display: none;"></div>

</div>


<script>
   function getSchoolyear() {
      $.ajax({
         url: '/schoolyear/getschoolyear',
         type: 'post',
         dataType: 'json',
         success: function(res) {
            $('#viewDataSchoolyear').html(res.data);
         },
         error: function(xhr, ajaxOption, throwError) {
            alert(`${xhr.status}
                        ${xhr.responseText}
                        ${throwError}`)
         }
      })
   }

   $(document).ready(function() {
      getSchoolyear();

      $('#insertSchoolyear').click(function() {
         $.ajax({
            url: '/schoolyear/insertview',
            type: 'post',
            dataType: 'json',
            beforeSend: function() {
               $('#insertIconSchoolyear').html(' <i class="fas fa-spin fa-spinner"></i>')
            },
            success: function(res) {
               $('#viewModalSchoolyear').html(res.data).show();
               $('#insertModalSchoolyear').modal('show');

               $('#insertIconSchoolyear').html(' <i class="fas fa-plus"></i>')
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