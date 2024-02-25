<?php

namespace App\Controllers;

use App\Models\RiwayatTransaksiUnitModel;
use App\Models\UnitModel;
use CodeIgniter\API\ResponseTrait;

class RiwayatTransaksiUnit extends BaseController
{
    use ResponseTrait;

    protected $unitModel;
    protected $riwayatTransaksiUnitModel;
    protected $helpers = ['form'];

    public function __construct()
    {
        helper('number');
        $this->unitModel = model(UnitModel::class);
        $this->riwayatTransaksiUnitModel = model(RiwayatTransaksiUnitModel::class);
    }
    public function index()
    {
        $data = [
            'title' => "Riwayat Transaksi Unit",
            'riwayatTransaksi'  =>  $this->riwayatTransaksiUnitModel->getRiwayatTransaksiUnit()
        ];

        return view('riwayattransaksiunit/index', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'id_unit'    => 'required',
            'nominal'    => 'required',
            'status'     => 'required'
        ])) {
            return $this->failValidationErrors(validation_errors());
        }

        $this->riwayatTransaksiUnitModel->save([
            'id_unit'    => $this->request->getVar('id_unit'),
            'nominal'    => $this->request->getVar('nominal'),
            'status'     => $this->request->getVar('status')
        ]);

        return $this->respondCreated(['message' => 'berhasil'], 'yeay');
    }
}
