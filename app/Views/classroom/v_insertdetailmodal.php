<div class="modal fade" id="inserDetailClassroomModal" tabindex="-1" aria-labelledby="inserDetailClassroomModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Mahasiswa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="card">
            <div class="card-content p-3">
               <table class="table table-striped">
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>NIM Mahasiswa</th>
                        <th>Nama Mahasiswa</th>
                        <th>Nama Prodi</th>
                        <th>#</th>
                     </tr>
                  </thead>

                  <tbody>
                     <?php
                     $no = 1;
                     foreach ($collegernoclasses as $collegernoclass) : ?>
                        <?php if ($collegernoclass['id_prody'] == $classroom['id_prody']) : ?>
                           <tr>
                              <td><?php echo $no++ ?></td>
                              <td><?php echo $collegernoclass['nim_colleger'] ?></td>
                              <td><?php echo $collegernoclass['name_colleger'] ?></td>
                              <td><?php echo $collegernoclass['name_prody'] ?></td>
                              <td></td>
                              <td>
                                 <button type="button" id="addCollegerInClass" class="btn btn-primary btn-sm" onclick="addCollegerInClass(<?php echo $collegernoclass['id_colleger'] ?>, <?php echo $classroom['id_classroom'] ?>)">
                                    <i class="fa fa-plus"></i>
                                 </button>
                              </td>
                           </tr>
                        <?php endif ?>
                     <?php endforeach ?>
                  </tbody>
               </table>
            </div>
         </div>




         <div class="modal-footer">
            <button type="button" class="btn btn-secondary " data-dismiss="modal">Batal</button>
         </div>

      </div>
   </div>
</div>

<script>
   function addCollegerInClass(id_colleger, id_classroom) {
      $.ajax({
         url: '/classroom/addcollegerinclass',
         type: 'post',
         dataType: 'json',
         data: {
            id_colleger: id_colleger,
            id_classroom: id_classroom
         },
         success: function(res) {
            if (res.success) {
               Swal.fire(
                  'Berhasil!',
                  res.success,
                  'success'
               );

               $('#inserDetailClassroomModal').modal('hide');

               setTimeout(function() {
                  location.reload();
               }, 2000)
            }
         },
         error: function(xhr, ajaxOption, throwError) {
            alert(`${xhr.status}
                        ${xhr.responseText}
                        ${throwError}`)
         }
      })
   }
</script>