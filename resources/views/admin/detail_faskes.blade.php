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
                    @foreach ($data as $d)
                        <img src="{{ url('/') }}/foto-aduan/{{ $d->foto }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-title">{{ App\Models\Faskes::find($d->id)->jenis_faskes->nama }}</h3>
                            <ul class="list list-group-horizontal-md">
                                <li class="list-item"> Ruas jalan :
                                    {{ App\Models\Faskes::find($d->id)->ruas_jalan->nama }}</li>
                                <li class="list-item"> Tipe jalan : {{ $d->tipe_jalan }} </li>
                                <li class="list-item"> Lebar jalan : {{ $d->lebar_jalan }} m</li>
                                <li class="list-item"> Jumlah pemeliharaan : {{ $d->pemeliharaan }} kali</li>
                                <li class="list-item"> Pengadaan : {{ $d->pengadaan }} </li>
                                <li class="list-item"> Garansi : {{ $d->garansi }} </li>
                                <li class="list-item"> Latitude : {{ $d->lat }}</li>
                                <li class="list-item"> Longitude : {{ $d->lng }}</li>
                            </ul>
                    @endforeach
                </div>
            </div>
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
                iconUrl: '{{ url('/') }}/assets/icon/rambu.svg'
            }),
            yellowIcon = new LeafIcon({
                iconUrl: '{{ url('/') }}/assets/icon/penunjuk.svg'
            }),
            blueIcon = new LeafIcon({
                iconUrl: '{{ url('/') }}/assets/icon/lampu.svg'
            });


        // A $( document ).ready() block.
        $(document).ready(function() {
            $.getJSON("{{ url('/') }}/fasilitas/json", function(data) {
                $.each(data, function(index) {


                    var html = '<div class="card" style="width: 18rem;">'
                    html +=
                        '<img src="{{ url('/') }}/foto-aduan/' + data[index].foto +
                        '" class="card-img-top" alt="...">'
                    html += '<div class="card-body">'
                    html +=
                        '<h5 class="card-title">' + data[index].jenis_faskes + '</h5>'
                    html += '<ul class="list list-group-horizontal-md">'
                    html +=
                        '<li class="list-item"> Ruas jalan  : ' + data[index].ruas_jalan + '</li>'
                    html += '<li class="list-item"> Tipe jalan  : ' + data[index].tipe_jalan +
                        '</li>'
                    html += '<li class="list-item"> Lebar jalan : ' + data[index].lebar_jalan +
                        ' m</li>'
                    html += '<li class="list-item"> Jumlah pemeliharaan : ' + data[index]
                        .pemeliharaan + ' kali</li>'
                    html += '<li class="list-item"> Pengadaan   : ' + data[index].pengadaan +
                        '</li>'
                    html += '<li class="list-item"> Garansi : ' + data[index].garansi + '</li>'
                    html += '<li class="list-item"> Latitude : ' + data[index].lat + '</li>'
                    html += '<li class="list-item"> Longitude : ' + data[index].lng + '</li>'
                    html += '</ul>'
                    html += '</div>'
                    html += '</div>'


                    if (data[index].id_jenis_faskes === 1) {
                        icon = greenIcon
                    } else if (data[index].id_jenis_faskes === 2) {
                        icon = blueIcon
                    } else if (data[index]
                        .id_jenis_faskes === 3) {
                        icon = yellowIcon
                    }


                    L.marker([data[index].lat, data[index].lng], {
                        icon
                    }).addTo(map).bindPopup(html);
                })
            });
        });
    </script>
@endsection
