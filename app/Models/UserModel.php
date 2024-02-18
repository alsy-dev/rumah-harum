<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Shield\Models\UserModel as ShieldUserModel;

class UserModel extends ShieldUserModel
{


    protected $returnType = \App\Entities\User::class;
    protected function initialize(): void
    {
        parent::initialize();
        $this->allowedFields = [
            ...$this->allowedFields,
            'nama_lengkap',
            'mobile_number',
            'id_unit',
            'jenis_nasabah',
            'alamat',
            'penanggung_jawab',
            'profile_picture'
            // 'first_name',
        ];
    }

    public function search($keyword)
    {
        return $this->like('nama_lengkap', $keyword)->orLike('jenis_nasabah', $keyword);
    }

    public function getNasabah($username)
    {
        return $this->where('username', $username)->first();
    }
}
