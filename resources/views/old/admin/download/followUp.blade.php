@extends('layoutadmin.app')

@section('content')
<br>
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <h2>GRAFIK FOLLOW UP ART PASIEN PERBULAN</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Filter Data</h3>
                        </div>
                    </div>
                    <div class="card-body" id="filter">
                        <form id="checkHiv" name="checkHiv" method="post" enctype="multipart/form-data" action="/admin/download/follow-up"  class="form-horizontal  row">
                            @csrf    
                            <div class="col-12 col-md-6">
                                <div class="row p-2">
                                    <label for="tahun" class="col-5">Tahun</label>
                                    <select name="tahun" id="tahun" class="col-7 filter" required>
                                        <option value="">-- Pilih --</option>
                                        @foreach($tahun as $thn)
                                            <option value="{{$thn->tahun}}">{{$thn->tahun}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row p-2">
                                    <label for="bulan" class="col-5">Bulan</label>
                                    <select name="bulan" id="bulan" class="col-7 filter">
                                        <option value="">-- Semua --</option>
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                                <div class="row p-2">
                                    <label for="cd4" class="col-5">Jumlah CD 4</label>
                                    <select name="operator" id="operator" class="col-4 filter">
                                        <option value="=">(=) Sama Dengan</option>
                                        <option value=">">(>) Lebih Besar Dari</option>
                                        <option value="<">(<) Lebih Kecil Dari</option>
                                    </select>
                                    <input class="col-3 filter" type="number" name="cd4" id="cd4" placeholder="450"></input>
                                </div>
                                <div class="row p-2">
                                    <label for="statusFungsional" class="col-5">Status Fungsional</label>
                                    <select class="col-7 filter" id="statusFungsional" name="statusFungsional">
                                        <option value="">-- Pilih --</option>
                                        @foreach($statusFungsional as $sf)
                                            <option value="{{$sf->id_status_fungsional}}">{{$sf->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row p-2">
                                    <label for="hamil" class="col-5">Hamil</label>
                                    <select name="hamil" id="hamil" class="col-7 filter">
                                        <option value="">-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                                <div class="row p-2">
                                    <label for="infeksiOportunistik" class="col-5">Infeksi Oportunistik</label>
                                    <select name="infeksiOportunistik" id="infeksiOportunistik" class="col-7 filter">
                                        <option value="">-- Pilih --</option>
                                        @foreach($infeksiOportunistik as $ip)
                                            <option value="{{$ip->id_infeksi_oportunistik}}">{{$ip->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row p-2">
                                    <label for="file" class="col-5">File</label>
                                    <select name="file" id="file" class="col-7 filter">
                                        <option value="pdf">PDF</option>
                                        <option value="excel">EXCEL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="row p-2">
                                    <label for="jenis_kelamin" class="col-5">Jenis Kelamin</label>
                                    <select class="col-7 filter" id="jenis_kelamin" name="jenis_kelamin">
                                        <option value="">-- Semua --</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="row p-2">
                                    <label for="statusTb" class="col-5">Status TB</label>
                                    <select class="col-7 filter" id="statusTb" name="statusTb">
                                        <option value="">-- Pilih --</option>
                                        @foreach($statusTb as $st)
                                            <option value="{{$st->id_status_tb}}">{{$st->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row p-2">
                                    <label for="ppk" class="col-5">PPK</label>
                                    <select class="col-7 filter" id="ppk" name="ppk">
                                        <option value="">-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                                <div class="row p-2">
                                    <label for="adherenceArt" class="col-5">Adherence ART</label>
                                    <select class="col-7 filter" id="adherenceArt" name="adherenceArt">
                                        <option value="">-- Pilih --</option>
                                        @foreach($adherenceArt as $aa)
                                            <option value="{{$aa->id_adherence_art}}">{{$aa->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row p-2">
                                    <label for="efekSamping" class="col-5">Efek Samping</label>
                                    <select class="col-7 filter" id="efekSamping" name="efekSamping">
                                        <option value="">-- Pilih --</option>
                                        @foreach($efekSamping as $es)
                                            <option value="{{$es->id_efek_samping}}">{{$es->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row p-2">
                                    <label for="rujukKeSpesialis" class="col-5">Rujuk Ke Spesialis</label>
                                    <select class="col-7 filter" id="rujukKeSpesialis" name="rujukKeSpesialis">
                                        <option value="">-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                                <div class="row p-2">
                                    <label for="diberiKondom" class="col-5">Diberi kondom</label>
                                    <select class="col-7 filter" id="diberiKondom" name="diberiKondom">
                                        <option value="">-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-12 d-flex justify-content-center">
                                <button id="download" class="btn btn-primary"><i class="fas fa-download"></i> Download</button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>

</div>
@endsection