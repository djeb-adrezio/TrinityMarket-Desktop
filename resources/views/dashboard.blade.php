@extends('layouts.layout')
@section('title', 'Tableau de bord — Time')
@section('content')

<div class="page-head">
    <div class="page-head__title">
        <h1>Tableau de bord</h1>
        <span class="pill">En ligne</span>
    </div>
    <p>Vue d'ensemble de votre journée et accès rapide aux modules.</p>
</div>

<h2 class="section-title">Raccourcis</h2>
<div class="grid">
    <a class="card card--link" href="{{ route('pointed') }}">
        <div class="card__head">
            <strong>Pointages du jour</strong>
            <x-icon name="arrow" />
        </div>
        <p class="stat__hint">Arrivées, pauses et sorties relevées aujourd'hui.</p>
    </a>

    <a class="card card--link" href="{{ route('kpi.index') }}">
        <div class="card__head">
            <strong>Indicateurs</strong>
            <x-icon name="arrow" />
        </div>
        <p class="stat__hint">Heures travaillées, santé des équipes, tendances.</p>
    </a>

    <a class="card card--link" href="{{ route('home') }}">
        <div class="card__head">
            <strong>Mon compte</strong>
            <x-icon name="arrow" />
        </div>
        <p class="stat__hint">Retour à l'écran de connexion.</p>
    </a>
</div>

<h2 class="section-title">Ma journée</h2>
<div class="empty">
    <span class="empty__icon"><x-icon name="calendar" :size="22" class="icon--lg" /></span>
    <span class="empty__title">Aucune donnée branchée sur cet écran</span>
    <span class="empty__text">
        Cette page est servie par une route sans contrôleur : elle n'interroge pas encore
        l'API. Les pointages réels sont visibles sur <a href="{{ route('pointed') }}">la page Pointages</a>.
    </span>
</div>

@endsection
