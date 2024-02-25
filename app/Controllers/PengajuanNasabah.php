<?php

namespace App\Controllers;

use App\Models\PengajuanNasabahModel;
use CodeIgniter\API\ResponseTrait;

class PengajuanNasabah extends BaseController
{

    use ResponseTrait;
    protected $unitModel;
    protected $pengajuanNasabahModel;
    protected $helpers = ['form'];

    public function __construct()
    {
        helper('number');
        helper('array');
        helper('text');
        $this->pengajuanNasabahModel = model(PengajuanNasabahModel::class);
    }
    public function index()
    {
        $data = [
            'title'             => "Riwayat Transaksi nasabah",
            'pengajuanNasabah'  =>  $this->pengajuanNasabahModel,
        ];

        return view('pengajuannasabah/index', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'id_nasabah'  => 'required',
            'id_unit'     => 'required',
            'id_sampah.*' => 'required',
            'berat.*'     => 'required'
        ])) {
            return $this->failValidationErrors(validation_errors());
        }
        $this->pengajuanNasabahModel->submitPengajuan($this->request->getVar());
        return $this->respondCreated(['message' => 'berhasil'], 'yeay');
    }

    public function delete($id)
    {
        $this->pengajuanNasabahModel->delete($id);
        return $this->respondDeleted(['message' => 'Data berhasil dihapus']);
    }

    public function update($id)
    {
        if (!$this->validate([
            'id_nasabah'  => 'required',
            'id_unit'     => 'required',
            'id_sampah.*' => 'required',
            'berat.*'     => 'required'
        ])) {
            return $this->failValidationErrors(validation_errors());
        }
        $this->pengajuanNasabahModel->updatePengajuan($id, $this->request->getVar());
        return $this->respondUpdated(['message' => 'Data berhasil diupdate']);
    }

    public function validatePengajuan($id)
    {
        $this->pengajuanNasabahModel->save([
            'id'     => $id,
            'status' => 'Terverifikasi'
        ]);
        return $this->respond(['message' => 'Validated'], 200);
    }
}
