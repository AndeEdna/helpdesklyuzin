@extends('layouts.app')

@section('content')
<div class="container">
   <h1>{{ $ticket->title }}</h1>
   <p>{{ $ticket->description }}</p>
   <p>Статус: {{ ucfirst($ticket->status) }}</p>

   <h2>Комментарии</h2>
   @foreach ($ticket->comments as $comment)
       <div class="card mb-2">
           <div class="card-body">
               <p>{{ $comment->message }}</p>
               <small>Добавлено {{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</small>
           </div>
       </div>
   @endforeach

   <form action="{{ route('comments.store') }}" method="POST">
       @csrf 
       <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
       <div class="form-group">
           <label for="message">Добавить комментарий</label>
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