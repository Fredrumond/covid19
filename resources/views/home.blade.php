@extends('admin.master')

@section('content')
<div class="filter">
    <div class="title">
        <h1>Realize aqui sua pesquisa por país</h1>
        <small>Últimos 15 dias</small>
    </div>
    <div class="actions">
        <select class="select-days">
        <option value=""></option>
        <option value="10">10 Dias</option>
        <option value="15">15 Dias</option>
        <option value="20">20 Dias</option>
        <option value="25">25 Dias</option>
        <option value="30">30 Dias</option>
        </select>
        <select class="select-country">
            @foreach($Countries as $Country)
                <option value="{{ $Country['Slug'] }}"> {{ $Country['Country'] }} </option>
            @endforeach
        </select>
        <button class="btn-filter" href="#" >Filtrar</button>
    </div>
</div>
<div class="chart-grid">
    <div id="confirmed-chart"></div>
    <div id="deaths-chart"></div>
</div>
<div class="chart-grid">
    <div id="recovered-chart"></div>
    <div id="active-chart"></div>
</div>
@endsection
@section('script')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/coloraxis.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

$(".btn-filter").click(function() {
    let Country = $('.select-country').val()
    let Days = $('.select-days').val()

    if(Days == ''){
        HttpRequest(Country)
    }
    
    HttpRequest(Country, Days)
});

function HttpRequest(Country, Days = null){
    let url = ''

    if(Days){
        url = `/details-coutry/${Country}/${Days}`
    } else {
        url = `/details-coutry/${Country}`
    }
    
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json'
    })
    .done(function(response) { 
        let Data = [];
        let ConfirmedCases = [];
        let DeathsCases = [];
        let RecoveredCases = [];
        let ActiveCases = [];
        response.map(day => {
            Data.push(day.Date)
            ConfirmedCases.push(day.Confirmed)
            DeathsCases.push(day.Deaths)
            RecoveredCases.push(day.Recovered)
            ActiveCases.push(day.Active)
        })

        CreatChart({
            reference: 'confirmed-chart',
            chartConfig: {
                title: 'Numero de confirmados',
                yLegend: 'Casos',
                xCategories: Data,
                serie: 'Confirmados',
                data: ConfirmedCases,
                color: '#cce5ff'
            }
        });

        CreatChart({
            reference: 'deaths-chart',
            chartConfig: {
                title: 'Numero de óbitos',
                yLegend: 'Casos',
                xCategories: Data,
                serie: 'Óbitos',
                data: DeathsCases,
                color: '#f8d7da'
            }
        });

        CreatChart({
            reference: 'recovered-chart',
            chartConfig: {
                title: 'Numero de casos recuperados',
                yLegend: 'Casos',
                xCategories: Data,
                serie: 'Recuperados',
                data: RecoveredCases,
                color: '#d4edda'
            }
        });

        CreatChart({
            reference: 'active-chart',
            chartConfig: {
                title: 'Numero de casos ativos',
                yLegend: 'Casos',
                xCategories: Data,
                serie: 'Ativos',
                data: ActiveCases,
                color: '#fff3cd'
            }
        });
    })
    .fail(function(error) {
        console.log('Foi encontrado um erro durante a execução. Entre em contato com a equipe de desenvolvimento!');
    })
}


function CreatChart(config){
    const { reference, chartConfig } = config;

    Highcharts.chart(reference, {
        chart: {
            type: 'line',
            width: 700
        },
        title: {
            text: chartConfig.title
        },
        xAxis: {
            categories: chartConfig.xCategories
        },
        yAxis: {
            title: {
                text: chartConfig.yLegend
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [
            {
                name: chartConfig.serie,
                data: chartConfig.data,
                color: chartConfig.color
             }
        ],
        responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }
    });
}
</script>
@endsection

