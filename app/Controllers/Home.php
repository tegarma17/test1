<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        if (session()->get('level') <> 'admin') {
            return view('menu_utama/home');
        } elseif (session()->get('level') <> 'guru') {
            return view('menu_utama/home');
        } elseif (session()->get('level') <> 'siswa') {
            return view('menu_utama/home');
        } else {
            return view('menu_utama/home');
        }
    }
}