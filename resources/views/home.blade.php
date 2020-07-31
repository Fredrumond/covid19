@extends('admin.master')

@section('content')
<figure class="highcharts-figure">
    <div id="container"></div>
</figure>
@endsection
@section('script')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></scrip
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>



$.ajax({
    url: 'https://api.covid19api.com/total/dayone/country/brazil',
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
        if(day.Date >= '2020-07-01T00:00:00Z'){
            Data.push(day.Date)
            ConfirmedCases.push(day.Confirmed)
            DeathsCases.push(day.Deaths)
            RecoveredCases.push(day.Recovered)
            ActiveCases.push(day.Active)
        }
        
        // console.log(day.Date)
    })  
    
    Highcharts.chart('container', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Numero de casos'
        },
        xAxis: {
            categories: Data
        },
        yAxis: {
            title: {
                text: 'Casos'
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
                name: 'Confirmados',
                data: ConfirmedCases
             },
             {
                name: 'Mortes',
                data: DeathsCases
             },
             {
                name: 'Recuperados',
                data: RecoveredCases
             },
             {
                name: 'Ativos',
                data: ActiveCases
             }
    ]
    });


//    console.log(response); 
// console.log(testeData)            
})
.fail(function(error) {
    console.log('Foi encontrado um erro durante a execução. Entre em contato com a equipe de desenvolvimento!');
    console.log(error);
})



</script>
@endsection

