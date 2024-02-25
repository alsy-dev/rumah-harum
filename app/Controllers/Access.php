<?php

namespace App\Controllers;

use App\Entities\User;
use App\Models\UnitModel;
use App\Models\UserModel;
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
        $ids = $this->groupModel->where('group', 'superadmin')->findColumn('user_id');
        $this->nasabahModel = UserModel::instance()->whereIn('id', $ids);
    }
    public function index()
    {
        if (!auth()->user()->can('admin.access-control')) return "error";
        // $currentPage = $this->request->getVar('page_nasabah') ?? 1;\
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $nasabah = $this->nasabahModel->search($keyword);
        } else {
            $nasabah = $this->nasabahModel;
        }

        $data = [
            'title'     => "Tabel Nasabah",
            'admin'     =>  $nasabah->paginate(10, 'users'),
            'units'     => $this->unitModel,
            'pager'     => $this->nasabahModel->pager
        ];

        return view('access/index', $data);
    }

    public function detail($username)
    {
        if (!auth()->user()->can('admin.access-control')) return "error";
        $data = [
            'title' => 'Detail Nasabah',
            'admin' => $this->nasabahModel->getNasabah($username)
        ];

        return view('access/detail', $data);
    }

    public function update($id)
    {
        if (!auth()->user()->can('admin.access-control')) return "error";
        if (!$this->validate([
            'nama_lengkap' => [
                'label' => 'Nama Lengkap',
                'rules' => 'required'
            ]
        ])) {
            // return $this->failValidationErrors(validation_errors());
            return redirect()->to('/access/' . $this->nasabahModel->find($id)->username)->withInput();
        }

        $admin = $this->nasabahModel->findById($id);
        $admin->syncPermissions(...$this->request->getVar('permission'));

        $admin->fill([
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
        ]);
        $this->nasabahModel->save($admin);
        //     return $this->respondUpdated(['message' => 'berhasil coy']);

        session()->setFlashdata('pesan', 'Data admin berhasil diubah.');
        return redirect()->to('/access');
    }
}
