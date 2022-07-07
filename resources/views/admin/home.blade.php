@extends('layouts.dashboard')

@section('content')
    <h2>Ciao {{ $user->name }}! Questa è la tua home di Backoffice</h2>
    <h4>Indirizzo: {{ $userInfo->address }}</h4>
    <h4>Telefono: {{ $userInfo->phone }}</h4>
@endsection