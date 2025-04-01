<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'judul' => 'login',
        ];
        return view('Auth/v_login', $data);
    }
}
