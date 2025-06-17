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
        <h2 class="title"><u>DAFTAR KELAHIRAN</u></h2>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nama Bayi</th>
                <th>NIK</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Berat bayi (kg)</th>
                <th>Panjang Bayi (cm)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kelahirans as $kelahiran)
                <tr>
                    <td>{{ $kelahiran->penduduk->nama }}</td>
                    <td>{{ $kelahiran->penduduk->nik }}</td>
                    <td>{{ ucfirst($kelahiran->penduduk->jenis_kelamin) }}</td>
                    <td>{{ \Carbon\Carbon::parse($kelahiran->penduduk->tanggal_lahir)->format('d m Y') }}</td>
                    <td>{{ $kelahiran->berat_bayi }} </td>
                    <td>{{ $kelahiran->panjang_bayi }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
