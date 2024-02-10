<?php

namespace App\Models;

use CodeIgniter\Model;

class SampahModel extends Model
{
    protected $table = 'sampah';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'jenis', 'harga_nasabah', 'harga_unit', 'keterangan', 'gambar', 'slug'];

    function getSampah($slug = false)
    {
        if (!$slug) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
}
