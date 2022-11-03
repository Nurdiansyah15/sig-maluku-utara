<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Aduan;

class ListaduanController extends Controller
{
    public function index()
    {
        $data = Aduan::all();
        return view('admin.aduan', [
            'data' => $data
        ]);
    }

    public function destroy(Aduan $aduan){
        $dataLama = Aduan::where('id', $aduan->id)->first();
        $fileLama = public_path('foto-aduan/' . $dataLama->foto);
        // Hapus File tersebut
        File::delete($fileLama);
        Aduan::where(['id'=>$aduan->id])->delete();
        
        return redirect('/list_aduan')->with(
            'success',
            'Laporan berhasil dihapus!'
        );
    }
   
}
