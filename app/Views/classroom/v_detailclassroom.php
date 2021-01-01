<?php echo $this->extend('templates/v_template') ?>

<?php echo $this->section('content') ?>
<div class="container-fluid">
   <div class="row mb-3">
      <div class="col-sm-12">
         <div class="card ">
            <div class="card-content py-3 px-4">
               <table class="table">
                  <tr>
                     <th>Nama Fakultas</th>
                     <td>: <?php echo $classroom['name_classroom'] ?></td>

                     <th>Nama Prodi</th>
                     <td>: <?php echo $classroom['name_prody'] ?></td>
                  </tr>

                  <tr>
                     <th>Nama Dosen</th>
                     <td>: <?php echo $classroom['name_lecturer'] ?></td>

                     <th>Jumlah Mahasiswa</th>
                     <td>: <?php echo $countCollegers ?></td>
                  </tr>
               </table>
            </div>
         </div>
      </div>
   </div>

   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header">
               <button type="button" id="insertDetailClassroom" class="btn btn-primary btn-icon-split" onclick="insertDetailClassroom(<?php echo $classroom['id_classroom'] ?>)">
                  <span class="icon text-white-50" id="insertIconDetailClassroom">
                     <i class="fas fa-plus"></i>
                  </span>
                  <span class="text">Tambah Mahasiswa</span>
               </button>
            </div>
            <div class="card-content py-3 px-4" id="viewDataProdyDetailClassroom">
               <table class="table table-striped">
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>NIM Mahasiswa</th>
                        <th>Nama Mahasiswa</th>
                        <th>Prodi Mahasiswa</th>
                        <th>#</th>
                     </tr>
                  </thead>

                  <tbody>
                     <?php
                     $no = 1;
                     foreach ($collegers as $colleger) :
                     ?>
                        <tr>
                           <td><?php echo $no++ ?></td>
                           <td><?php echo $colleger['nim_colleger'] ?></td>
                           <td><?php echo $colleger['name_colleger'] ?></td>
                           <td><?php echo $colleger['name_prody'] ?></td>

                           <td>
                              <button type="button" class="btn btn-danger btn-sm" onclick="removeCollegerInClass(<?php echo $colleger['id_colleger'] ?>)">
                                 <i class="fa fa-trash-alt"></i>
                              </button>
                           </td>
                        </tr>
                     <?php endforeach ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>




   <div id="viewModalDetailClassroom" style="display: none;"></div>

</div>

<script>
   function insertDetailClassroom(id) {
      $.ajax({
         url: '/classroom/insertdetailview',
         type: 'post',
         dataType: 'json',
         data: {
            id: id
         },
         beforeSend: function() {
            $('#insertIconDetailClassroom').html(' <i class="fas fa-spin fa-spinner"></i>')
         },
         success: function(res) {
            $('#viewModalDetailClassroom').html(res.data).show();
            $('#inserDetailClassroomModal').modal('show');

            $('#insertIconDetailClassroom').html(' <i class="fas fa-plus"></i>')
         },
         error: function(xhr, ajaxOption, throwError) {
            alert(`${xhr.status}
                        ${xhr.responseText}
                        ${throwError}`)
         }
      })
   }

   function removeCollegerInClass(id_colleger) {
      $.ajax({
         url: '/classroom/removecollegerinclass',
         type: 'post',
         dataType: 'json',
         data: {
            id_colleger: id_colleger
         },
         success: function(res) {
            if (res.success) {
               Swal.fire(
                  'Berhasil!',
                  res.success,
                  'success'
               );

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

<?php $this->endSection() ?>