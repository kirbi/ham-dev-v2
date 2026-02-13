@extends('layoutadmin.app')

@section('content')
<br>
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <h2>GRAFIK FOLLOW UP ART PASIEN PERTAHUN</h2>
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
                            <label for="tahun" class="col-5">Mulai Tahun</label>
                            <select name="tahun_mulai" id="tahun_mulai" class="col-7 filter">
                                <option value="">-- Pilih --</option>
                                @foreach($tahun as $thn)
                                    <option value="{{$thn->tahun}}">{{$thn->tahun}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row p-2">
                            <label for="tahun" class="col-5">Sampai Tahun</label>
                            <select name="tahun_akhir" id="tahun_akhir" class="col-7 filter">
                                <option value="">-- Pilih --</option>
                                @foreach($tahun as $thn)
                                    <option value="{{$thn->tahun}}">{{$thn->tahun}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row p-2">
                            <label for="cd4" class="col-5">Jumlah CD 4</label>
                            <select name="operator" id="operator" class="col-4 filter">
                                <option value="=">(=) Sama Dengan</option>
                                <option value=">">(>) Lebih Besar Dari</option>
                                <option value="<">(<) Lebih Kecil Dari</option>
                            </select>
                            <input class="col-3 filter" type="number" name="cd4" id="cd4" placeholder="450"></input>
                        </div>
                        <div class="row p-2">
                            <label for="statusFungsional" class="col-5">Status Fungsional</label>
                            <select class="col-7 filter" id="statusFungsional" name="statusFungsional">
                                <option value="">-- Pilih --</option>
                                @foreach($statusFungsional as $sf)
                                    <option value="{{$sf->id_status_fungsional}}">{{$sf->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row p-2">
                            <label for="hamil" class="col-5">Hamil</label>
                            <select name="hamil" id="hamil" class="col-7 filter">
                                <option value="">-- Pilih --</option>
                                <option value="Ya">Ya</option>
                                <option value="Tidak">Tidak</option>
                            </select>
                        </div>
                        <div class="row p-2">
                            <label for="infeksiOportunistik" class="col-5">Infeksi Oportunistik</label>
                            <select name="infeksiOportunistik" id="infeksiOportunistik" class="col-7 filter">
                                <option value="">-- Pilih --</option>
                                @foreach($infeksiOportunistik as $ip)
                                    <option value="{{$ip->id_infeksi_oportunistik}}">{{$ip->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row p-2">
                            <label for="statusTb" class="col-5">Status TB</label>
                            <select class="col-7 filter" id="statusTb" name="statusTb">
                                <option value="">-- Pilih --</option>
                                @foreach($statusTb as $st)
                                    <option value="{{$st->id_status_tb}}">{{$st->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row p-2">
                            <label for="ppk" class="col-5">PPK</label>
                            <select class="col-7 filter" id="ppk" name="ppk">
                                <option value="">-- Pilih --</option>
                                <option value="Ya">Ya</option>
                                <option value="Tidak">Tidak</option>
                            </select>
                        </div>
                        <div class="row p-2">
                            <label for="adherenceArt" class="col-5">Adherence ART</label>
                            <select class="col-7 filter" id="adherenceArt" name="adherenceArt">
                                <option value="">-- Pilih --</option>
                                @foreach($adherenceArt as $aa)
                                    <option value="{{$aa->id_adherence_art}}">{{$aa->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row p-2">
                            <label for="efekSamping" class="col-5">Efek Samping</label>
                            <select class="col-7 filter" id="efekSamping" name="efekSamping">
                                <option value="">-- Pilih --</option>
                                @foreach($efekSamping as $es)
                                    <option value="{{$es->id_efek_samping}}">{{$es->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row p-2">
                            <label for="rujukKeSpesialis" class="col-5">Rujuk Ke Spesialis</label>
                            <select class="col-7 filter" id="rujukKeSpesialis" name="rujukKeSpesialis">
                                <option value="">-- Pilih --</option>
                                <option value="Ya">Ya</option>
                                <option value="Tidak">Tidak</option>
                            </select>
                        </div>
                        <div class="row p-2">
                            <label for="diberiKondom" class="col-5">Diberi kondom</label>
                            <select class="col-7 filter" id="diberiKondom" name="diberiKondom">
                                <option value="">-- Pilih --</option>
                                <option value="Ya">Ya</option>
                                <option value="Tidak">Tidak</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-center">
                            <h3 class="card-title">Follow Up ART Pasien + HIV AIDS </h3>
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
                labels: ['JAN', 'FEB', 'MAR', 'APR', 'MEI', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
                datasets: [{
                        label: 'Jumlah',
                        backgroundColor: '#007bff',
                        borderColor: '#007bff',
                        data:''
                    }
                ]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        max:100
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
            url: "{{ route('admin.dashboard.followUpTahunan') }}",
            success: function(response) {
                salesChart.data.labels = response.data.label;
                salesChart.data.datasets[0].data = response.data.jumlah;
                salesChart.options.scales.y.max = Math.max(...response.data.jumlah) + 10;
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
                    'tahun_akhir' : $('#tahun_akhir').val(),
                    'cd4' : $('#cd4').val(),
                    'operator' : $('#operator').val(),
                    'statusFungsional' : $('#statusFungsional').val(),
                    'hamil' : $('#hamil').val(),
                    'infeksiOportunistik' : $('#infeksiOportunistik').val(),
                    'statusTb' : $('#statusTb').val(),
                    'ppk' : $('#ppk').val(),
                    'adherenceArt' : $('#adherenceArt').val(),
                    'efekSamping' : $('#efekSamping').val(),
                    'rujukKeSpesialis' : $('#rujukKeSpesialis').val(),
                    'diberiKondom' : $('#diberiKondom').val()
                },
                url: "{{ route('admin.dashboard.followUpTahunan.filter') }}",
                type: "POST",
                dataType: 'json',
                success: function(response) {
                    salesChart.data.labels = response.data.label;
                    salesChart.data.datasets[0].data = response.data.jumlah;
                    salesChart.options.scales.y.max = Math.max(...response.data.jumlah)+10;
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