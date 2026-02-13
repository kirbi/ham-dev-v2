<!DOCTYPE html>
<html>
<head>
    <title>Download Laporan PASIEN HIV</title>
    <style>
        table, th, td {
           border: 1px solid;
        }
        table {
           border-collapse: collapse;
        }
    </style>
</head>
<body>
    <table style="border: none;">
        <tr style="border-bottom: double;">
            <td style="width: 200px;border: none;">
                <img src="{{public_path('ham/kemenkes.png')}}" alt="KMENKES Logo" class="brand-image" style="width: 200px;">
            </td>
            <td style="width:700px;text-align: center;border: none;">
                <div style="text-align: center;">
                    <h3 style="margin: 0px; font-size: 24px;"> PASIEN HIV TAHUN {{$tahun}}</h3>
                    <h3 style="margin: 0px; font-size: 24px;">HKBP AIDS MINISTRY BALIGE</h3>
                    <span style="margin: 0px; font-size: 12px;">Jl. Gereja No.17, Lumban Dolok Haume Bange, Kec. Balige, Toba, Sumatera Utara</span>
                </div>
            </td>
            <td style="width: 200px;border: none;">
                <img src="{{public_path('ham/logo.png')}}" alt="HAM Logo" class="brand-image" style="height: 100px;">
            </td>
        </tr>
        <tr>
            <td colspan="3" style="border: none;">
                <hr style="margin: 0px;">
                <hr style="margin: 2px;">
            </td>
        </tr>
    </table>
    <br>
    <div style=" page-break-after:always;">
        <table style="width: 100%; font-size:12px;">
            <thead>
                <th>NO</th>
                <th>NAMA</th>
                <th>JENIS KELAMIN</th>
                <th>NIK</th>
                <th>NO KK</th>
                <th>TANGGAL LAHIR</th>
                <th>UMUR</th>
                <th>ENTRY POINT</th>
                <th>PENDIDIKAN</th>
                <th>PEKERJAAN</th>
                <th>STATUS PERNIKAHAN</th>
                <th>PANESUM</th>
                <th>STATUS HIV</th>
                <th>JENIS PASIEN</th>
                <th>STATUS AKTIF</th>
            </thead>
            <tbody>
                @foreach($datas as $data)
                <tr>
                    <td style="width: 20px;">{{$data['i']}}</td>
                    <td style="width: 70px;">{{$data['nama']}}</td>
                    <td style="width: 40px;">{{$data['jenis_kelamin']}}</td>
                    <td style="width: 40px;">{{$data['nik']}}</td>
                    <td style="width: 40px;">{{$data['kk']}}</td>
                    <td style="width: 50px;">{{$data['tgl_lahir']}}</td>
                    <td style="width: 30px;">{{$data['umur']}}</td>
                    <td style="width: 60px;">{{$data['entry_point']}}</td>
                    <td style="width: 40px;">{{$data['pendidikan']}}</td>
                    <td style="width: 60px;">{{$data['pekerjaan']}}</i></td>
                    <td style="width: 40px;">{{$data['status_pernikahan']}}</td>
                    <td style="width: 40px;">{{$data['panesum']}}</i></td>
                    <td style="width: 30px;">{{$data['status_hiv']}}</i></td>
                    <td style="width: 40px;">{{$data['jenis_pasien']}}</i></td>
                    <td style="width: 40px;">{{$data['status_aktif']}}</i></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>

