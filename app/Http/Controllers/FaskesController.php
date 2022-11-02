<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Faskes;

class FaskesController extends Controller
{
    public function index()
    {
        return view('user.home');
    }
    public function data()
    {
        $data = Faskes::all();
        return json_encode($data);
    }
    public function fasilitas()
    {
        $data = Faskes::all();
        return view('admin.fasilitas', [
            'data' => $data
        ]);
    }
}
