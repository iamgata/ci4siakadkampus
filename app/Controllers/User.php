<?php

namespace App\Controllers;

class User extends BaseController
{
   public function index()
   {
      $data = [
         'title'     => 'Dashboard User'
      ];

      return view('dashboard/v_user', $data);
   }
}
