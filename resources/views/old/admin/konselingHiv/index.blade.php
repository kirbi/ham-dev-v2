@extends('layoutadmin.app')

@section('content')
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
                            <h2>Daftar Riwayat Konseling Pasien</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <table id="followUp" class="table table-bordered table-hover dtr-inlin data-table mt-3">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>No Rekam medis</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tanggal Konseling</th>
                                            <th>Aksi</th>
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
<script src="{{asset('alte/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('alte/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('alte/plugins/pdfmake/vfs_fonts.js')}}"></script>

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
         ajax: "{{ route('admin.konselingHiv.index') }}",
         "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
         columns: [
             {data: 'DT_RowIndex', name: 'DT_RowIndex'},
             {data: 'nama', name: 'nama'},
             {data: 'no_rekam_medis', name: 'no_rekam_medis'},
             {data: 'tanggal_konseling', name: 'tanggal_konseling'},
             {data: 'jenis_kelamin', name: 'jenis_kelamin'},
             {data: 'action', name: 'action', orderable: false, searchable: false},
         ]
     }).buttons().container().appendTo('.data-table_wrapper .col-md-6:eq(0)');

   function printErrorMsg (msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display','block');
        $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        });
    }

    

    $('body').on('click', '.deleteKonseling', function (){
        var result = confirm("Apakah Anda yakin menghapus data ini?");
        var id = $(this).data('id');
        var url = '{{ route("admin.konselingHiv.destroy", ":id") }}';
        urllink = url.replace(':id', id);
        if(result){
            $.ajax({
                type: "DELETE",
                url: urllink,
                success: function (data) {
                if($.isEmptyObject(data.error)){
                    $(".alert-success").css('display','block');
                    $('.success').html("Data Berhasil Dihapus.");
                    $(".print-error-msg-delete").css('display','none');
                    setTimeout(function(){
                        location.reload();
                    }, 1000)
                }else{
                    $(".alert-success").css('display','none');
                    printErrorMsgDelete(data.error);
                }
                }
            });
        }else{
            return false;
        }
    });
    
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
