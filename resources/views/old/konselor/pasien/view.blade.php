@extends('layoutkonselor.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 dflex justify-content-between">
            <div>
                <h2>Detail Data Pasien</h2>
            </div>
            <div>
                <a href="/konselor/pasien/download/{{$data->id_pasien}}" class="btn btn-secondary"><i class="fas fa-download"></i> Download</a>
                <a href="/konselor/pasien" class="btn btn-primary"><i class="fas fa-home"></i> Home</a>
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
            <div class="col-12 col-md-3">
                <div class="row">
                    <div class="col-12">
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <h3 class="profile-username text-center">{{$data->nama}}</h3>
                                <p class="text-muted text-center">{{$data->pekerjaan->nama}}</p>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Tanggal Lahir</b> <a class="float-right">{{$data->tanggal_lahir}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Tempat Lahir</b> <a class="float-right">{{$data->tempat_lahir}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Jenis Kelamin</b> <a class="float-right">{{$data->jenis_kelamin}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>NIK</b> <a class="float-right">{{$data->nik}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>NO KK</b> <a class="float-right">{{$data->no_kk}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>No HP</b> <a class="float-right">{{$data->no_hp}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>No REG Nasional</b> <a class="float-right">{{$data->no_reg_nasional}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>No REK Medis</b> <a class="float-right">{{$data->no_rekam_medis}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>No BPJS</b> <a class="float-right">{{$data->no_bpjs}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Nama Ibu Kandung</b> <a class="float-right">{{$data->ibu_kandung}}</a>
                                    </li>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Pendidikan Terakhir</b> <a class="float-right">{{$data->pendidikan->nama}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Status Pernikahan</b> <a class="float-right">{{$data->statusPernikahan->nama}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Jenis Pasien</b> <a class="float-right">{{$data->jenis_pasien}}</a>
                                    </li>
                                    @if($data->jenis_pasien == 'Rujukan')
                                        <li class="list-group-item">
                                            <b>Tanggal Rujuk Masuk</b> <a class="float-right">{{$data->tanggal_rujuk_masuk}}</a>
                                        </li>
                                    @endif
                                    <li class="list-group-item">
                                        <b>Status Aktif</b> <a class="float-right">{{$data->status_aktif}}</a>
                                    </li>
                                    @if($data->status_aktif == 'Dirujuk')
                                        <li class="list-group-item">
                                            <b>Tanggal Rujuk Keluar</b> <a class="float-right">{{$data->tanggal_rujuk_keluar}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Tempat Rujuk Keluar</b> <a class="float-right">{{$data->tempat_rujuk_keluar}}</a>
                                        </li>
                                    @endif
                                    @if($data->status_aktif == 'Meninggal')
                                        <li class="list-group-item">
                                            <b>Tanggal Meninggal</b> <a class="float-right">{{$data->tanggal_meninggal}}</a>
                                        </li>
                                    @endif
                                    <li class="list-group-item">
                                        <b>Alamat</b> <a class="float-right">{{$data->alamat}}</a>
                                    </li>
                                    
                                    <li class="list-group-item">
                                        <b>Provinsi</b> <a class="float-right">{{isset($data->id_provinsi)?$data->provinsi->nama : '-'}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Kabupaten/Kota</b> <a class="float-right">{{isset($data->id_kabupaten)?$data->kabupaten->nama : '-'}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Kecamatan</b> <a class="float-right">{{isset($data->id_kecamatan)?$data->kecamatan->nama : '-'}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Kelurahan/Desa</b> <a class="float-right">{{isset($data->id_desa)?$data->desa->nama : '-'}}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--Konselor Start-->
                    <div class="col-12">
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
                    <!--Konselor End-->
                    <!--Status HIV Start-->
                    <div class="col-12">
                        <div class="card card-warning card-outline">
                            <div class="card-body box-profile">
                                <div class="d-flex justify-content-between">
                                    <h5>Status HIV</h5>
                                    @if($data->status_hiv == 'Negatif')
                                    <h3 class="text-success">{{$data->status_hiv}}</h3>
                                    @else
                                    <h3 class="text-danger">{{$data->status_hiv}}</h3>
                                    @endif
                                </div>
                                @if($data->status_hiv == 'Negatif' || $data->status_hiv == 'AIDS')
                                <a class="btn btn-danger btn-sm btn-block" href="javascript:void(0)" id="positifHiv" data-id="{{$data->id_pasien}}"> <i class="fa fa-plus"></i> Ubah Positif HIV</a>
                                @endif
                                @if($data->status_hiv == 'Positif' || $data->status_hiv == 'AIDS')
                                    <a class="btn btn-success btn-sm btn-block" href="javascript:void(0)" id="negatifHiv" data-id="{{$data->id_pasien}}"> <i class="fa fa-minus"></i> Ubah Ke Negatif HIV</a>
                                    @if($data->status_hiv == 'Positif')
                                    <a class="btn btn-warning btn-sm btn-block" href="javascript:void(0)" id="hivAids" data-id="{{$data->id_pasien}}"> <i class="fa fa-plus"></i> Ubah Ke HIV AIDS</a>
                                    @endif
                                    <div class="row">
                                        <div class="col-12">Indikasi Inisiasi ART
                                            <ul class="list-group list-group-unbordered mb-3">
                                                <li class="list-group-item">
                                                    <b>Status HIV</b>
                                                    <a class="float-right">{{$data->statusHiv->nama}}</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Tanggal Masuk (Mulai Pengobatan)</b> <a class="float-right">{{$data->tanggal_masuk}}</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Tanggal Terkonfirmasi + HIV</b> <a class="float-right">{{$data->tanggal_konfirmasi_hiv}}</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Tempat Terkonfirmasi HIV</b> <a class="float-right">{{$data->tempat_konfirmasi_hiv}}</a>
                                                </li>
                                                @if($data->status_hiv == 'AIDS')
                                                <li class="list-group-item">
                                                    <b>Tanggal Terkonfirmasi AIDS</b> <a class="float-right">{{$data->tanggal_konfirmasi_aids}}</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Tempat Terkonfirmasi AIDS</b> <a class="float-right">{{$data->tempat_konfirmasi_aids}}</a>
                                                </li>
                                                @endif
                                                <li class="list-group-item">
                                                    <b>Entry Point</b> <a class="float-right">{{$data->entryPoint->nama}}</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Indikasi Inisiasi ART</b> <a class="float-right">{{$data->iiart->nama}}</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Paduan ART</b> <a class="float-right">{{$data->paduanArt->nama}}</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Nama Pengawas Minum Obat (PMO)</b> <a class="float-right">{{$data->nama_pmo}}</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Hubungan PMO</b> <a class="float-right">{{$data->hubungan_pmo}}</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Alamat PMO</b> <a class="float-right">{{$data->alamat_pmo}}</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>No HP PMO</b> <a class="float-right">{{$data->no_hp_pmo}}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <a class="btn btn-danger btn-sm btn-block" href="javascript:void(0)" id="editPositifHiv" data-id="{{$data->id_pasien}}"> <i class="fa fa-plus"></i> Ubah Data HIV</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!--Status HIV End-->
                    
                    <!--Faktor Resiko-->
                    <div class="col-12">
                        <div class="card card-success card-outline">
                            <div class="card-body box-profile">
                                <h5>Faktor Resiko Pasien</h5>
                                <a class="btn btn-success btn-sm btn-block" href="javascript:void(0)" id="createFaktorResiko"> <i class="fa fa-plus"></i> Tambah Data</a>
                                <div class="row">
                                    <div class="col-12">
                                        @if(!empty($data->faktorResikoPasien()))
                                        <ul class="list-group list-group-unbordered mb-3">
                                            @foreach($data->faktorResikoPasien as $fr)
                                                <li class="list-group-item">
                                                    <b>{{$fr->faktorResiko->nama}}</b>
                                                    <a class="btn btn-success btn-sm float-right editFaktorResiko" href="javascript:void(0)" id="editFaktorResiko" data-id="{{$fr->id_faktor_resiko_pasien}}"> <i class="fas fa-edit"></i></a>
                                                    <a class="btn btn-danger btn-sm btn-sm float-right deleteFaktorResiko" href="javascript:void(0)" id="deleteFaktorResiko" data-id="{{$fr->id_faktor_resiko_pasien}}"> <i class="fas fa-trash"></i></a>
                                                </li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--faktor resiko End-->
                </div>
            </div>
            <div class="col-12 col-md-9">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h5>Riwayat Keluarga / Mitra Seksual / Mitra Penasum</h5>
                                <a class="btn btn-success btn-sm float-right" href="javascript:void(0)" id="createMitraSeksual"> <i class="fa fa-plus"></i> Tambah Data</a>
                            </div>
                            <div class="card-body">
                                @if(!empty($data->riwayatMitraSeksuals))
                                <table class="table">
                                    <thead>
                                        <th>Nama</th>
                                        <th>Umur</th>
                                        <th>Hubungan</th>
                                        <th>Status HIV</th>
                                        <th>Komsumsi ART</th>
                                        <th>No Reg Nasional</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        @foreach($data->riwayatMitraSeksuals as $rms)
                                        <tr>
                                            <td>{{$rms->nama}}</td>
                                            <td>{{$rms->umur}} Tahun {{$rms->umur_bulan}} Bulan</td>
                                            <td>
                                            <td>{{$rms->hubunganMitra->nama}}</td>
                                            <td>{{$rms->statusHiv->nama}}</td>
                                            <td>{{$rms->komsumsi_art}}</td>
                                            <td>{{$rms->no_reg_nasional}}</td>
                                            <td>
                                                <a class="btn btn-success btn-sm float-right editMitraSeksual" href="javascript:void(0)" id="editMitraSeksual" data-id="{{$rms->id_riwayat_mitra_seksual}}"> <i class="fas fa-edit" title="Edit"></i></a>
                                                <a class="btn btn-danger btn-sm float-right deleteMitraSeksual" href="javascript:void(0)" id="deleteMitraSeksual" data-id="{{$rms->id_riwayat_mitra_seksual}}" title="Hapus"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif
                            </div>
                        </div>
                    </div>

                    @if($data->status_hiv == 'Positif' || $data->status_hiv == 'AIDS')
                    <div class="col-12">
                        <div class="card card-success card-outline">
                            <div class="card-header">
                                <h5>Riwayat Terapi Antiretroviral</h5>
                                @if(empty($data->riwayatTerapiArt))
                                <a class="btn btn-success btn-sm float-right" href="javascript:void(0)" id="createRiwayatTerapiArt"> <i class="fa fa-plus"></i> Tambah Data</a>
                                @endif
                                @if(!empty($data->riwayatTerapiArt))
                                <a class="btn btn-success btn-sm float-right editRiwayatTerapiArt" href="javascript:void(0)" id="editRiwayatTerapiArt" data-id="{{$data->riwayatTerapiArt->id_riwayat_terapi_art}}"> <i class="fas fa-edit"></i> Edit Data</a>
                                <a class="btn btn-danger btn-sm float-right deleteRiwayatTerapiArt" href="javascript:void(0)" id="deleteRiwayatTerapiArt" data-id="{{$data->riwayatTerapiArt->id_riwayat_terapi_art}}"> <i class="fas fa-trash"></i> Hapus</a>
                                @endif
                            </div>
                            <div class="card-body">
                                @if(!empty($data->riwayatTerapiArt))
                                <div class="row">
                                    <dt class="col-4">Pernah menerima ART</dt>
                                    <dd class="col-8">{{$data->riwayatTerapiArt->pernah_menerima}}</dd>
                                </div>
                                    @if($data->riwayatTerapiArt->pernah_menerima == 'Ya')
                                    <div class="row">
                                        <dt class="col-4">Paduan ART</dt>
                                        <dd class="col-8">{{$data->riwayatTerapiArt->paduanArt->nama}}</dd>
                                    </div>
                                    <div class="row">
                                        <dt class="col-4">Tempat Terapi ART</dt>
                                        <dd class="col-8">{{$data->riwayatTerapiArt->tempatTerapi->nama}}</dd>
                                    </div>
                                    <div class="row">
                                        <dt class="col-4">Jenis Terapi ART</dt>
                                        <dd class="col-8">{{$data->riwayatTerapiArt->jenisTerapi->nama}}</dd>
                                    </div>
                                    <div class="row">
                                        <dt class="col-4">Dosis</dt>
                                        <dd class="col-8">{{$data->riwayatTerapiArt->dosis_art}}</dd>
                                    </div>
                                    <div class="row">
                                        <dt class="col-4">Lama Penggunaan</dt>
                                        <dd class="col-8">{{$data->riwayatTerapiArt->lama_penggunaan}}</dd>
                                    </div>
                                    @endif

                                @endif
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="col-12">
                        <div class="card card-warning card-outline">
                            <div class="card-header">
                                <h5>Pemeriksaan Klinis dan Laboratorium</h5>
                                <a class="btn btn-success btn-sm float-right" href="javascript:void(0)" id="createPemeriksaanKlinis"> <i class="fa fa-plus"></i> Tambah Data</a>
                            </div>
                            <div class="card-body">
                                @if(!empty($data->pemeriksaanKlinis))
                                <table class="table">
                                    <thead>
                                        <th>Tahap</th>
                                        <th>Tanggal</th>
                                        <th>Stad. WHO</th>
                                        <th>Berat Badan</th>
                                        <th>Status Fungsional</th>
                                        <th>CD4</th>
                                        <th>Viral Load</th>
                                        <th>Lain-lain</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        @foreach($data->pemeriksaanKlinis as $pk)
                                        <tr>
                                            <td>{{$pk->kategoriPemeriksaan->nama}}</td>
                                            <td>{{$pk->tanggal_pemeriksaan}}</td>
                                            <td>{{$pk->standar_klinis}}</td>
                                            <td>{{$pk->berat_badan}}</td>
                                            <td>{{$pk->statusFungsional->nama }}</td>
                                            <td>{{$pk->jumlah_cd4}}</td>
                                            <td>{{$pk->viral_load}}</td>
                                            <td>{{$pk->lain_lain}}</td>
                                            <td>
                                                <a class="btn btn-success btn-sm float-right editPemeriksaanKlinis" href="javascript:void(0)" id="editPemeriksaanKlinis" data-id="{{$pk->id_pemeriksaan_klinis}}" title="Edit"><i class="fas fa-edit"></i></a>
                                                <a class="btn btn-danger btn-sm float-right deletePemeriksaanKlinis" href="javascript:void(0)" id="deletePemeriksaanKlinis" data-id="{{$pk->id_pemeriksaan_klinis}}" title="Hapus"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif
                            </div>
                        </div>
                    </div>
                     @if($data->status_hiv == 'Positif' || $data->status_hiv == 'AIDS')
                    <div class="col-12">
                        <div class="card card-danger card-outline">
                            <div class="card-header">
                                <h5>Terapi Antiretroviral (ART)</h5>
                                <a class="btn btn-success btn-sm float-right m-1" href="javascript:void(0)" id="createTerapiArt"> <i class="fa fa-plus"></i> Tambah Data</a>
                            </div>

                            <div class="card-body">
                                @if(!empty($data->terapiArt))
                                <table class="table">
                                    <thead>
                                        <th>Tanggal Mulai</th>
                                        <th>Fase</th>
                                        <th>Alasan</th>
                                        <th>Penjelasan</th>
                                        <th>Paduan ART</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        @foreach($data->terapiArt as $ta)
                                        @if($ta->deleted == 0)
                                        <tr>
                                            <td>{{$ta->tanggal_mulai}}</td>
                                            <td>{{$ta->fase}}</td>
                                            <td>{{$ta->alasan->nama}}</td>
                                            <td>{{$ta->penjelasan}}</td>
                                            <td>{{$ta->paduanArt->nama}}</td>
                                            <td>
                                                <a class="btn btn-success btn-sm float-right editTerapiArt" href="javascript:void(0)" id="editTerapiArt" data-id="{{$ta->id_terapi_art_pasien}}"> <i class="fas fa-edit" title="Edit"></i></a>
                                                <a class="btn btn-danger btn-sm float-right deleteTerapiArt" href="javascript:void(0)" id="deleteTerapiArt" data-id="{{$ta->id_terapi_art_pasien}}" title="Hapus"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card card-dark card-outline">
                            <div class="card-header">
                                <h5>Pengobatan TB selama perawatan HIV</h5>
                                <a class="btn btn-success btn-sm float-right m-1" href="javascript:void(0)" id="createPengobatanTb"> <i class="fas fa-plus"></i> Tambah Data</a>
                            </div>
                            <div class="card-body">
                                @if(!empty($data->pengobatanTb))
                                <table class="table">
                                    <thead>
                                        <th>Tanggal Mulai Terapi</th>
                                        <th>Tanggal Selesai Terapi</th>
                                        <th>Tipe TB</th>
                                        <th>Klasifikasi TB</th>
                                        <th>Lokasi TB</th>
                                        <th>Paduan TB</th>
                                        <th>Sarana Kesehatan</th>
                                        <th>No Reg Tb</th>
                                    </thead>
                                    <tbody>
                                        @foreach($data->pengobatanTb as $pt)
                                        <tr>
                                            <td>{{$pt->tanggal_mulai_terapi}}</td>
                                            <td>{{$pt->tanggal_selesai_terapi}}</td>
                                            <td>{{$pt->tipeTb->nama}}</td>
                                            <td>{{$pt->klasifikasiTb->nama}}</td>
                                            <td>{{$pt->lokasi_tb}}</td>
                                            <td>{{$pt->paduanTb->nama}}</td>
                                            <td>{{$pt->nama_sarana_kesehatan}}</td>
                                            <td>{{$pt->no_reg_tb}}</td>
                                            <td>
                                                <a class="btn btn-success btn-sm float-right editPengobatanTb m-2" href="javascript:void(0)" id="editPengobatanTb" data-id="{{$pt->id_pengobatan_tb_hiv}}"> <i class="fas fa-pencil"></i> Edit Data</a>
                                                <a class="btn btn-danger btn-sm float-right deletePengobatanTb" href="javascript:void(0)" id="deletePengobatanTb" data-id="{{$pt->id_pengobatan_tb_hiv}}" title="Hapus"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card card-info card-outline">
                            <div class="card-header">
                                <h5>Follow-Up Perawatan Pasien dan Terapi Antiretroviral</h5>
                                <br>
                                <i>*5 Riwayat terakhir</i>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <th>Tanggal Pengobatan</th>
                                        <th>Tanggal Kunjungan Selanjutnya</th>
                                        <th>Sisa obat ARV</th>
                                        <th>Paduan ART</th>
                                        <th>Dosis</th>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                        @if(!empty($data->riwayaPerawatanPasien))
                                        @foreach($data->riwayaPerawatanPasien->take(-5) as $rpp)
                                        <tr>
                                            <td>{{$rpp->tanggal_pengobatan}}</td>
                                            <td>{{$rpp->rencana_kunjungan_selanjutnya}}</td>
                                            <td>{{$rpp->sisa_obat}}</td>
                                            <td>{{$rpp->paduanArt->nama}}</td>
                                            <td>{{$rpp->dosis}}</td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="col-12">
                        <div class="card card-info card-outline">
                            <div class="card-header">
                                <h5>Berkas/File Pasien</h5>
                                <a class="btn btn-success btn-sm float-right m-1" href="javascript:void(0)" id="createPasienFile"> <i class="fas fa-plus"></i> Tambah Data</a>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <th>Nama</th>
                                        <th>Download/Berkas</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                        @if(!empty($data->pasienFile))
                                        @foreach($data->pasienFile as $pf)
                                        <tr>
                                            <td>{{$pf->nama}}</td>
                                            <td><a href="{{$pf->path}}" target="_blank"  download title="Download">{{$pf->berkas}}</a></td>
                                            <td>
                                                <a class="btn btn-success btn-sm float-right editPasienFile m-2" href="javascript:void(0)" id="editPasienFile" data-id="{{$pf->id_file}}"> <i class="fas fa-edit"></i> Edit</a>
                                                <a class="btn btn-danger btn-sm float-right deletePasienFile m-2" href="javascript:void(0)" id="deletePasienFile" data-id="{{$pf->id_file}}"> <i class="fas fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
                    <i class="fas fa-chevron-up"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Riwayat Terapi ART-->
<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="riwayatTerapiArt" name="riwayatTerapiArt" class="form-horizontal">
                    <input type="hidden" name="id_riwayat_terapi_art" id="id_riwayat_terapi_art">
                    <input type="hidden" name="id_pasien" id="id_pasien" value="{{$data->id_pasien}}" readonly>
                    <div class="form-group row">
                        <label for="name" class="col-sm-5 control-label">Pernah menerima ART</label>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="form-check col-3">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="pernah_menerima" value="Ya" id="pernah_menerima">
                                        Ya</label>
                                </div>
                                <div class="form-check col-3">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="pernah_menerima" value="Tidak" id="pernah_menerima">
                                        Tidak</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-5 control-label">Jenis Terapi</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="id_jenis_terapi_art" name="id_jenis_terapi_art">
                                @foreach($jenisTerapi as $jt)
                                <option value="{{$jt->id_jenis_terapi}}">{{$jt->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_tempat_art" class="col-sm-5 control-label">Tempat Terapi</label>
                        <div class="col-sm-6">
                            <select id="id_tempat_art" class="form-control" name="id_tempat_art">
                                @foreach($tempatTerapi as $tt)
                                <option value="{{$tt->id_tempat_terapi}}">{{$tt->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_paduan_art" class="col-sm-5 control-label">Nama Paduan ARV</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="id_paduan_art" name="id_paduan_art">
                                @foreach($paduanArt as $pa)
                                <option value="{{$pa->id_paduan_art}}">{{$pa->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dosis_art" class="col-sm-5 control-label">Dosis ARV</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="dosis_art" name="dosis_art" placeholder="1x1 hari" value="" maxlength="250" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lama_penggunaan" class="col-sm-5 control-label">Lama Penggunaan</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="lama_penggunaan" name="lama_penggunaan" placeholder="3 Tahun 2 bulan" value="" maxlength="250" required="">
                        </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Simpan</button>
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

<!-- Modal Mitra Seksual-->
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
                <form id="mitraSeksual" name="mitraSeksual" class="form-horizontal">
                    <input type="hidden" name="id_riwayat_mitra_seksual" id="id_riwayat_mitra_seksual">
                    <input type="hidden" name="id_pasien2" id="id_pasien2" value="{{$data->id_pasien}}" readonly>
                    <div class="form-group row">
                        <label for="email" class="col-sm-5 control-label">Nama</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="" value="" maxlength="250" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="umur" class="col-sm-5 control-label">Umur <span><i>(Dalam Tahun)</i></span></label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="umur" name="umur" placeholder="Dalam Tahun" value="" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="umur_bulan" class="col-sm-5 control-label">Umur <span><i>(Dalam Bulan)</i></span></label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="umur_bulan" name="umur_bulan" placeholder="Dalam Tahun" value="" required="true" maxvalue="12">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_hubungan" class="col-sm-5 control-label">Hubungan</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="id_hubungan" name="id_hubungan">
                                @foreach($mitraSeksual as $ms)
                                <option value="{{$ms->id_mitra_seksual}}">{{$ms->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_status_hiv" class="col-sm-5 control-label">Status HIV</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="id_status_hiv" name="id_status_hiv">
                                @foreach($statusHiv as $sh)
                                <option value="{{$sh->id_status_hiv}}">{{$sh->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-5 control-label">Komsumsi ART</label>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="form-check col-3">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="komsumsi_art" value="Ya" id="komsumsi_art">
                                        Ya</label>
                                </div>
                                <div class="form-check col-3">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="komsumsi_art" value="Tidak" id="komsumsi_art">
                                        Tidak</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="no_reg_nasional" class="col-sm-5 control-label">No REG Nasional</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="no_reg_nasional" name="no_reg_nasional" placeholder="" value="" maxlength="50" required="">
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

<!-- Modal Pemeriksaan Klinis Dan Laboratorium-->
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
                <form id="pemeriksaanKlinis" name="pemeriksaanKlinis" class="form-horizontal">
                    <input type="hidden" name="id_pemeriksaan_klinis" id="id_pemeriksaan_klinis">
                    <input type="hidden" name="id_pasien3" id="id_pasien3" value="{{$data->id_pasien}}" readonly>

                    <div class="form-group row">
                        <label for="id_kategori_pemeriksaan" class="col-sm-5 control-label">Tahap Pemeriksaan</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="id_kategori_pemeriksaan" name="id_kategori_pemeriksaan">
                                @foreach($kategoriPemeriksaan as $kp)
                                <option value="{{$kp->id_kategori_pemeriksaan}}">{{$kp->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-5 control-label">Tanggal Pemeriksaan</label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" id="tanggal_pemeriksaan" name="tanggal_pemeriksaan" placeholder="" value="" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="standar_klinis" class="col-sm-5 control-label">Standar Klinis</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="standar_klinis" name="standar_klinis" value="" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="berat_badan" class="col-sm-5 control-label">Berat Badan (Kg)</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="berat_badan" name="berat_badan" value="" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_status_fungsional" class="col-sm-5 control-label">Status Fungsional</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="id_status_fungsional" name="id_status_fungsional">
                                @foreach($statusFungsional as $sf)
                                <option value="{{$sf->id_status_fungsional}}">{{$sf->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jumlah_cd4" class="col-sm-5 control-label">Jumlah CD4 (CD4 % pada anak-anak)</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="jumlah_cd4" name="jumlah_cd4" placeholder="" value="" maxlength="11" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="viral_load" class="col-sm-5 control-label">Viral Load</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="viral_load" name="viral_load" placeholder="" value="" maxlength="11" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lain_lain" class="col-sm-5 control-label">Lain-lain</label>
                        <div class="col-sm-6">
                            <textarea name="lain_lain" id="lain_lain" cols="30" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-5 control-label">Tanggal Pemeriksaan Selanjutnya</label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" id="tanggal_pemeriksaan_selanjutnya" name="tanggal_pemeriksaan_selanjutnya" placeholder="" value="" required="">
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

<!-- Modal Positif HIV-->
<div class="modal fade" id="ajaxModel4" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading4"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="setPositifHiv" name="setPositifHiv" class="form-horizontal">
                    <input type="hidden" name="id_pasien4" id="id_pasien4" value="{{$data->id_pasien}}" readonly>
                    <div class="form-group row">
                        <label for="id_status_hiv4" class="col-sm-5 control-label">Status HIV</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="id_status_hiv4" name="id_status_hiv">
                                @foreach($statusHiv as $sh)
                                <option value="{{$sh->id_status_hiv}}">{{$sh->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-5 control-label">Tanggal Terkonfirmasi HIV</label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" id="tanggal_konfirmasi_hiv" name="tanggal_konfirmasi_hiv" value="{{$data->tanggal_konfirmasi_hiv}}" maxlength="250" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tempat_konfirmasi_hiv" class="col-sm-5 control-label">Tempat Terkonfirmasi HIV</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="tempat_konfirmasi_hiv" name="tempat_konfirmasi_hiv" placeholder="Puskesmas" value="{{$data->tempat_konfirmasi_hiv}}" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-5 control-label">Tanggal Terkonfirmasi AIDS</label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" id="tanggal_konfirmasi_aids" name="tanggal_konfirmasi_aids" value="{{$data->tanggal_konfirmasi_aids}}" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tempat_konfirmasi_aids" class="col-sm-5 control-label">Tempat Terkonfirmasi AIDS</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="tempat_konfirmasi_aids" name="tempat_konfirmasi_aids" placeholder="Puskesmas" value="{{$data->tempat_konfirmasi_aids}}" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_entry_point" class="col-sm-5 control-label">Entry Point</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="id_entry_point" name="id_entry_point">
                                @foreach($entryPoint as $ep)
                                <option value="{{$ep->id_entry_point}}">{{$ep->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_paduan_art4" class="col-sm-5 control-label">Paduan ART</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="id_paduan_art4" name="id_paduan_art">
                                @foreach($paduanArt as $pa)
                                <option value="{{$pa->id_paduan_art}}">{{$pa->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_iiart" class="col-sm-5 control-label">Indikasi Inisiasi ART</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="id_iiart" name="id_iiart">
                                @foreach($iiArt as $iia)
                                <option value="{{$iia->id_iiart}}">{{$iia->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tempat_pdp" class="col-sm-5 control-label">Tempat PDP</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" id="tempat_pdp" name="tempat_pdp" rows="3">{{$data->tempat_pdp}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="riwayat_alergi_obat" class="col-sm-5 control-label">Alergi Obat</label>
                        <div class="col-sm-6">
                            <textarea name="" id="" cols="30" rows="3" class="form-control" id="riwayat_alergi_obat" name="riwayat_alergi_obat" placeholder="">{{$data->riwayat_alergi_obat}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_pmo" class="col-sm-5 control-label">Nama Pengawas Minum Obat (PMO)</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nama_pmo" name="nama_pmo" placeholder="" value="{{$data->nama_pmo}}" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hubungan_pmo" class="col-sm-5 control-label">Hubungan PMO</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="hubungan_pmo" name="hubungan_pmo" placeholder="" value="{{$data->hubungan_pmo}}" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat_pmo" class="col-sm-5 control-label">Alamat PMO</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" id="alamat_pmo" name="alamat_pmo" required="" rows="3">{{$data->alamat_pmo}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="no_hp_pmo" class="col-sm-5 control-label">No HP PMO</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="no_hp_pmo" name="no_hp_pmo" placeholder="" value="{{$data->no_hp_pmo}}" required="">
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

<!-- Modal Negatif HIV-->
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
                <form id="setNegatifHiv" name="setNegatifHiv" class="form-horizontal">
                    <input type="hidden" name="id_pasien5" id="id_pasien5" value="{{$data->id_pasien}}" readonly>
                    <div class="form-group row">
                        <label for="status" class="col-sm-12 control-label">Apakah anda yakin mengubah status pasien ini menjadi Negatif? <span class="text-danger"><i>*Data pasien yang menyatakna positif akan dihapus.</i></span></label>
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


<!-- Modal HIV AIDS-->
<div class="modal fade" id="ajaxModel10" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading10"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="setHivAids" name="setHivAids" class="form-horizontal">
                    <input type="hidden" name="id_pasien10" id="id_pasien10" value="{{$data->id_pasien}}" readonly>
                    <div class="form-group row">
                        <label for="status" class="col-sm-12 control-label">Apakah anda yakin mengubah status pasien ini menjadi HIV AIDS? <span class="text-danger"></span></label>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn10" value="create">Simpan</button>
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

<!-- Modal Terapi ART-->
<div class="modal fade" id="ajaxModel6" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading6"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="terapiArt" name="terapiArt" class="form-horizontal">
                    <input type="hidden" name="id_terapi_art_pasien" id="id_terapi_art_pasien" value="">
                    <input type="hidden" name="id_pasien6" id="id_pasien6" value="{{$data->id_pasien}}" readonly>
                    <div class="form-group row">
                        <label for="tanggal_mulai" class="col-sm-5 control-label">Tanggal Mulai</label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fase" class="col-sm-5 control-label">Fase</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="fase" name="fase">
                                <option value="Restart">Restart</option>
                                <option value="Substitusi">Substitusi</option>
                                <option value="Stop">Stop</option>
                                <option value="Switch">Switch</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_alasan" class="col-sm-5 control-label">Alasan</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="id_alasan" name="id_alasan">
                                @foreach($alasanSubstitusi as $as)
                                <option value="{{$as->id_alasan_substitusi}}">{{$as->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="penjelasan" class="col-sm-5 control-label">Penjelasan</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="penjelasan" name="penjelasan" placeholder="" value="" maxlength="250">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_paduan_art6" class="col-sm-5 control-label">Paduan ART</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="id_paduan_art6" name="id_paduan_art6">
                                @foreach($paduanArt as $pa)
                                <option value="{{$pa->id_paduan_art}}">{{$pa->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn6" value="create">Simpan</button>
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
<!-- Modal Pengobatan TB-->
<div class="modal fade" id="ajaxModel7" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading7"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="pengobatanTb" name="pengobatanTb" class="form-horizontal">
                    <input type="hidden" name="id_pengobatan_tb_hiv" id="id_pengobatan_tb_hiv" value="">
                    <input type="hidden" name="id_pasien7" id="id_pasien7" value="{{$data->id_pasien}}" readonly>
                    <div class="form-group row">
                        <label for="id_tipe_tb" class="col-sm-5 control-label">Tipe TB</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="id_tipe_tb" name="id_tipe_tb">
                                @foreach($tipeTb as $tt)
                                <option value="{{$tt->id_tipe_tb}}">{{$tt->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_klasifikasi_tb" class="col-sm-5 control-label">Klasifikasi TB</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="id_klasifikasi_tb" name="id_klasifikasi_tb">
                                @foreach($klasifikasiTb as $kt)
                                <option value="{{$kt->id_klasifikasi_tb}}">{{$kt->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_paduan_tb" class="col-sm-5 control-label">Paduan TB</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="id_paduan_tb" name="id_paduan_tb">
                                @foreach($paduanTb as $pt)
                                <option value="{{$pt->id_paduan_tb}}">{{$pt->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lokasi_tb" class="col-sm-5 control-label">Lokasi TB</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="lokasi_tb" name="lokasi_tb" placeholder="Tangan Kiri" value="" maxlength="250">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tanggal_mulai_terapi" class="col-sm-5 control-label">Tanggal Mulai Terapi</label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" id="tanggal_mulai_terapi" name="tanggal_mulai_terapi" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tanggal_selesai_terapi" class="col-sm-5 control-label">Tanggal Selesai Terapi</label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" id="tanggal_selesai_terapi" name="tanggal_selesai_terapi" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="no_reg_tb" class="col-sm-5 control-label">No Reg TB</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="no_reg_tb" name="no_reg_tb" placeholder="" value="" maxlength="100">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_sarana_kesehatan" class="col-sm-5 control-label">Nama Saran Kesehatan</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nama_sarana_kesehatan" name="nama_sarana_kesehatan" placeholder="Rumah Sakit HKBP Balige" value="" maxlength="250">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_kabupaten_pengobatan" class="col-sm-5 control-label">Kabupaten/Kota</label>
                        <div class="col-sm-6">
                            <select class="form-control select2" id="id_kabupaten_pengobatan" name="id_kabupaten_pengobatan" style="width: 100%;">
                                @foreach($kabupaten as $k)
                                <option value="{{$k->id_kabupaten}}">{{$k->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn7" value="create">Simpan</button>
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
<!-- Modal Faktor Resiko-->
<div class="modal fade" id="ajaxModel8" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading8"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="faktorResiko" name="faktorResiko" class="form-horizontal">
                    <input type="hidden" name="id_faktor_resiko_pasien" id="id_faktor_resiko_pasien">
                    <input type="hidden" name="id_pasien8" id="id_pasien8" value="{{$data->id_pasien}}" readonly>
                    <div class="form-group row">
                        <label for="email" class="col-sm-5 control-label">Faktor Resiko</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="id_faktor_resiko" name="id_faktor_resiko">
                                @foreach($faktorResiko as $fr)
                                <option value="{{$fr->id_faktor_resiko}}">{{$fr->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn8" value="create">Simpan</button>
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

<!-- Modal Berkas Pasien-->
<div class="modal fade" id="ajaxModel9" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading9"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="pasienFile" action="{{ route('konselor.pasienFile.add') }}" name="pasienFile" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="id_file" id="id_file">
                    <input type="hidden" name="id_pasien9" id="id_pasien9" value="{{$data->id_pasien}}" readonly>
                    <div class="form-group row">
                        <label for="email" class="col-sm-5 control-label">Jenis/Nama Berkas</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nama_berkas" name="nama" placeholder="" value="" maxlength="250">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-5 control-label">Berkas <i>Max 2MB</i></label>
                        <div class="col-sm-6">
                            <input type="file" name="berkas" id="berkas" class="form-control" placeholder="berkas">
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn9" value="create">Simpan</button>
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
<!-- /.modal -->
<!-- DataTables  & Plugins -->
<script src="{{asset('alte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('alte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('alte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('alte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('alte/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('alte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('alte/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('alte/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('alte/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<script type="text/javascript">
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //riwayat terapi art
        $('#createRiwayatTerapiArt').click(function() {
            $('#saveBtn').val("create-product");
            $('#id_riwayat_terapi_art').val('');
            $('#riwayatTerapiArt').trigger("reset");
            $('#modelHeading').html("Tambah Data Riwayat Terapi ART");
            $('#ajaxModel').modal('show');
        });

        $('#saveBtn').click(function(e) {
            e.preventDefault();
            $(this).html('Menyimpan..');

            $.ajax({
                data: $('#riwayatTerapiArt').serialize(),
                url: "{{ route('konselor.riwayatTerapiArt.store') }}",
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $('#riwayatTerapiArt').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        $('#saveBtn').html('Simpan Data');
                        $(".alert-success").css('display', 'block');
                        $('.success').html("Data Berhasil Disimpan.");
                        $(".print-error-msg").css('display', 'none');
                        location.reload();

                    } else {
                        console.log('Error:', data);
                        $(".alert-success").css('display', 'none');
                        $('#saveBtn').html('Simpan Data');
                        printErrorMsg(data.error);
                    }
                }
            });
        });
        $('body').on('click', '.editRiwayatTerapiArt', function() {
            var id_riwayat_terapi_art = $(this).data('id');
            $.get("{{ url('konselor/riwayatTerapiArt/edit') }}" + '/' + id_riwayat_terapi_art, function(data) {
                console.log(data);
                $('#modelHeading').html("Ubah Data Riwayat Terapi ART");
                $('#saveBtn').val("edit-user");
                $('#ajaxModel').modal('show');
                if (data.pernah_menerima == 'Ya') {
                    $("input[name=pernah_menerima][value='Ya']").prop('checked', true);
                } else {
                    $('input[name=pernah_menerima][value="Tidak"]').prop('checked', true);
                }
                $('#id_jenis_terapi_art').val(data.id_jenis_terapi_art);
                $('#id_tempat_art').val(data.id_tempat_art);
                $('#id_paduan_art').val(data.id_paduan_art);
                $('#dosis_art').val(data.dosis_art);
                $('#lama_penggunaan').val(data.lama_penggunaan);

                $('#id_riwayat_terapi_art').val(data.id_riwayat_terapi_art);
                checkPenerima();
            })
        });

        $('input[name=pernah_menerima]').click(function() {
            checkPenerima();
        });

        function checkPenerima() {
            if ($('input[name=pernah_menerima][value="Tidak"]').is(':checked')) {
                console.log('if');
                $('select[name=id_jenis_terapi_art]').prop("disabled", true);
                $('select[name=id_tempat_art]').prop("disabled", true);
                $('select[name=id_paduan_art]').prop("disabled", true);
                $('input[name=dosis_art]').prop("disabled", true);
                $('input[name=lama_penggunaan]').prop("disabled", true);
            }
            if ($('input[name=pernah_menerima][value="Ya"]').is(':checked')) {
                console.log('else');
                $('select[name=id_jenis_terapi_art]').prop("disabled", false);
                $('select[name=id_tempat_art]').prop("disabled", false);
                $('select[name=id_paduan_art]').prop("disabled", false);
                $('input[name=dosis_art]').prop("disabled", false);
                $('input[name=lama_penggunaan]').prop("disabled", false);
            }
        }
        $('body').on('click', '.deleteRiwayatTerapiArt', function (){
            var product_id = $(this).data("id");
            var result = confirm("Apakah Anda yakin menghapus data RIWAYAT TERAPI ART ini?");
            if(result){
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('konselor.riwayatTerapiArt.destroy', '/') }}"+'/'+product_id,
                    success: function (data) {
                        if($.isEmptyObject(data.error)){
                            $(".alert-success").css('display','block');
                            $('.success').html("Data Berhasil Dihapus.");
                            $(".print-error-msg-delete").css('display','none');
                            table.draw();
                        }else{
                            console.log('Error:', data);
                            $(".alert-success").css('display','none');
                            printErrorMsgDelete(data.error);
                        }
                    }
                });
            }else{
                return false;
            }
        });

        //mitra seksual
        $('#createMitraSeksual').click(function() {
            $('#saveBtn').val("create-product");
            $('#id_riwayat_mitra_seksual').val('');
            $('#mitraSeksual').trigger("reset");
            $('#modelHeading2').html("Tambah Data Riwayat Keluarga/Mitra Seksual/Mitra Pasunan");
            $('#ajaxModel2').modal('show');
        });
        $('#saveBtn2').click(function(e) {
            e.preventDefault();
            $(this).html('Menyimpan..');
            $.ajax({
                data: $('#mitraSeksual').serialize(),
                url: "{{ route('konselor.riwayatMitraSeksual.store') }}",
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $('#mitraSeksual').trigger("reset");
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
        $('body').on('click', '.editMitraSeksual', function() {
            var id_riwayat_mitra_seksual = $(this).data('id');
            $.get("{{ url('konselor/riwayatMitraSeksual/edit') }}" + '/' + id_riwayat_mitra_seksual, function(data) {
                $('#modelHeading2').html("Ubah Data Riwayat Keluarga/Mitra Seksual/Mitra Pasunan");
                $('#saveBtn2').val("edit-user");
                $('#ajaxModel2').modal('show');
                $('#nama').val(data.nama);
                $('#umur').val(data.umur);
                $('#id_hubungan').val(data.id_hubungan);
                $('#id_riwayat_mitra_seksual').val(data.id_riwayat_mitra_seksual);
                $('#id_status_hiv').val(data.id_status_hiv);
                $('#no_reg_nasional').val(data.no_reg_nasional);
                if (data.komsumsi_art == 'Ya') {
                    $("input[name=komsumsi_art][value='Ya']").prop('checked', true);
                } else {
                    $('input[name=komsumsi_art][value="Tidak"]').prop('checked', true);
                }
            })
        });
        $('body').on('click', '.deleteMitraSeksual', function (){
            var id = $(this).data("id");
            var result = confirm("Apakah Anda yakin menghapus data MITRA SEKSUAL/PANESUM/KELUARGA ini?");
            if(result){
                
            console.log(id);
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('konselor.riwayatMitraSeksual.destroy', '/') }}"+'/'+id,
                    success: function (data) {
                        if($.isEmptyObject(data.error)){
                            $(".alert-success").css('display','block');
                            $('.success').html("Data Berhasil Dihapus.");
                            $(".print-error-msg-delete").css('display','none');
                            location.reload();
                        }else{
                            console.log('Error:', data);
                            $(".alert-success").css('display','none');
                            printErrorMsgDelete(data.error);
                        }
                    }
                });
            }else{
                return false;
            }
        });

        //pemeriksaan Klinis
        $('#createPemeriksaanKlinis').click(function() {
            $('#saveBtn').val("create-product");
            $('#id_pemeriksaan_klinis').val('');
            $('#pemeriksaanKlinis').trigger("reset");
            $('#modelHeading3').html("Tambah Data Pemeriksaan Klinis dan Laboratorium");
            $('#ajaxModel3').modal('show');
        });

        $('#saveBtn3').click(function(e) {
            e.preventDefault();
            $(this).html('Menyimpan..');
            $.ajax({
                data: $('#pemeriksaanKlinis').serialize(),
                url: "{{ route('konselor.pemeriksaanKlinis.store') }}",
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $('#pemeriksaanKlinis').trigger("reset");
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
        $('body').on('click', '.editPemeriksaanKlinis', function() {
            var id_riwayat_mitra_seksual = $(this).data('id');
            $.get("{{ url('konselor/pemeriksaanKlinis/edit') }}" + '/' + id_riwayat_mitra_seksual, function(data) {
                console.log(data);
                $('#modelHeading3').html("Ubah Data Pemeriksaan Klinis dan Laboratorium");
                $('#saveBtn').val("edit-user");
                $('#ajaxModel3').modal('show');
                $('#nama').val(data.nama);
                $('#umur').val(data.umur);
                $('#id_pemeriksaan_klinis').val(data.id_pemeriksaan_klinis);
                $('#standar_klinis').val(data.standar_klinis);
                $('#id_status_fungsional').val(data.id_status_fungsional);
                $('#jumlah_cd4').val(data.jumlah_cd4);
                $('#viral_load').val(data.viral_load);
                $('#tanggal_pemeriksaan').val(data.tanggal_pemeriksaan);
                $('#lain_lain').val(data.lain_lain);
                $('#berat_badan').val(data.berat_badan);
                $('#id_kategori_pemeriksaan').val(data.id_kategori_pemeriksaan);
                $('#id_pasien3').val(data.id_pasien);
                $('#tanggal_pemeriksaan_selanjutnya').val(data.tanggal_pemeriksaan_selanjutnya);
            })
        });
        $('body').on('click', '.deletePemeriksaanKlinis', function (){
            var id = $(this).data("id");
            console.log(id);
            var result = confirm("Apakah Anda yakin menghapus data PEMERIKSAAN KLINIS ini?");
            if(result){
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('konselor.pemeriksaanKlinis.destroy', '/') }}"+'/'+id,
                    success: function (data) {
                        if($.isEmptyObject(data.error)){
                            $(".alert-success").css('display','block');
                            $('.success').html("Data Berhasil Dihapus.");
                            $(".print-error-msg-delete").css('display','none');
                            location.reload();
                        }else{
                            console.log('Error:', data);
                            $(".alert-success").css('display','none');
                            printErrorMsgDelete(data.error);
                        }
                    }
                });
            }else{
                return false;
            }
        });

        //positif HIV
        $('#positifHiv').click(function() {
            $('#saveBtn4').val("create-product");
            $('#setPositifHiv').trigger("reset");
            $('#modelHeading4').html("Pasien Positif HIV");
            $('#ajaxModel4').modal('show');
        });

        $('#saveBtn4').click(function(e) {
            e.preventDefault();
            $(this).html('Menyimpan..');

            $.ajax({
                data: $('#setPositifHiv').serialize(),
                url: "{{ route('konselor.pasien.positifHiv') }}",
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $('#setPositifHiv').trigger("reset");
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
        $('body').on('click', '#editPositifHiv', function() {
            var id_pasien = $(this).data('id');
            $.get("{{ url('konselor/pasien/edit') }}" + '/' + id_pasien , function(data) {
                $('#modelHeading4').html("Ubah Data Pasien Positif HIV");
                $('#saveBtn').val("edit-user");
                $('#id_status_hiv4').val(data.id_status_hiv);
                $('#id_paduan_art4').val(data.id_paduan_art);
                $('#id_iiart').val(data.id_iiart);
                $('#id_entry_point').val(data.id_entry_point);
                $('#ajaxModel4').modal('show');
            })
        });
        //negatif HIV
        $('#negatifHiv').click(function() {
            $('#saveBtn5').val("create-product");
            $('#setPositifHiv').trigger("reset");
            $('#modelHeading5').html("Pasien Negatif HIV");
            $('#ajaxModel5').modal('show');
        });

        $('#saveBtn5').click(function(e) {
            e.preventDefault();
            $(this).html('Menyimpan..');

            $.ajax({
                data: $('#setNegatifHiv').serialize(),
                url: "{{ route('konselor.pasien.negatifHiv') }}",
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $('#ajaxModel5').modal('hide');
                        $('#saveBtn5').html('Simpan Data');
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

        //HIV Aids
        $('#hivAids').click(function() {
            $('#saveBtn10').val("create-product");
            $('#setHivAids').trigger("reset");
            $('#modelHeading10').html("Pasien HIV AIDS");
            $('#ajaxModel10').modal('show');
        });

        $('#saveBtn10').click(function(e) {
            e.preventDefault();
            $(this).html('Menyimpan..');

            $.ajax({
                data: $('#setHivAids').serialize(),
                url: "{{ route('konselor.pasien.hivAids') }}",
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $('#ajaxModel10').modal('hide');
                        $('#saveBtn10').html('Simpan Data');
                        $(".alert-success").css('display', 'block');
                        $('.success').html("Data Berhasil Disimpan.");
                        $(".print-error-msg").css('display', 'none');
                        
                        setTimeout(function(){
                            location.reload();
                        }, 1000)
                    } else {
                        console.log('Error:', data);
                        $(".alert-success").css('display', 'none');
                        $('#saveBtn10').html('Simpan Data');
                        printErrorMsg(data.error);
                    }
                }
            });
        });

        //terapi art
        $('#createTerapiArt').click(function() {
            $('#saveBtn6').val("create-product");
            $('#id_terapi_art_pasien').val('');
            $('#terapiArt').trigger("reset");
            $('#modelHeading6').html("Tambah Data Terapi ART");
            $('#ajaxModel6').modal('show');
        });

        $('#saveBtn6').click(function(e) {
            e.preventDefault();
            $(this).html('Menyimpan..');

            $.ajax({
                data: $('#terapiArt').serialize(),
                url: "{{ route('konselor.terapiArtPasien.store') }}",
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $('#terapiArt').trigger("reset");
                        $('#ajaxModel6').modal('hide');
                        $('#saveBtn6').html('Simpan Data');
                        $(".alert-success").css('display', 'block');
                        $('.success').html("Data Berhasil Disimpan.");
                        $(".print-error-msg").css('display', 'none');
                        location.reload();

                    } else {
                        console.log('Error:', data);
                        $(".alert-success").css('display', 'none');
                        $('#saveBtn6').html('Simpan Data');
                        printErrorMsg(data.error);
                    }
                }
            });
        });
        $('body').on('click', '.editTerapiArt', function() {
            var id_terapi_art_pasien = $(this).data('id');
            $.get("{{ url('konselor/terapiArtPasien/edit') }}" + '/' +  id_terapi_art_pasien, function(data) {
                $('#modelHeading6').html("Ubah Data Terapi ART");
                $('#saveBtn6').val("edit-terapi-art");
                $('#ajaxModel6').modal('show');
                $('#penjelasan').val(data.penjelasan);
                $('#tanggal_mulai').val(data.tanggal_mulai);
                $('#id_alasan').val(data.id_alasan);
                $('#id_paduan_art6').val(data.id_paduan_art);
                $('#id_terapi_art_pasien').val(data.id_terapi_art_pasien);
            })
        });
        $('body').on('click', '.deleteTerapiArt', function (){
            var id = $(this).data("id");
            var result = confirm("Apakah Anda yakin menghapus data TERAPI ART ini?");
            if(result){
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('konselor.terapiArtPasien.destroy', '/') }}"+'/'+id,
                    success: function (data) {
                        if($.isEmptyObject(data.error)){
                            $(".alert-success").css('display','block');
                            $('.success').html("Data Berhasil Dihapus.");
                            $(".print-error-msg-delete").css('display','none');
                            location.reload();
                        }else{
                            console.log('Error:', data);
                            $(".alert-success").css('display','none');
                            printErrorMsgDelete(data.error);
                        }
                    }
                });
            }else{
                return false;
            }
        });

        //pengobatan TB
        $('#createPengobatanTb').click(function() {
            $('#saveBtn7').val("create-product");
            $('#id_pengobatan_tb_hiv').val('');
            $('#pengobatanTb').trigger("reset");
            $('#modelHeading7').html("Tambah Data Pengobatan TB");
            $('#ajaxModel7').modal('show');
        });

        $('#saveBtn7').click(function(e) {
            e.preventDefault();
            $(this).html('Menyimpan..');

            $.ajax({
                data: $('#pengobatanTb').serialize(),
                url: "{{ route('konselor.pengobatanTb.store') }}",
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $('#pengobatanTb').trigger("reset");
                        $('#ajaxModel7').modal('hide');
                        $('#saveBtn7').html('Simpan Data');
                        $(".alert-success").css('display', 'block');
                        $('.success').html("Data Berhasil Disimpan.");
                        $(".print-error-msg").css('display', 'none');
                        location.reload();

                    } else {
                        console.log('Error:', data);
                        $(".alert-success").css('display', 'none');
                        $('#saveBtn7').html('Simpan Data');
                        printErrorMsg(data.error);
                    }
                }
            });
        });
        $('body').on('click', '.editPengobatanTb', function() {
            var id_terapi_art_pasien = $(this).data('id');
            $.get("{{ url('konselor/pengobatanTb/edit') }}" + '/' + id_terapi_art_pasien, function(data) {
                console.log(data);
                $('#modelHeading7').html("Ubah Data Pengobatan T");
                $('#saveBtn7').val("edit-terapi-art");
                $('#ajaxModel7').modal('show');
                $('#penjelasan').val(data.penjelasan);
                $('#tanggal_mulai_terapi').val(data.tanggal_mulai_terapi);
                $('#tanggal_selesai_terapi').val(data.tanggal_selesai_terapi);
                $('#id_tipe_tb').val(data.id_tipe_tb);
                $('#id_klasifikasi_tb').val(data.id_klasifikasi_tb);
                $('#id_paduan_tb').val(data.id_paduan_tb);
                $('#id_kabupaten_pengobatan').val(data.id_kabupaten_pengobatan);
                $('#nama_sarana_kesehatan').val(data.nama_sarana_kesehatan);
                $('#no_reg_tb').val(data.no_reg_tb);
                $('#lokasi_tb').val(data.lokasi_tb);
                $('#id_pengobatan_tb_hiv').val(data.id_pengobatan_tb_hiv);
            })
        });
        $('body').on('click', '.deletePengobatanTb', function (){
            var id = $(this).data("id");
            var result = confirm("Apakah Anda yakin menghapus data PENGOBATAN TB ini?");
            if(result){
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('konselor.pengobatanTb.destroy', '/') }}"+'/'+id,
                    success: function (data) {
                        if($.isEmptyObject(data.error)){
                            $(".alert-success").css('display','block');
                            $('.success').html("Data Berhasil Dihapus.");
                            $(".print-error-msg-delete").css('display','none');
                            location.reload();
                        }else{
                            console.log('Error:', data);
                            $(".alert-success").css('display','none');
                            printErrorMsgDelete(data.error);
                        }
                    }
                });
            }else{
                return false;
            }
        });

        //faktor resiko
        $('#createFaktorResiko').click(function() {
            $('#saveBtn8').val("create-product");
            $('#id_faktor_resiko_pasien').val('');
            $('#faktorResiko').trigger("reset");
            $('#modelHeading8').html("Tambah Data Faktor Resiko");
            $('#ajaxModel8').modal('show');
        });

        $('#saveBtn8').click(function(e) {
            e.preventDefault();
            $(this).html('Menyimpan..');

            $.ajax({
                data: $('#faktorResiko').serialize(),
                url: "{{ route('konselor.faktorResikoPasien.store') }}",
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $('#faktorResiko').trigger("reset");
                        $('#ajaxModel8').modal('hide');
                        $('#saveBtn8').html('Simpan Data');
                        $(".alert-success").css('display', 'block');
                        $('.success').html("Data Berhasil Disimpan.");
                        $(".print-error-msg").css('display', 'none');
                        location.reload();

                    } else {
                        console.log('Error:', data);
                        $(".alert-success").css('display', 'none');
                        $('#saveBtn8').html('Simpan Data');
                        printErrorMsg(data.error);
                    }
                }
            });
        });
        $('body').on('click', '.editFaktorResiko', function() {
            var id_faktor_resiko_pasien = $(this).data('id');
            $.get("{{ url('konselor/faktorResikoPasien/edit') }}" + '/' + id_faktor_resiko_pasien, function(data) {
                $('#modelHeading8').html("Ubah Data Faktor Resiko");
                $('#saveBtn8').val("edit-user");
                $('#ajaxModel8').modal('show');
                $('#nama').val(data.nama);
                $('#umur').val(data.umur);
                $('#id_faktor_resiko').val(data.id_faktor_resiko);
                $('#id_faktor_resiko_pasien').val(data.id_faktor_resiko_pasien);
            })
        });
        $('body').on('click', '.deleteFaktorResiko', function (){
            var id = $(this).data("id");
            var result = confirm("Apakah Anda yakin menghapus data FAKTOR RESIKO ini?");
            if(result){
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('konselor.faktorResiko.destroy', '/') }}"+'/'+id,
                    success: function (data) {
                        if($.isEmptyObject(data.error)){
                            $(".alert-success").css('display','block');
                            $('.success').html("Data Berhasil Dihapus.");
                            $(".print-error-msg-delete").css('display','none');
                            location.reload();
                        }else{
                            console.log('Error:', data);
                            $(".alert-success").css('display','none');
                            printErrorMsgDelete(data.error);
                        }
                    }
                });
            }else{
                return false;
            }
        });

        //faktor berkas
        $('#createPasienFile').click(function() {
            $('#saveBtn9').val("create-product");
            $('#id_file').val('');
            $('#pasienFile').trigger("reset");
            $('#modelHeading9').html("Tambah Berkas Pasien");
            $('#ajaxModel9').modal('show');
        });

        $('#pasienFile').submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('konselor.pasienFile.add') }}",
                type: "POST",
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $('#pasienFile').trigger("reset");
                        $('#ajaxModel9').modal('hide');
                        $('#saveBtn9').html('Simpan Data');
                        $(".alert-success").css('display', 'block');
                        $('.success').html("Data Berhasil Disimpan.");
                        $(".print-error-msg").css('display', 'none');
                        location.reload();

                    } else {
                        console.log('Error:', data);
                        $(".alert-success").css('display', 'none');
                        $('#saveBtn9').html('Simpan Data');
                        printErrorMsg(data.error);
                    }
                }
            });
        });
        $('body').on('click', '.editPasienFile', function() {
            var id_file = $(this).data('id');
            $.get("{{ url('konselor/pasienFile/edit') }}" + '/' + id_file, function(data) {
                console.log(data);
                $('#modelHeading9').html("Ubah Data Berkas");
                $('#saveBtn9').val("edit-user");
                $('#ajaxModel9').modal('show');
                $('#nama_berkas').val(data.nama);
                $('#id_file').val(data.id_file);
            })
        });
        
        $('body').on('click', '.deletePasienFile', function (){
            var id_file = $(this).data('id');
            var result = confirm("Apakah Anda yakin menghapus data ini?");
            if(result){
                $.ajax({
                    type: "DELETE",
                    url: "{{ url('konselor/pasienFile/delete') }}" + '/' + id_file,
                    success: function (data) {
                        if($.isEmptyObject(data.error)){
                            $(".alert-success").css('display', 'block');
                            $('.success').html("Data Berhasil Dihapus.");
                            $(".print-error-msg").css('display', 'none');
                            location.reload();
                        }else{
                            console.log('Error:', data);
                            $(".alert-success").css('display','none');
                            printErrorMsgDelete(data.error);
                        }
                    }
                });
            }else{
                return false;
            }
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