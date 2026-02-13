<!DOCTYPE html>
<html>
<head>
    <title>Download Laporan Kegiatan Sosialisasi HIV</title>
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
                    <h3 style="margin: 0px; font-size: 24px;"> KONSELING DAN TES HIV TAHUN {{$tahun}}</h3>
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
    <div >
        <table style="width: 100%; font-size:12px;">
            <tr>
                <th>NO</th>
                <th>KEGIATAN</th>
                <th>TANGGAL</th>
                <th>LOKASI</th>
                <th>TARGET KEGIATAN</th>
                <th>KABUPATEN</th>
                <th>KECAMATAN</th>
                <th>PESERTA HADIR</th>
                <th>NARA HUBUNG</th>
            </tr>
            @foreach($datas as $data)
            <tr>
                <td style="width: 30px;">{{$data['i']}}</td>
                <td style="width: 100px;">{{$data['nama_kegiatan']}}</td>
                <td style="width: 70px;">{{$data['tanggal_kegiatan']}}</td>
                <td style="width: 100px;">{{$data['tempat_kegiatan']}}</td>
                <td style="width: 330px;">{{$data['target_kegiatan']}}</td>
                <td style="width: 100px;">{{$data['kabupaten']}}</td>
                <td style="width: 100px;">{{$data['kecamatan']}}</td>
                <td style="width: 50px;">{{$data['peserta_hadir']}}</td>
                <td style="width: 100px;">{{$data['nama_narahubung']}} <br><i>{{$data['kontak_narahubung']}}</i></td>
            </tr>
            @endforeach
        </table>
    </div>

</body>

</html>

