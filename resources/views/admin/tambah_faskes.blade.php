@extends('layout.main')
@section('content')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-auto text-center">
                <h1 class="modal-title">
                    Tambah Fasilitas Keselamatan Lalu Lintas
                </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <form action="/fasilitas/tambah" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2 row">
                        <label class="col-sm-4" id="id_jenis_faskes" for="pengadaan">Jenis Fasilitas</label>
                        <div class="col-sm-8">
                            <select name="id_jenis_faskes"
                                class="form-select  @error('id_jenis_faskes') is-invalid @enderror"
                                value="{{ old('id_jenis_faskes') }}" id="id_jenis_faskes">
                                <option selected>Choose...</option>
                                @foreach ($data_jenis_faskes as $d)
                                    <option value="{{ $d->id }}">{{ $d->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('id_jenis_faskes')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-2 row">
                        <label class="col-sm-4" id="id_ruas_jalan" for="pengadaan">Ruas Jalan</label>
                        <div class="col-sm-8">
                            <select name="id_ruas_jalans" class="form-select  @error('id_ruas_jalans') is-invalid @enderror"
                                value="{{ old('id_ruas_jalans') }}" id="id_ruas_jalans">
                                <option selected>Choose...</option>
                                @foreach ($data_ruas_jalan as $d)
                                    <option value="{{ $d->id }}">{{ $d->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('id_ruas_jalans')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-2 row">
                        <label for="lat" class="col-sm-4">Latitude (klik pada peta)</label>
                        <div class="col-sm-8">
                            <input type="float" name="lat" class="form-control @error('lat') is-invalid @enderror"
                                id="lat" value="{{ old('lat') }}">
                        </div>
                        @error('lat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-2 row">
                        <label for="lng" class="col-sm-4">Longitude (klik pada peta)</label>
                        <div class="col-sm-8">
                            <input type="float" name="lng" class="form-control @error('lng') is-invalid @enderror"
                                id="lng" value="{{ old('lng') }}">
                        </div>
                        @error('lng')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-2 row">
                        <label for="tipe_jalan" class="col-sm-4" id="tipe_jalan">Tipe Jalan</label>
                        <div class="col-sm-8">
                            <input type="text" name="tipe_jalan"
                                class="form-control @error('tipe_jalan') is-invalid @enderror" id="tipe_jalan"
                                value="{{ old('tipe_jalan') }}">
                        </div>
                        @error('tipe_jalan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-2 row">
                        <label for="lebar_jalan" class="col-sm-4" id="lebar_jalan">Lebar Jalan (meter)</label>
                        <div class="col-sm-8">
                            <input min="0" type="number" name="lebar_jalan"
                                class="form-control @error('lebar_jalan') is-invalid @enderror" id="lebar_jalan"
                                value="{{ old('lebar_jalan') }}">
                        </div>
                        @error('lebar_jalan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-2 row">
                        <label for="pemeliharaan" class="col-sm-4" id="pemeliharaan">Jumlah Pemeliharaan</label>
                        <div class="col-sm-8">
                            <input type="number" min="0" name="pemeliharaan"
                                class="form-control @error('pemeliharaan') is-invalid @enderror" id="pemeliharaan"
                                value="{{ old('pemeliharaan') }}">
                        </div>
                        @error('pemeliharaan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div id="date-picker-example" class="mb-2 row md-form md-outline input-with-post-icon datepicker"
                        inline="true" data-mdb-inline="true">
                        <label class="col-sm-4" id="pengadaan" for="pengadaan">Tanggal Pengadaan</label>
                        <div class="col-sm-8">
                            <input placeholder="Select date" type="date" id="pengadaan" name="pengadaan"
                                class="form-control @error('pengadaan') is-invalid @enderror"
                                value="{{ old('pengadaan') }}">
                        </div>
                        @error('pengadaan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div id="date-picker-example" class="mb-2 row md-form md-outline input-with-post-icon datepicker"
                        inline="true" data-mdb-inline="true">
                        <label class="col-sm-4" id="garansi" for="garansi">Tanggal Garansi</label>
                        <div class="col-sm-8">
                            <input placeholder="Select date" type="date" id="garansi" name="garansi"
                                class="form-control @error('garansi') is-invalid @enderror" value="{{ old('garansi') }}">
                        </div>
                        @error('garansi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-2 row">
                        <label for="foto" class="col-sm-4" id="foto">Foto Fasilitas</label>
                        <div class="col-sm-8">
                            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror"
                                id="foto" value="{{ old('foto') }}">
                        </div>
                        @error('foto')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-md-8">
                <div id="map"></div>
            </div>
        </div>
    </div>
    <script>
        //set map
        var map = L.map('map').setView([0.7380068288877225, 127.49720707342343], 12);

        //set tile google
        L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }).addTo(map);

        // A $( document ).ready() block.
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

        // Data Picker Initialization
        $('.datepicker').datepicker({
            inline: true
        });

        $('.datepicker').datepicker({
            weekdaysShort: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
            showMonthsShort: true
        })
    </script>
@endsection
