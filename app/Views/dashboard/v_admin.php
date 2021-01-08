<?php echo $this->extend('templates/v_template') ?>

<?php echo $this->section('content') ?>
<div class="container-fluid">
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard Admin</h1>
   </div>

   <div class="row">

      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-dark shadow h-100 py-2">
            <div class="card-body ">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-dark text-uppercase mb-3">
                        Gedung
                     </div>
                     <div class="h3 mb-0 font-weight-bold text-gray-800">
                        <?php echo $countBuilding ?>
                     </div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-fw fa-building fa-4x text-gray-300"></i>
                  </div>
               </div>
            </div>
            <div class="card-footer pt-1 pb-0 text-center">
               <a href="/building" class="btn btn-dark btn-xs text-xs">Ke Gedung <i class="fa fa-arrow-right"></i></a>
            </div>
         </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-success text-uppercase mb-3">
                        Ruangan</div>
                     <div class="h3 mb-0 font-weight-bold text-gray-800">
                        <?php echo $countRoom ?>
                     </div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-fw fa-store-alt fa-4x text-gray-300"></i>
                  </div>
               </div>
            </div>
            <div class="card-footer pt-1 pb-0 text-center">
               <a href="/room" class="btn btn-success btn-xs text-xs">Ke Ruangan <i class="fa fa-arrow-right"></i></a>
            </div>
         </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-secondary shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-secondary text-uppercase mb-3">
                        Fakultas
                     </div>
                     <div class="h3 mb-0 font-weight-bold text-gray-800">
                        <?php echo $countFaculity ?>
                     </div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-fw fa-wrench fa-4x text-gray-300"></i>
                  </div>
               </div>
            </div>
            <div class="card-footer pt-1 pb-0 text-center">
               <a href="/faculity" class="btn btn-secondary btn-xs text-xs">Ke Fakultas <i class="fa fa-arrow-right"></i></a>
            </div>
         </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-danger text-uppercase mb-3">
                        Program Studi
                     </div>
                     <div class="h3 mb-0 font-weight-bold text-gray-800">
                        <?php echo $countPrody ?>
                     </div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-fw fa-user-graduate fa-4x text-gray-300"></i>
                  </div>
               </div>
            </div>
            <div class="card-footer pt-1 pb-0 text-center">
               <a href="/prody" class="btn btn-danger btn-xs text-xs">Ke Program Studi <i class="fa fa-arrow-right"></i></a>
            </div>
         </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-primary text-uppercase mb-3">
                        Dosen
                     </div>
                     <div class="h3 mb-0 font-weight-bold text-gray-800">
                        <?php echo $countLecturer ?>
                     </div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-fw fa-chalkboard-teacher fa-4x text-gray-300"></i>
                  </div>
               </div>
            </div>
            <div class="card-footer pt-1 pb-0 text-center">
               <a href="/lecturer" class="btn btn-primary btn-xs text-xs">Ke Dosen <i class="fa fa-arrow-right"></i></a>
            </div>
         </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-info text-uppercase mb-3">
                        Mahasiswa
                     </div>
                     <div class="h3 mb-0 font-weight-bold text-gray-800">
                        <?php echo $countColleger ?>
                     </div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-fw fa-laptop-house fa-4x text-gray-300"></i>
                  </div>
               </div>
            </div>
            <div class="card-footer pt-1 pb-0 text-center">
               <a href="/colleger" class="btn btn-info btn-xs text-xs">Ke Mahasiswa <i class="fa fa-arrow-right"></i></a>
            </div>
         </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-warning text-uppercase mb-3">
                        Kelas
                     </div>
                     <div class="h3 mb-0 font-weight-bold text-gray-800">
                        <?php echo $countClassroom ?>
                     </div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-fw fa-people-arrows fa-4x text-gray-300"></i>
                  </div>
               </div>
            </div>
            <div class="card-footer pt-1 pb-0 text-center">
               <a href="/classroom" class="btn btn-warning btn-xs text-xs">Ke Kelas <i class="fa fa-arrow-right"></i></a>
            </div>
         </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-dark shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-dark text-uppercase mb-3">
                        User
                     </div>
                     <div class="h3 mb-0 font-weight-bold text-gray-800">
                        <?php echo $countUser ?>
                     </div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-fw fa-users-cog fa-4x text-gray-300"></i>
                  </div>
               </div>
            </div>
            <div class="card-footer pt-1 pb-0 text-center">
               <a href="/user" class="btn btn-dark btn-xs text-xs">Ke User <i class="fa fa-arrow-right"></i></a>
            </div>
         </div>
      </div>
   </div>


</div>
<?php echo $this->endSection() ?>