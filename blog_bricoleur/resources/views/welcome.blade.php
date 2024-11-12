@extends('layouts.home')

@section('title', 'Accueil - Brico BLOG')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-8">
        <!-- Titre principal -->
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Bienvenue sur le BLOG BRICOLEUR</h1>

        <!-- Description du blog -->
        <p class="text-lg text-gray-600 mb-8">
            Découvrez des astuces, des conseils et des projets de bricolage pour tous les niveaux. Que vous soyez débutant ou bricoleur confirmé, vous trouverez ici tout ce dont vous avez besoin pour vos projets DIY !
        </p>

        <!-- Boutons d'action -->
        <div class="flex space-x-4">
            <button class="px-6 py-3 bg-green-500 text-white rounded-md hover:bg-green-600 transition-all duration-300">
                <a href="{{ url('/posts') }}" class="font-semibold">Voir la liste des postes</a>
            </button>
            <button class="px-6 py-3 bg-green-500 text-white rounded-md hover:bg-green-600 transition-all duration-300">
                <a href="{{ url('/posts/create') }}" class="font-semibold">Faire un post</a>
            </button>
        </div>
    </div>

    <!-- Section de présentation supplémentaire -->
    <div class="bg-gray-100 py-12 mt-10">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Pourquoi choisir ce blog ?</h2>
            <p class="text-lg text-gray-600 mb-6">
                Notre blog est un lieu d'échange et de partage pour tous ceux qui aiment le bricolage. Chaque article vous apporte une perspective unique, des astuces pratiques et des solutions simples pour transformer vos idées en projets réels.
            </p>

            <h3 class="text-xl font-semibold text-gray-800 mb-2">Nos points forts :</h3>
            <ul class="list-disc list-inside text-gray-600 space-y-2">
                <li>Des articles détaillés et illustrés pour chaque projet.</li>
                <li>Une communauté active prête à vous aider.</li>
                <li>Des conseils adaptés à tous les niveaux d'expérience.</li>
            </ul>
        </div>
    </div>

    <!-- Section témoignages -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Témoignages</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 shadow-lg rounded-lg">
                    <p class="text-lg text-gray-600 mb-4">"Ce blog m'a aidé à réaliser mon premier projet de rénovation. Les conseils sont clairs et les instructions faciles à suivre !"</p>
                    <p class="font-semibold text-gray-800">Sophie L.</p>
                    <p class="text-sm text-gray-500">Débutante en bricolage</p>
                </div>
                <div class="bg-white p-6 shadow-lg rounded-lg">
                    <p class="text-lg text-gray-600 mb-4">"J'ai trouvé des idées géniales pour améliorer ma maison à petit prix. Un blog très inspirant !"</p>
                    <p class="font-semibold text-gray-800">Marc D.</p>
                    <p class="text-sm text-gray-500">Passionné de DIY</p>
                </div>
                <div class="bg-white p-6 shadow-lg rounded-lg">
                    <p class="text-lg text-gray-600 mb-4">"Une ressource incroyable pour tous les bricoleurs. Des projets simples mais efficaces pour chaque occasion."</p>
                    <p class="font-semibold text-gray-800">Claire M.</p>
                    <p class="text-sm text-gray-500">Bricoleuse expérimentée</p>
                </div>
            </div>
        </div>
    </div>
@endsection
