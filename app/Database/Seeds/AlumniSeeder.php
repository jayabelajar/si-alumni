<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AlumniSeeder extends Seeder
{
    public function run()
    {
        $db = \Config\Database::connect();
        
        $alumniData = [
            [
                'username' => 'budi.santoso',
                'email' => 'budi@example.com',
                'full_name' => 'Budi Santoso',
                'nim' => '2020001',
                'major' => 'Sistem Informasi',
                'year' => '2020',
                'status' => 'employed',
                'company' => 'Google Indonesia',
                'position' => 'Software Engineer'
            ],
            [
                'username' => 'siti.aminah',
                'email' => 'siti@example.com',
                'full_name' => 'Siti Aminah',
                'nim' => '2020002',
                'major' => 'Teknik Informatika',
                'year' => '2020',
                'status' => 'employed',
                'company' => 'Gojek',
                'position' => 'UI/UX Designer'
            ],
            [
                'username' => 'andi.wijaya',
                'email' => 'andi@example.com',
                'full_name' => 'Andi Wijaya',
                'nim' => '2021001',
                'major' => 'Sistem Informasi',
                'year' => '2021',
                'status' => 'unemployed',
                'company' => null,
                'position' => null
            ],
            [
                'username' => 'rina.asari',
                'email' => 'rina@example.com',
                'full_name' => 'Rina Asari',
                'nim' => '2021005',
                'major' => 'Manajemen Informatika',
                'year' => '2021',
                'status' => 'employed',
                'company' => 'Shopee',
                'position' => 'Data Analyst'
            ],
            [
                'username' => 'eko.prasetyo',
                'email' => 'eko@example.com',
                'full_name' => 'Eko Prasetyo',
                'nim' => '2019003',
                'major' => 'Teknik Komputer',
                'year' => '2019',
                'status' => 'other',
                'company' => 'Wirausaha Mandiri',
                'position' => 'CEO & Founder'
            ],
            [
                'username' => 'maya.putri',
                'email' => 'maya@example.com',
                'full_name' => 'Maya Putri',
                'nim' => '2022010',
                'major' => 'Sistem Informasi',
                'year' => '2022',
                'status' => 'unemployed',
                'company' => null,
                'position' => null
            ],
            [
                'username' => 'dodi.hermawan',
                'email' => 'dodi@example.com',
                'full_name' => 'Dodi Hermawan',
                'nim' => '2018022',
                'major' => 'Teknik Informatika',
                'year' => '2018',
                'status' => 'employed',
                'company' => 'Traveloka',
                'position' => 'Backend Developer'
            ],
            [
                'username' => 'linda.sari',
                'email' => 'linda@example.com',
                'full_name' => 'Linda Sari',
                'nim' => '2021015',
                'major' => 'Sistem Informasi',
                'year' => '2021',
                'status' => 'employed',
                'company' => 'Bank Mandiri',
                'position' => 'IT Support'
            ],
            [
                'username' => 'fajar.ramadhan',
                'email' => 'fajar@example.com',
                'full_name' => 'Fajar Ramadhan',
                'nim' => '2020088',
                'major' => 'Teknik Informatika',
                'year' => '2020',
                'status' => 'other',
                'company' => 'S2 ITB',
                'position' => 'Mahasiswa Pascasarjana'
            ],
            [
                'username' => 'anisa.fitri',
                'email' => 'anisa@example.com',
                'full_name' => 'Anisa Fitri',
                'nim' => '2022005',
                'major' => 'Manajemen Informatika',
                'year' => '2022',
                'status' => 'employed',
                'company' => 'Tokopedia',
                'position' => 'Product Manager'
            ],
        ];

        foreach ($alumniData as $data) {
            // Insert into Users table
            $db->table('users')->insert([
                'username' => $data['username'],
                'email'    => $data['email'],
                'password' => password_hash('password123', PASSWORD_DEFAULT),
                'role'     => 'alumni',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            $userId = $db->insertID();

            // Insert into Alumni table
            $db->table('alumni')->insert([
                'user_id'         => $userId,
                'nim'             => $data['nim'],
                'full_name'       => $data['full_name'],
                'major'           => $data['major'],
                'graduation_year' => $data['year'],
                'status'          => $data['status'],
                'company'         => $data['company'],
                'position'        => $data['position'],
                'created_at'      => date('Y-m-d H:i:s'),
                'updated_at'      => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
