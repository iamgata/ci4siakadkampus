<table class="table table-striped">
   <thead>
      <tr>
         <th>No</th>
         <th>NIM Mahasiswa</th>
         <th>Nama Mahasiswa</th>
         <th>Prodi Mahasiswa</th>
         <th>Email Mahasiswa</th>
         <th>Foto Mahasiswa</th>
         <th>#</th>
      </tr>
   </thead>

   <tbody>
      <?php
      $no = 1;
      foreach ($collegers as $colleger) : ?>
         <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $colleger['nim_colleger'] ?></td>
            <td><?php echo $colleger['name_colleger'] ?></td>
            <td><?php echo $colleger['degree_prody'] ?> - <?php echo $colleger['name_prody'] ?></td>
            <td><?php echo $colleger['email_colleger'] ?></td>
            <td><?php echo $colleger['image_colleger'] ?></td>
            <td>
               <button type="button" class="btn btn-warning btn-sm" onclick="update('<?php echo $colleger['id_colleger'] ?>')">
                  <i class="fa fa-pen-alt"></i>
               </button>

               <button type="button" class="btn btn-danger btn-sm" onclick="remove('<?php echo $colleger['id_colleger'] ?>')">
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
         url: '/colleger/updateview',
         type: 'post',
         dataType: 'json',
         data: {
            id: id
         },
         success: function(res) {
            $('#viewModalColleger').html(res.data).show();
            $('#updateModalColleger').modal('show');
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
         url: '/colleger/remove',
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

            getColleger();
         },
         error: function(xhr, ajaxOption, throwError) {
            alert(`${xhr.status}
                        ${xhr.responseText}
                        ${throwError}`)
         }
      })
   }
</script>