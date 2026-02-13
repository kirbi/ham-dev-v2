@extends('layoutkonselor.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <h3>Konseling dan Cek HIV</h3>
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
                            <h5>Tambah Data Konseling Pasien "{{$pasien->nama}}"</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="konselingForm" name="konselingForm" class="form-horizontal">
                            <input type="hidden" name="id_pasien" id="id_pasien" value="{{$pasien->id_pasien}}" readonly>
                            <input type="hidden" name="id_konseling_hiv" id="id_konseling_hiv" value="" readonly>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group row">
                                        <label for="no_registrasi" class="col-sm-3 control-label">No Registrasi</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="no_registrasi" name="no_registrasi" placeholder="56-34-3234-32" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
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
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group row">
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
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class= "form-group row">
                                        <label for="id_pekerjaan" class="col-sm-3 control-label">Pekerjaan</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="id_pekerjaan" id="id_pekerjaan">
                                                <?php
                                                    foreach($pekerjaan as $p){ ?>
                                                        <option value="<?=$p->id_pekerjaan?>"><?=$p->nama?></option>
                                                <?php   } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-3 control-label">Alamat</label>
                                        <div class="col-sm-9">
                                            <textarea type="text" class="form-control" id="alamat" name="alamat"></textarea>
                                        </div>
                                    </div>
                                </div>
                                @if($pasien->jenis_kelamin =='Laki-laki')
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group row">
                                            <label for="ada_pasangan_perempuan" class="col-sm-3 control-label">Punya Pasangan Seks Perempuan</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="ada_pasangan_perempuan" id="ada_pasangan_perempuan">
                                                    <option value="Tidak">Tidak</option>
                                                    <option value="Ya">Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group row">
                                            <label for="pasangan_hamil" class="col-sm-3 control-label">Apakah Dia Hamil</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="pasangan_hamil" id="pasangan_hamil">
                                                    <option value="Tidak">Tidak</option>
                                                    <option value="Ya">Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if($pasien->jenis_kelamin =='Perempuan')
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group row">
                                            <label for="jumlah_pasangan_laki_laki" class="col-sm-3 control-label">Jumlah Pasangan Laki-laki</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="jumlah_pasangan_laki_laki" name="jumlah_pasangan_laki_laki" value="0">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class= "form-group row">
                                            <label for="status_kehamilan" class="col-sm-3 control-label">Status Kehamilan</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="status_kehamilan" id="status_kehamilan">
                                                    <option value="Tidak Hamil">Tidak Hamil</option>
                                                    <option value="Trimester I">Trimester I</option>
                                                    <option value="Trimester II">Trimester II</option>
                                                    <option value="Trimester III">Trimester III</option>
                                                    <option value="Tidak Tahu">Tidak Tahu</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-12 col-sm-6">
                                    <div class="form-group row">
                                        <label for="jumlah_anak_kandung" class="col-sm-3 control-label">Jumlah Anak Kandung</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="jumlah_anak_kandung" name="jumlah_anak_kandung" value="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group row">
                                        <label for="umur_anak_terakhir" class="col-sm-3 control-label">Umur Anak Terakhir</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="umur_anak_terakhir" name="umur_anak_terakhir" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group row">
                                        <label for="status_pasien" class="col-sm-3 control-label">Status Pasien</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="status_pasien" id="status_pasien">
                                                <option value="Baru">Baru</option>
                                                <option value="Lama">Lama</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group row">
                                        <label for="tanggal_konseling_pra_tes_hiv" class="col-sm-3 control-label">Tanggal Konseling Pra Tes HIV</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" id="tanggal_konseling_pra_tes_hiv" name="tanggal_konseling_pra_tes_hiv"value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group row">
                                        <label for="tanggal_konseling" class="col-sm-3 control-label">*Tanggal Konseling</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" id="tanggal_konseling" name="tanggal_konseling" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group row">
                                        <label for="tanggal_konseling_pasca_tes_hiv" class="col-sm-3 control-label">Tanggal Konseling Pasca Tes HIV</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" id="tanggal_konseling_pasca_tes_hiv" name="tanggal_konseling_pasca_tes_hiv"value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                        <div class="form-group row">
                                            <label for="pernah_tes_hiv_sebelumnya" class="col-sm-3 control-label">Pernah Tes HIV</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="pernah_tes_hiv_sebelumnya" id="pernah_tes_hiv_sebelumnya">
                                                    <option value="Tidak">Tidak</option>
                                                    <option value="Ya">Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                <div class="col-12 col-sm-6">
                                    <div class= "form-group row">
                                        <label for="id_alasan_tes_hiv" class="col-sm-3 control-label">Alasan Tes HIV</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="id_alasan_tes_hiv" id="id_alasan_tes_hiv">
                                                <option value="">-- Pilih --</option>
                                               @foreach($alasanTesHiv as $ath)
                                                    <option value="<?=$ath->id_alasan_tes_hiv?>"><?=$ath->nama?></option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group row">
                                        <label for="catatan_konseling" class="col-sm-3 control-label">Catatan Konseling</label>
                                        <div class="col-sm-9">
                                            <textarea type="text" class="form-control" id="catatan_konseling" name="catatan_konseling"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group row">
                                        <label for="kesediaan_tes_hiv" class="col-sm-3 control-label">Kesediaan Tes HIV</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="kesediaan_tes_hiv" id="kesediaan_tes_hiv">
                                                <option value="Tidak">Tidak</option>
                                                <option value="Ya">Ya</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class= "form-group row">
                                        <label for="id_konselor" class="col-sm-3 control-label">Konselor</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="id_konselor" id="id_konselor">
                                                <?php
                                                    foreach($konselor as $k){ ?>
                                                        <option value="<?=$k->id_konselor?>"><?=$k->nama?></option>
                                                <?php   } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="row">
                                        <label for="id_kabupaten" class="col-sm-3 control-label">Kabupaten/ Kota</label>
                                        <select class="form-control select2 col-7 col-sm-9" id="id_kabupaten" name="id_kabupaten">
                                                <option value="">Pilih</option>
                                            @foreach($kabupaten as $k)
                                                <option value="{{$k->id_kabupaten}}">{{$k->nama}}</option>
                                            @endforeach
                                        </select>
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
    $('.select2').select2();

     $.ajaxSetup({
         headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
     
     $('#saveBtn').click(function (e) {
         e.preventDefault();
         $(this).html('Menyimpan..');
     
         $.ajax({
             data: $('#konselingForm').serialize(),
             url: "{{ route('konselor.konselingHiv.store') }}",
             type: "POST",
             dataType: 'json',
             success: function (data) {
                if($.isEmptyObject(data.error)){
                    $('#konselingForm').trigger("reset");
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
