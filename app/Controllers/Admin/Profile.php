<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Profile extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $user = $userModel->find(session()->get('user_id'));

        $data = [
            'title' => 'Profil Admin',
            'user'  => $user
        ];

        return view('admin/profile', $data);
    }

    public function update()
    {
        $userModel = new UserModel();
        $userId = session()->get('user_id');

        $rules = [
            'username' => "required|min_length[3]|is_unique[users.username,id,{$userId}]",
            'email'    => "required|valid_email|is_unique[users.email,id,{$userId}]",
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
        ];

        $userModel->update($userId, $data);

        // Update session username if changed
        session()->set('username', $data['username']);

        return redirect()->back()->with('success', 'Profil berhasil diperbarui');
    }

    public function changePassword()
    {
        $userModel = new UserModel();
        $userId = session()->get('user_id');
        $user = $userModel->find($userId);

        $rules = [
            'current_password' => 'required',
            'new_password'     => 'required|min_length[8]',
            'confirm_password' => 'required|matches[new_password]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }

        $currentPassword = $this->request->getPost('current_password');
        if (!password_verify($currentPassword, $user['password'])) {
            return redirect()->back()->with('error', 'Password saat ini salah');
        }

        $userModel->update($userId, [
            'password' => password_hash($this->request->getPost('new_password'), PASSWORD_DEFAULT)
        ]);

        return redirect()->back()->with('success', 'Password berhasil diubah');
    }
}
