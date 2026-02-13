@extends('layoutkonselor.app')

@section('content')
<br>
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <h2>GRAFIK PASIEN ODHA BERDASARKAN KELOMPOK UMUR BERDASARKAN TAHUN</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Filter Data</h3>
                        </div>
                    </div>
                    <div class="card-body" id="filter">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="row p-2">
                                    <label for="tahun" class="col-5">Mulai Tahun</label>
                                    <select name="tahun_mulai" id="tahun_mulai" class="col-7 filter">
                                        <option value="">-- Pilih --</option>
                                        @foreach($tahun as $thn)
                                            <option value="{{$thn->tahun}}">{{$thn->tahun}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="row p-2">
                                    <label for="tahun" class="col-5">Sampai Tahun</label>
                                    <select name="tahun_akhir" id="tahun_akhir" class="col-7 filter">
                                        <option value="">-- Pilih --</option>
                                        @foreach($tahun as $thn)
                                            <option value="{{$thn->tahun}}">{{$thn->tahun}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-center">
                            <h3 class="card-title">Pasien ODHA Berdasarkan Kelompok Umur</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="position-relative mb-4">
                            <canvas id="pasien-bulanan" height="300"></canvas>
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
                labels: '',
                datasets: [
                    {
                        label: '# 0-17 Tahun',
                        data: '',
                        backgroundColor: '#007bff',
                        borderColor: '#007bff',
                        borderWidth: 1
                    },
                    {
                        label: '# 18-30 Tahun',
                        data: '',
                        backgroundColor: '#ced4da',
                        borderColor: '#ced4da',
                        borderWidth: 1
                    },
                    {
                        label: '# 31-40 Tahun',
                        data: '',
                        backgroundColor: '#dc3545',
                        borderColor: '#dc3545',
                        borderWidth: 1
                    },
                    {
                        label: '# >41 Tahun',
                        data: '',
                        backgroundColor: '#ffc107',
                        borderColor: '#ffc107',
                        borderWidth: 1
                    },
                    {
                        label: '# Tidak Diketahui',
                        data: '',
                        backgroundColor: '#e83e8c',
                        borderColor: '#e83e8c',
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
                        max: 50,
                    }
                },
                plugins: {
                    datalabels: {
                        autoPadding:true,
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
                },
                layout: {
                    autoPadding: true
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
            url: "{{ route('konselor.dashboard.indexPasienUmur') }}",
            success: function(response) {
                salesChart.data.labels = response.data.label;
                salesChart.data.datasets[0].data = response.data.satu;
                salesChart.data.datasets[1].data = response.data.dua;
                salesChart.data.datasets[2].data = response.data.tiga;
                salesChart.data.datasets[3].data = response.data.empat;
                salesChart.data.datasets[4].data = response.data.lima;
                salesChart.options.scales.y.max = Math.max(Math.max(...response.data.satu),Math.max(...response.data.dua),Math.max(...response.data.tiga),Math.max(...response.data.empat),Math.max(...response.data.lima)) + 10;
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
                    'tahun_mulai' : $('#tahun_mulai').val(),
                    'tahun_akhir' : $('#tahun_akhir').val()
                },
                url: "{{ route('konselor.dashboard.indexPasienUmur.filter') }}",
                type: "POST",
                dataType: 'json',
                success: function(response) {
                    salesChart.data.labels = response.data.label;
                    salesChart.data.datasets[0].data = response.data.satu;
                    salesChart.data.datasets[1].data = response.data.dua;
                    salesChart.data.datasets[2].data = response.data.tiga;
                    salesChart.data.datasets[3].data = response.data.empat;
                    salesChart.data.datasets[4].data = response.data.lima;
                    salesChart.options.scales.y.max = Math.max(Math.max(...response.data.satu),Math.max(...response.data.dua),Math.max(...response.data.tiga),Math.max(...response.data.empat),Math.max(...response.data.lima)) + 10;
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