@extends('layouts.layout')
@section('title', 'KPI — Time')
@section('content')

<div class="page-head">
    <div class="page-head__title">
        <h1>Indicateurs</h1>
        <span class="pill pill--warn">Bientôt</span>
    </div>
    <p>Suivi des heures, de l'assiduité et de la santé des équipes.</p>
</div>

<div class="empty">
    <span class="empty__icon"><x-icon name="chart" :size="22" class="icon--lg" /></span>
    <span class="empty__title">Les KPI arrivent bientôt</span>
    <span class="empty__text">
        Cette section accueillera les heures travaillées, les retards, le respect des pauses
        et la santé par équipe.
    </span>
    <a class="btn" href="{{ route('pointed') }}">
        <x-icon name="clock" />
        Voir les pointages
    </a>
</div>

@endsection
