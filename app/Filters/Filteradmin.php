<?php

namespace  App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Filteradmin implements FilterInterface
{
 public function before(RequestInterface $request, $arguments = null)
 {
  if (session()->get('level') == "") {
   return redirect()->to('login');
  }
 }


 public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
 {
  if (session()->get('level') == 'admin') {
   return redirect()->to('home');
  }
 }
}
