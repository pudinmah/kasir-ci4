<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthModel;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{

    public function index()
    {
        return view('Auth/v_login',);
    }

}
