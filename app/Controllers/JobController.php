<?php

namespace App\Controllers;

use App\Models\JobModel;

class JobController extends BaseController
{
    public function index()
    {
        $jobModel = new JobModel();
        
        $filters = [
            'search' => $this->request->getGet('search'),
            'type'   => $this->request->getGet('type'),
        ];

        $query = $jobModel->where('is_active', 1);

        if ($filters['search']) {
            $query->groupStart()
                  ->like('title', $filters['search'])
                  ->orLike('company', $filters['search'])
                  ->orLike('location', $filters['search'])
                  ->groupEnd();
        }

        if ($filters['type']) {
            $query->where('type', $filters['type']);
        }

        $data = [
            'title'   => 'Lowongan Kerja',
            'jobs'    => $query->orderBy('created_at', 'DESC')->paginate(10),
            'pager'   => $jobModel->pager,
            'filters' => $filters
        ];

        return view('jobs/index', $data);
    }

    public function show($id)
    {
        $jobModel = new JobModel();
        $job = $jobModel->find($id);

        if (!$job) {
            return redirect()->back()->with('error', 'Lowongan tidak ditemukan.');
        }

        $data = [
            'title' => $job['title'],
            'job'   => $job
        ];

        return view('jobs/show', $data);
    }
}
