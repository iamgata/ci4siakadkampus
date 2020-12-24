<table class="table table-striped">
   <thead>
      <tr>
         <th>No</th>
         <th>Tahun Ajaran</th>
         <th>Semester Ajaran</th>
         <th>#</th>
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
            <td>
               <button type="button" class="btn btn-warning btn-sm" onclick="update('<?php echo $schoolyear['id_schoolyear'] ?>')">
                  <i class="fa fa-pen-alt"></i>
               </button>

               <button type="button" class="btn btn-danger btn-sm" onclick="remove('<?php echo $schoolyear['id_schoolyear'] ?>')">
                  <i class="fa fa-trash-alt"></i>
               </button>
            </td>
         </tr>
      <?php endforeach ?>
   </tbody>
</table>


<script>
   function update(id) {
      $.ajax({
         url: '/schoolyear/updateview',
         type: 'post',
         dataType: 'json',
         data: {
            id: id
         },
         success: function(res) {
            console.log(res.data);
            $('#viewModalSchoolyear').html(res.data).show();
            $('#updateModalSchoolyear').modal('show');
         },
         error: function(xhr, ajaxOption, throwError) {
            alert(`${xhr.status}
                        ${xhr.responseText}
                        ${throwError}`)
         }
      })
   }

   function remove(id) {
      $.ajax({
         url: '/schoolyear/remove',
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

            getSchoolyear();
         },
         error: function(xhr, ajaxOption, throwError) {
            alert(`${xhr.status}
                        ${xhr.responseText}
                        ${throwError}`)
         }
      })
   }
</script>