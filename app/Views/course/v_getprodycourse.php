<table class="table table-striped">
   <thead>
      <tr>
         <th>No</th>
         <th>Nama Fakultas</th>
         <th>Nama Prodi</th>
         <th class="text-center">Kode Prodi</th>
         <th class="text-center">Tingkat Prodi</th>
         <th class="text-center">Jumlah Matkul</th>
         <th>#</th>
      </tr>
   </thead>

   <tbody>
      <?php
      $db = \Config\Database::connect();
      $no = 1;
      foreach ($prodies as $prody) :
         $jml = $db->table('tb_course')->where('id_prody', $prody['id_prody'])->countAllResults();
      ?>


         <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $prody['name_faculity'] ?></td>
            <td><?php echo $prody['name_prody'] ?></td>
            <td class="text-center"><?php echo $prody['code_prody'] ?></td>
            <td class="text-center"><?php echo $prody['degree_prody'] ?></td>
            <td class="text-center"><?php echo $jml ?></td>
            <td>
               <a href="/course/detailcourse/<?php echo $prody['id_prody'] ?>" class="btn btn-info btn-sm" id="">
                  <i class="fa fa-plus"></i> Detail Matkul
               </a>
            </td>
         </tr>
      <?php endforeach ?>
   </tbody>
</table>