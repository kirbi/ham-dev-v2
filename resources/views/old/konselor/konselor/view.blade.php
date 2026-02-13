@extends('layoutkonselor.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-6">
                <h2>Data Konselor</h2>
            </div>
            <div class="col-6 float-right">
                
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
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h2>Detail Konselor</h2>
                            </div>
                            <div class="col-6 pull-right">
                                <a class="btn btn-success float-right" href="/konselor/konselor/index"> Kembali</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body"> 
                        <div class="row">
                            <div class="col-md-3"><b>Nama</b></div>
                            <div class="col-md-9">{{$data->nama}}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"><b>Jenis Kelamin</b></div>
                            <div class="col-md-9"><?=$data->jenis_kelamin?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"><b>Tempat Lahir</b></div>
                            <div class="col-md-9"><?=$data->tempat_lahir?></div>
                        </div> 
                        <div class="row">
                            <div class="col-md-3"><b>Tanggal Lahir</b></div>
                            <div class="col-md-9"><?=$data->tanggal_lahir?></div>
                        </div> 
                        <div class="row">
                            <div class="col-md-3"><b>Status Pernikahan</b></div>
                            <div class="col-md-9"><?=$data->statusPernikahan->nama?></div>
                        </div> 
                        <div class="row">
                            <div class="col-md-3"><b>NIK</b></div>
                            <div class="col-md-9"><?=$data->nik?></div>
                        </div> 
                        <div class="row">
                            <div class="col-md-3"><b>Email</b></div>
                            <div class="col-md-9">{{$data->email}}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"><b>No HP</b></div>
                            <div class="col-md-9">{{$data->no_hp}}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"><b>Alamat</b></div>
                            <div class="col-md-9"><?=$data->alamat?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"><b>NIP</b></div>
                            <div class="col-md-9"><?=$data->nip?></div>
                        </div> 
                        <div class="row">
                            <div class="col-md-3"><b>Pendidikan</b></div>
                            <div class="col-md-9"><?=$data->pendidikan->nama?></div>
                        </div> 
                        <div class="row">
                            <div class="col-md-3"><b>Tanggal Sertifikasi</b></div>
                            <div class="col-md-9"><?=$data->tanggal_sertifikasi?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"><b>Status Pegawai</b></div>
                            <div class="col-md-9"><?=$data->status_pegawai?></div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h2>Detail Akun Konselor</h2>
                            </div>
                            <div class="col-6 pull-right">
                                <a class="btn btn-success float-right" href="/konselor/konselor"> Kembali</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row"> 
                            <div class="col-12">
                                <h3>Akun konselor</h3>
                                @if(!empty($user))
                                    <div class="row">
                                        <div class="col-md-3"><b>Nama</b></div>
                                        <div class="col-md-9">{{$user->name}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3"><b>Email</b></div>
                            <div class="col-md-9">{{$user->email}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3"><b>Role</b></div>
                            <div class="col-md-9"><?=$user->type?></div>
                                    </div>
                                @endif
                                @if(empty($user))
                                    <a href="javascript:void(0)" id="createNewProduct" class="btn btn-sm btn-primary">Buat Akun Sebagai Konselor</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
</div>
@endsection
