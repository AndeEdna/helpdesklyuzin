@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Мои запросы</h1>

    <a href="{{ route('tickets.create') }}" class="btn btn-primary mb-3">Создать новый запрос</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if($tickets->isEmpty())
        <div class="alert alert-warning">У вас нет запросов.</div>
    @else
        <ul class="list-group">
            @foreach ($tickets as $ticket)
                <li class="list-group-item">
                    <a href="{{ route('tickets.show', $ticket) }}">{{ $ticket->title }}</a> - 
                    {{ ucfirst($ticket->status) }}
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection