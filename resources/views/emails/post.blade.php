<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Masyarakat vi Sistem Informasi Keselematan Jalan</title>
</head>

<body>

    <p>Ada laporan / aduan masyarakat dari:<br>
        Nama :<strong>{{ $nama }}</strong><br>
        No. HP:<strong>{{ $hp }}</strong><br>
        Alamat :<strong>{{ $alamat }}</strong><br>
        telah terjadi <strong>{{ $jenis }}</strong> di <strong>{{ $lokasi }}</strong><br>
        <img src="/foto-aduan/{{ $foto }}" alt="">

        <a href="https://www.google.co.id/maps/@<?php echo $maps; ?>,21z" target="_blank" rel="noopener noreferrer">Lihat
            Mpas</a>
    </p>
</body>

</html>
