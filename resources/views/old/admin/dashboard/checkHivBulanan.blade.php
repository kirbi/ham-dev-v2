@extends('layoutadmin.app')

@section('content')
<br>
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <h2>GRAFIK KEGIATAN CHECK HIV</h2>
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
                            <label for="id_kabupaten" class="col-5">Kabupaten/ Kota</label>
                            <select class="form-control select2 col-7 filter " id="id_kabupaten" name="id_kabupaten">
                                    <option value="">Pilih</option>
                                @foreach($kabupaten as $k)
                                    <option value="{{$k->id_kabupaten}}">{{$k->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row p-2">
                            <label for="id_kecamatan" class="col-5">Kecamatan</label>
                            <select class=" col-7 filter" id="id_kecamatan" name="id_kecamatan" style="width: 100%;">
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Kegiatan Check HIV <b class="tahun"></b></h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="position-relative mb-4">
                            <canvas id="pasien-bulanan" height="300"></canvas>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-center">
                            <h3 class="card-title">Kegiatan Check HIV <b class="tahun"></b></h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="position-relative mb-4">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                    <th>Bulan</th>
                                    <th>Negatif</th>
                                    <th>Positif</th>
                                    <th>Total</th>
                                </thead>
                                <tbody id="table-check">

                                </tbody>

                            </table>
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
                        label: 'Negatif',
                        backgroundColor: '#007bff',
                        borderColor: '#007bff',
                        data:''
                    },
                    {
                        label: 'Positif',
                        backgroundColor: '#ced4da',
                        borderColor: '#ced4da',
                        data:''
                    },
                    {
                        label: 'Total',
                        backgroundColor: '#dc3545',
                        borderColor: '#dc3545',
                        data:''
                    },
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
        

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "GET",
            url: "{{ route('admin.dashboard.checkHivBulanan') }}",
            success: function(response) {
                salesChart.data.datasets[0].data = response.data.negatif;
                salesChart.data.datasets[1].data = response.data.positif;
                salesChart.data.datasets[2].data = response.data.total;
                salesChart.options.scales.y.max = Math.max(...response.data.total) + 10;
                salesChart.update();
                const tahun =  new Date();
                $('.tahun').html("Tahun "+(new Date).getFullYear());
                tablecheck(response);
            },
            error: function(xhr) {
                console.log(xhr.responseJSON);
            }
        });
        function tablecheck(data){
            $('#table-check').html('');
            var i = 0;
            var bulan =1;
            for(i; i<data.data['positif'].length; i++){
                $('#table-check').append("<tr><td>"+bulan+"</td><td>"+data.data.negatif[i]+"</td><td>"+data.data.positif[i]+"</td><td>"+data.data.total[i]+"</td></tr>");
                bulan++;
            }
        }

        $('.filter').click(function (e) {
            var tahun = new Date().getFullYear();
            if($('#tahun').val() !== ''){
                tahun = $('#tahun').val(); 
            }
            e.preventDefault();
            $.ajax({
                data: {
                    'tahun' : $('#tahun').val(),
                    'id_kabupaten' : $('#id_kabupaten').val(),
                    'id_kecamatan' : $('#id_kecamatan').val()
                },
                url: "{{ route('admin.dashboard.checkHivBulanan.filter') }}",
                type: "POST",
                dataType: 'json',
                success: function(response) {
                    salesChart.data.datasets[0].data = response.data.negatif;
                    salesChart.data.datasets[1].data = response.data.positif;
                    salesChart.data.datasets[2].data = response.data.total;
                    salesChart.options.scales.y.max = Math.max(...response.data.total) + 10;
                    salesChart.update();
                    $('.tahun').html("Tahun "+tahun);
                    tablecheck(response);
                },
                error: function(xhr) {
                    console.log(xhr.responseJSON);
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
       
    });
</script>



@endsection