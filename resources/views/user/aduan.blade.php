@extends('layout.main')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="modal-title">Form Pengaduan</h3>
        </div>
        @if (session()->has('success'))
            <div class="col-md-8">
                <div class="alert alert-primary" role="alert">
                    {{ session('success') }}
                </div>
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-md-5">
            <br>
            <form action="/aduan" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-2 row">
                    <label for="nama" class="col-sm-4 form-label">Nama Lengkap</label>
                    <div class="col-sm-8">
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                            id="nama" value="{{ old('nama') }}">
                    </div>
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-2 row">
                    <label for="hp" class="col-sm-4 form-label">No. HP</label>
                    <div class="col-sm-8"><input type="text" name="hp"
                            class="form-control @error('hp') is-invalid @enderror" id="hp"
                            value="{{ old('hp') }}"></div>

                    @error('hp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-2 row">
                    <label for="alamat" class="col-sm-4 form-label">Alamat</label>
                    <div class="col-sm-8"><input type="text" name="alamat"
                            class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                            value="{{ old('alamat') }}"></div>
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-2 row">
                    <label for="jenis_kejadian" class="col-sm-4 form-label">Jenis Kejadian</label>
                    <div class="col-sm-8"><input type="text" name="jenis_kejadian"
                            class="form-control @error('jenis_kejadian') is-invalid @enderror" id="jenis_kejadian"
                            value="{{ old('jenis_kejadian') }}"></div>
                    @error('jenis_kejadian')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-2 row">
                    <label for="lokasi" class="col-sm-4 form-label">Lokasi Kejadian</label>
                    <div class="col-sm-8"><input type="text" name="lokasi"
                            class="form-control @error('lokasi') is-invalid @enderror" id="lokasi"
                            value="{{ old('lokasi') }}"></div>
                    @error('lokasi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-2 row">
                    <label for="lat" class="col-sm-4 form-label">Latitude (klik peta)</label>
                    <div class="col-sm-8"><input type="float" name="lat"
                            class="form-control @error('lat') is-invalid @enderror" id="lat"
                            value="{{ old('lat') }}"></div>
                    @error('lat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-2 row">
                    <label for="lng" class="col-sm-4 form-label">Longitude (klik peta)</label>
                    <div class="col-sm-8"><input type="float" name="lng"
                            class="form-control @error('lng') is-invalid @enderror" id="lng"
                            value="{{ old('lng') }}"></div>
                    @error('lng')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4 row">
                    <label for="foto" class="col-sm-4 form-label">Foto</label>
                    <div class="col-sm-8"><input type="file" name="foto"
                            class="form-control @error('foto') is-invalid @enderror" id="foto"
                            value="{{ old('foto') }}"></div>
                    @error('foto')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-md-7">
            <div id="map"></div>
        </div>
    </div>
    <script>
        var map = L.map('map').setView([0.7876895364886725, 127.38501428916769], 17);

        L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }).addTo(map);

        // buat variabel berisi fugnsi L.popup 
        var popup = L.popup();

        // buat fungsi popup saat map diklik
        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                .setContent("koordinatnya adalah " + e.latlng
                    .toString()
                ) //set isi konten yang ingin ditampilkan, kali ini kita akan menampilkan latitude dan longitude
                .openOn(map);

            document.getElementById('lat').value = e
                .latlng['lat'] //value pada form latitde, longitude akan berganti secara otomatis
            document.getElementById('lng').value = e
                .latlng['lng'] //value pada form latitde, longitude akan berganti secara otomatis
        }
        map.on('click', onMapClick); //jalankan fungsi
    </script>
@endsection
