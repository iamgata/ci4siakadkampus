<table class="table table-striped">
   <thead>
      <tr>
         <th>No</th>
         <th>Nama Fakultas</th>
         <th class="text-center">Kode Prodi</th>
         <th>Nama Prodi</th>
         <th class="text-center">Tingkat Prodi</th>
         <th>Ketua Prodi</th>
         <th>#</th>
      </tr>
   </thead>

   <tbody>
      <?php
      $no = 1;
      foreach ($prodies as $prody) : ?>
         <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $prody['name_faculity'] ?></td>
            <td class="text-center"><?php echo $prody['code_prody'] ?></td>
            <td><?php echo $prody['name_prody'] ?></td>
            <td class="text-center"><?php echo $prody['degree_prody'] ?></td>
            <td><?php echo $prody['head_prody'] ?></td>
            <td>
               <button type="button" class="btn btn-warning btn-sm" onclick="update('<?php echo $prody['id_prody'] ?>')">
                  <i class="fa fa-pen-alt"></i>
               </button>

               <button type="button" class="btn btn-danger btn-sm" onclick="remove('<?php echo $prody['id_prody'] ?>')">
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
         url: '/prody/updateview',
         type: 'post',
         dataType: 'json',
         data: {
            id: id
         },
         success: function(res) {
            $('#viewModalPrody').html(res.data).show();
            $('#updateModalPrody').modal('show');
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
         url: '/prody/remove',
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

            getPrody();
         },
         error: function(xhr, ajaxOption, throwError) {
            alert(`${xhr.status}
                        ${xhr.responseText}
                        ${throwError}`)
         }
      })
   }
</script>