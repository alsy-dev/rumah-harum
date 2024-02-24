<?php

namespace App\Models;

use CodeIgniter\Model;

class RiwayatTransaksiUnitModel extends Model
{
    protected $table = 'riwayat_transaksi_unit';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_unit', 'nominal', 'status'];

    function getRiwayatTransaksiUnit()
    {
        // $builder = $this->builder();
        // $builder->select('riwayat_pengajuan_unit.*', 'unit.nama', 'unit.ketua');
        // $builder->join('unit', 'unit.id = riwayat_pengajuan_unit.id_unit');
        // $this->table();
        return $this->select(['riwayat_transaksi_unit.*', 'unit.nama', 'unit.ketua'])
            ->join('unit', 'unit.id = riwayat_transaksi_unit.id_unit')
            ->findAll();
    }
}
