<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

   <!-- Sidebar - Brand -->
   <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon rotate-n-15">
         <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
   </a>

   <!-- Divider -->
   <hr class="sidebar-divider my-0">

   <!-- Nav Item - Dashboard -->
   <li class="nav-item">
      <a class="nav-link" href="/home">
         <i class="fas fa-fw fa-arrow-left"></i>
         <span>Beranda</span></a>
   </li>

   <!-- Divider -->
   <hr class="sidebar-divider">



   <div class="sidebar-heading">
      <?php echo session()->get('name') ?>
   </div>

   <?php if (session('level') == 1) : ?>
      <li class="nav-item">
         <a class="nav-link collapsed" href="/admin">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span>
         </a>
      </li>

      <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBuilding" aria-expanded="true" aria-controls="collapseBuilding">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Bangunan</span>
         </a>
         <div id="collapseBuilding" class="collapse" aria-labelledby="headingBuilding" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
               <h6 class="collapse-header">Bangunan Kampus</h6>

               <a class="collapse-item" href="/building">
                  <i class="fas fa-fw fa-building mr-2"></i>
                  <span>Gedung</span>
               </a>
               <a class="collapse-item" href="/room">
                  <i class="fas fa-fw fa-store-alt mr-2"></i>
                  <span>Ruangan</span>
               </a>
            </div>
         </div>
      </li>

      <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAcademy" aria-expanded="true" aria-controls="collapseAcademy">
            <i class="fas fa-chalkboard"></i>
            <span>Akademi</span>
         </a>
         <div id="collapseAcademy" class="collapse" aria-labelledby="headingAcademy" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
               <h6 class="collapse-header">Program Akademi:</h6>
               <a class="collapse-item" href="/faculity">
                  <i class="fas fa-fw fa-wrench mr-2"></i>
                  <span>Fakultas</span>
               </a>
               <a class="collapse-item" href="/prody">
                  <i class="fas fa-fw fa-user-graduate mr-2"></i>
                  <span>Program Studi</span>
               </a>

               <a class="collapse-item" href="/schoolyear">
                  <i class="fas fa-fw fa-calendar-alt mr-2"></i>
                  <span>Tahun Ajaran</span>
               </a>

               <a class="collapse-item" href="/course">
                  <i class="fas fa-fw fa-book mr-2"></i>
                  <span>Mata Kuliah</span>
               </a>

               <a class="collapse-item" href="/classroom">
                  <i class="fas fa-fw fa-laptop-house mr-2"></i>
                  <span>Kelas</span>
               </a>

            </div>
         </div>
      </li>


      <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSetting" aria-expanded="true" aria-controls="collapseSetting">
            <i class="fas fa-fw fa-cog"></i>
            <span>Setting</span>
         </a>
         <div id="collapseSetting" class="collapse" aria-labelledby="headingSetting" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
               <h6 class="collapse-header">Setting</h6>
               <a class="collapse-item" href="/schoolyear/setyear">
                  <i class="fas fa-fw fa-calendar-alt mr-2"></i>
                  <span>Set. Tahun Ajaran</span>
               </a>
            </div>
         </div>
      </li>




      <li class="nav-item">
         <a class="nav-link collapsed" href="/user">
            <i class="fas fa-fw fa-users-cog"></i>
            <span>User</span>
         </a>
      </li>

      <li class="nav-item">
         <a class="nav-link collapsed" href="/lecturer">
            <i class="fas fa-fw fa-chalkboard-teacher"></i>
            <span>Dosen</span>
         </a>
      </li>

      <li class="nav-item">
         <a class="nav-link collapsed" href="/colleger">
            <i class="fas fa-fw fa-people-arrows"></i>
            <span>Mahasiswa</span>
         </a>
      </li>




      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

   <?php elseif (session('level') == 2) : ?>
      <li class="nav-item">
         <a class="nav-link collapsed" href="/user">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span>
         </a>
      </li>
   <?php endif ?>

   <!-- Sidebar Toggler (Sidebar) -->
   <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
   </div>

</ul>
<!-- End of Sidebar -->