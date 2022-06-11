<?php

namespace App\Models;

use CodeIgniter\Model;

class Modeln_pengetahuan extends Model
{
    protected $table      = 'tbnilai';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
    protected $allowedFields = ['id_guru_mapel', 'id_siswa', 'id_kd', 'tahun_ajaran', 'jenis', 'nilai', 'deskripsi'];


    public function getMapelgru()
    {
        $id_guru = session()->get('konid');
        $query = $this->db->table('tbmapelguru')
            ->select('tbmapelguru.id_guru_mapel , tbmapel.id_mapel, tbmapel.nama_mapel, tbguru.id')
            ->join('tbmapel', 'tbmapel.id_mapel = tbmapelguru.id_mapel')
            ->join('tbguru', 'tbguru.id = tbmapelguru.id_guru')
            ->where('tbmapelguru.id_guru', $id_guru)
            ->get();
        return $query->getResultArray();
    }

    function dataSiswa()
    {
        $id_guru = session()->get('konid');
        $query = $this->db->table('tbwalikelas')
            ->select('* , tbkelas.nama_kelas, tbsiswa.nama_siswa')
            ->join('tbkelas', 'tbkelas.id_kelas = tbwalikelas.id_kelas')
            ->join('tbsiswa', 'tbsiswa.id_siswa = tbwalikelas.id_siswa')
            ->where('tbwalikelas.id_guru', $id_guru)
            ->get();
        return $query->getResultArray();
    }
    function getNilai()
    {
        $query = $this->db->table('tbnilai')
            ->select('*')
            ->where('tbnilai.jenis', 'tugas')
            ->get();
        return $query->getResultArray();
    }
}
