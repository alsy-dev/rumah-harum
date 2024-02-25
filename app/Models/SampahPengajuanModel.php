<?php

namespace App\Models;

use CodeIgniter\Model;

class SampahPengajuanModel extends Model
{
    protected $table = 'sampah_pengajuan';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_pengajuan_unit', 'id_pengajuan_nasabah', 'id_sampah', 'berat', 'point'];

    function getSampahView($type, $idPengajuan = false)
    {
        $result = $this->select('Sampah.nama')
            ->where('id_pengajuan_' . $type, $idPengajuan)
            ->join('sampah', 'sampah.id = sampah_pengajuan.id_sampah')
            ->findColumn('nama');
        return implode(", ", $result);
    }

    function getPointSum($type, $idPengajuan)
    {
        $result = $this->where('id_pengajuan_' . $type, $idPengajuan)->findColumn('point');
        return array_sum($result);
    }

    function getWeightSum($type, $idPengajuan)
    {
        $result = $this->where('id_pengajuan_' . $type, $idPengajuan)->findColumn('berat');
        return array_sum($result);
    }
}
