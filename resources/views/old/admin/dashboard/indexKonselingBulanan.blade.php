@extends('layoutadmin.app')

@section('content')
<br>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <h2>GRAFIK PASIEN KONSELING PERBULAN</h2>
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
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-center">
                            <h3 class="card-title">Pasien Konseling HIV <b class="tahun"></b></h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="position-relative mb-4">
                            <canvas id="konseling-bulanan" height="300"></canvas>
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
        var ctx = document.getElementById('konseling-bulanan');
        var salesChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['JAN', 'FEB', 'MAR', 'APR', 'MEI', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
                datasets: [
                    {
                        label: '# Jumlah',
                        data: '',
                        backgroundColor: '#007bff',
                        borderColor: '#007bff',
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
            url: "{{ route('admin.dashboard.konselingBulanan') }}",
            success: function(response) {
                salesChart.data.datasets[0].data = response.data.jumlah;
                salesChart.options.scales.y.max = Math.max(...response.data.jumlah) + 10;
                salesChart.update();
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
                },
                url: "{{ route('admin.dashboard.konselingBulanan.filter') }}",
                type: "POST",
                dataType: 'json',
                success: function(response) {
                    salesChart.data.datasets[0].data = response.data.jumlah;
                    salesChart.options.scales.y.max = max(response.data.jumlah.join()) + 10;
                    salesChart.update();
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