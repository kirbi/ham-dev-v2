@extends('layoutadmin.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-6">
                <h2>Data Referensi</h2>
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
                                <h2>Alasan Substitusi/Stop</h2>
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
                                            <th>Deskripsi</th>
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
                        <input type="hidden" name="id_alasan_substitusi" id="id_alasan_substitusi">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Nama</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="" maxlength="250" required="">
                            </div>
                        </div>
        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Deskripsi</label>
                            <div class="col-sm-12">
                                <textarea id="deskripsi" name="deskripsi" required="" placeholder="Deskripsi" class="form-control"></textarea>
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
     
     var table = $('.data-table').DataTable({
         processing: true,
         serverSide: true,
         ajax: "{{ route('alasanSubstitusi.index') }}",
         columns: [
             {data: 'DT_RowIndex', name: 'DT_RowIndex'},
             {data: 'nama', name: 'nama'},
             {data: 'deskripsi', name: 'deskripsi'},
             {data: 'action', name: 'action', orderable: false, searchable: false},
         ]
     });
      
     $('#createNewProduct').click(function () {
         $('#saveBtn').val("create-product");
         $('#id_alasan_substitusi').val('');
         $('#productForm').trigger("reset");
         $('#modelHeading').html("Tambah Data");
         $('#ajaxModel').modal('show');
     });
     
     $('body').on('click', '.editProduct', function () {
         var id_alasan_substitusi = $(this).data('id');
         $.get("{{ route('alasanSubstitusi.index') }}" +'/' + id_alasan_substitusi +'/edit', function (data) {
             $('#modelHeading').html("Ubah Data");
             $('#saveBtn').val("edit-user");
             $('#ajaxModel').modal('show');
             $('#nama').val(data.nama);
             $('#id_alasan_substitusi').val(data.id_alasan_substitusi);
             $('#deskripsi').val(data.deskripsi);
         })
     });
     
     $('#saveBtn').click(function (e) {
         e.preventDefault();
         $(this).html('Menyimpan..');
     
         $.ajax({
             data: $('#productForm').serialize(),
             url: "{{ route('alasanSubstitusi.store') }}",
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
                 url: "{{ route('alasanSubstitusi.store') }}"+'/'+product_id,
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
