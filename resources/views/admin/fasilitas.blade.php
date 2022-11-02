@extends('layout.main')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-auto text-center">
                <h1 class="modal-title">
                    Fasilitas Keselamatan Lalu Lintas
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary mb-2">Tambah Faskes</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-10">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Jenis Faskes</th>
                            <th scope="col">Ruas Jalan</th>
                            <th scope="col">Tipe Jalan</th>
                            <th scope="col">Latitude</th>
                            <th scope="col">Longitude</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                            <tr>
                                <th>{{ $d->id }}</th>
                                <td>{{ App\Models\Faskes::find($d->id_jenis_faskes)->jenis_faskes->nama }}</td>
                                <td>{{ App\Models\Faskes::find($d->id_ruas_jalans)->ruas_jalan->nama }}</td>
                                <td>{{ $d->tipe_jalan }}</td>
                                <td>{{ $d->lat }}</td>
                                <td>{{ $d->lng }}</td>
                                <td>
                                    <a href="#" class="btn btn-warning"> Detail</a>
                                    <a href="#" class="btn btn-success"> Edit</a>
                                    <a href="#" class="btn btn-danger"> Delete</a>
                                </td>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
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

        //template icon marker
        var LeafIcon = L.Icon.extend({
            options: {
                iconSize: [30, 87],
                iconAnchor: [15, 60],
                popupAnchor: [0, -35]
            }
        });

        //instansiasi template icon marker
        var greenIcon = new LeafIcon({
                iconUrl: 'assets/icon/rambu.svg'
            }),
            yellowIcon = new LeafIcon({
                iconUrl: 'assets/icon/penunjuk.svg'
            }),
            blueIcon = new LeafIcon({
                iconUrl: 'assets/icon/lampu.svg'
            });


        // A $( document ).ready() block.
        $(document).ready(function() {
            $.getJSON("data/json", function(data) {
                $.each(data, function(index) {
                    L.marker([data[index].lat, data[index].lng], {
                        icon: yellowIcon //penggunaan icon marker
                    }).addTo(map).bindPopup("koordinat : " + data[index].lat + "," + data[index]
                        .lng);
                })
            });
        });
    </script>
@endsection
