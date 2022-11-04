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
        <div class="col-md-3 p-3">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="rll">
                <label class="form-check-label" for="rll">Rambu Lalu Lintas</label>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="rppj">
                <label class="form-check-label" for="rppj">Rambu Pendahulu Petunjuk Jurusan ( RPPJ
                    )</label>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="apj">
                <label class="form-check-label" for="apj">Alat Penerangan Jalan ( APJ )</label>
            </div>
        </div>
        <div class="col-md-9 p-3">
            <div id="map"></div>
        </div>
    </div>
    <script>
        //set map
        var map = L.map('map').setView([-7.05106088833702, 110.44420968701564], 12);

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
            $.getJSON("fasilitas/json", function(data) {
                $.each(data, function(index) {
                    L.marker([data[index].lat, data[index].lng], {
                        icon: yellowIcon //penggunaan icon marker
                    }).addTo(map).bindPopup("koordinat : " + data[index].lat + "," + data[index]
                        .lng);
                })
            });
        });

        //set tile google
        L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }).addTo(map);

        //set toasts
        $(document).ready(function() {
            $('.toast').toast('show');
        });
    </script>
@endsection
