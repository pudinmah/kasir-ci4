<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index(): string
    {
        $data = [
            'judul' => 'Dashboard',
            'subjudul' => 'dashboard',
            'menu' => 'dashboard',
            'submenu' => 'setting',
            'page' => 'v_admin',
        ];
        return view('v_template', $data);
    }

    public function setting(): string
    {
        $data = [
            'judul' => 'Setting',
            'subjudul' => 'setting',
            'menu' => 'setting',
            'submenu' => 'setting',
            'page' => 'v_setting',
        ];
        return view('v_template', $data);
    }
}