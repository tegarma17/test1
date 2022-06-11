<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelsikap_sp extends Model
{
    protected $table      = 'tbnilai_sikap_sp';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
    protected $allowedFields = ['id_walikelas', 'id_siswa', 'deskripsi', 'tahun_ajaran'];

    public function getSiswa()
    {
        $idGuru = session()->get('id_guru');
        $builder = $this->db->table('tbwalikelas');
        $builder->select('tbwalikelas.* ,tbguru.nama_guru, tbsiswa.nama_siswa');
        $builder->join('tbsiswa', 'tbsiswa.id_siswa = tbwalikelas.id_siswa')
            ->join('tbguru', 'tbguru.id = tbwalikelas.id_guru')
            ->where('tbwalikelas.id_guru', $idGuru);
        $query = $builder->get();
        return $query->getResultArray();
    }
}
