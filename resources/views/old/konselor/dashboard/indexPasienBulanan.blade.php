@extends('layoutkonselor.app')

@section('content')
<br>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <h2>GRAFIK PASIEN HIV-AIDS PERBULAN</h2>
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
                            <label for="tahun" class="col-5">Tahun</label>
                            <select name="tahun" id="tahun" class="col-7 filter">
                                <option value="">-- Pilih --</option>
                                @foreach($tahun as $thn)
                                    <option value="{{$thn->tahun}}">{{$thn->tahun}}</option>
                                @endforeach
                            </select>
                        </div>
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
                            <h3 class="card-title">Pasien ODHA<b class="tahun"></b></h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="position-relative mb-4">
                            <canvas id="pasien-bulanan" height="300"></canvas>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-center">
                            <h3 class="card-title">Pasien HIV - AIDS <b class="tahun"></b></h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="position-relative mb-4">
                            <canvas id="pasien-bulanan-hivadis" height="300"></canvas>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('alte/plugins/chart/chart.min.js')}}"></script>
<script src="{{asset('alte/plugins/chart/chartjs-plugin-datalabels.min.js')}}"></script>

<script type="text/javascript">
    $(function() {
        Chart.register(ChartDataLabels);
        var ctx = document.getElementById('pasien-bulanan');
        var salesChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['JAN', 'FEB', 'MAR', 'APR', 'MEI', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
                datasets: [
                    {
                        label: '# Laki-Laki',
                        data: '',
                        backgroundColor: '#007bff',
                        borderColor: '#007bff',
                        borderWidth: 1
                    },
                    {
                        label: '# Perempuan',
                        data: '',
                        backgroundColor: '#ced4da',
                        borderColor: '#ced4da',
                        borderWidth: 1
                    },
                    {
                        label: '# Total',
                        data: '',
                        backgroundColor: '#dc3545',
                        borderColor: '#dc3545',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        max:10
                    }
                },
                plugins: {
                    datalabels: {
                        anchor: 'end',
                        align: 'top',
                        font: {
                            weight: 'bold',
                            size: 16
                        }
                    },
                    legend: {
                        position: 'bottom'
                    },
                }
            },
            layout: {
                autoPadding: true
            }
        });

        
        Chart.register(ChartDataLabels);
        var ctx2 = document.getElementById('pasien-bulanan-hivadis');
        var hivadis = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['JAN', 'FEB', 'MAR', 'APR', 'MEI', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
                datasets: [
                    {
                        label: '# HIV',
                        data: '',
                        backgroundColor: '#007bff',
                        borderColor: '#007bff',
                        borderWidth: 1
                    },
                    {
                        label: '# AIDS',
                        data: '',
                        backgroundColor: '#ced4da',
                        borderColor: '#ced4da',
                        borderWidth: 1
                    },
                    {
                        label: '# Total',
                        data: '',
                        backgroundColor: '#dc3545',
                        borderColor: '#dc3545',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 10
                    }
                },
                plugins: {
                    datalabels: {
                        anchor: 'end',
                        align: 'top',
                        font: {
                            weight: 'bold',
                            size: 16
                        }
                    },
                    legend: {
                        position: 'bottom'
                    },
                }
            },
            layout: {
                autoPadding: true
            }
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "GET",
            url: "{{ route('konselor.dashboard.indexPasienBulanan') }}",
            success: function(response) {
                salesChart.data.datasets[0].data = response.data.lakilaki;
                salesChart.data.datasets[1].data = response.data.perempuan;
                salesChart.options.scales.y.max = Math.max(...response.data.total) + 10;
                salesChart.update();
                hivadis.data.datasets[0].data = response.data.hiv;
                hivadis.data.datasets[1].data = response.data.aids;
                hivadis.data.datasets[2].data = response.data.total;
                hivadis.options.scales.y.max = Math.max(...response.data.total) + 10;
                hivadis.update();
                const tahun =  new Date();
                $('.tahun').html("Tahun "+(new Date).getFullYear());
            },
            error: function(xhr) {
                console.log(xhr.responseJSON);
            }
        });

        $('.filter').click(function (e) {
            var tahun = new Date().getFullYear();
            if($('#tahun').val() !== ''){
                tahun = $('#tahun').val(); 
            }
            e.preventDefault();
            $.ajax({
                data: {
                    'tahun' : $('#tahun').val(),
                    'entryPoint' : $('#entryPoint').val(),
                    'pekerjaan' : $('#pekerjaan').val(),
                    'statusPernikahan' : $('#statusPernikahan').val(),
                    'pendidikan' : $('#pendidikan').val(),
                    'jenisPasien' : $('#jenisPasien').val(),
                    'statusAktif' : $('#statusAktif').val()
                },
                url: "{{ route('konselor.dashboard.indexPasienBulanan.filter') }}",
                type: "POST",
                dataType: 'json',
                success: function(response) {
                    salesChart.data.datasets[0].data = response.data.lakilaki;
                    salesChart.data.datasets[1].data = response.data.perempuan;
                    salesChart.data.datasets[2].data = response.data.total;
                    salesChart.options.scales.y.max = Math.max(...response.data.total) + 10;
                    salesChart.update();
                    hivadis.data.datasets[0].data = response.data.hiv;
                    hivadis.data.datasets[1].data = response.data.aids;
                    hivadis.data.datasets[2].data = response.data.total;
                    hivadis.options.scales.y.max = Math.max(...response.data.total) + 10;
                    hivadis.update();
                    $('.tahun').html("Tahun "+tahun);
                },
                error: function(xhr) {
                    console.log(xhr.responseJSON);
                }
            });
        });
       
    });
</script>



@endsection