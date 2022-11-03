<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Aduan;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('admin.user', [
            'data' => $data
        ]);
    }
   
}
