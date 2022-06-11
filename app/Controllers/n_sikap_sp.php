<?php

namespace App\Controllers;

use App\Models\Modelmapel;
use App\Models\Modelsiswa;
use App\Models\Modelmapelguru;
use App\Models\Modelguru;
use App\Models\Modelkd;
use App\Models\Modeln_pengetahuan;
use App\Models\Modelsikap_sp;
use App\Models\Modelwalikelas;

class n_sikap_sp extends BaseController
{
    function __construct()
    {
        $this->mapel = new Modelmapel();
        $this->siswa = new Modelsiswa();
        $this->guru = new Modelguru();
        $this->walikelas = new Modelwalikelas();
        $this->kd = new Modelkd();
        $this->nilaisikapsp = new Modelsikap_sp();
        $this->mapelguru = new Modelmapelguru();
    }

    public function index()
    {
        $data = [
            'kd' => $this->kd->where('jenis', 'spiritual')->findAll(),
            'validation' => \Config\Services::validation(),
        ];
        return view('n_sikap_sp/list', $data);
    }

    public function tambahkd()
    {
        $data = [
            'kode_kd' => $this->request->getPost('kode_kd'),
        ];
        $this->kd->insert($data);
    }
}
