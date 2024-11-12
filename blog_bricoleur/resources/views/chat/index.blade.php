@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Chat avec {{ \App\Models\User::find($userId)->name }}</h1>
    <div class="chat-box">
        @foreach ($messages as $message)
            <div class="{{ $message->sender_id === auth()->id() ? 'text-end' : 'text-start' }}">
                <p><strong>{{ $message->sender->name }}</strong>: {{ $message->message }}</p>
                <small>{{ $message->created_at->diffForHumans() }}</small>
            </div>
        @endforeach
    </div>
    <form action="{{ route('chat.store', $userId) }}" method="POST">
        @csrf
        <textarea name="message" rows="3" class="form-control" placeholder="Écrivez un message..." required></textarea>
        <button type="submit" class="btn btn-primary mt-2">Envoyer</button>
    </form>
</div>
@endsection
