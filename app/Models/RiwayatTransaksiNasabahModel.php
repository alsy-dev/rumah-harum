<?php

namespace App\Models;

use CodeIgniter\Model;

class RiwayatTransaksiNasabahModel extends Model
{
    protected $table = 'riwayat_transaksi_nasabah';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_nasabah', 'id_unit', 'nominal', 'status'];


    function getRiwayatTransaksiNasabah()
    {
        // $builder = $this->builder();
        // $builder->select('riwayat_pengajuan_unit.*', 'unit.nama', 'unit.ketua');
        // $builder->join('unit', 'unit.id = riwayat_pengajuan_unit.id_unit');
        // $this->table();
        return $this->select(['riwayat_transaksi_nasabah.*', 'unit.nama', 'unit.ketua', 'users.nama_lengkap'])
            ->join('unit', 'unit.id = riwayat_transaksi_nasabah.id_unit')
            ->join('users', 'users.id = riwayat_transaksi_nasabah.id_nasabah')
            ->findAll();
    }
}
