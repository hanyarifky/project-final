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
        <h2 class="title"><u>DAFTAR KEMATIAN</u></h2>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Umur</th>
                <th>Tanggal Kematian</th>
                <th>Waktu Kematian</th>
                <th>Sebab Kematian</th>
                <th>Tempat Kematian</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kematians as $kematian)
                <tr>
                    <td>{{ $kematian->penduduk->nama }}</td>
                    <td>{{ $kematian->umur }}</td>
                    <td>{{ \Carbon\Carbon::parse($kematian->tanggal_kematian)->format('d-m-Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($kematian->waktu_kematian)->format('H:i') }}</td>
                    <td>{{ Str::ucfirst($kematian->sebab_kematian) }} </td>
                    <td>{{ $kematian->tempat_kematian }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
