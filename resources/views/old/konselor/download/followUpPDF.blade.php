<!DOCTYPE html>
<html>
<head>
    <title>Download Laporan FOLLOW UP PERAWATAN PASIEN & TERAPI ANTIRETROVIRAL</title>
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
                    <h3 style="margin: 0px; font-size: 24px;">FOLLOW UP PERAWATAN PASIEN & TERAPI ANTIRETROVIRAL TAHUN {{$tahun}}</h3>
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
                <th>TANGGAL DATANG</th>
                <th>BB & TB</th>
                <th>STATUS FUNGSIONAL</th>
                <th>STAD. WHO</th>
                <th>HAMIL</th>
                <th>INFEKSI OPORTUNISTIK</th>
                <th>OBAT IO</th>
                <th>STATUS TB</th>
                <th>PPK</th>
                <th>OBAT ARV</th>
                <th>DOSIS ARV</th>
                <th>ADHERENCE ART</th>
                <th>EFEK SAMPING ART</th>
                <th>JLH CD4</th>
                <th>DIBERI KONDOM</th>
                <th>DIRUJUK KESPESIALIS</th>
            </thead>
            <tbody>
                @foreach($datas as $data)
                <tr>
                    <td style="width: 20px;">{{$data['i']}}</td>
                    <td style="width: 50px;">{{$data['nama']}}</td>
                    <td style="width: 40px;">{{$data['jenis_kelamin']}}</td>
                    <td style="width: 40px;">{{$data['nik']}}</td>
                    <td style="width: 50px;">{{$data['tgl_followup']}}</td>
                    <td style="width: 30px;">{{$data['bb']}}<br>{{$data['tb']}}</td>
                    <td style="width: 30px;">{{$data['status_fungsional']}}</td>
                    <td style="width: 40px;">{{$data['who']}}</td>
                    <td style="width: 30px;">{{$data['hamil']}}</td>
                    <td style="width: 40px;">{{$data['infeksi_oportunistik']}}</i></td>
                    <td style="width: 40px;">{{$data['obat_io']}}</i></td>
                    <td style="width: 40px;">{{$data['tb']}}</i></td>
                    <td style="width: 30px;">{{$data['ppk']}}</i></td>
                    <td style="width: 40px;">{{$data['arv']}}</i></td>
                    <td style="width: 40px;">{{$data['dosis_arv']}}</i></td>
                    <td style="width: 40px;">{{$data['adherence_art']}}</i></td>
                    <td style="width: 50px;">{{$data['efek_art']}}</i></td>
                    <td style="width: 30px;">{{$data['cd4']}}</i></td>
                    <td style="width: 30px;">{{$data['kondom']}}</i></td>
                    <td style="width: 30px;">{{$data['rujuk']}}</i></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>

