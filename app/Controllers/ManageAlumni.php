<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ManageAlumni extends BaseController
{
    public function index()
    {
        $alumniModel = new \App\Models\AlumniModel();
        
        $keyword = $this->request->getGet('search');
        $year    = $this->request->getGet('year');
        $status  = $this->request->getGet('status');

        $query = $alumniModel;

        if ($keyword) {
            $query = $query->groupStart()
                           ->like('full_name', $keyword)
                           ->orLike('nim', $keyword)
                           ->groupEnd();
        }

        if ($year) {
            $query = $query->where('graduation_year', $year);
        }

        if ($status) {
            $query = $query->where('status', $status);
        }

        $data = [
            'alumni' => $query->orderBy('full_name', 'ASC')->paginate(10),
            'pager'  => $alumniModel->pager,
            'title'  => 'Kelola Alumni',
            'filters' => [
                'search' => $keyword,
                'year'   => $year,
                'status' => $status,
            ]
        ];

        return view('admin/alumni/index', $data);
    }

    public function create()
    {
        return view('admin/alumni/create', ['title' => 'Tambah Alumni Baru']);
    }

    public function store()
    {
        $userModel = new \App\Models\UserModel();
        $alumniModel = new \App\Models\AlumniModel();

        $rules = [
            'username' => 'required|min_length[3]|is_unique[users.username]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'full_name'=> 'required|min_length[3]',
            'nim'      => 'required|is_unique[alumni.nim]',
            'major'    => 'required',
            'graduation_year' => 'required|exact_length[4]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // 1. Create User Account
        $userData = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'     => 'alumni'
        ];
        $userModel->save($userData);
        $userId = $userModel->getInsertID();

        // 2. Create Alumni Profile
        $alumniData = [
            'user_id'         => $userId,
            'nim'             => $this->request->getPost('nim'),
            'full_name'       => $this->request->getPost('full_name'),
            'major'           => $this->request->getPost('major'),
            'graduation_year' => $this->request->getPost('graduation_year'),
            'status'          => 'unemployed' // Default
        ];
        $alumniModel->save($alumniData);

        return redirect()->to('/admin/alumni')->with('success', 'Alumni dan Akun berhasil ditambahkan');
    }

    public function edit($id)
    {
        $alumniModel = new \App\Models\AlumniModel();
        $alumnus = $alumniModel->find($id);

        if (!$alumnus) {
            return redirect()->to('/admin/alumni')->with('error', 'Data alumni tidak ditemukan');
        }

        return view('admin/alumni/edit', [
            'alumnus' => $alumnus,
            'title'   => 'Edit Alumni | ' . $alumnus['full_name']
        ]);
    }

    public function update($id)
    {
        $alumniModel = new \App\Models\AlumniModel();
        
        $data = [
            'full_name'       => $this->request->getPost('full_name'),
            'major'           => $this->request->getPost('major'),
            'graduation_year' => $this->request->getPost('graduation_year'),
            'status'          => $this->request->getPost('status'),
            'company'         => $this->request->getPost('company'),
            'position'        => $this->request->getPost('position'),
        ];

        // Disable validation for NIM and USER_ID during simple update if not provided
        if (!$alumniModel->update($id, $data)) {
            return redirect()->back()->withInput()->with('errors', $alumniModel->errors());
        }

        return redirect()->to('/admin/alumni')->with('success', 'Data alumni berhasil diperbarui');
    }

    public function delete($id)
    {
        $alumniModel = new \App\Models\AlumniModel();
        $userModel = new \App\Models\UserModel();

        $alumnus = $alumniModel->find($id);
        if ($alumnus) {
            // Delete user first (cascade will handle alumni if configured, but let's be explicit or just delete user)
            // Actually, if we delete the user, the alumni record will be deleted due to CASCADE in migration.
            $userModel->delete($alumnus['user_id']);
        }

        return redirect()->to('/admin/alumni')->with('success', 'Alumni deleted successfully');
    }
}
