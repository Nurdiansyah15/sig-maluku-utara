@extends('layout.main')
@section('content')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-auto text-center">
                <h1 class="modal-title">
                    Detail Fasilitas Keselamatan Lalu Lintas
                </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="https://images.unsplash.com/photo-1664575196412-ed801e8333a1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1471&q=80"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        @foreach ($data as $d)
                            <h3 class="card-title">{{ App\Models\Faskes::find($d->id)->jenis_faskes->nama }}</h3>
                            <ul class="list list-group-horizontal-md">
                                <li class="list-item"> Ruas jalan :
                                    {{ App\Models\Faskes::find($d->id)->ruas_jalan->nama }}</li>
                                <li class="list-item"> Tipe jalan : {{ $d->tipe_jalan }} </li>
                                <li class="list-item"> Lebar jalan : {{ $d->lebar_jalan }} </li>
                                <li class="list-item"> Pengadaan : {{ $d->pengadaan }} </li>
                                <li class="list-item"> Jumlah pemeliharaan : {{ $d->pemeliharaan }} kali</li>
                                <li class="list-item"> Garansi : {{ $d->garansi }} </li>
                                <li class="list-item"> Latitude : {{ $d->lat }}</li>
                                <li class="list-item"> Longitude : {{ $d->lng }}</li>
                            </ul>
                        @endforeach
                    </div>
                </div>
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
    </script>
@endsection
