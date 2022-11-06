<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Faskes;
use App\Models\RuasJalan;
use App\Models\JenisFaskes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class FaskesController extends Controller
{
    public function index()
    {
        return view('user.home');
    }
    public function data($n)
    {
        // $data = Faskes::all();
        $data = DB::select("SELECT a.*,b.nama as jalan,c.nama as jenis FROM faskes a, ruas_jalans b,jenis_faskes c WHERE a.id_ruas_jalans=b.id AND a.id_jenis_faskes=c.id AND a.id_jenis_faskes=$n");
        return json_encode($data);
    }
    public function datacari($n)
    {
        // $data = Faskes::all();
        $data = DB::select("SELECT a.*,b.nama as jalan,c.nama as jenis FROM faskes a, ruas_jalans b,jenis_faskes c WHERE a.id_ruas_jalans=b.id AND a.id_jenis_faskes=c.id AND a.id=$n");
        return json_encode($data);
    }
    public function fasilitas()
    {
        $data = Faskes::all();
        $data_baru = [];
        foreach ($data as $d) {
            $jenis_faskes = Faskes::find($d->id)->jenis_faskes->nama;
            $ruas_jalan = Faskes::find($d->id)->ruas_jalan->nama;
            $d['jenis_faskes'] = $jenis_faskes;
            $d['ruas_jalan'] = $ruas_jalan;
            $data_baru[] = $d;
        }
        return view('admin.fasilitas', [
            'data' => $data_baru
        ]);
    }
    public function tambah()
    {
        $data_jenis_faskes = JenisFaskes::all();
        $data_ruas_jalan = RuasJalan::all();
        return view('admin.tambah_faskes', [
            "data_jenis_faskes" => $data_jenis_faskes,
            "data_ruas_jalan" => $data_ruas_jalan
        ]);
    }
    public function tambah_action(Request $request)
    {
        $validated = $request->validate([
            'id_jenis_faskes' => 'required',
            'id_ruas_jalans' => 'required',
            'lat' => 'required|unique:faskes,lat',
            'lng' => 'required|unique:faskes,lng',
            'tipe_jalan' => 'required',
            'lebar_jalan' => 'required',
            'pengadaan' => 'required',
            'pemeliharaan' => 'required',
            'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'garansi' => 'required',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('foto');
        $nama_file = $file->hashName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'foto-faskes';
        $file->move($tujuan_upload, $nama_file);
        $validated['foto'] = $nama_file;

        Faskes::create($validated);
        return redirect('/fasilitas')->with(
            'success',
            'Faskes berhasil ditambahkan !'
        );
    }
    public function edit($id)
    {
        $data = Faskes::where('id', $id)->get();
        $data_jenis_faskes = JenisFaskes::all();
        $data_ruas_jalan = RuasJalan::all();
        return view('admin.edit_faskes', [
            "data" => $data,
            "data_jenis_faskes" => $data_jenis_faskes,
            "data_ruas_jalan" => $data_ruas_jalan
        ]);
    }
    public function edit_action(Request $request, $id)
    {
        $validated = $request->validate([
            'id_jenis_faskes' => 'required',
            'id_ruas_jalans' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'tipe_jalan' => 'required',
            'lebar_jalan' => 'required',
            'pengadaan' => 'required',
            'pemeliharaan' => 'required',
            'foto' => 'file|image|mimes:jpeg,png,jpg|max:2048',
            'garansi' => 'required',
        ]);


        // Cek Apakah ada file videonya
        if ($request->file('foto')) {

            $file = $request->file('foto');
            $nama_file = $file->hashName();
            $tujuan_upload = 'foto-aduan';
            $file->move($tujuan_upload, $nama_file);
            $validated['foto'] = $nama_file;

            // Ambil Data Untuk Menghapus file sebelum nya
            $data = Faskes::where('id', $id)->first();
            // Path foto
            $path = public_path('foto-faskes/' . $data->foto);
            // Cek Apakah ada file videonya
            if (File::exists($path)) {
                File::delete($path);
            }
        }

        Faskes::where('id', $id)
            ->update($validated);
        return redirect('/fasilitas')->with(
            'success',
            'Faskes berhasil diubah !'
        );
    }
    public function delete(Request $request, $id)
    {
        // Ambil Data
        $data = Faskes::where('id', $id)->first();

        // Path foto
        $path = public_path('foto-faskes/' . $data->foto);

        // Cek Apakah ada file videonya
        if (File::exists($path)) {
            File::delete($path);
        }
        Faskes::where('id', $id)
            ->delete();
        return redirect('/fasilitas')->with(
            'success',
            'Faskes berhasil dihapus !'
        );
    }
    public function detail(Request $request, $id)
    {
        $data = Faskes::where('id', $id)->get();
        $data_jenis_faskes = JenisFaskes::all();
        $data_ruas_jalan = RuasJalan::all();
        return view('admin.detail_faskes', [
            "data" => $data,
            "data_jenis_faskes" => $data_jenis_faskes,
            "data_ruas_jalan" => $data_ruas_jalan
        ]);
    }
}
