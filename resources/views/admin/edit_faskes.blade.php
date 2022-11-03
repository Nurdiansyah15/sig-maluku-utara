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
                @foreach ($data as $d)
                    <form action="/fasilitas/edit" method="POST">
                        @csrf
                        <div class="mb-2 input-group flex-nowrap">
                            <span class="input-group-text" id="id_jenis_faskes" for="pengadaan">Jenis Fasilitas</span>
                            <select name="id_jenis_faskes"
                                class="form-select  @error('id_jenis_faskes') is-invalid @enderror"
                                value="{{ old('id_jenis_faskes') }}" id="id_jenis_faskes">
                                <option selected>Choose...</option>
                                @foreach ($data_jenis_faskes as $d)
                                    <option value="{{ $d->id }}">{{ $d->nama }}</option>
                                @endforeach
                            </select>
                            @error('id_jenis_faskes')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-2 input-group flex-nowrap">
                            <span class="input-group-text" id="id_ruas_jalan" for="pengadaan">Ruas Jalan</span>
                            <select name="id_ruas_jalans" class="form-select  @error('id_ruas_jalans') is-invalid @enderror"
                                value="{{ old('id_ruas_jalans') }}" id="id_ruas_jalans">
                                <option selected>Choose...</option>
                                @foreach ($data_ruas_jalan as $d)
                                    <option value="{{ $d->id }}">{{ $d->nama }}</option>
                                @endforeach
                            </select>
                            @error('id_ruas_jalans')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-2 input-group flex-nowrap">
                            <span for="lat" class="input-group-text">Latitude (klik pada peta)</span>
                            <input type="float" name="lat" class="form-control @error('lat') is-invalid @enderror"
                                id="lat" value="{{ old('lat') }}">
                            @error('lat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-2 input-group flex-nowrap">
                            <label for="lng" class="input-group-text">Longitude (klik pada peta)</label>
                            <input type="float" name="lng" class="form-control @error('lng') is-invalid @enderror"
                                id="lng" value="{{ old('lng') }}">
                            @error('lng')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-2 input-group flex-nowrap">
                            <span for="tipe_jalan" class="input-group-text" id="tipe_jalan">Tipe Jalan</span>
                            <input type="text" name="tipe_jalan"
                                class="form-control @error('tipe_jalan') is-invalid @enderror" id="tipe_jalan"
                                value="{{ old('tipe_jalan') }}">
                            @error('tipe_jalan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-2 input-group flex-nowrap">
                            <span for="lebar_jalan" class="input-group-text" id="lebar_jalan">Lebar Jalan (meter)</span>
                            <input min="0" type="number" name="lebar_jalan"
                                class="form-control @error('lebar_jalan') is-invalid @enderror" id="lebar_jalan"
                                value="{{ old('lebar_jalan') }}">
                            @error('lebar_jalan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div id="date-picker-example"
                            class="mb-2 input-group flex-nowrap md-form md-outline input-with-post-icon datepicker"
                            inline="true" data-mdb-inline="true">
                            <span class="input-group-text" id="pengadaan" for="pengadaan">Tanggal Pengadaan</span>
                            <input placeholder="Select date" type="date" id="pengadaan" name="pengadaan"
                                class="form-control @error('pengadaan') is-invalid @enderror"
                                value="{{ old('pengadaan') }}">
                            @error('pengadaan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-2 input-group flex-nowrap">
                            <span for="pemeliharaan" class="input-group-text" id="pemeliharaan">Jumlah Pemeliharaan</span>
                            <input type="number" min="0" name="pemeliharaan"
                                class="form-control @error('pemeliharaan') is-invalid @enderror" id="pemeliharaan"
                                value="{{ old('pemeliharaan') }}">
                            @error('pemeliharaan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-2 input-group flex-nowrap">
                            <span for="foto" class="input-group-text" id="foto">Foto Fasilitas</span>
                            <input type="file" name="foto" class="form-control" id="foto"
                                aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                        </div>
                        <div id="date-picker-example"
                            class="mb-2 input-group flex-nowrap md-form md-outline input-with-post-icon datepicker"
                            inline="true" data-mdb-inline="true">
                            <span class="input-group-text" id="garansi" for="garansi">Tanggal Garansi</span>
                            <input placeholder="Select date" type="date" id="garansi" name="garansi"
                                class="form-control @error('garansi') is-invalid @enderror" value="{{ old('garansi') }}">
                            @error('garansi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                @endforeach
            </div>
            <div class="col-md-8">
                <div id="map"></div>
            </div>
        </div>
    </div>
    <script>
        //set map
        var map = L.map('map').setView([-7.05106088833702, 110.44420968701564], 14);

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
