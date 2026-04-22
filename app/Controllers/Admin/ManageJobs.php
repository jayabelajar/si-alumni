<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\JobModel;

class ManageJobs extends BaseController
{
    public function index()
    {
        $jobModel = new JobModel();
        $data = [
            'title' => 'Kelola Lowongan',
            'jobs'  => $jobModel->orderBy('created_at', 'DESC')->paginate(10),
            'pager' => $jobModel->pager
        ];

        return view('admin/jobs/index', $data);
    }

    public function create()
    {
        return view('admin/jobs/create', ['title' => 'Tambah Lowongan']);
    }

    public function store()
    {
        $jobModel = new JobModel();
        
        $data = [
            'title'        => $this->request->getPost('title'),
            'company'      => $this->request->getPost('company'),
            'location'     => $this->request->getPost('location'),
            'type'         => $this->request->getPost('type'),
            'salary_range'     => $this->request->getPost('salary_range'),
            'application_link' => $this->request->getPost('application_link'),
            'description'      => $this->request->getPost('description'),
            'posted_by'        => session()->get('user_id'),
            'is_active'        => 1
        ];

        $jobModel->insert($data);
        return redirect()->to('/admin/jobs')->with('success', 'Lowongan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jobModel = new JobModel();
        $job = $jobModel->find($id);

        if (!$job) {
            return redirect()->to('/admin/jobs')->with('error', 'Lowongan tidak ditemukan.');
        }

        return view('admin/jobs/edit', [
            'title' => 'Edit Lowongan',
            'job'   => $job
        ]);
    }

    public function update($id)
    {
        $jobModel = new JobModel();
        
        $data = [
            'title'        => $this->request->getPost('title'),
            'company'      => $this->request->getPost('company'),
            'location'     => $this->request->getPost('location'),
            'type'         => $this->request->getPost('type'),
            'salary_range'     => $this->request->getPost('salary_range'),
            'application_link' => $this->request->getPost('application_link'),
            'description'      => $this->request->getPost('description'),
            'is_active'        => $this->request->getPost('is_active') ?? 0
        ];

        $jobModel->update($id, $data);
        return redirect()->to('/admin/jobs')->with('success', 'Lowongan berhasil diperbarui.');
    }

    public function delete($id)
    {
        $jobModel = new JobModel();
        $jobModel->delete($id);
        return redirect()->to('/admin/jobs')->with('success', 'Lowongan berhasil dihapus.');
    }
}
