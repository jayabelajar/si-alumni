<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AdminDashboard extends BaseController
{
    public function index()
    {
        $alumniModel = new \App\Models\AlumniModel();

        $data = [
            'total_alumni'    => $alumniModel->countAllResults(),
            'total_employed'  => $alumniModel->where('status', 'employed')->countAllResults(),
            'total_unemployed' => $alumniModel->where('status', 'unemployed')->countAllResults(),
            'by_year'         => $alumniModel->select('graduation_year, count(*) as total')
                                            ->groupBy('graduation_year')
                                            ->findAll(),
            'title'           => 'Admin Dashboard'
        ];

        return view('admin/dashboard', $data);
    }
}
