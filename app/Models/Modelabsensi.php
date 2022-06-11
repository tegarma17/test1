<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelabsensi extends Model
{
    protected $table      = 'tbabsensi';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
    protected $allowedFields = [
        'id_siswa', 's', 'i', 'a', 'tahun_ajaran'
    ];

    public function getSiswa()
    {
        $idguru = session()->get('konid');
        $dataSiswa = $this->db->table('tbwalikelas')
            ->select('tbwalikelas.id ,tbwalikelas.id_guru  , tbsiswa.id_siswa , tbsiswa.nama_siswa')
            ->join('tbguru', 'tbwalikelas.id_guru = tbguru.id')
            ->join('tbsiswa', 'tbwalikelas.id_siswa = tbsiswa.id_siswa')
            ->where('tbwalikelas.id_guru', $idguru)
            ->get()->getResultArray();
        return $dataSiswa;
    }
}
