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
    protected $sampahPengajuanUnitModel;

    public function __construct()
    {
        parent::__construct();
        $this->sampahPengajuanUnitModel = model(SampahPengajuanUnitModel::class);
    }

    function getSampahView($idPengajuan = false)
    {
        $result = $this->sampahPengajuanUnitModel->select('Sampah.nama')
            ->where('id_pengajuan', $idPengajuan)
            ->join('sampah', 'sampah.id = sampah_pengajuan_unit.id_sampah')
            ->findColumn('nama');
        return implode(", ", $result);
    }

    function getPointSum($idPengajuan)
    {
        $result = $this->sampahPengajuanUnitModel->where('id_pengajuan', $idPengajuan)->findColumn('point');
        return array_sum($result);
    }

    function getWeightSum($idPengajuan)
    {
        $result = $this->sampahPengajuanUnitModel->where('id_pengajuan', $idPengajuan)->findColumn('berat');
        return array_sum($result);
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
            'id_unit' => $array['id_unit'],
            'status' => 'Waiting',
            'id_user' => $array['id_user'] ?: null,
            'verified_by' => $array['verified_by']
        ]);

        $id = $this->getInsertID();

        foreach (array_keys($array['id_sampah']) as $index) {
            $this->sampahPengajuanUnitModel->save([
                'id_pengajuan' => $id,
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
            'id_unit' => $array['id_unit'],
            'status' => 'Waiting',
            'id_user' => $array['id_user'] ?: null,
            'verified_by' => $array['verified_by']
        ]);

        $oldSampahIds = $this->sampahPengajuanUnitModel->where('id_pengajuan', $id)->findColumn('id');
        $this->sampahPengajuanUnitModel->delete($oldSampahIds);

        foreach (array_keys($array['id_sampah']) as $index) {
            $this->sampahPengajuanUnitModel->save([
                'id_pengajuan' => $id,
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
