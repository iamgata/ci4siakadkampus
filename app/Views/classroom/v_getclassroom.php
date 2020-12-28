<table class="table table-striped">
   <thead>
      <tr>
         <th>No</th>
         <th>Nama Kelas</th>
         <th>Nama Prodi</th>
         <th>Nama Dosen</th>
         <th>Tahun Kelas</th>
         <th>Jumlah Mahasiswa</th>
         <th>#</th>
      </tr>
   </thead>

   <tbody>
      <?php
      $no = 1;
      foreach ($classrooms as $classroom) : ?>
         <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $classroom['name_classroom'] ?></td>
            <td><?php echo $classroom['name_prody'] ?></td>
            <td><?php echo $classroom['name_lecturer'] ?></td>
            <td><?php echo $classroom['year_classroom'] ?></td>
            <td></td>
            <td>
               <button type="button" class="btn btn-warning btn-sm" onclick="update('<?php echo $classroom['id_classroom'] ?>')">
                  <i class="fa fa-pen-alt"></i>
               </button>

               <button type="button" class="btn btn-danger btn-sm" onclick="remove('<?php echo $classroom['id_classroom'] ?>')">
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
         url: '/classroom/updateview',
         type: 'post',
         dataType: 'json',
         data: {
            id: id
         },
         success: function(res) {
            $('#viewModalClassroom').html(res.data).show();
            $('#updateModalClassroom').modal('show');
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
         url: '/classroom/remove',
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

            getClassroom();
         },
         error: function(xhr, ajaxOption, throwError) {
            alert(`${xhr.status}
                        ${xhr.responseText}
                        ${throwError}`)
         }
      })
   }
</script>