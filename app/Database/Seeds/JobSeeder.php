<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JobSeeder extends Seeder
{
    public function run()
    {
        $jobModel = new \App\Models\JobModel();

        $data = [
            [
                'title'        => 'Software Engineer (Backend)',
                'company'      => 'Tech Innovators Co.',
                'location'     => 'Jakarta (Remote)',
                'type'         => 'Full-time',
                'description'  => "Kami mencari Backend Engineer yang berpengalaman dengan PHP (CodeIgniter/Laravel).\n\nKualifikasi:\n- Minimal 2 tahun pengalaman.\n- Menguasai REST API dan database MySQL.\n- Mampu bekerja secara remote.",
                'salary_range' => 'Rp 10jt - 15jt',
                'posted_by'    => 1,
                'created_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'title'        => 'Data Analyst',
                'company'      => 'Finance Solusi Indonesia',
                'location'     => 'Surabaya',
                'type'         => 'Full-time',
                'description'  => "Dibutuhkan Data Analyst untuk mengolah data keuangan dan memberikan insight bisnis.\n\nKualifikasi:\n- Lulusan Informatika/Statistik.\n- Menguasai SQL dan Python/R.\n- Penempatan kantor Surabaya.",
                'salary_range' => 'Rp 8jt - 12jt',
                'posted_by'    => 1,
                'created_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'title'        => 'UI/UX Designer Intern',
                'company'      => 'Creative Agency Digital',
                'location'     => 'Bandung',
                'type'         => 'Internship',
                'description'  => "Kesempatan magang bagi alumni atau mahasiswa tingkat akhir untuk mengasah skill desain produk digital.",
                'salary_range' => 'Rp 2jt - 3jt',
                'posted_by'    => 1,
                'created_at'   => date('Y-m-d H:i:s'),
            ]
        ];

        foreach ($data as $job) {
            $jobModel->insert($job);
        }
    }
}
