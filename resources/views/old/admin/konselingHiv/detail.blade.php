@extends('layoutadmin.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 dflex justify-content-between">
            <div>
                <h2>Detail Data Pasien Konseling</h2>
            </div>
            <div>
                <a href="/admin/konselingHiv/download/{{$data->id_konseling_hiv}}" class="btn btn-secondary"><i class="fas fa-download"></i> Download</a>
                <a href="/admin/konselingHiv/index" class="btn btn-primary"><i class="fas fa-home"></i> Home</a>
            </div>
        </div>
    </div>
</div>
<div class="alert alert-success" style="display:none">
    <p class='success'></p>
</div>
<div class="alert alert-danger print-error-msg-delete" style="display:none">
    <ul></ul>
</div>
<br>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Medis</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">
                        <div class="row">
                            <div class="col-3">
                                <b>No Rekam Medis</b>
                            </div>
                            <div class="col-7">
                                <span>{{$data->pasien->no_rekam_medis}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <b>No Registrasi</b>
                            </div>
                            <div class="col-7">
                                <span>{{$data->no_registrasi}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <b>Tanggal Konseling</b>
                            </div>
                            <div class="col-7">
                                <span>{{$data->tanggal_konseling}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Klien</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">
                        <div class="row">
                            <div class="col-3">
                                <b>Nama</b>
                            </div>
                            <div class="col-7">
                                <span>{{$data->pasien->nama}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <b>Tanggal Lahir</b>
                            </div>
                            <div class="col-7">
                                <span>{{$data->pasien->tanggal_lahir}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <b>Tempat Lahir</b>
                            </div>
                            <div class="col-7">
                                <span>{{$data->pasien->tempat_lahir}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <b>Jenis Kelamin</b>
                            </div>
                            <div class="col-7">
                                <span>{{$data->pasien->jenis_kelamin}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <b>NIK</b>
                            </div>
                            <div class="col-7">
                                <span>{{$data->pasien->nik}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <b>NO KK</b>
                            </div>
                            <div class="col-7">
                                <span>{{$data->pasien->no_kk}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <b>Status Pernikahan</b>
                            </div>
                            <div class="col-7">
                                <span>{{$data->statusPernikahan->nama}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <b>No HP</b>
                            </div>
                            <div class="col-7">
                                <span>{{$data->pasien->no_hp}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <b>Alamat</b>
                            </div>
                            <div class="col-7">
                                <span>{{$data->alamat}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <b>Kabupaten/Kota</b>

                            </div>
                            <div class="col-7">
                                <span>{{$data->kabupaten->nama}}</span>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <b>Pendidikan Terakhir</b>
                            </div>
                            <div class="col-7">
                                <span>{{$data->pendidikan->nama}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <b>Pekerjaan</b>
                            </div>
                            <div class="col-7">
                                <span>{{$data->pekerjaan->nama}}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Jika Pasien Laki-laki</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">
                        <div class="row">
                            <div class="col-6">
                                <b>Memiliki Pasangan Perempuan</b>
                            </div>
                            <div class="col-6">
                                <span>{{$data->ada_pasangan_perempuan}}</span>
                            </div>
                            <div class="col-6">
                                <b>Pasangan Hamil</b>
                            </div>
                            <div class="col-6">
                                <span>{{$data->pasangan_hamil}}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Jika Pasien Perempuan</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">
                        <div class="row">
                            <div class="col-3">
                                <b>Jumlah Pasangan Laki-laki</b>
                            </div>
                            <div class="col-7">
                                <span>{{$data->jumlah_pasangan_laki_laki}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <b>Jumlah Anak Kandung</b>
                            </div>
                            <div class="col-7">
                                <span>{{$data->jumlah_anak_kandung}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <b>Umur Anak Terakhir</b>
                            </div>
                            <div class="col-7">
                                <span>{{$data->umur_anak_terakhir}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <b>Status Kehamilan</b>
                            </div>
                            <div class="col-7">
                                <span>{{$data->status_kehamilan}}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Kelompok Resiko</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-primary" id="createKelompokResikoKonseling"> <i class="fas fa-plus"> Kelompok Resiko</i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">
                        <table class="table">
                            <thead>
                                <th>Kelompok</th>
                                <th>Lama</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @if(count($data->kelompokResikoKonseling)>0)
                                @foreach($data->kelompokResikoKonseling as $dkrk)
                                <tr>
                                    <td>
                                        {{$dkrk->kelompokResiko->nama}}
                                    </td>
                                    <td>
                                        {{$dkrk->lama_tahun}} Tahun {{$dkrk->lama_bulan}} Bulan
                                    </td>
                                    <td>
                                        <button class="btn btn-secondary" id="editKelompokResikoKonseling" data-id="{{$dkrk->id_kelompok_resiko_konseling}}"><i class="fas fa-edit">Edit</i></button>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Info Konseling HIV</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-primary" id="createInfoTesHiv"> <i class="fas fa-plus"> Info Tes HIV</i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">
                        <div class="row">
                            <div class="col-3">
                                <b>Tanggal Konseling Pra Tes HIV</b>
                            </div>
                            <div class="col-7">
                                <span>{{$data->tanggal_konseling_pra_tes_hiv}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <b>Status Pasien</b>
                            </div>
                            <div class="col-7">
                                <span>{{$data->status_pasien}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <b>Alasan Tes HIV</b>
                            </div>
                            <div class="col-7">
                                <span>{{$data->alasanTes->nama}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <b>Info Tes HIV</b>
                            </div>
                            <div class="col-7">
                                <table class="table">
                                    <thead>
                                        <th>Sumber Info</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        @if(count($data->infoTesHivKonseling)>0)
                                        @foreach($data->infoTesHivKonseling as $ithk)
                                        <tr>
                                            <td>
                                                {{$ithk->infoTesHiv->nama}}
                                            </td>
                                            <td>
                                                <button class="btn btn-secondary" id="editInfoTesHivKonseling" data-id="{{$ithk->id_info_tes_hiv_konseling}}"><i class="fas fa-edit">Edit</i></button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <b>Pernah Tes HIV</b>
                            </div>
                            <div class="col-7">
                                <span>{{$data->pernah_tes_hiv_sebelumnya}}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Kajian Tingkat Resiko</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-primary" id="createKajianResikoHiv"> <i class="fas fa-plus"> Kajian Tingkat Resiko</i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">
                        <div class="row">
                            <table class="table">
                                <thead>
                                    <th>Resiko</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    @if(count($data->kajianResikoHiv)>0)
                                    @foreach($data->kajianResikoHiv as $ktr)
                                    <tr>
                                        <td>
                                            {{$ktr->tingkatResiko->nama}}
                                        </td>
                                        <td>
                                            {{$ktr->tanggal}}
                                        </td>
                                        <td>
                                            <button class="btn btn-secondary" id="editKajianResikoHiv" data-id="{{$ktr->id_kajian_resiko_hiv}}"><i class="fas fa-edit">Edit</i></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <b>Kesediaan Tes HIV</b>
                            </div>
                            <div class="col-7">
                                <span>{{$data->kesediaan_tes_hiv}}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tes HIV</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-primary" id="createTesHivKonseling"> <i class="fas fa-plus"> Hasil Tes HIV</i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">
                        @if($data->pernah_tes_hiv_sebelumnya == 'Ya')
                        <div class="row">
                            <div class="col-3">
                                <b>Hasil Tes HIV Sebelumnya</b>
                            </div>
                            <div class="col-7">
                                @if($data->rekapTesHivKonseling)
                                <b>{{$data->rekapTesHivKonseling->hasil}}</b> Tanggal {{$data->rekapTesHivKonseling->hasil}} di {{$data->rekapTesHivKonseling->tempat_tes}}

                                <button class="btn btn-secondary" id="editRekapTesHivKonseling" data-id="{{$data->rekapTesHivKonseling->id_rekap_tes_hiv_konseling}}"><i class="fas fa-edit">Edit</i></button>
                                @endif
                                @if(!$data->rekapTesHivKonseling)
                                <button class="btn btn-secondary" id="createRekapTesHivKonseling" data-id="{{$data->tesHivKonseling->id_tes_hiv_konseling}}"><i class="fas fa-plus">Tambah Data History Tes HIV</i></button>

                                @endif

                            </div>
                        </div>
                        @endif
                        @if($data->kesediaan_tes_hiv == 'Ya')
                            @if($data->tesHivKonseling)
                            <div class="row">
                                <div class="col-3">
                                    <b>Tanggal Tes HIV</b>
                                </div>
                                <div class="col-7">
                                    <span>{{$data->tesHivKonseling->tanggal_tes}}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <b>Jenis Tes HIV</b>
                                </div>
                                <div class="col-7">
                                    <span>{{$data->tesHivKonseling->jenis_tes}}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <b>Hasil Tes R1</b>
                                </div>
                                <div class="col-7">
                                    <span>{{$data->tesHivKonseling->tes_r1}}</span> / <b>Reagen</b> <i>{{$data->tesHivKonseling->reagen_r1}}</i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <b>Hasi Tes R2</b>
                                </div>
                                <div class="col-7">
                                    <span>{{$data->tesHivKonseling->tes_r2}}</span> / <b>Reagen</b> <i>{{$data->tesHivKonseling->reagen_r2}}</i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <b>Hasil Tes R3</b>
                                </div>
                                <div class="col-7">
                                    <span>{{$data->tesHivKonseling->tes_r3}}</span> / <b>Reagen</b> <i>{{$data->tesHivKonseling->reagen_r3}}</i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <b>Kesimpulan Tes HIV</b>
                                </div>
                                <div class="col-7">
                                    <b><span>{{$data->tesHivKonseling->hasil}}</span></b>
                                    <button class="btn btn-secondary" id="editTesHivKonseling" data-id="{{$data->tesHivKonseling->id_tes_hiv_konseling}}"><i class="fas fa-edit">Edit</i></button>
                                </div>
                            </div>
                            @endif
                        @endif
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Catatan Konseling</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">
                        <div class="row">
                            <div class="col-3">
                                <b>Catatan Konseling</b>
                            </div>
                            <div class="col-7">
                                <span>{{$data->catatan_konseling}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Konseling Pasca Tes HIV</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">
                        <div class="row">
                            <div class="col-3">
                                <b>Tanggal Konseling Pasca Tes HIV</b>
                            </div>
                            <div class="col-7">
                                <span>{{$data->tanggal_konseling_pasca_tes_hiv}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card card-success card-outline">
                    <div class="card-body box-profile">
                        <h5>Detail Konselor Pasien</h5>
                        <div class="row">
                            <div class="col-12">
                                @if(!empty($data->konselor()))
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Nama</b> <a class="float-right">{{$data->konselor->nama}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Email</b> <a class="float-right">{{$data->konselor->email}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Nomor HP</b> <a class="float-right">{{$data->konselor->no_hp}}</a>
                                    </li>
                                </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Kelompok Resiko HIV-->
<div class="modal fade" id="ajaxModel1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading1"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="kelompokResikoKonseling" name="kelompokResikoKonseling" class="form-horizontal">
                    <input type="hidden" name="id_kelompok_resiko_konseling" id="id_kelompok_resiko_konseling" value="">
                    <input type="hidden" name="id_konseling1" id="id_konseling1" value="{{$data->id_konseling_hiv}}" readonly>

                    <div class="form-group row">
                        <label for="id_kelompok_resiko" class="col-sm-5 control-label">Kelompok Resiko</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="id_kelompok_resiko" name="id_kelompok_resiko">
                                @foreach($kelompokResiko as $kr)
                                <option value="{{$kr->id_kelompok_resiko}}">{{$kr->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="lama_tahun" class="col-sm-5 control-label">Lama (Tahun)</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="lama_tahun" name="lama_tahun" value="" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lama_bulan" class="col-sm-5 control-label">Lama (Bulan)</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="lama_bulan" name="lama_bulan" placeholder="" value="">
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn1" value="create">Simpan</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Info TES HIV-->
<div class="modal fade" id="ajaxModel2" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading2"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="infoTesHivKonseling" name="infoTesHivKonseling" class="form-horizontal">
                    <input type="hidden" name="id_info_tes_hiv_konseling" id="id_info_tes_hiv_konseling" value="">
                    <input type="hidden" name="id_konseling2" id="id_konseling2" value="{{$data->id_konseling_hiv}}" readonly>

                    <div class="form-group row">
                        <label for="id_info_tes_hiv" class="col-sm-5 control-label">Sumber Info Tes HIV</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="id_info_tes_hiv" name="id_info_tes_hiv">
                                @foreach($infoTesHiv as $ith)
                                <option value="{{$ith->id_info_tes_hiv}}">{{$ith->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn2" value="create">Simpan</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Kajian Resiko HIV-->
<div class="modal fade" id="ajaxModel3" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading3"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="kajianResikoHiv" name="kajianResikoHiv" class="form-horizontal">
                    <input type="hidden" name="id_kajian_resiko_hiv" id="id_kajian_resiko_hiv" value="">
                    <input type="hidden" name="id_konseling3" id="id_konseling3" value="{{$data->id_konseling_hiv}}" readonly>

                    <div class="form-group row">
                        <label for="id_tingkat_resiko_hiv" class="col-sm-5 control-label">Tingkat Resiko</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="id_tingkat_resiko_hiv" name="id_tingkat_resiko_hiv">
                                @foreach($tingkatResikoHiv as $tr)
                                <option value="{{$tr->id_tingkat_resiko_hiv}}">{{$tr->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tanggal" class="col-sm-5 control-label">Tanggal</label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="" required="">
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn3" value="create">Simpan</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Hasil Tes HIV-->
<div class="modal fade" id="ajaxModel4" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading4"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="tesHiv" name="tesHiv" class="form-horizontal">
                    <input type="hidden" name="id_tes_hiv" id="id_tes_hiv" value="">
                    <input type="hidden" name="id_konseling4" id="id_konseling4" value="{{$data->id_konseling_hiv}}" readonly>
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="jenis_tes" class="control-label">Jenis Tes</label>
                            <select class="form-control" id="jenis_tes" name="jenis_tes">
                                <option value="">-- Pilih --</option>
                                <option value="Rapid Test">Rapid Test</option>
                                <option value="ELISA">ELISA</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="tanggal_tes" class="control-label">Tanggal Tes</label>
                            <input type="date" class="form-control" id="tanggal_tes" name="tanggal_tes" value="" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="tes_r1" class="control-label">Tes Reagen 1</label>
                            <select class="form-control" id="tes_r1" name="tes_r1">
                                <option value="">-- Pilih --</option>
                                <option value="Non Reaktif">Non Reaktif</option>
                                <option value="Reaktif">Reaktif</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="reagen_r1" class="control-label">Nama Reagen Tes 1</label>
                            <input type="text" class="form-control" id="reagen_r1" name="reagen_r1" value="" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="tes_r2" class="control-label">Tes Reagen 2</label>
                            <select class="form-control" id="tes_r2" name="tes_r2">
                                <option value="">-- Pilih --</option>
                                <option value="Non Reaktif">Non Reaktif</option>
                                <option value="Reaktif">Reaktif</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="reagen_r2" class="control-label">Nama Reagen Tes 2</label>
                            <input type="text" class="form-control" id="reagen_r2" name="reagen_r2" value="" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="tes_r3" class="control-label">Tes Reagen 3</label>
                            <select class="form-control" id="tes_r3" name="tes_r3">
                                <option value="">-- Pilih --</option>
                                <option value="Non Reaktif">Non Reaktif</option>
                                <option value="Reaktif">Reaktif</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="reagen_r3" class="control-label">Nama Reagen Tes 3</label>
                            <input type="text" class="form-control" id="reagen_r3" name="reagen_r3" value="" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="hasil" class="col-sm-5 control-label">Hasil</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="hasil" name="hasil">
                                <option value="">-- Pilih --</option>
                                <option value="Non Reaktif">Non Reaktif</option>
                                <option value="Reaktif">Reaktif</option>
                                <option value="Indeterminate">Indeterminate</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn4" value="create">Simpan</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Rekap Tes HIV-->
<div class="modal fade" id="ajaxModel5" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading5"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="rekapTesHiv" name="rekapTesHiv" class="form-horizontal">
                    <input type="hidden" name="id_rekap_tes_hiv_konseling" id="id_rekap_tes_hiv_konseling" value="">
                    <input type="hidden" name="id_konseling5" id="id_konseling5" value="{{$data->id_konseling_hiv}}" readonly>
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="tanggal" class="control-label">Tanggal Tes</label>
                            <input type="date" class="form-control" id="tanggal-tes" name="tanggal" value="" required="">
                        </div>
                        <div class="col-6">
                            <label for="hasil" class="control-label">Hasil</label>
                            <select class="form-control" id="hasil-tes" name="hasil">
                                <option value="">-- Pilih --</option>
                                <option value="Non Reaktif">Non Reaktif</option>
                                <option value="Reaktif">Reaktif</option>
                                <option value="Indeterminate">Indeterminate</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-3">
                            <labe for="tempat_tes" class="form-control">Tempat</labe>

                        </div>
                        <div class="col-sm-6">
                            <textarea name="tempat_tes" id="tempat_tes" cols="30" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn5" value="create">Simpan</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //kelompokResiko
        $('#createKelompokResikoKonseling').click(function() {
            $('#saveBtn1').val("create-product");
            $('#id_kelompok_resiko_konseling').val('');
            $('#kelompokResikoKonseling').trigger("reset");
            $('#modelHeading1').html("Tambah Kelompok Resiko HIV");
            $('#ajaxModel1').modal('show');
        });

        $('#saveBtn1').click(function(e) {
            e.preventDefault();
            $(this).html('Menyimpan..');

            $.ajax({
                data: $('#kelompokResikoKonseling').serialize(),
                url: "{{ route('admin.kelompokResikoKonseling.add') }}",
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $('#kelompokResikoKonseling').trigger("reset");
                        $('#ajaxModel1').modal('hide');
                        $('#saveBtn1').html('Simpan Data');
                        $(".alert-success").css('display', 'block');
                        $('.success').html("Data Berhasil Disimpan.");
                        $(".print-error-msg").css('display', 'none');
                        location.reload();

                    } else {
                        console.log('Error:', data);
                        $(".alert-success").css('display', 'none');
                        $('#saveBtn1').html('Simpan Data');
                        printErrorMsg(data.error);
                    }
                }
            });
        });
        $('#editKelompokResikoKonseling').click(function() {
            var id_kelompok_resiko_konseling = $(this).data('id');
            $.get("{{ route('kelompokResikoKonseling.index') }}" + '/' + id_kelompok_resiko_konseling + '/edit', function(data) {
                console.log(data);
                $('#modelHeading1').html("Ubah Data Kelompok Resiko HIV");
                $('#saveBtn1').html("Simpan");
                $('#ajaxModel1').modal('show');
                $('#lama_bulan').val(data.lama_bulan);
                $('#lama_tahun').val(data.lama_tahun);
                $('#id_kelompok_resiko').val(data.id_kelompok_resiko);
                $('#id_kelompok_resiko_konseling').val(data.id_kelompok_resiko_konseling);
            })
        });

        //infoTeshiv
        $('#createInfoTesHiv').click(function() {
            $('#saveBtn2').val("create-product");
            $('#id_info_tes_hiv_konseling').val('');
            $('#infoTesHivKonseling').trigger("reset");
            $('#modelHeading2').html("Tambah Sumber Informasi Tes HIV");
            $('#ajaxModel2').modal('show');
        });

        $('#saveBtn2').click(function(e) {
            e.preventDefault();
            $(this).html('Menyimpan..');

            $.ajax({
                data: $('#infoTesHivKonseling').serialize(),
                url: "{{ route('admin.infoTesHivKonseling.add') }}",
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $('#infoTesHivKonseling').trigger("reset");
                        $('#ajaxModel2').modal('hide');
                        $('#saveBtn2').html('Simpan Data');
                        $(".alert-success").css('display', 'block');
                        $('.success').html("Data Berhasil Disimpan.");
                        $(".print-error-msg").css('display', 'none');
                        location.reload();

                    } else {
                        console.log('Error:', data);
                        $(".alert-success").css('display', 'none');
                        $('#saveBtn2').html('Simpan Data');
                        printErrorMsg(data.error);
                    }
                }
            });
        });
        $('#editInfoTesHivKonseling').click(function() {
            var id_kelompok_resiko_konseling = $(this).data('id');
            $.get("{{ route('infoTesHivKonseling.index') }}" + '/' + id_kelompok_resiko_konseling + '/edit', function(data) {
                console.log(data);
                $('#modelHeading2').html("Ubah Data Sumber Info Tes HIV");
                $('#saveBtn2').html("Simpan");
                $('#ajaxModel2').modal('show');
                $('#id_info_tes_hiv').val(data.id_info_tes_hiv);
                $('#id_info_tes_hiv_konseling').val(data.id_info_tes_hiv_konseling);
            })
        });

        //kajianResiko
        $('#createKajianResikoHiv').click(function() {
            $('#saveBtn3').val("create-product");
            $('#id_kelompok_resiko_konseling').val('');
            $('#kajianResikoHiv').trigger("reset");
            $('#modelHeading3').html("Tambah Kajian Tingkat Resiko HIV");
            $('#ajaxModel3').modal('show');
        });

        $('#saveBtn3').click(function(e) {
            e.preventDefault();
            $(this).html('Menyimpan..');

            $.ajax({
                data: $('#kajianResikoHiv').serialize(),
                url: "{{ route('admin.kajianResikoHiv.add') }}",
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $('#kajianResikoHiv').trigger("reset");
                        $('#ajaxModel3').modal('hide');
                        $('#saveBtn3').html('Simpan Data');
                        $(".alert-success").css('display', 'block');
                        $('.success').html("Data Berhasil Disimpan.");
                        $(".print-error-msg").css('display', 'none');
                        location.reload();

                    } else {
                        console.log('Error:', data);
                        $(".alert-success").css('display', 'none');
                        $('#saveBtn3').html('Simpan Data');
                        printErrorMsg(data.error);
                    }
                }
            });
        });
        $('#editKajianResikoHiv').click(function() {
            var id_kajian_resiko_hiv = $(this).data('id');
            $.get("{{ route('kajianResikoHiv.index') }}" + '/' + id_kajian_resiko_hiv + '/edit', function(data) {
                console.log(data);
                $('#modelHeading3').html("Ubah Data Tingkat Kajian Resiko HIV");
                $('#saveBtn3').html("Simpan");
                $('#ajaxModel3').modal('show');
                $('#tanggal').val(data.tanggal);
                $('#id_tingkat_resiko_hiv').val(data.id_tingkat_resiko_hiv);
                $('#id_kajian_resiko_hiv').val(data.id_kajian_resiko_hiv);
            })
        });

        //testHiv
        $('#createTesHivKonseling').click(function() {
            $('#saveBtn4').val("create-product");
            $('#id_tes_hiv_konseling').val('');
            $('#tesHiv').trigger("reset");
            $('#modelHeading4').html("Tambah Tes HIV");
            $('#ajaxModel4').modal('show');
        });

        $('#saveBtn4').click(function(e) {
            e.preventDefault();
            $(this).html('Menyimpan..');

            $.ajax({
                data: $('#tesHiv').serialize(),
                url: "{{ route('admin.tesHivKonseling.add') }}",
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $('#tesHiv').trigger("reset");
                        $('#ajaxModel4').modal('hide');
                        $('#saveBtn4').html('Simpan Data');
                        $(".alert-success").css('display', 'block');
                        $('.success').html("Data Berhasil Disimpan.");
                        $(".print-error-msg").css('display', 'none');
                        location.reload();

                    } else {
                        console.log('Error:', data);
                        $(".alert-success").css('display', 'none');
                        $('#saveBtn4').html('Simpan Data');
                        printErrorMsg(data.error);
                    }
                }
            });
        });
        $('#editTesHivKonseling').click(function() {
            var id_tes_hiv_konseling = $(this).data('id');
            $.get("{{ route('tesHivKonseling.index') }}" + '/' + id_tes_hiv_konseling + '/edit', function(data) {
                console.log(data);
                $('#modelHeading4').html("Ubah Data Tes HIV");
                $('#saveBtn4').html("Simpan");
                $('#ajaxModel4').modal('show');
                $('#tes_r1').val(data.tes_r1);
                $('#tes_r2').val(data.tes_r2);
                $('#tes_r3').val(data.tes_r3);
                $('#reagen_r1').val(data.reagen_r1);
                $('#reagen_r2').val(data.reagen_r2);
                $('#reagen_r3').val(data.reagen_r3);
                $('#jenis_tes').val(data.jenis_tes);
                $('#tanggal_tes').val(data.tanggal_tes);
                $('#hasil').val(data.hasil);
                $('#id_tes_hiv_konseling').val(data.id_tes_hiv_konseling);
            })
        });

        //rekaptestHiv
        $('#createRekapTesHivKonseling').click(function() {
            $('#saveBtn5').val("create-product");
            $('#id_rekap_tes_hiv_konseling').val('');
            $('#rekapTesHiv').trigger("reset");
            $('#modelHeading5').html("Tambah Rekap Tes HIV Sebelumnya");
            $('#ajaxModel5').modal('show');
        });

        $('#saveBtn5').click(function(e) {
            e.preventDefault();
            $(this).html('Menyimpan..');

            $.ajax({
                data: $('#rekapTesHiv').serialize(),
                url: "{{ route('admin.rekapTesHivKonseling.add') }}",
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $('#rekapTesHiv').trigger("reset");
                        $('#ajaxModel5').modal('hide');
                        $('#saveBtn5').html('Simpan Data');
                        $(".alert-success").css('display', 'block');
                        $('.success').html("Data Berhasil Disimpan.");
                        $(".print-error-msg").css('display', 'none');
                        location.reload();

                    } else {
                        console.log('Error:', data);
                        $(".alert-success").css('display', 'none');
                        $('#saveBtn5').html('Simpan Data');
                        printErrorMsg(data.error);
                    }
                }
            });
        });
        $('#editRekapTesHivKonseling').click(function() {
            var id_rekap_tes_hiv_konseling = $(this).data('id');
            $.get("{{ route('rekapTesHivKonseling.index') }}" + '/' + id_rekap_tes_hiv_konseling + '/edit', function(data) {
                console.log(data);
                $('#modelHeading5').html("Ubah Data Tes HIV");
                $('#saveBtn5').html("Simpan");
                $('#ajaxModel5').modal('show');
                $('#tempat_tes').val(data.tempat_tes);
                $('#tanggal-tes').val(data.tanggal);
                $('#hasil-tes').val(data.hasil);
                $('#id_rekap_tes_hiv_konseling').val(data.id_rekap_tes_hiv_konseling);
            })
        });

        //error
        function printErrorMsg(msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display', 'block');
            $.each(msg, function(key, value) {
                $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
            });
        }

        function printErrorMsgDelete(msg) {
            $(".print-error-msg-delete").find("ul").html('');
            $(".print-error-msg-delete").css('display', 'block');
            $.each(msg, function(key, value) {
                $(".print-error-msg-delete").find("ul").append('<li>' + value + '</li>');
            });
        }
    });
</script>



@endsection