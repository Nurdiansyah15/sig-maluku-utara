@extends('layout.main')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-auto text-center">
                <h3 class="modal-title mb-4">
                    Daftar Laporan / Aduan Masyarakat
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <a href="/register" class="btn btn-success"><i  class="fa fa-plus "></i>Tambah</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-10">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        @foreach ($data as $d)
                        
                            <tr>
                                <th>{{ $no++ }}</th>
                                <td>{{ $d->name}}</td>
                                <td>{{ $d->email }}</td>
                                <td>{{ $d->role }}</td>
                                <td>
                                    <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
   
@endsection
