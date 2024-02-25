<?php

namespace App\Models;

use App\Controllers\PengajuanUnit;
use App\Controllers\Sampah;
use CodeIgniter\Model;

class PengajuanNasabahModel extends Model
{
    protected $table = 'pengajuan_nasabah';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_nasabah', 'id_unit', 'status'];
    protected $sampahPengajuanModel;

    public function __construct()
    {
        parent::__construct();
        $this->sampahPengajuanModel = model(SampahPengajuanModel::class);
    }

    function getSampahView($idPengajuan)
    {
        return $this->sampahPengajuanModel->getSampahView('nasabah', $idPengajuan);
    }

    function getPointSum($idPengajuan)
    {
        return $this->sampahPengajuanModel->getPointSum('nasabah', $idPengajuan);
    }

    function getWeightSum($idPengajuan)
    {
        return $this->sampahPengajuanModel->getWeightSum('nasabah', $idPengajuan);
    }

    function getAllPengajuan()
    {
        return $this->select(['pengajuan_nasabah.*', 'unit.nama AS nama_unit', 'users.nama_lengkap AS nama_nasabah'])
            ->join('unit', 'unit.id = pengajuan_nasabah.id_unit')
            ->join('users', 'users.id = pengajuan_nasabah.id_nasabah')
            ->findAll();
    }

    function submitPengajuan($array)
    {
        $this->save([
            'id_nasabah' => $array['id_nasabah'],
            'id_unit' => $array['id_unit'],
            'status' => 'Waiting',
            'id_user' => $array['id_user'] ?: null,
        ]);

        $id = $this->getInsertID();

        foreach (array_keys($array['id_sampah']) as $index) {
            $this->sampahPengajuanModel->save([
                'id_pengajuan_nasabah' => $id,
                'id_sampah' => $array['id_sampah'][$index],
                'berat' => $array['berat'][$index],
                'point' => 20
            ]);
        }
    }

    function updatePengajuan($id, $array)
    {
        $this->save([
            'id' => $id,
            'id_nasabah' => $array['id_nasabah'],
            'id_unit' => $array['id_unit'],
            'status' => 'Waiting',
            'id_user' => $array['id_user'] ?: null,
        ]);

        $oldSampahIds = $this->sampahPengajuanModel->where('id_pengajuan_nasabah', $id)->findColumn('id');
        $this->sampahPengajuanModel->delete($oldSampahIds);

        foreach (array_keys($array['id_sampah']) as $index) {
            $this->sampahPengajuanModel->save([
                'id_pengajuan_nasabah' => $id,
                'id_sampah' => $array['id_sampah'][$index],
                'berat' => $array['berat'][$index],
                'point' => 20
            ]);
        }
    }

    function validatePengajuan($id)
    {
        $this->save([
            'id' => $id,
            'status' => 'Terverifikasi'
        ]);
    }
}
