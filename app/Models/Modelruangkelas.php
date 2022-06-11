<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelruangkelas extends Model
{
    protected $table      = 'tbruangkelas';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
    protected $allowedFields = ['id_kelas', 'id_siswa'];

    function getAll()
    {
        $query = $this->db->query("SELECT tbruangkelas.id, tbkelas.nama_kelas, tbsiswa.nama_siswa from tbruangkelas 
        INNER JOIN tbkelas ON tbruangkelas.id_kelas = tbkelas.id_kelas 
        INNER JOIN tbsiswa on tbruangkelas.id_siswa = tbsiswa.id_siswa;");
        return $query->getResult();
    }
}
