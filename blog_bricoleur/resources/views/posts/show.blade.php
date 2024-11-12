@extends('layouts.home')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Détails du post') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- Contenu du post -->
                    <h3 class="text-2xl font-semibold">{{ $post->title ?? 'Sans titre' }}</h3>
                    <p class="mt-2">{{ $post->description }}</p>

                    <!-- Image du post -->
                    @if($post->image)
                        <div class="mt-4">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="Image du post" class="rounded-lg">
                        </div>
                    @endif

                    <!-- Bouton Like/Unlike -->
                    <div class="mt-4">
                        @if (auth()->check())
                            <form action="{{ route('likes.store', $post) }}" method="POST">
                                @csrf
                                @if ($post->likes->contains('user_id', auth()->id()))
                                    <button type="submit" formaction="{{ route('likes.destroy', $post) }}" formmethod="POST">
                                        @method('DELETE')
                                        <x-primary-button>{{ __('Unlike') }}</x-primary-button>
                                    </button>
                                @else
                                    <x-primary-button>{{ __('Like') }}</x-primary-button>
                                @endif
                            </form>
                        @endif
                        <p>{{ $post->likes->count() }} {{ Str::plural('Like', $post->likes->count()) }}</p>
                    </div>
                    

                    <!-- Liste des commentaires -->
                    <div class="mt-8">
                        <h4 class="text-lg font-semibold">Commentaires</h4>
                        @forelse ($post->comments as $comment)
                            <div class="mt-4 p-4 bg-gray-100 dark:bg-gray-700 rounded-lg">
                                <p>{{ $comment->content }}</p>
                                <p class="text-sm text-gray-500">- {{ $comment->user->name }} le {{ $comment->created_at->format('d/m/Y') }}</p>
                            </div>
                        @empty
                            <p>Aucun commentaire pour le moment.</p>
                        @endforelse
                    </div>


                    <!-- Formulaire pour ajouter un commentaire -->
                    @if (auth()->check())
                        <form action="{{ route('comments.store', $post) }}" method="POST" class="mt-4">
                            @csrf
                            <textarea name="content" rows="3" class="block w-full rounded-md" placeholder="Écrire un commentaire..." required></textarea>
                            <x-input-error :messages="$errors->get('content')" class="mt-2" />
                            <x-primary-button class="mt-2">Publier le commentaire</x-primary-button>
                        </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
