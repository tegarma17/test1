<?php

namespace App\Models;

use CodeIgniter\Model;

class Modeladmin extends Model
{
    protected $table      = 'tbadmin';
    protected $primaryKey = 'id_user';
    protected $returnType     = 'array';
    protected $allowedFields = [
        'username', 'nama_user', 'password', 'level', 'konid', 'aktif'
    ];

    public function login($username, $password)
    {
        return $this->db->table('tbadmin')
            ->where([
                'username' => $username,
                'password' => $password
            ])
            ->get()->getRow();
    }
}
