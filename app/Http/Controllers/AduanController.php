<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;
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
            'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // menyimpan data file yang diupload ke variabel $file
		$file = $request->file('foto');
        $nama_file = $file->hashName();
 
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'foto-aduan';
        $file->move($tujuan_upload,$nama_file);
        $validated['foto']=$nama_file;
        Aduan::create($validated);

        // $email = 'mmgrup17@gmail.com';
        // $data = [
        //     'title' => 'Aduan Masyarakat',
        //     'url' => 'https://bptd24malut.com',
        // ];
        // Mail::to($email)->send(new MailNotify($data));
        
        return redirect('/aduan')->with(
            'success',
            'Laporan berhasil diajukan, terima kasih!'
        );
    }
}
