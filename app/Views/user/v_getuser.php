<table class="table table-striped">
   <thead>
      <tr>
         <th>No</th>
         <th>Nama User</th>
         <th>Email User</th>
         <th>Level User</th>
         <th>Foto User</th>
         <th>#</th>
      </tr>
   </thead>

   <tbody>
      <?php
      $no = 1;
      foreach ($users as $user) : ?>
         <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $user['name_user'] ?></td>
            <td><?php echo $user['email_user'] ?></td>
            <td><?php echo $user['level_user'] ?></td>
            <td class="rounded-cirle"><?php echo $user['image_user'] ?></td>
            <td>
               <button type="button" class="btn btn-warning btn-sm" onclick="update('<?php echo $user['id_user'] ?>')">
                  <i class="fa fa-pen-alt"></i>
               </button>

               <button type="button" class="btn btn-danger btn-sm" onclick="remove('<?php echo $user['id_user'] ?>')">
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
         url: '/user/updateview',
         type: 'post',
         dataType: 'json',
         data: {
            id: id
         },
         success: function(res) {
            $('#viewModalUser').html(res.data).show();
            $('#updateModalUser').modal('show');
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
         url: '/user/remove',
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

            getUser();
         },
         error: function(xhr, ajaxOption, throwError) {
            alert(`${xhr.status}
                        ${xhr.responseText}
                        ${throwError}`)
         }
      })
   }
</script>