@extends('layout.main')

@section('title', 'Dashboard')

@section('content')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<figure class="highcharts-figure">
    <div id="container"></div>
        <div id="genderChart" style="height: 400px; margin-top: 50px;"></div>
        <div id="matkulPerProdiChart" style="height: 400px; margin-top: 50px;"></div>
        <div id="jadwalPerDosenChart" style="height: 400px; margin-top: 50px;"></div>
        <div id="prodiPerFakultasChart" style="height: 400px; margin-top: 50px;"></div>

</figure>
<style>
.highcharts-figure,
.highcharts-data-table table {
    min-width: 310px;
    max-width: 800px;
    margin: 1em auto;
}

#container {
    height: 400px;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}

.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}

.highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
    padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tbody tr:nth-child(even) {
    background: #f8f8f8;
}

.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

.highcharts-description {
    margin: 0.3rem 10px;
}

</style>
<script>
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Mahasiswa Berdasarkan Program Studi'
    },
    subtitle: {
        text:
            'Source: Universitas MDP 2025'
    },
    xAxis: {
        categories: [@foreach ($mahasiswaprodi as $item)
            '{{ $item->nama }}',
        @endforeach],
        crosshair: true,
        accessibility: {
            description: 'Program Studi'
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Mahasiswa'
        }
    },
    tooltip: {
        valueSuffix: '(Orang)'
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [
        {
            name: 'Mahasiswa',
            data: [
                @foreach ($mahasiswaprodi as $item)
                    {{ $item->jumlah_mahasiswa }},
                @endforeach
            ]
        }
    ]
});

Highcharts.chart('genderChart', {
    chart: {
        type: 'pie'
    },
    title: {
        text: 'Statistik Jenis Kelamin Mahasiswa'
    },
    subtitle: {
        text: 'Source: Universitas MDP 2025'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.y} Mahasiswa</b>'
    },
    accessibility: {
        point: {
            valueSuffix: ' Mahasiswa'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'Jumlah',
        colorByPoint: true,
        data: [{
            name: 'Laki-laki',
            y: {{ $jumlahLaki }}
        }, {
            name: 'Perempuan',
            y: {{ $jumlahPerempuan }}
        }]
    }]
});

Highcharts.chart('prodiPerFakultasChart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Program Studi per Fakultas'
    },
    xAxis: {
        categories: [
            @foreach ($prodiPerFakultas as $item)
                '{{ $item->fakultas }}',
            @endforeach
        ],
        title: {
            text: 'Fakultas'
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Prodi'
        },
        allowDecimals: false
    },
    tooltip: {
        valueSuffix: ' Prodi'
    },
    series: [{
        name: 'Program Studi',
        data: [
            @foreach ($prodiPerFakultas as $item)
                {{ $item->jumlah_prodi }},
            @endforeach
        ]
    }]
});


Highcharts.chart('matkulPerProdiChart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Mata Kuliah per Program Studi'
    },
    xAxis: {
        categories: [
            @foreach ($matkulPerProdi as $item)
                '{{ $item->nama }}',
            @endforeach
        ],
        title: {
            text: 'Program Studi'
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Mata Kuliah'
        },
        allowDecimals: false
    },
    tooltip: {
        valueSuffix: ' Mata Kuliah'
    },
    series: [{
        name: 'Mata Kuliah',
        data: [
            @foreach ($matkulPerProdi as $item)
                {{ $item->jumlah_matkul }},
            @endforeach
        ]
    }]
});

Highcharts.chart('jadwalPerDosenChart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Jadwal yang Dimiliki Setiap Dosen'
    },
    xAxis: {
        categories: [
            @foreach ($jadwalPerDosen as $dosen)
                '{{ $dosen->name }}',
            @endforeach
        ],
        title: {
            text: 'Dosen'
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Jadwal'
        },
        allowDecimals: false
    },
    tooltip: {
        valueSuffix: ' Jadwal'
    },
    series: [{
        name: 'Jadwal',
        data: [
            @foreach ($jadwalPerDosen as $dosen)
                {{ $dosen->jumlah_jadwal }},
            @endforeach
        ]
    }]
});

</script>
@endsection

