<?php

namespace App\Controllers;

use App\Models\RiwayatTransaksiNasabahModel;
use App\Models\UnitModel;
use CodeIgniter\API\ResponseTrait;

class RiwayatTransaksiNasabah extends BaseController
{
    use ResponseTrait;
    protected $unitModel;
    protected $riwayatTransaksiNasabahModel;
    protected $helpers = ['form'];

    public function __construct()
    {
        helper('number');
        $this->unitModel = model(UnitModel::class);
        $this->riwayatTransaksiNasabahModel = model(RiwayatTransaksiNasabahModel::class);
    }
    public function index()
    {
        $data = [
            'title'             => "Riwayat Transaksi nasabah",
            'riwayatTransaksi'  =>  $this->riwayatTransaksiNasabahModel->getRiwayatTransaksiNasabah()
        ];

        return view('riwayattransaksinasabah/index', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'id_nasabah' => 'required',
            'id_unit'    => 'required',
            'nominal'    => 'required',
            'status'     => 'required'
        ])) {
            return $this->failValidationErrors(validation_errors());
        }

        $this->riwayatTransaksiNasabahModel->save([
            'id_nasabah' => $this->request->getVar('id_nasabah'),
            'id_unit'    => $this->request->getVar('id_unit'),
            'nominal'    => $this->request->getVar('nominal'),
            'status'     => $this->request->getVar('status')
        ]);

        return $this->respondCreated(['message' => 'berhasil'], 'yeay');
    }
}
