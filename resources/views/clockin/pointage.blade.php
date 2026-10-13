@extends('layouts.layout')
@section('title', 'Pointages — Time')
@section('content')

<div class="page-head">
    <div class="page-head__title">
        <h1>Pointages du jour</h1>
        <span class="pill {{ ($data['status'] ?? null) === 'ok' ? '' : 'pill--bad' }}">
            API {{ $data['status'] ?? 'indisponible' }}
        </span>
    </div>
    <p>Relevés de badgeage, équipes et collaborateurs.</p>
</div>

<h2 class="section-title">Journées pointées ({{ count($data['clockedExample'] ?? []) }})</h2>
@forelse ($data['clockedExample'] ?? [] as $i => $item)
    @if ($loop->first)<div class="grid">@endif
        <div class="card">
            <div class="card__head">
                <strong>Journée</strong>
                <span class="card__meta">#{{ $i + 1 }}</span>
            </div>
            <div class="steps">
                <div class="step">
                    <span class="step__label" style="color: var(--ok)"><x-icon name="log-in" :size="16" /><span style="color: var(--muted)">Arrivée</span></span>
                    <time>{{ $item['first'] ?? '—' }}</time>
                </div>
                <div class="step">
                    <span class="step__label" style="color: var(--warn)"><x-icon name="coffee" :size="16" /><span style="color: var(--muted)">Départ pause</span></span>
                    <time>{{ $item['pause1'] ?? '—' }}</time>
                </div>
                <div class="step">
                    <span class="step__label" style="color: var(--linen)"><x-icon name="rotate" :size="16" /><span style="color: var(--muted)">Retour pause</span></span>
                    <time>{{ $item['returned'] ?? '—' }}</time>
                </div>
                <div class="step">
                    <span class="step__label" style="color: var(--bad)"><x-icon name="log-out" :size="16" /><span style="color: var(--muted)">Sortie</span></span>
                    <time>{{ $item['end'] ?? '—' }}</time>
                </div>
            </div>
        </div>
    @if ($loop->last)</div>@endif
@empty
    <p class="empty-inline">Aucun pointage enregistré.</p>
@endforelse

<h2 class="section-title">Équipes ({{ count($data['teams'] ?? []) }})</h2>
@forelse ($data['teams'] ?? [] as $team)
    @if ($loop->first)<div class="grid">@endif
        @php
            $health = (int) ($team['teamHealth'] ?? 0);
            $healthColor = $health >= 80 ? 'var(--ok)' : ($health >= 60 ? 'var(--warn)' : 'var(--bad)');
        @endphp
        <div class="card">
            <div class="card__head">
                <strong>{{ $team['name'] ?? 'Sans nom' }}</strong>
                <span class="card__meta">ID {{ $team['id'] ?? '—' }}</span>
            </div>
            <div class="inline-stats">
                <div>Membres <b>{{ $team['memberCount'] ?? 0 }}</b></div>
                <div>Santé <b style="color: {{ $healthColor }}">{{ $health }}%</b></div>
            </div>
            <div class="bar" role="img"
                 aria-label="Santé de l'équipe : {{ $health }} pour cent">
                <i style="width: {{ max(0, min(100, $health)) }}%; background: {{ $healthColor }}"></i>
            </div>
        </div>
    @if ($loop->last)</div>@endif
@empty
    <p class="empty-inline">Aucune équipe.</p>
@endforelse

<h2 class="section-title">Collaborateurs ({{ count($data['users'] ?? []) }})</h2>
@forelse ($data['users'] ?? [] as $user)
    @if ($loop->first)<div class="rows">@endif
        <div class="row">
            <div class="avatar" aria-hidden="true">{{ strtoupper(mb_substr($user['name'] ?? '?', 0, 1)) }}</div>
            <div class="row__main">
                <b>{{ $user['name'] ?? 'Sans nom' }}</b>
                <small>
                    <a href="mailto:{{ $user['email'] ?? '' }}">
                        <x-icon name="mail" :size="14" />{{ $user['email'] ?? '—' }}
                    </a>
                    @if (!empty($user['phone']))
                        <a href="tel:{{ $user['phone'] }}">
                            <x-icon name="phone" :size="14" />{{ $user['phone'] }}
                        </a>
                    @endif
                </small>
            </div>
            @if (!empty($user['team']['name']))
                <span class="tag">
                    {{ $user['team']['name'] }} &middot; {{ $user['team']['memberCount'] ?? 0 }} pers.
                </span>
            @endif
        </div>
    @if ($loop->last)</div>@endif
@empty
    <p class="empty-inline">Aucun collaborateur.</p>
@endforelse

@endsection
