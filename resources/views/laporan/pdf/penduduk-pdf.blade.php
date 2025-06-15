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
            text-align: left;
        }
        
    </style>
</head>

<body>

    <div class="header">
        <img src="{{ asset('images/logo_kabupatentangerang_perda.png') }}" alt="Logo">
        <h1>RUKUN TETANGGA 01/03</h1>
        <p class="sub-title">Bermis Blok A2 Jl. Mawar</p>
        <h2 class="title">DAFTAR PENDUDUK</h2>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIK</th>
                <th>Jenis Kelamin</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Agama</th>
                <th>Status Perkawinan</th>
                <th>Pekerjaan</th>
                <th>Nomor Kartu Keluarga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penduduks as $penduduk)
                <tr>
                    <td>{{ $penduduk->nama }}</td>
                    <td>{{ $penduduk->nik }}</td>
                    <td>{{ $penduduk->jenis_kelamin }}</td>
                    <td>{{ $penduduk->tempat_lahir }}</td>
                    <td>{{ $penduduk->tanggal_lahir }}</td>
                    <td>{{ $penduduk->alamat }}</td>
                    <td>{{ $penduduk->agama }}</td>
                    <td>{{ $penduduk->status_perkawinan }}</td>
                    <td>{{ $penduduk->pekerjaan }}</td>
                    <td>
                        @if ($penduduk->kartuKeluarga == null)
                            Tida Ada
                        @else
                            {{ $penduduk->kartuKeluarga->nomor_kartu_keluarga }}
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
