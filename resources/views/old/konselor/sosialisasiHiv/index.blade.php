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
                            <div class="col-6">
                                <h2>Kegiatan Sosialisasi HIV</h2>
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
                                            <th>Nama Kegiatan</th>
                                            <th>Tanggal</th>
                                            <th>peserta_hadir</th>
                                            <th>Kabuapten</th>
                                            <th>Kecamatan</th>
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
                        <input type="hidden" name="id_sosialisasi_hiv" id="id_sosialisasi_hiv">
                        <div class="form-group row">
                            <label for="nama_kegiatan" class="col-sm-3 control-label">Nama Kegiatan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" placeholder="Nama Kegiatan" value="" maxlength="150" required="">
                            </div>
                        </div>
                        <div class= "form-group row">
                            <label for="tanggal_kegiatan" class="col-sm-3 control-label">Tanggal Kegiatan</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="tanggal_kegiatan" name="tanggal_kegiatan" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 control-label">Target Kegiatan</label>
                            <div class="col-sm-9">
                                <textarea id="target_kegiatan" name="target_kegiatan" required="" placeholder="Target" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tempat_kegiatan" class="col-sm-3 control-label">Nama Tempat</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="tempat_kegiatan" name="tempat_kegiatan" placeholder="Cafe ....." value="" maxlength="250" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_narahubung" class="col-sm-3 control-label">Nama Narahubung</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama_narahubung" name="nama_narahubung" placeholder="Nama Narahubung" value="" maxlength="250" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kontak_narahubung" class="col-sm-3 control-label">Kontak Narahubung</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="kontak_narahubung" name="kontak_narahubung" placeholder="Kontak Narahubung" value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="peserta_hadir" class="col-sm-3 control-label">Jumlah Peserta Hadir</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="peserta_hadir" name="peserta_hadir" value="" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_kabupaten" class="col-sm-3 control-label">Kabupaten/ Kota</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="id_kabupaten" name="id_kabupaten">
                                        <option value="">Pilih</option>
                                    @foreach($kabupaten as $k)
                                        <option value="{{$k->id_kabupaten}}">{{$k->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row  ">
                            <label for="id_kecamatan" class="col-sm-3 control-label">Kecamatan</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="id_kecamatan" name="id_kecamatan" style="width: 100%;">
                                </select>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Simpan</button>
                            </div>
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
    <!--detail -->
    <div class="modal fade" id="ajaxModel2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading">Detail Kegiatan Sosialisasi HIV</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-5">
                            <b>Nama Kegiatan</b>
                        </div>
                        <div class="col-7">
                            <span id="dnama_kegiatan"></span>
                        </div>

                        <div class="col-5">
                            <b>Tempat Kegiatan</b>
                        </div>
                        <div class="col-7">
                            <span id="dnama_tempat"></span>
                        </div>
                        
                        <div class="col-5">
                            <b>Tanggal Kegiatan</b>
                        </div>
                        <div class="col-7">
                            <span id="dtanggal_kegiatan"></span>
                        </div>
                        
                        <div class="col-5">
                            <b>Deskripsi Kegiatan</b>
                        </div>
                        <div class="col-7">
                            <span id="ddeskripsi_kegiatan"></span>
                        </div>
                        
                        <div class="col-5">
                            <b>Nama Narahubung</b>
                        </div>
                        <div class="col-7">
                            <span id="dnama_narahubung"></span>
                        </div>
                        
                        <div class="col-5">
                            <b>Kontak Narahubung</b>
                        </div>
                        <div class="col-7">
                            <span id="dkontak_narahubung"></span>
                        </div>
                        
                        <div class="col-5">
                            <b>Jumlah Peserta</b>
                        </div>
                        <div class="col-7">
                            <span id="dhadir"></span>
                        </div>
                        
                        <div class="col-5">
                            <b>Jumlah Positif</b>
                        </div>
                        <div class="col-7">
                            <span id="djumlah_positif"></span>
                        </div>
                        
                        <div class="col-5">
                            <b>Jumlah Negatif</b>
                        </div>
                        <div class="col-7">
                            <span id="djumlah_negatif"></span>
                        </div>
                        
                        <div class="col-5">
                            <b>Kabupaten</b>
                        </div>
                        <div class="col-7">
                            <span id="dkabupaten"></span>
                        </div>
                        
                        <div class="col-5">
                            <b>Kecamatan</b>
                        </div>
                        <div class="col-7">
                            <span id="dkecamatan"></span>
                        </div>

                    </div>
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
     
    $('.select2').select2();

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
         ajax: "{{ route('konselor.sosialisasiHiv.index') }}",
         columns: [
             {data: 'DT_RowIndex', name: 'DT_RowIndex'},
             {data: 'tempat_kegiatan', name: 'tempat_kegiatan'},
             {data: 'tanggal_kegiatan', name: 'tanggal_kegiatan'},
             {data: 'peserta_hadir', name: 'peserta_hadir'},
             {data: 'kabupaten', name: 'kabupaten'},
             {data: 'kecamatan', name: 'kecamatan'},
             {data: 'action', name: 'action', orderable: false, searchable: false},
         ]
     });
      
     $('#createNewProduct').click(function () {
         $('#saveBtn').val("create-product");
         $('#id_sosialisasi_hiv').val('');
         $('#productForm').trigger("reset");
         $('#modelHeading').html("Tambah Data");
         $('#ajaxModel').modal('show');
     });
     
     $('body').on('click', '.editProduct', function () {
         var id_sosialisasi_hiv = $(this).data('id');
         $.get("{{url('konselor/sosialisasiHiv/edit')}}" +'/' + id_sosialisasi_hiv, function (data) {
             $('#modelHeading').html("Ubah Data");
             $('#saveBtn').val("edit-user");
             $('#ajaxModel').modal('show');
             $('#id_sosialisasi_hiv').val(data.id_sosialisasi_hiv);
             $('#nama_kegiatan').val(data.nama_kegiatan);
             $('#target_kegiatan').val(data.target_kegiatan);
             $('#tempat_kegiatan').val(data.tempat_kegiatan);
             $('#tanggal_kegiatan').val(data.tanggal_kegiatan);
             $('#nama_narahubung').val(data.nama_narahubung);
             $('#kontak_narahubung').val(data.kontak_narahubung);
             $('#peserta_hadir').val(data.peserta_hadir);
             $('#id_kabupaten').val(data.id_kabupaten);
             $.each($('#id_kabupaten option'),function(a,b){
                if($(this).val() == data.id_kabupaten){
                        $(this).attr('selected',true)
                }
            });
             kecamatanList(data.id_kabupaten, data.id_kecamatan);
         })
     });
     
     
     $('body').on('click', '.detailProduct', function () {
         var id_sosialisasi_hiv = $(this).data('id');
         $.get("{{url('konselor/sosialisasiHiv/edit')}}" +'/' + id_sosialisasi_hiv, function (data) {
             $('#dnama_kegiatan').html(data.nama_kegiatan);
             $('#ddeskripsi_kegiatan').html(data.target_kegiatan);
             $('#dnama_tempat').html(data.tempat_kegiatan);
             $('#dtanggal_kegiatan').html(data.tanggal_kegiatan);
             $('#dnama_narahubung').html(data.nama_narahubung);
             $('#dkontak_narahubung').html(data.kontak_narahubung);
             $('#dhadir').html(data.peserta_hadir);
             $('#dkabupaten').html(data.kabupaten.nama);
             $('#dkecamatan').html(data.kecamatan.nama);
             $('#ajaxModel2').modal('show');
         })
     });

     $('#saveBtn').click(function (e) {
         e.preventDefault();
         $(this).html('Menyimpan..');
     
         $.ajax({
             data: $('#productForm').serialize(),
             url: "{{ route('konselor.sosialisasiHiv.store') }}",
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
                    table.ajax.reload();
                }else{
                    console.log('Error:', data);
                    $(".alert-success").css('display','none');
                    $('#saveBtn').html('Simpan Data');
                    printErrorMsg(data.error);
                }
             }
         });
     });
     $('#id_kabupaten').change(function (e){
        var id = $('#id_kabupaten').val();
        var url = '{{ route("optionKecamatan", ":id") }}';
        url = url.replace(':id', id);
         $.get(url, function (data) {
             $('#id_kecamatan').append(data);
         })
     });

    function kecamatanList(id_kabupaten,id_kecamatan){
        console.log(id_kabupaten);
        var id = id_kabupaten;
        var url = '{{ route("optionKecamatan", ":id") }}';
        url = url.replace(':id', id);
         $.get(url, function (data) {
             $('#id_kecamatan').append(data);
             $('#id_kecamatan').val(id_kecamatan);
                $.each($('#id_kecamatan'),function(a,b){
                    if($(this).val() == id_kecamatan){
                        $(this).attr('selected',true)
                 }
            });
         });
         
            
    }
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
