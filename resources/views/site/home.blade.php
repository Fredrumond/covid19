@extends('site.master.master')
@section('content')
<div class="highlights">
    <div class="highlights-header">
        <div>
            <h1>Casos no Brasil</h1>
            <small>Atualizado em: {{ $TotalCases->Date }}</small>
        </div>
        <div>
            <a class="button" href="{{ route('register') }}" >Faça já seu registro</a>
        </div>
    </div>
    <div class="boxes">
        <div class="box warning">
            <div class="title">Casos ativos</div>
            <div class="count">{{ $TotalCases->Active }}</div>
            <div class="count-news">+ {{ $TotalCases->LastActive }}</div>
        </div>
        <div class="box success">
            <div class="title">Casos recuperados</div>
            <div class="count">{{ $TotalCases->Recovered }}</div>
            <div class="count-news">+ {{ $TotalCases->LastRecovered }}</div>
        </div>
        <div class="box info">
            <div class="title">Casos confirmados</div>
            <div class="count">{{ $TotalCases->Confirmed }}</div>
            <div class="count-news">+ {{ $TotalCases->LastConfirmed }}</div>
        </div>
        <div class="box danger">
            <div class="title">Óbitos confirmados</div>
            <div class="count">{{ $TotalCases->Deaths }}</div>
            <div class="count-news">+{{ $TotalCases->LastDeaths }}</div>
        </div>
    </div>
</div>
<div class="informations">
    <div class="card">
        <div class="content-img">
            <img src="img/undraw_medical_care_movn.png" alt="">
        </div>
    </div>
    <div class="card">
        <div class="content-img">
            <img src="img/undraw_medical_research_qg4d.png" alt="">
        </div>
    </div>
    <div class="card">
        <div class="content-img">
            <img src="img/undraw_coming_home_52ir.png" alt="">
        </div>
    </div>
</div>
@endsection