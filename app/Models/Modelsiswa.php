<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelsiswa extends Model
{
    protected $table      = 'tbsiswa';
    protected $primaryKey = 'id_siswa';
    protected $returnType     = 'array';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $allowedFields = [
        'nis', 'nisn', 'nama_siswa', 'jk',
        'tmpt_lahir', 'tgl_lahir', 'agama',
        'alamat', 'pendidikan_sebelumnya',
        'nama_ayah', 'nama_ibu', 'pekerjaan_ayah',
        'pekerjaan_ibu', 'alamat_ortu', 'nama_wali',
        'wali_alamat', 'wali_pkj', 'foto'
    ];
}
