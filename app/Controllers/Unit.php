<?php

namespace App\Controllers;

use App\Models\UnitModel;

use function PHPSTORM_META\map;

class Unit extends BaseController
{
    protected $unitModel;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->unitModel = new UnitModel();
    }
    public function index()
    {

        $data = [
            'title' => "Contoh",
            'unit'  =>  $this->unitModel->getUnit()
        ];

        return view('unit/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Unit'
        ];

        return view('unit/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'nama' => 'required',
            'email' => 'required|valid_email',
            'ketua' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'tel' => 'required',
            'alamat' => 'required'
        ])) {
            return redirect()->to('/unit/create')->withInput();
        }

        $fileGambar = $this->request->getFile('gambar');
        if ($fileGambar->getError() == 4) {
            $namaGambar = 'kucing.webp';
        } else {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('img', $namaGambar);
        }

        $namaUnit = $this->request->getVar('nama');

        $this->unitModel->save([
            'nama' => $namaUnit,
            'slug' => url_title($namaUnit, '-', true),
            'email' => $this->request->getVar('email'),
            'ketua' => $this->request->getVar('ketua'),
            'provinsi' => $this->request->getVar('provinsi'),
            'kota' => $this->request->getVar('kota'),
            'kecamatan' => $this->request->getVar('kecamatan'),
            'kelurahan' => $this->request->getVar('kelurahan'),
            'alamat' => $this->request->getVar('alamat'),
            'tel' => $this->request->getVar('tel'),
            'gambar' => $namaGambar,
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('/unit');
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail',
            'unit' => $this->unitModel->getUnit($slug)
        ];

        return view('unit/detail', $data);
    }

    public function delete($id)
    {
        $unit = $this->unitModel->find($id);
        if ($unit['gambar'] != 'kucing.webp') {
            unlink('img/' . $unit['gambar']);
        }
        $this->unitModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/unit');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Form Edit Data Unit',
            // 'validation' => session('validation') ?? \Config\Services::validation(),
            'unit' => $this->unitModel->getUnit($slug)
        ];

        return view('unit/edit', $data);
    }

    public function update($id)
    {
        $unitLama = $this->unitModel->getunit($this->request->getVar('slug'));
        if ($unitLama['nama'] == $this->request->getVar('nama')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[unit.nama]';
        }



        if (!$this->validate([
            'nama' => $rule_nama,
            'email' => 'required|valid_email',
            'ketua' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'tel' => 'required',
            'alamat' => 'required'
        ])) {
            return redirect()->to(base_url() . '/unit/edit/' . $this->request->getVar('slug'))->withInput();
            // return redirect()->to(base_url() . '/unit/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $fileGambar = $this->request->getFile('gambar');
        if ($fileGambar->getError() == 4) {
            $namaGambar = $this->request->getVar('gambarLama');
        } else {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('img', $namaGambar);
            unlink('img/' . $this->request->getVar('gambarLama'));
        }
        $namaUnit = $this->request->getVar('nama');
        $slug = url_title($namaUnit, '-', true);
        $this->unitModel->save([
            'id' => $id,
            'nama' => $namaUnit,
            'slug' => $slug,
            'email' => $this->request->getVar('email'),
            'ketua' => $this->request->getVar('ketua'),
            'provinsi' => $this->request->getVar('provinsi'),
            'kota' => $this->request->getVar('kota'),
            'kecamatan' => $this->request->getVar('kecamatan'),
            'kelurahan' => $this->request->getVar('kelurahan'),
            'alamat' => $this->request->getVar('alamat'),
            'tel' => $this->request->getVar('tel'),
            'gambar' => $namaGambar,
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/unit');
    }
}
