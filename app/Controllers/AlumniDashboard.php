<?php

namespace App\Controllers;

use App\Models\AlumniModel;
use App\Models\JobModel;

class AlumniDashboard extends BaseController
{
    public function index()
    {
        $alumniModel = new AlumniModel();
        $jobModel = new JobModel();
        
        $userId = session()->get('user_id');
        $alumnus = $alumniModel->where('user_id', $userId)->first();

        if (!$alumnus) {
            return redirect()->to('/login')->with('error', 'Sesi berakhir, silakan login kembali.');
        }

        // Cek kelengkapan data (Tracer Study sederhana)
        $isTracerComplete = !empty($alumnus['company']) && !empty($alumnus['position']);

        $data = [
            'title'            => 'Dashboard Alumni',
            'alumnus'          => $alumnus,
            'isTracerComplete' => $isTracerComplete,
            'totalJobs'        => $jobModel->where('is_active', 1)->countAllResults(),
        ];

        return view('alumni/dashboard', $data);
    }
}
