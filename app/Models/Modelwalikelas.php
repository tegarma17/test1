<?php

namespace App\Models;

use CodeIgniter\Model;
use Irsyadulibad\DataTables\DataTables;

class Modelwalikelas extends Model
{
    protected $table      = 'tbwalikelas';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
    protected $allowedFields = ['id_guru', 'id_kelas', 'id_siswa'];

    function getAll()
    {
        $builder = $this->db->table('tbwalikelas');
        $builder->select('tbwalikelas.id, tbguru.nama_guru, tbkelas.nama_kelas, tbsiswa.nama_siswa');
        $builder->join('tbguru', 'tbguru.id = tbwalikelas.id_guru', 'inner')
            ->join('tbkelas', 'tbkelas.id_kelas = tbwalikelas.id_kelas', 'inner')
            ->join('tbsiswa', 'tbsiswa.id_siswa = tbwalikelas.id_siswa', 'inner');
        $query = $builder->get();
        return $query->getResultarray();
    }
}
