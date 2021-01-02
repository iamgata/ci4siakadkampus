<table class="table table-striped">
   <thead>
      <tr>
         <th>No</th>
         <th>Tahun Ajaran</th>
         <th>Semester Ajaran</th>
         <th class="text-center">Status</th>
         <th class="text-center">#</th>
      </tr>
   </thead>

   <tbody>
      <?php
      $no = 1;
      foreach ($schoolyears as $schoolyear) : ?>
         <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $schoolyear['name_schoolyear'] ?></td>
            <td><?php echo $schoolyear['semester_schoolyear'] ?></td>
            <td class="text-center">
               <?php if ($schoolyear['status_schoolyear'] == 1) : ?>
                  <i class="fa fa-2x fa-check-circle text-success"></i>
               <?php else : ?>
                  <i class="fa fa-times-circle text-danger"></i>
               <?php endif ?>
            </td>
            <td class="text-center">
               <button type="button" class="btn btn-primary btn-sm" onclick="setActiveYear('<?php echo $schoolyear['id_schoolyear'] ?>')">
                  <i class="fa fa-check-double"></i> Aktifkan
               </button>
            </td>
         </tr>
      <?php endforeach ?>
   </tbody>
</table>

<script>
   function setActiveYear(id) {
      $.ajax({
         url: '/schoolyear/setactiveyear',
         type: 'post',
         dataType: 'json',
         data: {
            id: id
         },
         success: function(res) {
            if (res.success) {
               Swal.fire(
                  'Berhasil!',
                  res.success,
                  'success'
               );
            }

            getSetSchoolyear();
         },
         error: function(xhr, ajaxOption, throwError) {
            alert(`${xhr.status}
                        ${xhr.responseText}
                        ${throwError}`)
         }
      })

   }
</script>