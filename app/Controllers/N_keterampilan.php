<?php

namespace App\Controllers;

use App\Models\Modelmapel;
use App\Models\Modelsiswa;
use App\Models\Modelmapelguru;
use App\Models\Modelguru;
use App\Models\Modelkd;
use App\Models\Modeln_keterampilan;

class N_keterampilan extends BaseController
{
    function __construct()
    {
        $this->mapel = new Modelmapel();
        $this->siswa = new Modelsiswa();
        $this->guru = new Modelguru();
        $this->kd = new Modelkd();
        $this->nilaiketerampilan = new Modeln_keterampilan();
        $this->mapelguru = new Modelmapelguru();
    }

    public function index()
    {
        $data['getmapel'] = $this->nilaiketerampilan->getMapelgru();
        return view('n_keterampilan/list', $data);
    }

    public function kd($id)
    {
        $idguru = session()->get('konid');
        $data = [
            'id_mapel' => $id,
            'id_guru' => $idguru,
            'kd' => $this->kd->where('jenis', 'keterampilan')
                ->where('id_mapel', $id)
                ->findAll()
        ];
        $data['validation'] = \Config\Services::validation();
        return view('n_keterampilan/listkd', $data);
    }



    public function tambahkd($id)
    {

        if (!$this->validate([
            'nama_kd' => [
                'rules' => 'required|is_unique[tbkd.nama_kd]',
                'errors' => [
                    'required' => 'KD Harus Di ISI',
                    'is_unique' => 'KD Sudah ADA'
                ]
            ]
        ])) {
            return redirect()->to('/n_keterampilan/addkd')->withInput();
        }
        $data = [
            'id_mapel' => $this->request->getPost('id_mapel'),
            'id_guru' => $this->request->getPost('id_guru'),
            'kode_kd' => $this->request->getPost('kode_kd'),
            'jenis' => 'keterampilan',
            'nama_kd' => $this->request->getPost('nama_kd'),
        ];
        $sukses = $this->kd->insert($data);
        if ($sukses) {
            session()->setFlashdata('message', 'Ditambahkan ');
            return redirect()->to('/n_keterampilan/kd/' . $id);
        }
    }
    public function nilaitugas($id)
    {
        $cek = $id;
        $cek_data = $this->kd->where('id', $cek)
            ->where('jenis', 'keterampilan')
            ->findAll();
        // $id_mapel = $this->mapelguru->find($cek_data[0]['id_guru_mapel']);
        // $id_mapel = $id_mapel['id_mapel'];
        if (!empty($cek_data)) {
            $data = [
                'ambil_mapel_guru' => $this->mapelguru->getMapelguru(),
                'data_siswa' => $this->nilaiketerampilan->dataSiswa(),
                'id_kd' => $cek,
                'cek_nilai' => $this->nilaiketerampilan->where('id_kd', $cek)
                    ->where('jenis', 'tugas')
                    ->findAll(),
                'id_mapel' => $cek_data[0]['id_mapel']
            ];
        } else {
            $data = [
                'ambil_mapel_guru' => $this->mapelguru->getMapelguru(),
                'data_siswa' => $this->nilaiketerampilan->dataSiswa(),
                'id_kd' => $cek,
                'id_mapel' => $cek_data[0]['id_mapel'],
                'cek_nilai' => 0
            ];
        }
        return view('n_keterampilan/nilai/tugas/form', $data);
    }
    public function simpanTugas()
    {
        $data = array();
        $id_kd = $this->request->getPost('id_kd');
        $query = $this->nilaiketerampilan->where('id_kd', $id_kd[0])
            ->where('jenis', 'tugas')
            ->findAll();


        for ($i = 0; $i < count($this->request->getPost('nilai')); $i++) {
            if (!empty($query)) {
                $data[$i] = array(
                    'id' => $query[$i]['id'],
                    'nilai' => $this->request->getPost('nilai')[$i]
                );
                $sukses = $this->nilaiketerampilan->save($data[$i]);
            } else {
                $data[$i] = array(
                    'id_guru_mapel' => $this->request->getPost('id_guru_mapel')[$i],
                    'id_siswa' => $this->request->getPost('id_siswa')[$i],
                    'id_kd' => $this->request->getPost('id_kd')[$i],
                    'jenis' => 'tugas',
                    'nilai' => $this->request->getPost('nilai')[$i]
                );

                $sukses = $this->nilaiketerampilan->save($data[$i]);
            }
        }
        if ($sukses) {
            session()->setFlashdata('message', 'Ditambahkan ');
            return redirect()->to('/n_keterampilan/nilaitugas/' . $id_kd[0]);
        }
    }
    public function nilaiUH($id)
    {
        $cek = $id;
        $cek_data = $this->kd->where('id', $cek)
            ->where('jenis', 'keterampilan')
            ->findAll();
        // $id_mapel = $this->mapelguru->find($cek_data[0]['id_guru_mapel']);
        // $id_mapel = $id_mapel['id_mapel'];
        if (!empty($cek_data)) {
            $data = [
                'ambil_mapel_guru' => $this->mapelguru->getMapelguru(),
                'data_siswa' => $this->nilaiketerampilan->dataSiswa(),
                'id_kd' => $cek,
                'cek_nilai' => $this->nilaiketerampilan->where('id_kd', $cek)
                    ->where('jenis', 'harian')
                    ->findAll(),
                'id_mapel' => $cek_data[0]['id_mapel']
            ];
        } else {
            $data = [
                'ambil_mapel_guru' => $this->mapelguru->getMapelguru(),
                'data_siswa' => $this->nilaiketerampilan->dataSiswa(),
                'id_kd' => $cek,
                'id_mapel' => $cek_data[0]['id_mapel'],
                'cek_nilai' => 0
            ];
        }
        return view('n_keterampilan/nilai/ulangan_harian/form', $data);
    }
    public function simpanUH()
    {
        $data = array();
        $id_kd = $this->request->getPost('id_kd');
        $query = $this->nilaiketerampilan->where('id_kd', $id_kd[0])
            ->where('jenis', 'harian')
            ->findAll();


        for ($i = 0; $i < count($this->request->getPost('nilai')); $i++) {
            if (!empty($query)) {
                $data[$i] = array(
                    'id' => $query[$i]['id'],
                    'nilai' => $this->request->getPost('nilai')[$i]
                );
                $sukses = $this->nilaiketerampilan->save($data[$i]);
            } else {
                $data[$i] = array(
                    'id_guru_mapel' => $this->request->getPost('id_guru_mapel')[$i],
                    'id_siswa' => $this->request->getPost('id_siswa')[$i],
                    'id_kd' => $this->request->getPost('id_kd')[$i],
                    'jenis' => 'harian',
                    'nilai' => $this->request->getPost('nilai')[$i]
                );

                $sukses = $this->nilaiketerampilan->save($data[$i]);
            }
        }
    }
    public function nilaiUTS($id)
    {
        $cek = $id;
        $cek_data = $this->kd->where('id', $cek)
            ->where('jenis', 'keterampilan')
            ->findAll();
        // $id_mapel = $this->mapelguru->find($cek_data[0]['id_guru_mapel']);
        // $id_mapel = $id_mapel['id_mapel'];
        if (!empty($cek_data)) {
            $data = [
                'ambil_mapel_guru' => $this->mapelguru->getMapelguru(),
                'data_siswa' => $this->nilaiketerampilan->dataSiswa(),
                'id_kd' => $cek,
                'cek_nilai' => $this->nilaiketerampilan->where('id_kd', $cek)
                    ->where('jenis', 'uts')
                    ->findAll(),
                'id_mapel' => $cek_data[0]['id_mapel']
            ];
        } else {
            $data = [
                'ambil_mapel_guru' => $this->mapelguru->getMapelguru(),
                'data_siswa' => $this->nilaiketerampilan->dataSiswa(),
                'id_kd' => $cek,
                'id_mapel' => $cek_data[0]['id_mapel'],
                'cek_nilai' => 0
            ];
        }
        return view('n_keterampilan/nilai/uts/form', $data);
    }
    public function simpanUTS()
    {
        $data = array();
        $id_kd = $this->request->getPost('id_kd');
        $query = $this->nilaiketerampilan->where('id_kd', $id_kd[0])
            ->where('jenis', 'uts')
            ->findAll();


        for ($i = 0; $i < count($this->request->getPost('nilai')); $i++) {
            if (!empty($query)) {
                $data[$i] = array(
                    'id' => $query[$i]['id'],
                    'nilai' => $this->request->getPost('nilai')[$i]
                );
                $sukses = $this->nilaiketerampilan->save($data[$i]);
            } else {
                $data[$i] = array(
                    'id_guru_mapel' => $this->request->getPost('id_guru_mapel')[$i],
                    'id_siswa' => $this->request->getPost('id_siswa')[$i],
                    'id_kd' => $this->request->getPost('id_kd')[$i],
                    'jenis' => 'uts',
                    'nilai' => $this->request->getPost('nilai')[$i]
                );

                $sukses = $this->nilaiketerampilan->save($data[$i]);
            }
        }
    }
    public function nilaiUAS($id)
    {
        $cek = $id;
        $cek_data = $this->kd->where('id', $cek)
            ->where('jenis', 'keterampilan')
            ->findAll();
        // $id_mapel = $this->mapelguru->find($cek_data[0]['id_guru_mapel']);
        // $id_mapel = $id_mapel['id_mapel'];
        if (!empty($cek_data)) {
            $data = [
                'ambil_mapel_guru' => $this->mapelguru->getMapelguru(),
                'data_siswa' => $this->nilaiketerampilan->dataSiswa(),
                'id_kd' => $cek,
                'cek_nilai' => $this->nilaiketerampilan->where('id_kd', $cek)
                    ->where('jenis', 'uas')
                    ->findAll(),
                'id_mapel' => $cek_data[0]['id_mapel']
            ];
        } else {
            $data = [
                'ambil_mapel_guru' => $this->mapelguru->getMapelguru(),
                'data_siswa' => $this->nilaiketerampilan->dataSiswa(),
                'id_kd' => $cek,
                'id_mapel' => $cek_data[0]['id_mapel'],
                'cek_nilai' => 0
            ];
        }
        return view('n_keterampilan/nilai/uas/form', $data);
    }
    public function simpanUAS()
    {
        $data = array();
        $id_kd = $this->request->getPost('id_kd');
        $query = $this->nilaiketerampilan->where('id_kd', $id_kd[0])
            ->where('jenis', 'uas')
            ->findAll();


        for ($i = 0; $i < count($this->request->getPost('nilai')); $i++) {
            if (!empty($query)) {
                $data[$i] = array(
                    'id' => $query[$i]['id'],
                    'nilai' => $this->request->getPost('nilai')[$i]
                );
                $sukses = $this->nilaiketerampilan->save($data[$i]);
            } else {
                $data[$i] = array(
                    'id_guru_mapel' => $this->request->getPost('id_guru_mapel')[$i],
                    'id_siswa' => $this->request->getPost('id_siswa')[$i],
                    'id_kd' => $this->request->getPost('id_kd')[$i],
                    'jenis' => 'uas',
                    'nilai' => $this->request->getPost('nilai')[$i]
                );

                $sukses = $this->nilaiketerampilan->save($data[$i]);
            }
        }
    }
}
