<?php

namespace App\Models;

use CodeIgniter\Model;

class UnitModel extends Model
{
    protected $table = 'unit';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'slug', 'ketua', 'email', 'provinsi', 'kota', 'kecamatan', 'kelurahan', 'alamat', 'tel', 'gambar'];

    function getUnit($slug = false)
    {
        if (!$slug) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
}
