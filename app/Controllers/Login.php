<?php

namespace App\Controllers;

use App\Models\Modeladmin;

class Login extends BaseController
{
    function __construct()
    {
        $this->admin = new Modeladmin();
        $this->session = \Config\Services::session();
    }
    public function index()
    {
        return view('login/home');
    }
    public function lgoin()
    {
        if (session('id_user')) {
            return redirect()->to('login/home');
        }
        return view('login/home');
    }

    public function loginProses()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $cek = $this->admin->login($username, $password);
        if ($cek) {
            session()->set('log', true);
            session()->set('id_user', $cek->id_user);
            session()->set('nama_user', $cek->nama_user);
            session()->set('username', $cek->username);
            session()->set('level', $cek->level);
            session()->set('konid', $cek->konid);

            return redirect()->to('home');
        } else {
            session()->setFlashdata('message', 'Username atau Password Salah');
            return redirect()->to('login');
        }
    }
    public function logout()
    {
        session()->remove('log');
        session()->remove('id_user');
        session()->remove('nama_user');
        session()->remove('level');
        session()->remove('konid');
        return redirect()->to('/login');
    }
}
