@extends('layoutadmin.app')

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
                                <a class="btn btn-success float-right" href="/admin/konselor"> Kembali</a>
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
                                <a class="btn btn-success float-right" href="/admin/konselor"> Kembali</a>
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
    
<!-- Modal -->
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
                    <form id="productForm" name="productForm" class="form-horizontal">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Nama</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$data->nama}}" maxlength="100" required="" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{$data->email}}" maxlength="100" required="" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="no_hp" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-12">
                                <input type="password" class="form-control" id="no_hp" name="password" placeholder="Password" value="" maxlength="30" required="">
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
$(function () {
     
     $.ajaxSetup({
         headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
      
     $('#createNewProduct').click(function () {
         $('#saveBtn').val("create-product");
         $('#id').val('');
         $('#productForm').trigger("reset");
         $('#modelHeading').html("Tambah Data");
         $('#ajaxModel').modal('show');
     });
     
     
     $('#saveBtn').click(function (e) {
         e.preventDefault();
         $(this).html('Menyimpan..');
     
         $.ajax({
             data: $('#productForm').serialize(),
             url: "{{ route('konselor.storeAkun') }}",
             type: "POST",
             dataType: 'json',
             success: function (data) {
                if($.isEmptyObject(data.error)){
                    $('#productForm').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    $('#saveBtn').html('Simpan Data');
                    $(".alert-success").css('display','block');
                    $('.success').html("Data Berhasil Disimpan.");
                    $(".print-error-msg").css('display','none');
                    location.reload(3);
                    
                }else{
                    console.log('Error:', data);
                    $(".alert-success").css('display','none');
                    $('#saveBtn').html('Simpan Data');
                    printErrorMsg(data.error);
                }
             }
         });
     });

    function printErrorMsg (msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display','block');
        $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        });
    }
    function printErrorMsgDelete (msg) {
        $(".print-error-msg-delete").find("ul").html('');
        $(".print-error-msg-delete").css('display','block');
        $.each( msg, function( key, value ) {
            $(".print-error-msg-delete").find("ul").append('<li>'+value+'</li>');
        });
    }
 });
</script>

  
   
@endsection
