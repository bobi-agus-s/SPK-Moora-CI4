<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\UserModel;

class Auth extends BaseController
{

    public function __construct()
    {
        $this->auth = new UserModel;
    }

    public function login()
    {
        if(session('id_user')) {
            return redirect()->to(site_url('/'));
        }

        return view('auth/login');
    }

    public function cekLogin()
    {
        $data = $this->request->getPost();
        $user = $this->auth->where('username', $data['username'])->first();
        if (is_object($user)) {
            if ($user->password == $data['password']) {
                $params = [
                    'id_user'   => $user->id_user,
                    'level'   => $user->level,
                ];

                if ($user->level == "admin") {
                    session()->set($params);
                    return redirect()->to(site_url('/'));
                } else {
                    session()->set($params);
                    return redirect()->to(site_url('/'));    
                }
            } else {
                return redirect()->to(site_url('login'))->with('error', 'Password salah');
            }
        } else {
            return redirect()->to(site_url('login'))->with('error', 'Username tidak ditemukan');
        }
    }

    public function logout()
    {
        $params = ['id_user', 'level'];
        session()->remove($params);
        return redirect()->to(site_url('login'));
    }
}
