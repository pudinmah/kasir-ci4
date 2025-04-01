<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index(): string
    {
        $data = [
            'judul' => 'Home',
            'page' => 'v_admin',
        ];
        return view('v_template', $data);
    }
}