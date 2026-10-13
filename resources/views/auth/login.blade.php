@extends('layouts.layout')
@section('title', 'Connexion — Time')
@section('bare', true)
@section('content')

{{-- Pas de backend d'authentification à ce stade : les champs sont présents mais
     non soumis, et l'action principale mène directement au tableau de bord. --}}
<div class="auth-shell">
    <div class="auth-card">
        <div class="brand brand--stacked">
            <img class="brand__logo" src="{{ asset('assets/img/logo.webp') }}"
                 width="48" height="48" alt="">
            <span class="brand__name">Time Manager</span>
        </div>
        <hr class="rule">
        <div class="auth-card__head">
            <h1>Bonjour</h1>
            <p>Connectez-vous pour badger et suivre votre temps.</p>
        </div>

        <div class="field">
            <label for="email">Adresse e-mail</label>
            <input id="email" type="email" name="email" autocomplete="email"
                   placeholder="prenom.nom@epitech.eu" inputmode="email">
        </div>

        <div class="field">
            <label for="password">Mot de passe</label>
            <input id="password" type="password" name="password"
                   autocomplete="current-password" placeholder="••••••••">
        </div>

        <div class="field-row">
            <label class="check">
                <input type="checkbox" name="remember">
                Se souvenir de moi
            </label>
            <span class="field__hint">Mot de passe oublié ?</span>
        </div>

        <a class="btn btn--primary btn--block" href="{{ route('logged.dashboard') }}">
            <x-icon name="log-in" />
            Se connecter
        </a>

        <div class="auth-foot">
            Accès direct : <a href="{{ route('pointed') }}">mes pointages du jour</a>
        </div>
    </div>
</div>

@endsection
