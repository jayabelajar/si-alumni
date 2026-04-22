<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{
    public function login()
    {
        if ($this->request->getMethod() === 'POST') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $userModel = new \App\Models\UserModel();
            $user = $userModel->where('username', $username)->first();

            if ($user && password_verify($password, $user['password'])) {
                session()->set([
                    'user_id'    => $user['id'],
                    'username'   => $user['username'],
                    'role'       => $user['role'],
                    'isLoggedIn' => true,
                ]);

                return redirect()->to($user['role'] === 'admin' ? '/admin' : '/alumni');
            }

            return redirect()->back()->with('error', 'Invalid username or password');
        }

        return view('auth/login');
    }

    public function register()
    {
        if ($this->request->getMethod() === 'POST') {
            $userModel = new \App\Models\UserModel();
            $alumniModel = new \App\Models\AlumniModel();

            $db = \Config\Database::connect();
            $db->transStart();

            $userData = [
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'role'     => 'alumni',
            ];

            if (!$userModel->insert($userData)) {
                return redirect()->back()->withInput()->with('errors', $userModel->errors());
            }

            $userId = $userModel->getInsertID();

            $alumniData = [
                'user_id'         => $userId,
                'nim'             => $this->request->getPost('nim'),
                'full_name'       => $this->request->getPost('full_name'),
                'major'           => $this->request->getPost('major'),
                'graduation_year' => $this->request->getPost('graduation_year'),
                'status'          => 'other',
            ];

            if (!$alumniModel->insert($alumniData)) {
                $db->transRollback();
                return redirect()->back()->withInput()->with('errors', $alumniModel->errors());
            }

            $db->transComplete();

            if ($db->transStatus() === false) {
                return redirect()->back()->withInput()->with('error', 'Registration failed');
            }

            return redirect()->to('/login')->with('success', 'Registration successful. Please login.');
        }

        return view('auth/register');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
