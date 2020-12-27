<?php echo $this->extend('templates/v_template') ?>

<?php echo $this->section('content') ?>
<div class="container-fluid">
   <div class="row mb-3">
      <div class="col-sm-6">
         <div class="card ">
            <div class="card-content py-3 px-4">
               <table class="table bordered">
                  <tr>
                     <th>Nama Fakultas</th>
                     <td>: <?php echo $prody['name_faculity'] ?></td>
                  </tr>

                  <tr>
                     <th>Nama Prodi</th>
                     <td>: <?php echo $prody['name_prody'] ?></td>
                  </tr>

                  <tr>
                     <th>Tingkat Prodi</th>
                     <td>: <?php echo $prody['degree_prody'] ?></td>
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
               <button type="button" id="insertCourse" class="btn btn-primary btn-icon-split" onclick="insert(<?php echo $prody['id_prody'] ?>)">
                  <span class="icon text-white-50" id="insertIconCourse">
                     <i class="fas fa-plus"></i>
                  </span>
                  <span class="text">Tambah Matkul</span>
               </button>
            </div>
            <div class="card-content py-3 px-4" id="viewDataProdyCourse">
               <table class="table table-striped">
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>Kode Matkul</th>
                        <th>Nama Matkul</th>
                        <th class="text-center">SKS Matkul</th>
                        <th class="text-center">Kategori Matkul</th>
                        <th class="text-center">Semester Matkul</th>
                        <th>#</th>
                     </tr>
                  </thead>

                  <tbody>
                     <?php
                     $no = 1;
                     foreach ($courses as $course) :
                     ?>
                        <tr>
                           <td><?php echo $no++ ?></td>
                           <td><?php echo $course['code_course'] ?></td>
                           <td><?php echo $course['name_course'] ?></td>
                           <td class="text-center"><?php echo $course['sks_course'] ?></td>
                           <td class="text-center"><?php echo $course['category_course'] ?></td>
                           <td class="text-center"><?php echo $course['smt_course'] ?> (<?php echo $course['semester_course'] ?>)</td>

                           <td>
                              <button type="button" class="btn btn-warning btn-sm" onclick="update('<?php echo  $course['id_course']  ?>', '<?php echo $prody['id_prody'] ?>')">
                                 <i class="fa fa-pen-alt"></i>
                              </button>

                              <button type="button" class="btn btn-danger btn-sm" onclick="remove('<?php echo  $course['id_course']  ?>')">
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


   <div id="viewModalCourse" style="display: none;"></div>

</div>


<script>
   function insert(id) {
      $.ajax({
         url: '/course/insertview',
         type: 'post',
         dataType: 'json',
         data: {
            id: id
         },
         beforeSend: function() {
            $('#insertIconCourse').html(' <i class="fas fa-spin fa-spinner"></i>');
         },
         success: function(res) {
            $('#viewModalCourse').html(res.data).show();
            $('#insertModalCourse').modal('show');

            $('#insertIconCourse').html(' <i class="fas fa-plus"></i>')
         }
      })
   }

   function update(idcourse, idprody) {
      $.ajax({
         url: '/course/updateview',
         type: 'post',
         dataType: 'json',
         data: {
            id_course: idcourse,
            id_prody: idprody
         },
         success: function(res) {
            $('#viewModalCourse').html(res.data).show();
            $('#updateModalCourse').modal('show');
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
         url: '/course/remove',
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

            setTimeout(function() {
               location.reload();
            }, 2000)
         },
         error: function(xhr, ajaxOption, throwError) {
            alert(`${xhr.status}
                        ${xhr.responseText}
                        ${throwError}`)
         }
      })
   }
</script>

<?php echo $this->endSection() ?>