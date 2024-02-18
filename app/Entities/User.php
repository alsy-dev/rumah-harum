<?php

namespace App\Entities;

use CodeIgniter\Shield\Entities\User as ShieldUser;

class User extends ShieldUser
{
    public function __construct(?array $data = null)
    {
        parent::__construct($data);
        $this->casts = [
            ...$this->casts,
            'id_unit' => 'integer'
        ];

        $this->datamap = [
            ...$this->datamap,
            'idUnit' => 'id_unit',
            'namaLengkap' => 'nama_lengkap',
            'jenisNasabah' => 'jenis_nasabah',
            'createdAt' => 'created_at',
            'mobileNumber' => 'mobile_number'
        ];
    }
}
