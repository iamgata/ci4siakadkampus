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
                     <td>: <?php echo $prody['degree_prody'] ?> - <?php echo $prody['name_prody'] ?></td>
                  </tr>

                  <tr>
                     <th>Tahun Ajaran</th>
                     <td>: <?php echo $schoolyear['name_schoolyear'] ?> ~ <?php echo $schoolyear['semester_schoolyear'] ?></td>
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
               <button type="button" id="insertSchedule" class="btn btn-primary btn-icon-split" onclick="insert(<?php echo $prody['id_prody'] ?>)">
                  <span class="icon text-white-50" id="insertIconSchedule">
                     <i class="fas fa-plus"></i>
                  </span>
                  <span class="text">Tambah Jadwal</span>
               </button>
            </div>
            <div class="card-content py-3 px-4" id="viewDataProdySchedule">
               <table class="table table-striped">
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>Hari</th>
                        <th>Waktu</th>
                        <th>Matkul</th>
                        <th>SKS</th>
                        <th>Semester</th>
                        <th>Dosen</th>
                        <th>Kelas</th>
                        <th>Ruangan</th>
                        <th>Kuota</th>
                        <th>#</th>
                     </tr>
                  </thead>

                  <tbody>
                     <?php $no = 1;
                     foreach ($schedules as $schedule) : ?>
                        <tr>
                           <td><?php echo $no++ ?></td>
                           <td><?php echo $schedule['day_schedule'] ?></td>
                           <td><?php echo $schedule['time_schedule'] ?></td>
                           <td><?php echo $schedule['name_course'] ?></td>
                           <td>
                              <span class="badge badge-primary badge-pill"><?php echo $schedule['sks_course'] ?></span>
                           </td>
                           <td><?php echo $schedule['smt_course'] ?> (<?php echo $schedule['semester_course'] ?>)</td>
                           <td><?php echo $schedule['name_lecturer'] ?></td>
                           <td><?php echo $schedule['name_classroom'] ?></td>
                           <td><?php echo $schedule['name_room'] ?></td>
                           <td>
                              <span class="badge badge-primary badge-pill"><?php echo $schedule['quota_schedule'] ?></span>
                           </td>
                           <td>
                              <button type="button" class="btn btn-danger btn-sm" onclick="remove('<?php echo  $schedule['id_schedule']  ?>')">
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


   <div id="viewModalSchedule" style="display: none;"></div>

</div>

<script>
   function insert(id_prody) {
      $.ajax({
         url: '/schedule/insertview',
         type: 'post',
         dataType: 'json',
         data: {
            id: id_prody
         },
         beforeSend: function() {
            $('#insertIconSchedule').html(' <i class="fas fa-spin fa-spinner"></i>');
         },
         success: function(res) {
            $('#viewModalSchedule').html(res.data).show();
            $('#insertModalSchedule').modal('show');

            $('#insertIconSchedule').html(' <i class="fas fa-plus"></i>')
         }
      })
   }

   function remove(id_schedule) {
      $.ajax({
         url: '/schedule/remove',
         type: 'post',
         dataType: 'json',
         data: {
            id_schedule: id_schedule
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