<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelsetmapel extends Model
{
    protected $table      = 'tbmapelguru';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
    protected $allowedFields = ['id_guru', 'id_kelas', 'id_mapel'];

    function getAll()
    {
        $query = $this->db->table('tbmapelguru')
            ->select('tbmapelguru.id, tbguru.nama_guru, tbkelas.nama_kelas, tbmapel.nama_mapel')
            ->join('tbguru', 'tbguru.id = tbmapelguru.id_guru')
            ->join('tbkelas', 'tbkelas.id_kelas = tbmapelguru.id_kelas')
            ->join('tbmapel', 'tbmapel.id_mapel = tbmapelguru.id_mapel')
            ->get();
        // $query = $this->db->query("SELECT tbmapelguru.id, tbguru.nama_guru, tbkelas.nama_kelas, tbmapel.nama_mapel 
        // FROM tbmapelguru 
        // INNER JOIN tbguru ON tbmapelguru.id_guru = tbguru.id 
        // INNER JOIN tbkelas ON tbmapelguru.id_kelas = tbkelas.id_kelas 
        // INNER JOIN tbmapel ON tbmapelguru.id_mapel = tbmapel.id_mapel;
        // ");
        return $query;
    }
}
