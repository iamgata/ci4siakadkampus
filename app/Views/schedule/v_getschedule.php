<table class="table table-striped">
   <thead>
      <tr>
         <th>No</th>
         <th>Nama Fakultas</th>
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
            <td><?php echo $prody['acronim_faculity'] ?></td>
            <td><?php echo $prody['name_prody'] ?></td>
            <td class="text-center"><?php echo $prody['degree_prody'] ?></td>
            <td><?php echo $prody['head_prody'] ?></td>
            <td>
               <a href="/schedule/detailschedule/<?php echo $prody['id_prody'] ?>" class="btn btn-info btn-sm">
                  <i class="fa fa-calendar-alt"></i> Jadwal Kuliah
               </a>
            </td>
         </tr>
      <?php endforeach ?>
   </tbody>
</table>