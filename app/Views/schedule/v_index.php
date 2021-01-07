<?php echo $this->extend('templates/v_template') ?>

<?php echo $this->section('content') ?>
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header">
               <h5>Tahun Ajaran : <?php echo $schoolyear['name_schoolyear'] ?> ~ <?php echo $schoolyear['semester_schoolyear'] ?></h5>
            </div>
            <div class="card-content py-3 px-4" id="viewDataSchedule">

            </div>
         </div>
      </div>
   </div>

   <div id="viewModalSchedule" style="display: none;"></div>

</div>

<script>
   function getSchedule() {
      $.ajax({
         url: '/schedule/getschedule',
         type: 'post',
         dataType: 'json',
         success: function(res) {
            $('#viewDataSchedule').html(res.data);
         },
         error: function(xhr, ajaxOption, throwError) {
            alert(`${xhr.status}
                        ${xhr.responseText}
                        ${throwError}`)
         }
      })
   }

   $(document).ready(function() {
      getSchedule();
   })
</script>
<?php echo $this->endSection() ?>