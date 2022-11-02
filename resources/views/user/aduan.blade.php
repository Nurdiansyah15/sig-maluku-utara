@extends('layout.main')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <h1 class="modal-title">Form Pengaduan</h1>
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
        <div class="col-md-4 p-3">
            <br>
            <form action="/aduan" method="POST">
                @csrf
                <div class="mb-2">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                        id="nama" value="{{ old('nama') }}">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="hp" class="form-label">No. HP</label>
                    <input type="text" name="hp" class="form-control @error('hp') is-invalid @enderror"
                        id="hp" value="{{ old('hp') }}">
                    @error('hp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror"
                        id="alamat" value="{{ old('alamat') }}">
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="jenis_kejadian" class="form-label">Jenis Kejadian</label>
                    <input type="text" name="jenis_kejadian"
                        class="form-control @error('jenis_kejadian') is-invalid @enderror" id="jenis_kejadian"
                        value="{{ old('jenis_kejadian') }}">
                    @error('jenis_kejadian')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="lokasi" class="form-label">Lokasi Kejadian</label>
                    <input type="text" name="lokasi" class="form-control @error('lokasi') is-invalid @enderror"
                        id="lokasi" value="{{ old('lokasi') }}">
                    @error('lokasi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="lat" class="form-label">Latitude (klik pada peta)</label>
                    <input type="float" name="lat" class="form-control @error('lat') is-invalid @enderror"
                        id="lat" value="{{ old('lat') }}">
                    @error('lat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="lng" class="form-label">Longitude (klik pada peta)</label>
                    <input type="float" name="lng" class="form-control @error('lng') is-invalid @enderror"
                        id="lng" value="{{ old('lng') }}">
                    @error('lng')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="text" name="foto" class="form-control @error('foto') is-invalid @enderror"
                        id="foto" value="{{ old('foto') }}">
                    @error('foto')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-md-8 p-3">
            <div id="map"></div>
        </div>
    </div>
    <script>
        var map = L.map('map').setView([-7.05106088833702, 110.44420968701564], 14);

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
