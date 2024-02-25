<?php

namespace App\Controllers;

use App\Models\PengajuanNasabahModel;
use App\Models\SampahPengajuanUnitModel;
use App\Models\UnitModel;
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
        // dd($this->pengajuanNasabahModel->getPointSum(1));
        $data = [
            'title' => "Riwayat Transaksi nasabah",
            'pengajuanNasabah'  =>  $this->pengajuanNasabahModel,
        ];

        return view('pengajuannasabah/index', $data);
    }

    //     public function create()
    //     {
    //         if (!auth()->user()->can('admin.tambah-sampah')) return "Didn't have access";
    //         $data = [
    //             'title' => 'Form Tambah Data sampah'
    //         ];

    //         return view('sampah/create', $data);
    //     }

    public function save()
    {
        //         if (!auth()->user()->can('admin.tambah-sampah')) return "Didn't have access";
        if (!$this->validate([
            'id_nasabah' => 'required',
            'id_unit' => 'required',
            'id_sampah.*' => 'required',
            'berat.*' => 'required'
        ])) {
            return $this->failValidationErrors(validation_errors());
            // return redirect()->to('/sampah/create')->withInput();
        }
        $this->pengajuanNasabahModel->submitPengajuan($this->request->getVar());
        return $this->respondCreated(['message' => 'berhasil'], 'yeay');

        //         session()->setFlashdata('pesan', 'Sampah Berhasil Ditambahkan');
        //         return redirect()->to('/sampah');
    }

    //     public function detail($slug)
    //     {
    //         if (!auth()->user()->can('admin.list-sampah')) return "Didn't have access";
    //         $data = [
    //             'title' => 'Detail',
    //             'sampah' => $this->sampahModel->getSampah($slug)
    //         ];

    //         return view('sampah/detail', $data);
    //     }

    public function delete($id)
    {
        $this->pengajuanNasabahModel->delete($id);
        return $this->respondDeleted(['message' => 'Data berhasil dihapus']);
    }

    //     public function edit($slug)
    //     {
    //         $currentUser = auth()->user();
    //         if (!($currentUser->can('admin.list-sampah'))) return "Didn't have access";
    //         $data = [
    //             'title' => 'Form Edit Data sampah',
    //             // 'validation' => session('validation') ?? \Config\Services::validation(),
    //             'sampah' => $this->sampahModel->getsampah($slug)
    //         ];

    //         return view('sampah/edit', $data);
    //     }

    public function update($id)
    {
        if (!$this->validate([
            'id_nasabah' => 'required',
            'id_unit' => 'required',
            'id_sampah.*' => 'required',
            'berat.*' => 'required'
        ])) {
            return $this->failValidationErrors(validation_errors());
            // return redirect()->to('/sampah/create')->withInput();
        }
        $this->pengajuanNasabahModel->updatePengajuan($id, $this->request->getVar());
        return $this->respondUpdated(['message' => 'Data berhasil diupdate']);
    }

    public function validatePengajuan($id)
    {
        $this->pengajuanNasabahModel->save([
            'id' => $id,
            'status' => 'Terverifikasi'
        ]);
        return $this->respond(['message' => 'Validated'], 200);
    }
}
