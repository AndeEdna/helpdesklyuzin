@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Комментарии к тикету: {{ $ticket->title }}</h1>

    @foreach($ticket->comments as $comment)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $comment->user->name }}</h5>
                <p class="card-text">{{ $comment->message }}</p>
                <p class="card-text"><small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small></p>

                @if(Auth::id() === $comment->user_id || Auth::user()->role === 'admin')
                    <a href="{{ route('comments.edit', $comment) }}" class="btn btn-warning">Редактировать</a>
                    <form action="{{ route('comments.destroy', $comment) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                @endif
            </div>
        </div>
    @endforeach

    <a href="{{ route('comments.create', ['ticket_id' => $ticket->id]) }}" class="btn btn-primary">Добавить комментарий</a>

    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger mt-3">{{ session('error') }}</div>
    @endif
</div>
@endsection