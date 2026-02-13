@extends('layoutadmin.app')

@section('content')
<br>
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <h2>PASIEN KONSELING HIV</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Filter Data</h3>
                        </div>
                    </div>
                    <div class="card-body" id="filter">
                    <form id="konseling" name="konseling" method="post" enctype="multipart/form-data" action="/admin/download/konseling"  class="form-horizontal">
                            @csrf 
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
                                <label for="file" class="col-5">File</label>
                                <div class="col-7">
                                    <input type="radio" name="file" value="pdf" required>PDF</input>   
                                    <input type="radio" name="file" value="excel" required>Excel</input>
                                </div>
                            </div>
                            <div class="row p-2">
                                <label for="file" class="col-5"></label>
                                <button id="download"  type="submit" class="btn btn-primary"><i class="fas fa-download"></i> Download</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
            
        </div>
    </div>

</div>

@endsection