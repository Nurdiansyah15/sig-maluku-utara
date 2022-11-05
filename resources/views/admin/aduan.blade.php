@extends('layout.main')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-auto text-center">
                <h1 class="modal-title mb-4">
                    Daftar Laporan / Aduan Masyarakat
                </h1>
            </div>
        </div>
        @if (session()->has('success'))
            <div class="col-md-12">
                <div class="alert alert-primary" role="alert">
                    {{ session('success') }}
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12 mb-10">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Jenis Kejadian</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Pelapor</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        @foreach ($data as $d)
                        
                            <tr>
                                <th>{{ $no++ }}</th>
                                <td>{{ $d->updated_at}}</td>
                                <td>{{ $d->jenis_kejadian }}</td>
                                <td>{{ $d->lokasi }}</td>
                                <td>{{ $d->nama }}</td>
                                <td>
                                    <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $no }}"> <i class="fa fa-search"></i></a>
                                    <!-- Button trigger modal -->
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{ $no }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Detail</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <img src="/foto-aduan/{{$d->foto}}" width="100%" alt="">
                                            <p>Telah terjadi {{ $d->jenis_kejadian }} di {{ $d->lokasi }}</p>
                                            <p>Pelapor : {{ $d->nama }}</p>
                                            <p>No. HP  : {{ $d->hp }}</p>
                                            <a href="https://www.google.co.id/maps/@<?php echo $d->lat ?>,{{ $d->lng }},21z" target="_blank" rel="noopener noreferrer">Lihat Mpas</a>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- <a href="#" class="btn btn-success"> <i class="fa fa-pencil"></i></a> -->
                                    <!-- <a href="#" class="btn btn-danger"> <i class="fa fa-trash"></i></a> -->
                                    <form action="list_aduan/{{$d->id}}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger" onclick="confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i></button>
                                    </form>

                                </td>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
   
@endsection
