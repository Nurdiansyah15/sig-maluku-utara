@extends('layout.main')
@section('content')
    <div class="container">
        {{-- toast --}}
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
        <div class="row justify-content-center">
            <div class="col-md-auto text-center">
                <h1 class="modal-title">
                    Fasilitas Keselamatan Lalu Lintas
                </h1>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <div style="height: 300px" id="map"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <a href="/fasilitas/tambah" type="submit" class="btn btn-primary mb-2"><i class="fa fa-plus"></i>
                    Tambah</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-10">
                <table class="table table-striped" id="tabel-faskes">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
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
                                <td>{{ $d->jenis_faskes }}</td>
                                <td>{{ $d->ruas_jalan }}</td>
                                <td>{{ $d->tipe_jalan }}</td>
                                <td>{{ $d->lat }}</td>
                                <td>{{ $d->lng }}</td>
                                <td>
                                    <a href="/fasilitas/detail/{{ $d->id }}" class="btn btn-warning"> Detail</a>
                                    <a href="/fasilitas/edit/{{ $d->id }}" class="btn btn-success"> Edit</a>
                                    {{-- <a href="/fasilitas/delete/{{ $d->id }}" class="btn btn-danger"> Delete</a> --}}
                                    <form action="/fasilitas/delete/{{ $d->id }}" method="POST" class="d-inline">
                                        @csrf
                                        <button class="btn btn-danger"
                                            onclick="confirm('Apakah Anda yakin ingin menghapus data ini?')"><i
                                                class="fa fa-trash"></i> Hapus</button>
                                    </form>
                                </td>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
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
        }
        // });


        faskess(1);

        faskess(2);

        faskess(3);



        //set toasts
        $(document).ready(function() {
            $('.toast').toast('show');
        });
    </script>
@endsection
