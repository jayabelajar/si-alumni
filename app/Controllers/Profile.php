<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Profile extends BaseController
{
    public function index()
    {
        $alumniModel = new \App\Models\AlumniModel();
        $userId = session()->get('user_id');

        $alumnus = $alumniModel->where('user_id', $userId)->first();

        if (!$alumnus) {
            return redirect()->to('/')->with('error', 'Profile not found');
        }

        $data = [
            'alumnus' => $alumnus,
            'title'   => 'My Profile'
        ];

        return view('alumni/profile', $data);
    }

    public function update()
    {
        $alumniModel = new \App\Models\AlumniModel();
        $userId = session()->get('user_id');

        $alumnus = $alumniModel->where('user_id', $userId)->first();

        if (!$alumnus) {
            return redirect()->to('/')->with('error', 'Profile not found');
        }

        $data = [
            'status'        => $this->request->getPost('status'),
            'company'       => $this->request->getPost('company'),
            'position'      => $this->request->getPost('position'),
            'bio'           => $this->request->getPost('bio'),
            'skills'        => $this->request->getPost('skills'),
            'linkedin_url'  => $this->request->getPost('linkedin_url'),
            'portfolio_url' => $this->request->getPost('portfolio_url'),
        ];

        // Handle Image Upload
        $img = $this->request->getFile('avatar');
        
        if ($img->isValid() && ! $img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(FCPATH . 'uploads/avatars', $newName);
            
            // Hapus foto lama jika ada
            if ($alumnus['avatar'] && file_exists(FCPATH . 'uploads/avatars/' . $alumnus['avatar'])) {
                unlink(FCPATH . 'uploads/avatars/' . $alumnus['avatar']);
            }
            
            $data['avatar'] = $newName;
        }

        if (!$alumniModel->update($alumnus['id'], $data)) {
            return redirect()->back()->withInput()->with('errors', $alumniModel->errors());
        }

        return redirect()->to('/alumni/profile')->with('success', 'Profil berhasil diperbarui.');
    }
}
