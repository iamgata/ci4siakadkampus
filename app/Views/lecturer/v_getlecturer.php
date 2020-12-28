<table class="table table-striped">
   <thead>
      <tr>
         <th>No</th>
         <th>Kode Dosen</th>
         <th>NIDN Dosen</th>
         <th>Nama Dosen</th>
         <th>Email Dosen</th>
         <th>Foto Dosen</th>
         <th>#</th>
      </tr>
   </thead>

   <tbody>
      <?php
      $no = 1;
      foreach ($lecturers as $lecturer) : ?>
         <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $lecturer['code_lecturer'] ?></td>
            <td><?php echo $lecturer['nidn_lecturer'] ?></td>
            <td><?php echo $lecturer['name_lecturer'] ?></td>
            <td><?php echo $lecturer['email_lecturer'] ?></td>
            <td><?php echo $lecturer['image_lecturer'] ?></td>
            <td>
               <button type="button" class="btn btn-warning btn-sm" onclick="update('<?php echo $lecturer['id_lecturer'] ?>')">
                  <i class="fa fa-pen-alt"></i>
               </button>

               <button type="button" class="btn btn-danger btn-sm" onclick="remove('<?php echo $lecturer['id_lecturer'] ?>')">
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
         url: '/lecturer/updateview',
         type: 'post',
         dataType: 'json',
         data: {
            id: id
         },
         success: function(res) {
            $('#viewModalLecturer').html(res.data).show();
            $('#updateModalLecturer').modal('show');
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
         url: '/lecturer/remove',
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

            getLecturer();
         },
         error: function(xhr, ajaxOption, throwError) {
            alert(`${xhr.status}
                        ${xhr.responseText}
                        ${throwError}`)
         }
      })
   }
</script>