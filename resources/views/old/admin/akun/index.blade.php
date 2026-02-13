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
                                <h2> Akun Anda</h2>
                            </div>
                        </div>
                    </div>
                    @if($data)
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-3">
                                <label for="username">User Name</label>
                                <p><b>{{$data->name}}</b></p>
                            </div>
                            <div class="col-12 col-sm-3">
                                <label for="username">Email</label>
                                <p><b>{{$data->email}}</b></p>
                            </div>
                            
                            <div class="col-12 col-sm-3">
                                <label for="role">Role</label>
                                <p><b>{{$data->type}}</b></p>
                            </div>

                            <div class="col-12 col-sm-3">
                                <a class="tn btn-danger btn-sm fas fa-edit m-2" href="javascript:void(0)" id="editPassword" data-id="{{$data->id}}">Ganti Password</a>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if(!$data)
                    <div class="card-body danger">
                        <div class="row">
                            <div class="col-12 ">
                                <h3 class="text-center text-danger">Akun Tidak Ditemukan!!!</h3>
                            </div>
                        </div>
                    </div>
                    @endif
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
                <form id="productForm" name="productForm" class="form-horizontal d-flex justify-content-center row">
                        <input type="hidden" name="id" id="id" value="{{$data->id}}" readonly>
                    <div class="col-12">
                        <div class="form-group row">
                            <label for="no_bpjs" class="col-sm-3 control-label">Password Baru</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password_baru" name="password_baru" placeholder="">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="form-group row">
                            <label for="no_bpjs" class="col-sm-3 control-label">Password Lama</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password_lama" name="password_lama" placeholder="">
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

<script type="text/javascript">
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('body').on('click', '#editPassword', function() {
            var id = $(this).data('id');
                $('#modelHeading').html("Ubah Password");
                $('#saveBtn').val("edit-user");
                $('#ajaxModel').modal('show');
        });
        $('#saveBtn').click(function(e) {
            e.preventDefault();
            $(this).html('Menyimpan..');

            $.ajax({
                data: $('#productForm').serialize(),
                url: "{{ route('admin.gantiPassword') }}",
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

    });
</script>



@endsection