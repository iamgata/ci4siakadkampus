<?php

namespace App\Controllers;

use App\Models\AdminModels;

class Admin extends BaseController
{
   private $adminModels;

   public function __construct()
   {
      $this->adminModels = new AdminModels();
   }

   public function index()
   {
      $data = [
         'title'           => 'Dashboard Admin',
         'countBuilding'   => $this->adminModels->getCountDataDashboard('tb_building'),
         'countRoom'       => $this->adminModels->getCountDataDashboard('tb_room'),
         'countFaculity'   => $this->adminModels->getCountDataDashboard('tb_faculity'),
         'countPrody'      => $this->adminModels->getCountDataDashboard('tb_prody'),
         'countLecturer'   => $this->adminModels->getCountDataDashboard('tb_lecturer'),
         'countColleger'   => $this->adminModels->getCountDataDashboard('tb_colleger'),
         'countClassroom'  => $this->adminModels->getCountDataDashboard('tb_classroom'),
         'countUser'       => $this->adminModels->getCountDataDashboard('tb_user'),
      ];

      return view('dashboard/v_admin', $data);
   }
}
