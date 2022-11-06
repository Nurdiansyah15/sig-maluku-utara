@extends('layout.main')
@section('content')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-auto text-center">
                <h1 class="modal-title">
                    Ubah Fasilitas Keselamatan Lalu Lintas
                </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                @foreach ($data as $dt)
                    <form action="/fasilitas/edit/{{ $dt->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2 row">
                            <label for="id_jenis_faskes" class="col-sm-4 form-label">Jenis Fasilitas</label>
                            <div class="col-sm-8">
                                <select name="id_jenis_faskes"
                                    class="form-select  @error('id_jenis_faskes') is-invalid @enderror"
                                    value="{{ $dt->id_jenis_faskes }}" id="id_jenis_faskes">
                                    <option>Choose...</option>
                                    @foreach ($data_jenis_faskes as $d)
                                        <option @if ($dt->id_jenis_faskes === $d->id) selected @endif
                                            value="{{ $d->id }}">
                                            {{ $d->nama }}</option>
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
                            <label for="id_ruas_jalans" class="col-sm-4 form-label" id="id_ruas_jalan" for="pengadaan">Ruas
                                Jalan</label>
                            <div class="col-sm-8">
                                <select name="id_ruas_jalans"
                                    class="form-select  @error('id_ruas_jalans') is-invalid @enderror"
                                    value="{{ old('id_ruas_jalans') }}" id="id_ruas_jalans">
                                    <option>Choose...</option>
                                    @foreach ($data_ruas_jalan as $d)
                                        <option @if ($dt->id_ruas_jalans === $d->id) selected @endif
                                            value="{{ $d->id }}">
                                            {{ $d->nama }}</option>
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
                            <label for="lat" class="col-sm-4 form-label">Latitude (klik pada peta)</label>
                            <div class="col-sm-8">
                                <input type="float" name="lat" class="form-control @error('lat') is-invalid @enderror"
                                    id="lat" value="{{ $dt->lat }}">
                            </div>
                            @error('lat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-2 row">
                            <label for="lng" class="col-sm-4 form-label">Longitude (klik pada peta)</label>
                            <div class="col-sm-8">
                                <input type="float" name="lng" class="form-control @error('lng') is-invalid @enderror"
                                    id="lng" value="{{ $dt->lng }}">
                            </div>
                            @error('lng')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-2 row">
                            <label for="tipe_jalan" class="col-sm-4 form-label" id="tipe_jalan">Tipe Jalan</label>
                            <div class="col-sm-8">
                                <input type="text" name="tipe_jalan"
                                    class="form-control @error('tipe_jalan') is-invalid @enderror" id="tipe_jalan"
                                    value="{{ $dt->tipe_jalan }}">
                            </div>
                            @error('tipe_jalan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-2 row">
                            <label for="lebar_jalan" class="col-sm-4 form-label" id="lebar_jalan">Lebar Jalan
                                (meter)
                            </label>
                            <div class="col-sm-8">
                                <input min="0" type="text" name="lebar_jalan"
                                    class="form-control @error('lebar_jalan') is-invalid @enderror" id="lebar_jalan"
                                    value="{{ $dt->lebar_jalan }}">
                            </div>
                            @error('lebar_jalan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-2 row">
                            <label for="pemeliharaan" class="col-sm-4 form-label" id="pemeliharaan">Jumlah
                                Pemeliharaan</label>
                            <div class="col-sm-8">
                                <input type="number" min="0" name="pemeliharaan"
                                    class="form-control @error('pemeliharaan') is-invalid @enderror" id="pemeliharaan"
                                    value="{{ $dt->pemeliharaan }}">
                            </div>
                            @error('pemeliharaan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div id="date-picker-example" class="mb-2 row" inline="true" data-mdb-inline="true">
                            <label class="col-sm-4 form-label" id="pengadaan" for="pengadaan">Tanggal Pengadaan</label>
                            <div class="col-sm-8">
                                <input placeholder="Select date" type="date" id="pengadaan" name="pengadaan"
                                    class="form-control @error('pengadaan') is-invalid @enderror"
                                    value="{{ $dt->pengadaan }}">
                            </div>
                            @error('pengadaan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div id="date-picker-example" class="mb-2 row" inline="true" data-mdb-inline="true">
                            <label class="col-sm-4 form-label" id="garansi" for="garansi">Tanggal Garansi</label>
                            <div class="col-sm-8">
                                <input placeholder="Select date" type="date" id="garansi" name="garansi"
                                    class="form-control @error('garansi') is-invalid @enderror"
                                    value="{{ $dt->garansi }}">
                            </div>
                            @error('garansi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-2 row">
                            <label for="foto" class="col-sm-4 form-label" id="foto">Foto Fasilitas</label>
                            <div class="col-sm-8">
                                <input value="{{ $dt->foto }}" type="file" name="foto"
                                    class="form-control @error('foto') is-invalid @enderror" id="foto"
                                    aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                            </div>
                            @error('foto')
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
                @foreach ($data as $d)
                    <div id="map"></div>
                @endforeach
            </div>
        </div>
    </div>
    <script>
        //set map
        var map = L.map('map').setView([{{ $d->lat }}, {{ $d->lng }}], 18);

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
