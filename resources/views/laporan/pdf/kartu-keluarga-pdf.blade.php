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
            margin: 0 auto;
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
            width: 100px;
        }
        
    </style>
</head>

<body>

    <div class="header">
        <img src="{{ asset('images/logo_kabupatentangerang_perda.png') }}" alt="Logo">
        <h1>Bermis Blok A2 Jl. Mawar</h1>
        <p class="sub-title">RT 01/ RW 03</p>
        <h2 class="title"><u>DAFTAR KARTU KELUARGA</u></h2>
    </div>

    
    <table>
        <thead>
            <tr>
                <th>Nomor Kartu Keluarga</th>
                <th>Nama Kepala Keluarga</th>
                <th>RT</th>
                <th>RW</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kartu_keluargas as $kk)
                <tr>
                    <td style="">{{ $kk->nomor_kartu_keluarga }}</td>
                    <td style="" >{{ $kk->nama_kepala_keluarga }}</td>
                    <td>{{ $kk->rt }}</td>
                    <td>{{ $kk->rw }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
