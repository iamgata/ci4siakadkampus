<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModels extends Model
{

   public function getCountDataDashboard($table)
   {
      return $this->db->table($table)->countAll();
   }
}
