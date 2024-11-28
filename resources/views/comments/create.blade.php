@extends('layouts.app')

@section('title', 'Добавить комментарий')

@section('content')
<div class="container">
    <h1>Добавить комментарий</h1>

    <form action="{{ route('comments.store') }}" method="POST">
        @csrf
        <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
        
        <div class="form-group">
            <label for="message">Комментарий</label>
            <textarea name="message" id="message" class="form-control" required></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Добавить комментарий</button>
    </form>

    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger mt-3">{{ session('error') }}</div>
    @endif
</div>
@endsection