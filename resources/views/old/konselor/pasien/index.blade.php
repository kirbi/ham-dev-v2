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
                                <h2> Daftar Pasien</h2>
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
                                            <th>Jenis Kelamin</th>
                                            <th>NIK</th>
                                            <th>No Rekam Medis</th>
                                            <th>Status HIV</th>
                                            <th>Pasien</th>
                                            <th>Status Keaktifan</th>
                                            <th>Tahun Masuk</th>
                                            <th>Action</th>
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

<!-- Modal Edit data pasien-->
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
                    <input type="hidden" name="id_pasien" id="id_pasien" value="">
                    <div class="form-group row">
                        <label for="no_reg_nasional" class="col-sm-3 control-label">NO Registrasi Nasional*</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="no_reg_nasional" name="no_reg_nasional" placeholder="NO Registrasi Nasional" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="no_rekam_medis" class="col-sm-3 control-label">NO Rekam Medis*</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="no_rekam_medis" name="no_rekam_medis" placeholder="NO Rekam Medis" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 control-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="" maxlength="250" required="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group row">
                                <label for="tempat_lahir" class="col-sm-3 control-label">Tempat Lahir</label>
                                <div class="col-sm-9">
                                    <textarea id="tempat_lahir" name="tempat_lahir" required="" placeholder="Tempat Lahir" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group row">
                                <label for="tanggal_lahir" class="col-sm-3 control-label">Tanggal Lahir</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group row">
                                <label for="id_jenis_kelamin" class="col-sm-3 control-label">Jenis Kelamin</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group row">
                                <label for="id_status_pernikahan" class="col-sm-3 control-label">Status Pernikahan</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="id_status_pernikahan" id="id_status_pernikahan">
                                        <?php
                                        foreach ($statusPernikahan as $sp) { ?>
                                            <option value="<?= $sp->id_status_pernikahan ?>"><?= $sp->nama ?></option>
                                        <?php   } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group row">
                                <label for="alamat" class="col-sm-3 control-label">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea id="alamat" name="alamat" required="" placeholder="Alamat" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group row">
                                <label for="agama" class="col-sm-3 control-label">Agama</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="agama" name="agama">
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Aliran Kepercayaan">Aliran Kepercayaan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group row">
                                <label for="no_hp" class="col-sm-3 control-label">NO HP</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="6283" value="" maxlength="35">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group row">
                                <label for="nik" class="col-sm-3 control-label">NIK</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK" value="" maxlength="30">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group row">
                                <label for="no_kk" class="col-sm-3 control-label">NO KK</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="no_kk" name="no_kk" placeholder="NO KK" value="" maxlength="30">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group row">
                                <label for="no_bpjs" class="col-sm-3 control-label">NO BPJS</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="no_bpjs" name="no_bpjs" placeholder="NO BPJS" value="" maxlength="30">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group row">
                                <label for="no_bpjs" class="col-sm-3 control-label">Nama Ibu Kandung</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ibu_kandung" name="ibu_kandung" placeholder="" value="" maxlength="100">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group row">
                                <label for="id_konselor" class="col-sm-3 control-label">Konselor</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="id_konselor" id="id_konselor">
                                        <?php
                                        foreach ($konselor as $k) { ?>
                                            <option value="<?= $k->id_konselor ?>"><?= $k->nama ?></option>
                                        <?php   } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group row">
                                <label for="no_hp" class="col-sm-3 control-label">Jenis Pasien</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="jenis_pasien" name="jenis_pasien">
                                        <option value="Baru">Baru</option>
                                        <option value="Rujukan">Rujukan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group row">
                                <label for="id_pendidikan_terakhir" class="col-sm-3 control-label">Pendidikan Terakhir</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="id_pendidikan_terakhir" id="id_pendidikan_terakhir">
                                        <?php
                                        foreach ($pendidikan as $p) { ?>
                                            <option value="<?= $p->id_pendidikan ?>"><?= $p->nama ?></option>
                                        <?php   } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group row">
                                <label for="id_pekerjaan" class="col-sm-3 control-label">Pekerjaan</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="id_pekerjaan" id="id_pekerjaan">
                                        <?php
                                        foreach ($pekerjaan as $p) { ?>
                                            <option value="<?= $p->id_pekerjaan ?>"><?= $p->nama ?></option>
                                        <?php   } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group row">
                                <label for="status_aktif" class="col-sm-3 control-label">Status Aktif</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="status_aktif" name="status_aktif">
                                        <option value="Aktif">Aktif</option>
                                        <option value="Tidak Aktif">Tidak Aktif</option>
                                        <option value="Hilang Kontak">Hilang Kontak</option>
                                        <option value="Meninggal">Meninggal</option>
                                        <option value="Dirujuk">Dirujuk</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group row">
                                <label for="tanggal_masuk" class="col-sm-3 control-label">Tanggal Masuk(Mulai Pengobatan)</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group row">
                                <label for="tanggal_meninggal" class="col-sm-3 control-label">Tanggal Meninggal</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="tanggal_meninggal" name="tanggal_meninggal" value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group row">
                                <label for="tanggal_rujuk_masuk" class="col-sm-3 control-label">Tanggal Rujuk Masuk</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="tanggal_rujuk_masuk" name="tanggal_rujuk_masuk" value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group row">
                                <label for="tanggal_rujuk_keluar" class="col-sm-3 control-label">Tanggal Rujuk Keluar</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="tanggal_rujuk_keluar" name="tanggal_rujuk_keluar" value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group row">
                                <label for="tempat_tinggal" class="col-sm-3 control-label">Tempat Tinggal</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="tempat_tinggal" name="tempat_tinggal" placeholder="Rumah, Kos, dll" value="" maxlength="250">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group row">
                                <label for="tempat_rujuk_keluar" class="col-sm-3 control-label">Tempat Rujuk Keluar</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="tempat_rujuk_keluar" name="tempat_rujuk_keluar" placeholder="RS. Adam Malik, dll" value="" maxlength="250">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="row p-2">
                                <label for="id_provinsi" class="col-5">Provinsi</label>
                                <select class="form-control col-7" id="id_provinsi" name="id_provinsi">
                                    <option value="">-- Pilih Provinsi --</option>
                                    @foreach($provinsi as $k)
                                    <option value="{{$k->id_provinsi}}">{{$k->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="row p-2">
                                <label for="id_kabupaten" class="col-5">Kabupaten/ Kota</label>
                                <select class="form-control col-7 id_kabupaten" id="id_kabupaten" name="id_kabupaten">
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="row p-2">
                                <label for="id_kecamatan" class="col-5">Kecamatan</label>
                                <select class=" col-7 id_kecamatan" id="id_kecamatan" name="id_kecamatan" style="width: 100%;">
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="row p-2">
                                <label for="id_kecamatan" class="col-5">Kelurahan/Desa</label>
                                <select class=" col-7 id_desa" id="id_desa" name="id_desa" style="width: 100%;">
                                </select>
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
<script src="{{asset('alte/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('alte/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('alte/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>


<script type="text/javascript">
    $(function() {
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
            ajax: "{{ route('konselor.index.pasien') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'jenis_kelamin',
                    name: 'jenis_kelamin'
                },
                {
                    data: 'nik',
                    name: 'nik'
                },
                {
                    data: 'no_rekam_medis',
                    name: 'no_rekam_medis'
                },
                {
                    data: 'status_hiv',
                    name: 'status_hiv'
                },
                {
                    data: 'jenis_pasien',
                    name: 'jenis_pasien'
                },
                {
                    data: 'status_aktif',
                    name: 'status_aktif'
                },
                {
                    data: 'tanggal_masuk',
                    name: 'tanggal_masuk'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        $('#createNewProduct').click(function() {
            $('#saveBtn').val("create-product");
            $('#id_pasien').val('');
            $('#productForm').trigger("reset");
            $('#modelHeading').html("Tambah Data");
            $('#ajaxModel').modal('show');
        });

        $('body').on('click', '.editProduct', function() {
            var id_pasien = $(this).data('id');
            $.get("{{ url('konselor/pasien/edit') }}" + '/' + id_pasien , function(data) {
                $('#modelHeading').html("Ubah Data");
                $('#saveBtn').val("edit-user");
                $('#ajaxModel').modal('show');
                kabupaten(data.id_provinsi, data.id_kabupaten);
                kecamatan(data.id_kabupaten,data.id_kecamatan);
                desa(data.id_kecamatan,data.id_desa);
                $('#id_pasien').val(data.id_pasien);
                $('#nama').val(data.nama);
                $('#no_rekam_medis').val(data.no_rekam_medis);
                $('#nik').val(data.nik);
                $('#jenis_kelamin').val(data.jenis_kelamin);
                $('#no_reg_nasional').val(data.no_reg_nasional);
                $('#no_rekam_medis').val(data.no_rekam_medis);
                $('#no_kk').val(data.no_kk);
                $('#no_bpjs').val(data.no_bpjs);
                $('#tempat_lahir').val(data.tempat_lahir);
                $('#tanggal_lahir').val(data.tanggal_lahir);
                $('#tanggal_masuk').val(data.tanggal_masuk);
                $('#tanggal_meninggal').val(data.tanggal_meninggal);
                $('#tanggal_rujuk_masuk').val(data.tanggal_rujuk_masuk);
                $('#tanggal_rujuk_keluar').val(data.tanggal_rujuk_keluar);
                $('#alamat').val(data.alamat);
                $('#no_hp').val(data.no_hp);
                $('#id_pendidikan_terakhir').val(data.id_pendidikan_terakhir);
                $('#id_pekerjaan').val(data.id_pekerjaan);
                $('#id_status_pernikahan').val(data.id_status_pernikahan);
                $('#id_konselor').val(data.id_konselor);
                $('#ibu_kandung').val(data.ibu_kandung);
                $('#jenis_pasien').val(data.jenis_pasien);
                $('#status_aktif').val(data.status_aktif);
                $('#agama').val(data.agama);
                $('#tempat_tinggal').val(data.tempat_tinggal);
                $('#tempat_rujuk_keluar').val(data.tempat_rujuk_keluar);
                $('#no_kk').val(data.no_kk);
                $('#id_provinsi').val(data.id_provinsi);
            })
        });

        $('#saveBtn').click(function(e) {
            e.preventDefault();
            $(this).html('Menyimpan..');

            $.ajax({
                data: $('#productForm').serialize(),
                url: "{{ route('konselor.store.pasien') }}",
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $('#productForm').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        $('#saveBtn').html('Simpan Data');
                        $(".alert-success").css('display', 'block');
                        $('.success').html("Data Berhasil Disimpan.");
                        $(".print-error-msg").css('display', 'none');
                        table.draw();
                    } else {
                        console.log('Error:', data);
                        $(".alert-success").css('display', 'none');
                        $('#saveBtn').html('Simpan Data');
                        printErrorMsg(data.error);
                    }
                }
            });
        });

        function printErrorMsg(msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display', 'block');
            $.each(msg, function(key, value) {
                $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
            });
        }

        $('#id_provinsi').change(function (e){
            var id = $('#id_provinsi').val();
            kabupaten(id,null);
        });
        $('#id_kabupaten').change(function (e){
            var id = $('#id_kabupaten').val();
            kecamatan(id,null);
        });
        $('#id_kecamatan').change(function (e){
            var id = $('#id_kecamatan').val();
            desa(id,null);
        });
        
        function desa(id,idk){
            $('#id_desa').empty();
            var url = '{{ route("optionDesa", ":id") }}';
            url = url.replace(':id', id);
            $.get(url, function (data) {
                $('#id_desa').append(data);
                $('#id_desa').val(idk);
            });
        }
        
        function kecamatan(id,idk){
            $('#id_kecamatan').empty();
            var url = '{{ route("optionKecamatan", ":id") }}';
            url = url.replace(':id', id);
            $.get(url, function (data) {
                $('#id_kecamatan').append(data);
                $('#id_kecamatan').val(idk);
            })
        }
        
        function kabupaten(id,idk){
            $('#id_kabupaten').empty();
            var url = '{{ route("optionKabupaten", ":id") }}';
            url = url.replace(':id', id);
            $.get(url, function (data) {
                $('#id_kabupaten').append(data);
                $('#id_kabupaten').val(idk)
            });
        }
    });
</script>



@endsection