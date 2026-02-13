@extends('layoutkonselor.app')

@section('content')
<br>
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <h2>PERSENTASE PASIEN POSITIF HIV</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Filter Data</h3>
                        </div>
                    </div>
                    <div class="card-body" id="filter">
                        <div class="row p-2">
                            <label for="status_aktif" class="col-5">Status Aktif</label>
                            <select name="statusAktif" id="statusAktif" class="col-7 filter">
                                <option value="">-- Pilih --</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                                <option value="Hilang Kontak">Hilang Kontak</option>
                                <option value="Meninggal">Meninggal</option>
                                <option value="Dirujuk">Dirujuk</option>
                            </select>
                        </div>
                        <div class="row p-2">
                            <label for="jenis_pasien" class="col-5">Jenis Pasien</label>
                            <select name="jenisPasien" id="jenisPasien" class="col-7 filter">
                                <option value="">-- Pilih --</option>
                                <option value="Baru">Baru</option>
                                <option value="Rujukan">Rujukan</option>
                            </select>
                        </div>
                        <div class="row p-2">
                            <label for="entry point" class="col-5">Entry Point</label>
                            <select class="col-7 filter" id="entryPoint" name="entryPoint">
                                <option value="">-- Pilih --</option>
                                @foreach($entryPoint as $ep)
                                    <option value="{{$ep->id_entry_point}}">{{$ep->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row p-2">
                            <label for="pendidikan" class="col-5">Pendidikan Terakhir</label>
                            <select class="col-7 filter" id="pendidikan" name="pendidikan">
                                <option value="">-- Pilih --</option>
                                @foreach($pendidikan as $p)
                                    <option value="{{$p->id_pendidikan}}">{{$p->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row p-2">
                            <label for="pekerjaan" class="col-5">Pekerjaan</label>
                            <select class="col-7 filter" id="pekerjaan" name="pekerjaan">
                                <option value="">-- Pilih --</option>
                                @foreach($pekerjaan as $p)
                                    <option value="{{$p->id_pekerjaan}}">{{$p->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row p-2">
                            <label for="status_pernikahan" class="col-5">Status Pernikahan</label>
                            <select class="col-7 filter" id="statusPernikahan" name="statusPernikahan">
                                <option value="">-- Pilih --</option>
                                @foreach($statusPernikahan as $sp)
                                    <option value="{{$sp->id_status_pernikahan}}">{{$sp->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-center">
                            <h3 class="card-title">Pasien + HIV AIDS</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="position-relative mb-4">
                                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>

                        <div class="d-flex flex-row justify-content-end">
                            <span class="mr-2">
                                <i class="fas fa-square text-primary"></i> Nilai dalam %
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('alte/plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('alte/plugins/chart.js/chartjs-plugin-labels.js')}}"></script>

<script type="text/javascript">
    $(function() {
        var ticksStyle = {
            fontColor: '#495057',
            fontStyle: 'bold'
        }
        var mode = 'index';
        var intersect = true;

        var $salesChart = $('#pieChart');
        // eslint-disable-next-line no-unused-vars
        var salesChart = new Chart($salesChart, {
            type: 'pie',
            data: {
                labels: '',
                datasets: [{
                        data:'',                        
                        backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#007bff', '#6c757d', '#dc3545', '#6610f2', '#28a745'],
                    }
                ]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: true
                },
                plugins: {
                    labels: [
                        {
                            render: function (args) {
                                return args.value + "%";
                            },
                            position: 'outside'
                        }
                    ]
                }
            }
        });
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "GET",
            url: "{{ route('konselor.dashboard.indexPasienTahunanPersentase') }}",
            success: function(response) {
                salesChart.data.labels = response.data.label;
                salesChart.data.datasets[0].data = response.data.value;
                salesChart.update();
                mulai =  (new Date).getFullYear()-4;
                akhir =  (new Date).getFullYear();
            },
            error: function(xhr) {
                console.log(xhr.responseJSON);
            }
        });

        $('.filter').click(function (e) {
            e.preventDefault();
            $.ajax({
                data: {
                    'entryPoint' : $('#entryPoint').val(),
                    'pekerjaan' : $('#pekerjaan').val(),
                    'statusPernikahan' : $('#statusPernikahan').val(),
                    'pendidikan' : $('#pendidikan').val(),
                    'jenisPasien' : $('#jenisPasien').val(),
                    'statusAktif' : $('#statusAktif').val()
                },
                url: "{{ route('konselor.dashboard.indexPasienTahunanPersentase.filter') }}",
                type: "POST",
                dataType: 'json',
                success: function(response) {
                    salesChart.data.labels = response.data.label;
                    salesChart.data.datasets[0].data = response.data.value;
                    salesChart.update();
                },
                error: function(xhr) {
                    console.log(xhr.responseJSON);
                }
            });
        });
       
    });
</script>



@endsection