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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h2>Konselor</h2>
                            </div>
                            <div class="col-6 pull-right">
                                <a class="btn btn-success float-right" href="javascript:void(0)" id="createNewProduct"> Tambah Data</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-bordered table-hover dtr-inlin data-table mt-3">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                            <th>No HP</th>
                                            <th width="100px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="productForm" name="productForm" class="form-horizontal">
                        <input type="hidden" name="id_konselor" id="id_konselor">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group row">
                                    <label for="name" class="col-3 control-label">Nama</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="" maxlength="250" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-3 control-label">Email</label>
                                    <div class="col-9">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="" maxlength="100" required="">
                                    </div>
                                </div>
                
                                <div class="form-group row">
                                    <label class="col-3 control-label">Alamat</label>
                                    <div class="col-9">
                                        <textarea id="alamat" name="alamat" required="" placeholder="Alamat" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="no_hp" class="col-3 control-label">No HP</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No HP" value="" maxlength="30" required="">
                                    </div>
                                </div>
                                <div class= "form-group row">
                                    <label for="nip" class="col-sm-3 control-label">NIP</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nip" name="nip" placeholder="NIP" value="" maxlength="30">
                                    </div>
                                </div>
                                <div class= "form-group row">
                                    <label for="id_pendidikan" class="col-sm-3 control-label">Pendidikan Terakhir</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="id_pendidikan" id="id_pendidikan">
                                            <?php
                                                foreach($pendidikan as $p){ ?>
                                                    <option value="<?=$p->id_pendidikan?>"><?=$p->nama?></option>
                                            <?php   } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class= "form-group row">
                                    <label for="status_pegawai" class="col-sm-3 control-label">Status Pegawai</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="status_pegawai" name="status_pegawai">
                                            <option value="Aktif">Aktif</option>
                                            <option value="Tidak Aktif">Tidak Aktif</option>
                                            <option value="Cuti">Cuti</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group row">
                                    <label for="tempat_lahir" class="col-sm-3 control-label">Tempat Lahir</label>
                                    <div class="col-sm-9">
                                        <textarea id="tempat_lahir" name="tempat_lahir" required="" placeholder="Tempat Lahir" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class= "form-group row">
                                    <label for="tanggal_lahir" class="col-sm-3 control-label">Tanggal Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="">
                                    </div>
                                </div>
                                <div class= "form-group row">
                                    <label for="id_jenis_kelamin" class="col-sm-3 control-label">Jenis Kelamin</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class= "form-group row">
                                    <label for="id_status_pernikahan" class="col-sm-3 control-label">Status Pernikahan</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="id_status_pernikahan" id="id_status_pernikahan">
                                            <?php
                                                foreach($statusPernikahan as $sp){ ?>
                                                    <option value="<?=$sp->id_status_pernikahan?>"><?=$sp->nama?></option>
                                            <?php   } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class= "form-group row">
                                    <label for="nik" class="col-sm-3 control-label">NIK</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK" value="" maxlength="30">
                                    </div>
                                </div>
                                <div class= "form-group row">
                                    <label for="tanggal_sertifikasi" class="col-sm-3 control-label">Tanggal Sertifikasi</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="tanggal_sertifikasi" name="tanggal_sertifikasi" value="">
                                    </div>
                                </div>
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

<script type="text/javascript">
$(function () {
     
     $.ajaxSetup({
         headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
     
     var table = $('.data-table').DataTable({
         processing: true,
         serverSide: true,
        responsive : true,
        lengthChange: false,
        autoWidth: false,
         ajax: "{{ route('konselor.index') }}",
         columns: [
             {data: 'DT_RowIndex', name: 'DT_RowIndex'},
             {data: 'nama', name: 'nama'},
             {data: 'email', name: 'email'},
             {data: 'alamat', name: 'alamat'},
             {data: 'no_hp', name: 'no_hp'},
             {data: 'action', name: 'action', orderable: false, searchable: false},
         ]
     });
      
     $('#createNewProduct').click(function () {
         $('#saveBtn').val("create-product");
         $('#id_konselor').val('');
         $('#productForm').trigger("reset");
         $('#modelHeading').html("Tambah Data");
         $('#ajaxModel').modal('show');
     });
     
     $('body').on('click', '.editProduct', function () {
         var id_konselor = $(this).data('id');
         $.get("{{ route('konselor.index') }}" +'/' + id_konselor +'/edit', function (data) {
             $('#modelHeading').html("Ubah Data");
             $('#saveBtn').val("edit-user");
             $('#ajaxModel').modal('show');
             $('#nama').val(data.nama);
             $('#id_konselor').val(data.id_konselor);
             $('#email').val(data.email);
             $('#no_hp').val(data.no_hp);
             $('#alamat').val(data.alamat);
             $('#nik').val(data.nik);
             $('#nip').val(data.nip);
             $('#jenis_kelamin').val(data.jenis_kelamin);
             $('#tempat_lahir').val(data.tempat_lahir);
             $('#tanggal_lahir').val(data.tanggal_lahir);
             $('#id_pendidikan').val(data.id_pendidikan);
             $('#tanggal_sertifikasi').val(data.tanggal_sertifikasi);
             $('#status_pegawai').val(data.status_pegawai);
             $('#id_status_pernikahan').val(data.id_status_pernikahan);
         })
     });
     
     $('#saveBtn').click(function (e) {
         e.preventDefault();
         $(this).html('Menyimpan..');
     
         $.ajax({
             data: $('#productForm').serialize(),
             url: "{{ route('konselor.store') }}",
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
                    table.draw();
                }else{
                    console.log('Error:', data);
                    $(".alert-success").css('display','none');
                    $('#saveBtn').html('Simpan Data');
                    printErrorMsg(data.error);
                }
             }
         });
     });
 
     $('body').on('click', '.deleteProduct', function (){
         var product_id = $(this).data("id");
         var result = confirm("Apakah Anda yakin menghapus data ini?");
         if(result){
             $.ajax({
                 type: "DELETE",
                 url: "{{ route('konselor.store') }}"+'/'+product_id,
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
