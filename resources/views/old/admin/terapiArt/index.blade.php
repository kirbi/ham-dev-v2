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
                            <div class="col-12">
                                <h5>Daftar Terapi ART Pasien</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <table id="terapiArt" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>No Rekam Medis</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Fase</th>
                                            <th>Alasan</th>
                                            <th>Penjelasan</th>
                                            <th>Paduan ART</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $ta)
                                            <tr>
                                                <td>{{$ta->pasien->nama}}</td>
                                                <td>{{$ta->pasien->no_rekam_medis}}</td>
                                                <td>{{$ta->tanggal_mulai}}</td>
                                                <td>{{$ta->fase}}</td>
                                                <td>{{$ta->alasan->nama}}</td>
                                                <td>{{$ta->penjelasan}}</td>
                                                <td>{{$ta->paduanArt->nama}}</td>
                                                <td><a href="/admin/pasien/detail/{{$ta->id_pasien}}" class="btn btn-primary m-2"><i class="fas fa-eye"></i> Detail Pasien</a></td>
                                            </tr>
                                        @endforeach

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
<script>
  $(function () {
    $("#terapiArt").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#terapiArt_wrapper .col-md-6:eq(0)');
   
  });
</script>
  
   
@endsection
