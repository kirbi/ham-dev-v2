@extends('layoutadmin.app')

@section('content')
<br>
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <h2>LAPORAN PASIEN PERTAHUN</h2>
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
                        <form id="checkHiv" name="checkHiv" method="post" enctype="multipart/form-data" action="/admin/dashboard/pasien"  class="form-horizontal">
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
                                <label for="status_aktif" class="col-5">Status Aktif</label>
                                <select name="statusAktif" id="statusAktif" class="col-7 filter">
                                    <option value="">-- Pilih --</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                    <option value="Hilang Kontak">Hilang Kontak</option>
                                    <option value="Meninggal">Meninggal</option>
                                    <option value="Dirujuk">Dirujuk</option>
                                </select>
                            </div>
                            <div class="row p-2">
                                <label for="jenis_pasien" class="col-5">Jenis Pasien</label>
                                <select name="jenisPasien" id="jenisPasien" class="col-7 filter">
                                    <option value="">-- Pilih --</option>
                                    <option value="Baru">Baru</option>
                                    <option value="Rujukan">Rujukan</option>
                                </select>
                            </div>
                            <div class="row p-2">
                                <label for="entry point" class="col-5">Entry Point</label>
                                <select class="col-7 filter" id="entryPoint" name="entryPoint">
                                    <option value="">-- Pilih --</option>
                                    @foreach($entryPoint as $ep)
                                        <option value="{{$ep->id_entry_point}}">{{$ep->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row p-2">
                                <label for="pendidikan" class="col-5">Pendidikan Terakhir</label>
                                <select class="col-7 filter" id="pendidikan" name="pendidikan">
                                    <option value="">-- Pilih --</option>
                                    @foreach($pendidikan as $p)
                                        <option value="{{$p->id_pendidikan}}">{{$p->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row p-2">
                                <label for="pekerjaan" class="col-5">Pekerjaan</label>
                                <select class="col-7 filter" id="pekerjaan" name="pekerjaan">
                                    <option value="">-- Pilih --</option>
                                    @foreach($pekerjaan as $p)
                                        <option value="{{$p->id_pekerjaan}}">{{$p->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row p-2">
                                <label for="status_pernikahan" class="col-5">Status Pernikahan</label>
                                <select class="col-7 filter" id="statusPernikahan" name="statusPernikahan">
                                    <option value="">-- Pilih --</option>
                                    @foreach($statusPernikahan as $sp)
                                        <option value="{{$sp->id_status_pernikahan}}">{{$sp->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row p-2">
                                <label for="id_provinsi" class="col-5">Provinsi</label>
                                <select class="form-control col-7" id="id_provinsi" name="id_provinsi">
                                    <option value="">-- Pilih Provinsi --</option>
                                    @foreach($provinsi as $k)
                                    <option value="{{$k->id_provinsi}}">{{$k->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row p-2">
                                <label for="id_kabupaten" class="col-5">Kabupaten/ Kota</label>
                                <select class="form-control col-7 id_kabupaten" id="id_kabupaten" name="id_kabupaten">
                                </select>
                            </div>
                            <div class="row p-2">
                                <label for="id_kecamatan" class="col-5">Kecamatan</label>
                                <select class=" col-7 id_kecamatan" id="id_kecamatan" name="id_kecamatan" style="width: 100%;">
                                </select>
                            </div>
                            <div class="row p-2">
                                <label for="id_kecamatan" class="col-5">Kelurahan/Desa</label>
                                <select class=" col-7 id_desa" id="id_desa" name="id_desa" style="width: 100%;">
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
                                <button id="download"  type="submit" class="btn btn-primary"><i class="fas fa-download"></i> Download</button>
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#id_provinsi').change(function (e){
            var id = $('#id_provinsi').val();
            kabupaten(id,null);
        });
        $('#id_kabupaten').change(function (e){
            var id = $('#id_kabupaten').val();
            kecamatan(id,null);
        });
        $('#id_kecamatan').change(function (e){
            var id = $('#id_kecamatan').val();
            desa(id,null);
        });
        
        function desa(id,idk){
            $('#id_desa').empty();
            var url = '{{ route("optionDesa", ":id") }}';
            url = url.replace(':id', id);
            $.get(url, function (data) {
                $('#id_desa').append(data);
                $('#id_desa').val(idk);
            });
        }
        
        function kecamatan(id,idk){
            $('#id_kecamatan').empty();
            var url = '{{ route("optionKecamatan", ":id") }}';
            url = url.replace(':id', id);
            $.get(url, function (data) {
                $('#id_kecamatan').append(data);
                $('#id_kecamatan').val(idk);
            })
        }
        
        function kabupaten(id,idk){
            $('#id_kabupaten').empty();
            var url = '{{ route("optionKabupaten", ":id") }}';
            url = url.replace(':id', id);
            $.get(url, function (data) {
                $('#id_kabupaten').append(data);
                $('#id_kabupaten').val(idk)
            });
        }
    });
</script>
@endsection