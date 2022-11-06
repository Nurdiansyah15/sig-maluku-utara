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
                    <div class="card-body">
                        @foreach ($data as $d)
                            <?php $id = $d->id; ?>
                            <img src="/foto-faskes/{{ $d->foto }}" class="card-img-top" alt="...">
                            <h3 class="card-title">{{ App\Models\Faskes::find($d->id)->jenis_faskes->keterangan }}</h3>
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
                iconUrl: '/assets/icon/rambu.svg'
            }),
            yellowIcon = new LeafIcon({
                iconUrl: '/assets/icon/penunjuk.svg'
            }),
            blueIcon = new LeafIcon({
                iconUrl: '/assets/icon/lampu.svg'
            });


        // A $( document ).ready() block.
        $(document).ready(function() {
            $.getJSON("/fasilitas/json/cari/{{ $id }}", function(data) {
                $.each(data, function(index) {
                    var idJenisFaskes = data[index].id_jenis_faskes
                    console.log(idJenisFaskes);

                    var html = '<div class="card" style="width: 18rem;">'
                    html += '<img src="/foto-faskes/' + data[index].foto +
                        '" class="card-img-top" alt="...">'
                    html += '<div class="card-body text-center">'

                    html +=
                        '<b>' + data[index].jenis +
                        '</b><br><br>'
                    html +=
                        'Ruas Jalan  : ' + data[index].jalan +
                        '<br>'
                    html += 'Tipe Jalan  : ' + data[index].tipe_jalan +
                        '<br>'
                    html += 'Lebar Jalan : ' + data[index].lebar_jalan +
                        ' meter<br>'
                    html += 'Pengadaan   : ' + data[index].pengadaan +
                        '<br>'
                    html += 'Pemeliharaan : ' + data[index]
                        .pemeliharaan + ' kali<br>'
                    html += 'Garansi : ' + data[index].garansi + '<br>'
                    html += 'Latitude : ' + data[index].lat + '<br>'
                    html += 'Longitude : ' + data[index].lng + '<br>'

                    html += '</div>'
                    html += '</div>'
                    if (data[index].id_jenis_faskes == 1) {
                        vicon = blueIcon;
                    } else if (data[index].id_jenis_faskes == 2) {
                        vicon = greenIcon;
                    } else if (data[index].id_jenis_faskes == 3) {
                        vicon = yellowIcon;
                    }
                    L.marker([data[index].lat, data[index].lng], {
                        icon: vicon
                        //penggunaan icon marker
                    }).addTo(map).bindPopup(html);
                })
            });
        });
    </script>
@endsection
