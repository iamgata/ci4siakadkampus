<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminFilters implements FilterInterface
{
   public function before(RequestInterface $request, $arguments = null)
   {
      if (!session()->get('level')) {
         return redirect()->to('/auth/login');
      }
   }

   public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
   {
      if (session()->get('level') == 1) {
         return redirect()->to('/admin');
      }
   }
}
