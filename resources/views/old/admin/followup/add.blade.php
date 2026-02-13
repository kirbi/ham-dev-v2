@extends('layoutadmin.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <h3>Data Follow Up Perawatan Pasien & Terapi Antiretroviral</h3>
            </div>
        </div>
    </div>
</div>
<div class="alert alert-success" style="display:none">
    <p class='success'></p>
</div>
<div class="alert alert-danger print-error-msg" style="display:none">
    <ul></ul>
</div>
<br>
<div class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row dflex justify-content-center">
                            <h5>Tambah Data Follow Up Pasien "{{$pasien->nama}}"</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="followUpForm" name="followUpForm" class="form-horizontal">
                            <input type="hidden" name="id_pasien" id="id_pasien" value="{{$pasien->id_pasien}}" readonly>
                            <input type="hidden" name="id_riwayat_perawatan_pasien" id="id_riwayat_perawatan_pasien" value="" readonly>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group row">
                                        <label for="tanggal_pengobatan" class="col-sm-3 control-label">*Tanggal Follow Up</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" id="tanggal_pengobatan" name="tanggal_pengobatan" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group row">
                                        <label for="rencana_kunjungan_selanjutnya" class="col-sm-3 control-label">*Rencana Tanggal Follow Up Selanjutnya</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" id="rencana_kunjungan_selanjutnya" name="rencana_kunjungan_selanjutnya" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group row">
                                        <label for="berat_bedan" class="col-sm-3 control-label">*Berat Badan (Kg)</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="berat_badan" name="berat_badan" placeholder="56.8" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group row">
                                        <label for="tinggi_bedan" class="col-sm-3 control-label">Tinggi Badan (Cm) <i>*untuk anak</i> </label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="tinggi_bedan" name="tinggi_bedan" placeholder="123" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class= "form-group row">
                                        <label for="id_status_fungsional" class="col-sm-3 control-label">*Status Fungsional</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="id_status_fungsional" id="id_status_fungsional">
                                                <?php
                                                    foreach($statusFungsional as $sf){ ?>
                                                        <option value="<?=$sf->id_status_fungsional?>"><?=$sf->nama?></option>
                                                <?php   } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group row">
                                        <label for="stadium_who" class="col-sm-3 control-label">Stadium WHO</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="stadium_who" name="stadium_who" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group row">
                                        <label for="hamil" class="col-sm-3 control-label">Hamil</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="hamil" id="hamil">
                                                <option value="Tidak">Tidak</option>
                                                <option value="Ya">Ya</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group row">
                                        <label for="metode_kb" class="col-sm-3 control-label">Metode KB</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="metode_kb" name="metode_kb"value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class= "form-group row">
                                        <label for="id_infeksi_oportunistik" class="col-sm-3 control-label">Infeksi Oportunistik</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="id_infeksi_oportunistik" id="id_infeksi_oportunistik">
                                                <option value="">-- Pilih --</option>
                                               @foreach($infeksiOportunistik as $io)
                                                    <option value="<?=$io->id_infeksi_oportunistik?>"><?=$io->nama?></option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group row">
                                        <label for="obat_untuk_io" class="col-sm-3 control-label">Obat untuk IO</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="obat_untuk_io" name="obat_untuk_io" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class= "form-group row">
                                        <label for="id_status_tb" class="col-sm-3 control-label">Status TB</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="id_status_tb" id="id_status_tb">
                                                <?php
                                                    foreach($statusTb as $st){ ?>
                                                        <option value="<?=$st->id_status_tb?>"><?=$st->nama?></option>
                                                <?php   } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group row">
                                        <label for="ppk" class="col-sm-3 control-label">PPK</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="ppk" id="ppk">
                                                <option value="Tidak">Tidak</option>
                                                <option value="Ya">Ya</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-12 col-sm-6">
                                    <div class= "form-group row">
                                        <label for="id_status_tb" class="col-sm-3 control-label">*Paduan ART</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="id_paduan_art" name="id_paduan_art">
                                                @foreach($paduanArt as $pa)
                                                    <option value="{{$pa->id_paduan_art}}">{{$pa->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group row">
                                        <label for="dosis" class="col-sm-3 control-label">Dosis</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="dosis" name="dosis" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class= "form-group row">
                                        <label for="id_adherence_art" class="col-sm-3 control-label">*Adherence ART</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="id_adherence_art" name="id_adherence_art">
                                                @foreach($adherenceArt as $aa)
                                                    <option value="{{$aa->id_adherence_art}}">{{$aa->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class= "form-group row">
                                        <label for="id_efek_samping" class="col-sm-3 control-label">Efek Samping ART</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="id_efek_samping" name="id_efek_samping">
                                                <option value="">-- Pilih --</option>
                                                @foreach($efekSamping as $es)
                                                    <option value="{{$es->id_efek_samping}}">{{$es->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group row">
                                        <label for="jumlah_cd4" class="col-sm-3 control-label">Jumlah CD4</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="jumlah_cd4" name="jumlah_cd4" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group row">
                                        <label for="viral_load" class="col-sm-3 control-label">Viral Load</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="viral_load" name="viral_load" placeholder="" value="" maxlength="11">
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="col-12 col-sm-6">
                                    <div class="form-group row">
                                        <label for="hasil_lab" class="col-sm-3 control-label">Hasil Lab</label>
                                        <div class="col-sm-9">
                                            <textarea type="text" class="form-control" id="hasil_lab" name="hasil_lab"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group row">
                                        <label for="diberi_kondom" class="col-sm-3 control-label">Diberikan Kondom</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="diberi_kondom" id="diberi_kondom">
                                                <option value="Tidak">Tidak</option>
                                                <option value="Tidak Ada">Tidak Ada</option>
                                                <option value="Ya">Ya</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group row">
                                        <label for="rujuk_ke_spesialis" class="col-sm-3 control-label">Rujuk Ke Spesialis atau MRS</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="rujuk_ke_spesialis" id="rujuk_ke_spesialis">
                                                <option value="Tidak">Tidak</option>
                                                <option value="Ya">Ya</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group row">
                                        <label for="sisa_obat" class="col-sm-3 control-label">Sisa Obat ARV<i>(Dalam Tablet)</i></label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="sisa_obat" name="sisa_obat" placeholder="3" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row dflex justify-content-center">
                                <button type="reset" class="btn btn-danger m-2" id="resetBtn" value="reset">Reset Data</button>
                                <button type="submit" class="btn btn-primary m-2" id="saveBtn" value="create">Simpan</button>
                            </div>
                        </form>
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

<script type="text/javascript">
$(function () {
     
     $.ajaxSetup({
         headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
     
     $('#saveBtn').click(function (e) {
         e.preventDefault();
         $(this).html('Menyimpan..');
     
         $.ajax({
             data: $('#followUpForm').serialize(),
             url: "{{ route('admin.followup.store') }}",
             type: "POST",
             dataType: 'json',
             success: function (data) {
                if($.isEmptyObject(data.error)){
                    $('#followUpForm').trigger("reset");
                    $('#saveBtn').html('Simpan Data');
                    $(".alert-success").css('display','block');
                    $('.success').html("Data Berhasil Disimpan.");
                    $(".print-error-msg").css('display','none');
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
 });
</script>

  
   
@endsection
