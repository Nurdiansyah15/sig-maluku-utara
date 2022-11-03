<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Faskes;
use App\Models\JenisFaskes;
use App\Models\RuasJalan;

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
            // 'foto' => 'required',
            'garansi' => 'required',
        ]);
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
            // 'foto' => 'required',
            'garansi' => 'required',
        ]);
        Faskes::where('id', $id)
            ->update($validated);
        return redirect('/fasilitas')->with(
            'success',
            'Faskes berhasil diubah !'
        );
    }
    public function delete(Request $request, $id)
    {
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
