<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class AduanController extends Controller
{
    public function index()
    {
        return view('user.aduan');
    }
    public function aduan(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'hp' => 'required',
            'alamat' => 'required',
            'jenis_kejadian' => 'required',
            'lokasi' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'foto' => 'required',
        ]);
        Aduan::create($validated);
        return redirect('/aduan')->with(
            'success',
            'Laporan berhasil diajukan, terima kasih!'
        );
    }
}
