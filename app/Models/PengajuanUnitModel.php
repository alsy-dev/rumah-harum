<?php

namespace App\Models;

use App\Controllers\PengajuanUnit;
use App\Controllers\Sampah;
use CodeIgniter\Model;

class PengajuanUnitModel extends Model
{
    protected $table = 'pengajuan_unit';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_unit', 'status', 'id_user', 'verified_by'];
    protected $sampahPengajuanModel;

    public function __construct()
    {
        parent::__construct();
        $this->sampahPengajuanModel = model(SampahPengajuanModel::class);
    }

    function getSampahView($idPengajuan = false)
    {
        return $this->sampahPengajuanModel->getSampahView('unit', $idPengajuan);
    }

    function getPointSum($idPengajuan)
    {
        return $this->sampahPengajuanModel->getPointSum('unit', $idPengajuan);
    }

    function getWeightSum($idPengajuan)
    {
        return $this->sampahPengajuanModel->getWeightSum('unit', $idPengajuan);
    }

    function getAllPengajuan()
    {
        return $this->select(['pengajuan_unit.*', 'unit.nama AS nama_unit'])
            ->join('unit', 'unit.id = pengajuan_unit.id_unit')
            ->findAll();
    }

    function submitPengajuan($array)
    {
        $this->save([
            'id_unit'       => $array['id_unit'],
            'status'        => 'Waiting',
            'id_user'       => $array['id_user'] ?: null,
            'verified_by'   => $array['verified_by']
        ]);

        $id = $this->getInsertID();

        foreach (array_keys($array['id_sampah']) as $index) {
            $this->sampahPengajuanModel->save([
                'id_pengajuan_unit' => $id,
                'id_sampah'         => $array['id_sampah'][$index],
                'berat'             => $array['berat'][$index],
                'point'             => 20
            ]);
        }
    }

    function updatePengajuan($id, $array)
    {
        $this->save([
            'id'            => $id,
            'id_unit'       => $array['id_unit'],
            'status'        => 'Waiting',
            'id_user'       => $array['id_user'] ?: null,
            'verified_by'   => $array['verified_by']
        ]);

        $oldSampahIds = $this->sampahPengajuanModel->where('id_pengajuan_unit', $id)->findColumn('id');
        $this->sampahPengajuanModel->delete($oldSampahIds);

        foreach (array_keys($array['id_sampah']) as $index) {
            $this->sampahPengajuanModel->save([
                'id_pengajuan_unit' => $id,
                'id_sampah'         => $array['id_sampah'][$index],
                'berat'             => $array['berat'][$index],
                'point'             => 20
            ]);
        }
    }

    function validatePengajuan($id)
    {
        $this->save([
            'id'        => $id,
            'status'    => 'Terverifikasi'
        ]);
    }
}
