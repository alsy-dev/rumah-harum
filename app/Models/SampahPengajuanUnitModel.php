<?php

namespace App\Models;

use CodeIgniter\Model;

class SampahPengajuanUnitModel extends Model
{
    protected $table = 'sampah_pengajuan_unit';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_pengajuan', 'id_sampah', 'berat', 'point'];
}
