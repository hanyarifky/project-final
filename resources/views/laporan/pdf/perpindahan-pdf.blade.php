<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Sederhana</title>
    <style>
        @page{
            margin: 20px;
        }
        
        body{
            margin: 0;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #000;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            width: 80px;
            height: auto;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        td {
            text-align: center;
            /* width: 50px; */
        }
        
    </style>
</head>

<body>

    <div class="header">
        <img src="{{ asset('images/logo_kabupatentangerang_perda.png') }}" alt="Logo">
        <h1>Bermis Blok A2 Jl. Mawar</h1>
        <p class="sub-title">RT 01/ RW 03</p>
        <h2 class="title"><u>DAFTAR PERPINDAHAN</u></h2>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIK</th>
                <th>Tanggal Pindah</th>
                <th>Alamat Asal</th>
                <th>Alamat Tujuan</th>
                <th>Alasan Pindah</th>
                <th>Status Perpindahan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($perpindahans as $perpindahan)
                <tr>
                    <td>{{ $perpindahan->penduduk->nama }}</td>
                    <td>{{ $perpindahan->penduduk->nik }}</td>
                    <td>{{ \Carbon\Carbon::parse($perpindahan->tanggal_pindah)->format('d-m-Y') }}</td>
                    <td>{{ $perpindahan->alamat_asal }}</td>
                    <td>{{ $perpindahan->alamat_tujuan }}</td>
                    <td>{{ $perpindahan->alasan_pindah }} </td>
                    <td>{{ $perpindahan->status_perpindahan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
