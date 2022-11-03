<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class KontakController extends Controller
{
    public function index()
    {
        return view('user.kontak');
    }
   
}
