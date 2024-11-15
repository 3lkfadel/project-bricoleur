<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('posts.create') }}" class="btn btn-primary">Créer un nouveau post</a>

                    @if($posts->isEmpty())
                        <p>Aucun post à afficher.</p>
                    @else
                        <ul>
                            @foreach($posts as $post)
                                <li class="mt-4">
                                    <h3 class="font-semibold">{{ $post->title }}</h3>
                                    <p>{{ $post->content }}</p>
                                    <a href="{{ route('posts.show', $post->id) }}" class="text-blue-500">Voir le post</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
