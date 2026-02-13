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
                                <h5>Daftar Riwayat Terapi ART Pasien</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <table id="riwayatTerapiArt" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>No Rekam Medis</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Jenis Terapi</th>
                                            <th>Tempat Terapi</th>
                                            <th>Paduan ART</th>
                                            <th>Lama Penggunaan</th>
                                            <th>Dosis</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($riwayatTerapiArt as $rta)
                                            <tr>
                                                <td>{{$rta->pasien->nama}}</td>
                                                <td>{{$rta->pasien->no_rekam_medis}}</td>
                                                <td>{{$rta->pasien->jenis_kelamin}}</td>
                                                <td>{{$rta->jenisTerapi->nama}}</td>
                                                <td>{{$rta->tempatTerapi->nama}}</td>
                                                <td>{{$rta->paduanArt->nama}}</td>
                                                <td>{{$rta->lama_penggunaan}}</td>
                                                <td>{{$rta->dosis_art}}</td>
                                                <td><a href="/admin/pasien/detail/{{$rta->id_pasien}}" class="btn btn-primary m-2"><i class="fas fa-eye"></i> Detail Pasien</a></td>
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
    $("#riwayatTerapiArt").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#riwayatTerapiArt_wrapper .col-md-6:eq(0)');
   
  });
</script>
  
   
@endsection
