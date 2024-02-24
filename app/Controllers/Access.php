<?php

namespace App\Controllers;

use App\Entities\User;
use App\Models\UnitModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Shield\Models\GroupModel;
use Config\Validation;
use CodeIgniter\Shield\Entities\User as ShieldUser;

class Access extends BaseController
{
    use ResponseTrait;
    protected $nasabahModel;
    protected $unitModel;
    protected $groupModel;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->unitModel = model(UnitModel::class);
        $this->groupModel = model(GroupModel::class);
        $ids = $this->groupModel->where('group', 'user')->findColumn('user_id');
        $this->nasabahModel = auth()->getProvider()->whereIn('id', $ids);
    }
    public function index()
    {
        // $currentPage = $this->request->getVar('page_nasabah') ?? 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $nasabah = $this->nasabahModel->search($keyword);
        } else {
            $nasabah = $this->nasabahModel;
        }

        $data = [
            'title' => "Tabel Nasabah",
            'nasabah'  =>  $this->nasabahModel->paginate(10, 'users'),
            'units' => $this->unitModel,
            'pager' => $this->nasabahModel->pager
        ];

        return view('access/bjir', $data);
    }

    // // public function create()
    // // {
    // //     $data = [
    // //         'title' => 'Form Tambah Data sampah'
    // //     ];

    // //     return view('sampah/create', $data);
    // // }

    public function save()
    {
        dd($this->request->getVar());
        //     if (!$this->validate([
        //         'username' => [
        //             'label' => 'Auth.username',
        //             'rules' => [
        //                 'required',
        //                 'max_length[30]',
        //                 'min_length[3]',
        //                 'regex_match[/\A[a-zA-Z0-9\.]+\z/]',
        //                 'is_unique[users.username]',
        //             ],
        //         ],
        //         'nama_lengkap' => [
        //             'label' => 'Nama Lengkap',
        //             'rules' => [
        //                 'required'
        //             ]
        //         ],
        //         'jenis_nasabah' => [
        //             'label' => 'Jenis nasabah',
        //             'rules' => [
        //                 'required'
        //             ]
        //         ],
        //         'id_unit' => [
        //             'label' => 'Pilih Unit',
        //             'rules' => [
        //                 'required'
        //             ]
        //         ],
        //         'alamat' => [
        //             'label' => 'Alamat Lengkap',
        //             'rules' => [
        //                 'required'
        //             ]
        //         ],
        //         'mobile_number' => [
        //             'label' => 'Mobile Number',
        //             'rules' => [
        //                 'max_length[20]',
        //                 'min_length[10]',
        //                 'regex_match[/\A[0-9]+\z/]',
        //                 'is_unique[users.mobile_number]',
        //             ],
        //         ],
        //         'email' => [
        //             'label' => 'Auth.email',
        //             'rules' => [
        //                 'required',
        //                 'max_length[254]',
        //                 'valid_email',
        //                 'is_unique[auth_identities.secret]',
        //             ],
        //         ],
        //         'profile_picture' => [
        //             'label' => 'Profile picture',
        //             'rules' => [
        //                 'is_image[profile_picture]',
        //                 'ext_in[profile_picture,jpg,png,jpeg]'
        //             ]
        //         ]
        //     ])) {
        //         return $this->failValidationErrors(validation_errors());
        //         // return redirect()->to('/nasabah/create')->withInput();
        //     }


        //     $fileGambar = $this->request->getFile('profile_picture');
        //     if ($fileGambar->getError() == 4) {
        //         $namaGambar = 'kucing.webp';
        //     } else {
        //         $namaGambar = $fileGambar->getRandomName();
        //         $fileGambar->move('img/nasabah', $namaGambar);
        //     }

        //     $user = new User([
        //         'username' => $this->request->getVar('username'),
        //         'nama_lengkap' => $this->request->getVar('nama_lengkap'),
        //         'jenis_nasabah' => $this->request->getVar('jenis_nasabah'),
        //         'id_unit' => $this->request->getVar('id_unit'),
        //         'alamat' => $this->request->getVar('alamat'),
        //         'mobile_number' => $this->request->getVar('mobile_number'),
        //         'email' => $this->request->getVar('email'),
        //         'profile_picture' => $namaGambar,
        //         'penanggung_jawab' => $this->request->getVar('penanggung_jawab'),
        //         'password' => $this->request->getVar('password')
        //     ]);
        //     $this->nasabahModel->save($user);
        //     $user = $this->nasabahModel->findById($this->nasabahModel->getInsertID());
        //     $this->nasabahModel->addToDefaultGroup($user);

        //     return $this->respondCreated(['message' => 'data inserted']);
        //     //     session()->setFlashdata('pesan', 'Nasabah Berhasil Ditambahkan');
        //     //     return redirect()->to('/nasabah');
    }

    // public function detail($username)
    // {
    //     $data = [
    //         'title' => 'Detail Nasabah',
    //         'nasabah' => $this->nasabahModel->getNasabah($username)
    //     ];

    //     return view('nasabah/detail', $data);
    // }

    // public function delete($id)
    // {
    //     $this->nasabahModel->delete($id);
    //     session()->setFlashdata('pesan', 'Nasabah berhasil dihapus.');
    //     return redirect()->to('/nasabah');
    // }

    // public function edit($username)
    // {
    //     $data = [
    //         'title' => 'Form Edit Data Nasabah',
    //         'nasabah' => $this->nasabahModel->getNasabah($username)
    //     ];

    //     return view('nasabah/edit', $data);
    // }

    // public function update($id)
    // {
    //     $nasabahLama = $this->nasabahModel->findById($id);

    //     $username = $this->request->getVar('username');
    //     if ($nasabahLama->username == $username) {
    //         $rule_username = [
    //             'required',
    //             'max_length[30]',
    //             'min_length[3]',
    //             'regex_match[/\A[a-zA-Z0-9\.]+\z/]',
    //         ];
    //     } else {
    //         $rule_username = [
    //             'required',
    //             'max_length[30]',
    //             'min_length[3]',
    //             'regex_match[/\A[a-zA-Z0-9\.]+\z/]',
    //             'is_unique[users.username]',
    //         ];
    //     }

    //     $email = $this->request->getVar('email');
    //     if ($nasabahLama->email == $email) {
    //         $rule_email = [
    //             'required',
    //             'max_length[254]',
    //             'valid_email',
    //         ];
    //     } else {
    //         $rule_email = [
    //             'required',
    //             'max_length[254]',
    //             'valid_email',
    //             'is_unique[auth_identities.secret]',
    //         ];
    //     }

    //     $mobileNumber = $this->request->getVar('mobile_number');
    //     if ($nasabahLama->mobileNumber == $mobileNumber) {
    //         $rule_mobile_number = [
    //             'max_length[20]',
    //             'min_length[10]',
    //             'regex_match[/\A[0-9]+\z/]',
    //         ];
    //     } else {
    //         $rule_mobile_number = [
    //             'max_length[20]',
    //             'min_length[10]',
    //             'regex_match[/\A[0-9]+\z/]',
    //             'is_unique[users.mobile_number]',
    //         ];
    //     }

    //     if (!$this->validate([
    //         'username' => [
    //             'label' => 'Auth.username',
    //             'rules' => $rule_username,
    //         ],
    //         'nama_lengkap' => [
    //             'label' => 'Nama Lengkap',
    //             'rules' => [
    //                 'required'
    //             ]
    //         ],
    //         'jenis_nasabah' => [
    //             'label' => 'Jenis nasabah',
    //             'rules' => [
    //                 'required'
    //             ]
    //         ],
    //         'id_unit' => [
    //             'label' => 'Pilih Unit',
    //             'rules' => [
    //                 'required'
    //             ]
    //         ],
    //         'alamat' => [
    //             'label' => 'Alamat Lengkap',
    //             'rules' => [
    //                 'required'
    //             ]
    //         ],
    //         'mobile_number' => [
    //             'label' => 'Mobile Number',
    //             'rules' => $rule_mobile_number,
    //         ],
    //         'email' => [
    //             'label' => 'Auth.email',
    //             'rules' => $rule_email,
    //         ],
    //         'profile_picture' => [
    //             'label' => 'Profile picture',
    //             'rules' => [
    //                 'is_image[profile_picture]',
    //                 'ext_in[profile_picture,jpg,png,jpeg]'
    //             ]
    //         ]
    //     ])) {
    //         return $this->failValidationErrors(validation_errors());
    //         // return redirect()->to('/nasabah/edit/' . $this->request->getVar('username_lama'))->withInput();
    //     }
    //     $fileGambar = $this->request->getFile('profile_picture');
    //     if ($fileGambar->getError() == 4) {
    //         $namaGambar = $this->request->getVar('profile_picture_lama');
    //     } else {
    //         $namaGambar = $fileGambar->getRandomName();
    //         $fileGambar->move('img/nasabah', $namaGambar);
    //         unlink('img/nasabah/' . $this->request->getVar('profile_picture_lama'));
    //     }

    //     $nasabahLama->fill([
    //         'username' => $username,
    //         'nama_lengkap' => $this->request->getVar('nama_lengkap'),
    //         'jenis_nasabah' => $this->request->getVar('jenis_nasabah'),
    //         'id_unit' => $this->request->getVar('id_unit'),
    //         'alamat' => $this->request->getVar('alamat'),
    //         'mobile_number' => $mobileNumber,
    //         'email' => $email,
    //         'profile_picture' => $namaGambar,
    //         'penanggung_jawab' => $this->request->getVar('penanggung_jawab')
    //     ]);
    //     $this->nasabahModel->save($nasabahLama);
    //     return $this->respondUpdated(['message' => 'berhasil coy']);

    //     // session()->setFlashdata('pesan', 'Data nasabah berhasil diubah.');
    //     // return redirect()->to('/nasabah');
    // }
}
