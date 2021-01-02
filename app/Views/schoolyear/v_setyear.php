<?php echo $this->extend('templates/v_template') ?>

<?php echo $this->section('content') ?>
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-content py-3 px-4" id="setViewDataSchoolyear">

            </div>
         </div>
      </div>
   </div>

   <div id="setViewModalSchoolyear" style="display: none;"></div>

</div>


<script>
   function getSetSchoolyear() {
      $.ajax({
         url: '/schoolyear/getsetschoolyear',
         type: 'post',
         dataType: 'json',
         success: function(res) {
            $('#setViewDataSchoolyear').html(res.data);
         },
         error: function(xhr, ajaxOption, throwError) {
            alert(`${xhr.status}
                        ${xhr.responseText}
                        ${throwError}`)
         }
      })
   }

   $(document).ready(function(e) {
      getSetSchoolyear();
   })
</script>
<?php echo $this->endSection() ?>