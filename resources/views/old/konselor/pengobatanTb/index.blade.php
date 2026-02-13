@extends('layoutkonselor.app')
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
                                <h2>Daftar Riwayat Pengobatan TB Pasien HIV</h2>
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
                                            <th>NIK</th>
                                            <th>Tanggal Mulai Terapi</th>
                                            <th>Tanggal Selesai Terapi</th>
                                            <th>Tipe TB</th>
                                            <th>Klasifikasi TB</th>
                                            <th>Lokasi TB</th>
                                            <th>Paduan TB</th>
                                            <th>No Reg. TB</th>
                                            <th>Kabupaten Pengobatan</th>
                                            <th>Sarana Kesehatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $pt)
                                            <tr>
                                                <td>{{$pt->pasien->nama}}</td>
                                                <td>{{$pt->pasien->nik}}</td>
                                                <td>{{$pt->pasien->no_rekam_medis}}</td>
                                                <td>{{$pt->tanggal_mulai_terapi}}</td>
                                                <td>{{$pt->tanggal_selesai_terapi}}</td>
                                                <td>{{$pt->tipeTb->nama}}</td>
                                                <td>{{$pt->klasifikasiTb->nama}}</td>
                                                <td>{{$pt->lokasi_tb}}</td>
                                                <td>{{$pt->paduanTb->nama}}</td>
                                                <td>{{$pt->no_reg_tb}}</td>
                                                <th>{{$pt->kabupaten->nama}}</th>
                                                <td>{{$pt->nama_sarana_kesehatan}}</td>
                                                <td><a href="/konselor/pasien/detail/{{$pt->id_pasien}}" class="btn btn-primary m-2"><i class="fas fa-eye"></i> Detail Pasien</a></td>
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
