@extends('layout.main')
@section('content')
    @if (session()->has('success'))
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <img src="https://dishub.jakarta.go.id/wp-content/uploads/2018/08/cropped-LOGO-KEMENTERIAN-PERHUBUNGAN.png"
                        class="rounded me-2" alt="..." width="25">
                    <strong class="me-auto">BPTD XXIV MALUKU UTARA</strong>
                    <small>{{ date('Y-m-d H:i:s') }}</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-md-2 mt-3" style="font-size: 9pt">


            <div class="card p-1">
                <b class="btn btn-info btn-sm mb-4">Fasilitas Keselamatan Jalan</b>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="apj" onchange="faskes()">
                    <label class="form-check-label" for="apj">Alat Penerangan Jalan ( APJ )</label>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="rll" onchange="faskes()">
                    <label class="form-check-label" for="rll">Rambu Lalu Lintas</label>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="rppj" onchange="faskes()">
                    <label class="form-check-label" for="rppj">Rambu Pendahulu Petunjuk Jurusan ( RPPJ
                        )</label>
                </div>
            </div>

        </div>
        <div class="col-md-10 p-3">
            <div id="map"></div>
        </div>
    </div>
    <script>
        //set tile google
        //set map
        var map = L.map('map').setView([0.7380068288877225, 127.49720707342343], 11);

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



        function faskess(n) {


            $.getJSON("fasilitas/json/" + n, function(data) {
                $.each(data, function(index) {
                    var idJenisFaskes = data[index].id_jenis_faskes
                    console.log(idJenisFaskes);

                    var html = '<div class="card" style="width: 18rem;">'
                    html += '<img src="/foto-faskes/' + data[index].foto +
                        '" class="card-img-top" alt="...">'
                    html += '<div class="card-body text-center">'

                    html +=
                        '<b>' + data[index].keterangan +
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
        }
        // });

        function faskes() {
            map.eachLayer(function(layer) {
                map.removeLayer(layer)
            });
            L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
                maxZoom: 20,
                subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
            }).addTo(map);
            
            if (document.getElementById("apj").checked == true) {
                faskess(1);
            }
            if (document.getElementById("rll").checked == true) {
                faskess(2);
            }
            if (document.getElementById("rppj").checked == true) {
                faskess(3);
            }
        }


        //set toasts
        $(document).ready(function() {
            $('.toast').toast('show');
        });
    </script>
@endsection
