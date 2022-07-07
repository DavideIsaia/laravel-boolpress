@extends('layouts.dashboard')

@section('content')
    <h2>Ciao {{ $user->name }}! Questa è la tua home di Backoffice</h2>
    @if (isset ($userInfo))
        <h4 class="text-muted">Indirizzo: {{ $userInfo->address }}</h4>
        <h4 class="text-muted">Telefono: {{ $userInfo->phone }}</h4>
    @endif
@endsection