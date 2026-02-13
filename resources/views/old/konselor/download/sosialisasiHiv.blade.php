@extends('layoutkonselor.app')

@section('content')
<br>
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <h2>DOWNLOAD LAPORAN KEGIATAN SOSIALISASI HIV</h2>
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
                        <form id="checkHiv" name="checkHiv" method="post" enctype="multipart/form-data" action="/konselor/download/sosialisasi-hiv"  class="form-horizontal">
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
                                <label for="id_kabupaten" class="col-5">Kabupaten/ Kota</label>
                                <select class="form-control select2 col-7 filter " id="id_kabupaten" name="id_kabupaten">
                                        <option value="">Pilih</option>
                                    @foreach($kabupaten as $k)
                                        <option value="{{$k->id_kabupaten}}">{{$k->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row p-2">
                                <label for="id_kecamatan" class="col-5">Kecamatan</label>
                                <select class=" col-7 filter" id="id_kecamatan" name="id_kecamatan" style="width: 100%;">
                                </select>
                            </div>
                            <div class="row p-2">
                                <label for="file" class="col-5">File</label>
                                <select name="file" id="file" class="col-7 filter">
                                    <option value="pdf">PDF</option>
                                    <option value="excel">EXCEL</option>
                                </select>
                            </div>
                            <div class="row p-2">
                                <label for="file" class="col-5"></label>
                                <button id="download" class="btn btn-primary"><i class="fas fa-download"></i> Download</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script type="text/javascript">
    $(function() {
        $('#id_kabupaten').change(function (e){
            var id = $('#id_kabupaten').val();
            var url = '{{ route("optionKecamatan", ":id") }}';
            url = url.replace(':id', id);
            $.get(url, function (data) {
                $('#id_kecamatan').append(data);
            })
        });
       
    });
</script>
@endsection