@extends('site.master.master')
@section('content')
<div class="highlights">
    <div class="highlights-header">
        <div>
            <h1>Casos no Brasil</h1>
            <small>Atualizado em: 29/07/2020 19:30</small>
        </div>
        <div>
            <button class="button">Faça já seu registro</button>
        </div>
    </div>
    <div class="boxes">
        <div class="box warning">
            <div class="title">Casos ativos</div>
            <div class="count">736473647</div>
        </div>
        <div class="box success">
            <div class="title">Casos recuperados</div>
            <div class="count">736473647</div>
        </div>
        <div class="box info">
            <div class="title">Casos confirmados</div>
            <div class="count">736473647</div>
        </div>
        <div class="box danger">
            <div class="title">Óbitos confirmados</div>
            <div class="count">736473647</div>
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