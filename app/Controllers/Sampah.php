<?php

namespace App\Controllers;

use App\Models\SampahModel;

class Sampah extends BaseController
{
    protected $sampahModel;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->sampahModel = new SampahModel();
    }
    public function index()
    {

        $data = [
            'title' => "Table Sampah",
            'sampah'  =>  $this->sampahModel->findAll()
        ];

        return view('sampah/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data sampah'
        ];

        return view('sampah/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'nama' => 'required|is_unique[sampah.nama]',
            'jenis' => 'required',
            'harga_nasabah' => 'required',
            'harga_unit' => 'required',
            'gambar' => 'is_image[gambar]|ext_in[gambar,png,jpeg,webp,jpg]'
        ])) {
            return redirect()->to('/sampah/create')->withInput();
        }

        $fileGambar = $this->request->getFile('gambar');
        if ($fileGambar->getError() == 4) {
            $namaGambar = 'kucing.webp';
        } else {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('img/sampah', $namaGambar);
        }

        $namaSampah = $this->request->getVar('nama');
        $slug = url_title($namaSampah, '-', true);

        $this->sampahModel->save([
            'nama' => $namaSampah,
            'slug' => $slug,
            'jenis' => $this->request->getVar('jenis'),
            'harga_nasabah' => $this->request->getVar('harga_nasabah'),
            'harga_unit' => $this->request->getVar('harga_unit'),
            'keterangan' => $this->request->getVar('keterangan'),
            'gambar' => $namaGambar,
        ]);

        session()->setFlashdata('pesan', 'Sampah Berhasil Ditambahkan');
        return redirect()->to('/sampah');
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail',
            'sampah' => $this->sampahModel->getSampah($slug)
        ];

        return view('sampah/detail', $data);
    }

    public function delete($id)
    {
        $sampah = $this->sampahModel->find($id);
        if ($sampah['gambar'] != 'kucing.webp') {
            unlink('img/sampah/' . $sampah['gambar']);
        }
        $this->sampahModel->delete($id);
        session()->setFlashdata('pesan', 'Sampah berhasil dihapus.');
        return redirect()->to('/sampah');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Form Edit Data sampah',
            // 'validation' => session('validation') ?? \Config\Services::validation(),
            'sampah' => $this->sampahModel->getsampah($slug)
        ];

        return view('sampah/edit', $data);
    }

    public function update($id)
    {
        $sampahLama = $this->sampahModel->getsampah($this->request->getVar('slug'));
        if ($sampahLama['nama'] == $this->request->getVar('nama')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[sampah.nama]';
        }



        if (!$this->validate([
            'nama' => $rule_nama,
            'jenis' => 'required',
            'harga_nasabah' => 'required',
            'harga_unit' => 'required',
            'gambar' => 'is_image[gambar]|ext_in[gambar,png,jpeg,webp,jpg]'
        ])) {
            return redirect()->to('/sampah/edit/' . $this->request->getVar('slug'))->withInput();
            // return redirect()->to(base_url() . '/sampah/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $fileGambar = $this->request->getFile('gambar');
        if ($fileGambar->getError() == 4) {
            $namaGambar = $this->request->getVar('gambarLama');
        } else {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('img/sampah', $namaGambar);
            unlink('img/sampah/' . $this->request->getVar('gambarLama'));
        }
        $namaSampah = $this->request->getVar('nama');
        $slug = url_title($namaSampah, '-', true);
        $this->sampahModel->save([
            'id' => $id,
            'nama' => $namaSampah,
            'slug' => $slug,
            'jenis' => $this->request->getVar('jenis'),
            'harga_nasabah' => $this->request->getVar('harga_nasabah'),
            'harga_unit' => $this->request->getVar('harga_unit'),
            'keterangan' => $this->request->getVar('keterangan'),
            'gambar' => $namaGambar,
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/sampah');
    }
}
