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
                            <h2>Daftar Riwayat Follow Up Pasien</h2>
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
                                            <th>Tanggal Follow Up</th>
                                            <th>Tanggal Follow Up Selanjutnya</th>
                                            <th>Sisa Dosis Obat (hari)</th>
                                            <th>Paduan ART</th>
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
 
<!-- Modal Detail -->
<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center" id="modelHeading"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <dl class="row">
                            <dt class="col-12 col-sm-6">Nama</dt>
                            <dd class="col-12 col-sm-6" id="nama"></dd>
                            <dt class="col-12 col-sm-6">Tanggal Follow Up</dt>
                            <dd class="col-12 col-sm-6" id="tanggal_pengobatan"></dd>
                            <dt class="col-12 col-sm-6">Tanggal Rencana Follow Up Selanjutnya</dt>
                            <dd class="col-12 col-sm-6" id="rencana_kunjungan_selanjutnya"></dd>
                            <dt class="col-12 col-sm-6">Sisa Obat ARV<i>(Dalam Tablet)</i></dt>
                            <dd class="col-12 col-sm-6" id="sisa_obat"></dd>
                            <dt class="col-12 col-sm-6">Berat badan</dt>
                            <dd class="col-12 col-sm-6" id="berat_badan"></dd>
                            <dt class="col-12 col-sm-6">Tinggi Badan</dt>
                            <dd class="col-12 col-sm-6" id="tinggi_badan"></dd>
                            <dt class="col-12 col-sm-6">Status Fungsional</dt>
                            <dd class="col-12 col-sm-6" id="status_fungsional"></dd>
                            <dt class="col-12 col-sm-6">Standium WHO</dt>
                            <dd class="col-12 col-sm-6" id="stadium_who"></dd>
                            <dt class="col-12 col-sm-6">Hamil</dt>
                            <dd class="col-12 col-sm-6" id="hamil"></dd>
                            <dt class="col-12 col-sm-6">Metode KB</dt>
                            <dd class="col-12 col-sm-6" id="etode_kb"></dd>
                            <dt class="col-12 col-sm-6">Infeksi Oportunistik</dt>
                            <dd class="col-12 col-sm-6" id="infeksi_oportunistik"></dd>
                        </dl>
                    </div>
                    <div class="col-12 col-md-6">
                        <dl class="row">
                            <dt class="col-12 col-sm-6">Obat untuk IO</dt>
                            <dd class="col-12 col-sm-6" id="obat_untuk_io"></dd>
                            <dt class="col-12 col-sm-6">Status TB</dt>
                            <dd class="col-12 col-sm-6" id="status_tb"></dd>
                            <dt class="col-12 col-sm-6">PPK</dt>
                            <dd class="col-12 col-sm-6" id="ppk"></dd>
                            <dt class="col-12 col-sm-6">Paduan ART</dt>
                            <dd class="col-12 col-sm-6" id="paduan_art"></dd>
                            <dt class="col-12 col-sm-6">Dosis</dt>
                            <dd class="col-12 col-sm-6" id="dosis"></dd>
                            <dt class="col-12 col-sm-6">Adherence ART</dt>
                            <dd class="col-12 col-sm-6" id="adherence_art"></dd>
                            <dt class="col-12 col-sm-6">Efek Samping ART</dt>
                            <dd class="col-12 col-sm-6" id="efek_samping"></dd>
                            <dt class="col-12 col-sm-6">Jumlah CD4</dt>
                            <dd class="col-12 col-sm-6" id="jumlah_cd4"></dd>
                            <dt class="col-12 col-sm-6">Viral Load</dt>
                            <dd class="col-12 col-sm-6" id="viral_load"></dd>
                            <dt class="col-12 col-sm-6">Hasil Lab</dt>
                            <dd class="col-12 col-sm-6" id="hasil_lab"></dd>
                            <dt class="col-12 col-sm-6">Diberikan Kondom</dt>
                            <dd class="col-12 col-sm-6" id="diberi_kondom"></dd>
                            <dt class="col-12 col-sm-6">Rujuk Ke Spesialis atau MRS</dt>
                            <dd class="col-12 col-sm-6" id="rujuk_ke_spesialis"></dd>
                        </dl>
                    </div>
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
         ajax: "{{ route('admin.followup.index') }}",
         "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
         columns: [
             {data: 'DT_RowIndex', name: 'DT_RowIndex'},
             {data: 'nama', name: 'nama'},
             {data: 'no_rekam_medis', name: 'no_rekam_medis'},
             {data: 'tanggal_pengobatan', name: 'tanggal_pengobatan'},
             {data: 'rencana_kunjungan_selanjutnya', name: 'rencana_kunjungan_selanjutnya'},
             {data: 'sisa_obat', name: 'sisa_obat'},
             {data: 'paduanArt', name: 'paduanArt'},
             {data: 'action', name: 'action', orderable: false, searchable: false},
         ]
     }).buttons().container().appendTo('.data-table_wrapper .col-md-6:eq(0)');

    $('body').on('click', '.detailFollowUp', function () {
        var id_riwayat_perawatan_pasien = $(this).data('id');
        var id = $(this).data('id');
        var url = '{{ route("admin.followup.detail", ":id") }}';
        url = url.replace(':id', id);
         $.get(url, function (data) {
             console.log(data);
             $('#nama').html(data.nama);
             $('#tanggal_pengobatan').html(data.tanggal_pengobatan);
             $('#rencana_kunjungan_selanjutnya').html(data.rencana_kunjungan_selanjutnya);
             $('#sisa_obat').html(data.sisa_obat);
             $('#berat_badan').html(data.berat_badan);
             $('#tinggi_badan').html(data.tinggi_badan);
             $('#stadium_who').html(data.stadium_who);
             $('#hamil').html(data.hamil);
             $('#metode_kb').html(data.metode_kb);
             $('#infeksi_oportunistik').html(data.infeksi_oportunistik);
             $('#obat_untuk_io').html(data.obat_untuk_io);
             $('#status_tb').html(data.status_tb);
             $('#ppk').html(data.ppk);
             $('#paduan_art').html(data.paduan_art);
             $('#dosis').html(data.dosis);
             $('#adherence_art').html(data.adherence_art);
             $('#efek_samping').html(data.efek_samping);
             $('#jumlah_cd4').html(data.jumlah_cd4);
             $('#viral_load').html(data.viral_load);
             $('#hasil_lab').html(data.hasil_lab);
             $('#diberi_kondom').html(data.diberi_kondom);
             $('#status_fungsional').html(data.status_fungsional);
             $('#rujuk_ke_spesialis').html(data.rujuk_ke_spesialis);
             
             $('#modelHeading').html("Detail Data Follow UP Terapi ART");
             $('#ajaxModel').modal('show');
         })
     });

     $('body').on('click', '.deleteFollowUp', function (){
         var result = confirm("Apakah Anda yakin menghapus data ini?");
        var id = $(this).data('id');
        var url = '{{ route("admin.followup.destroy", ":id") }}';
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
