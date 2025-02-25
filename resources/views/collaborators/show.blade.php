@extends('layouts.app')

@section('title', $collaborator->name)

@section('content')
    <a class="text-medium text-gray-500 hover:text-blue-500 underline" href="{{ route('collaborators.index') }}">Retour à la liste</a>
    <article class="flex flex-col mt-6 w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-8">
        <div class="flex flex-col gap-2">
            <div class="flex items-center justify-between">
                <div class="text-xl text-black">{{ $collaborator->name }}</div>
                <div @class([
                    'bg-gray-100 text-gray-800 text-sm font-medium px-2.5 pb-1 rounded-full',
                    'bg-green-100 text-green-800 text-sm font-medium px-2.5 pb-1 rounded-full' =>
                        $collaborator->status == 'active',
                ])>{{ $collaborator->status }}</div>
            </div>
            <div>{{ $collaborator->email }}</div>
            <div>{{ $collaborator->phone }}</div>
            <p class="text-gray-500 text-sm">
                Created:
                {{ $collaborator->created_at->diffForHumans() }} &middot; Modified:
                {{ $collaborator->updated_at->diffForHumans() }}
            </p>
        </div>
        <hr class="my-4">
        <div class="flex justify-end gap-3">
            {{-- Toggle Status --}}
            <form action="{{ route('collaborators.toggle-status', $collaborator) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit"
                    class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group w-full">
                    <x-heroicon-s-arrows-right-left
                        class="mx-auto mb-1 w-5 h-5 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400" />
                    <div class="text-sm text-gray-900 dark:text-white">
                        Status {{ $collaborator->status == 'active' ? 'Inactif' : 'Actif' }}
                    </div>
                </button>
            </form>

            {{-- Contact --}}
            <form action="{{ route('collaborators.contact', $collaborator) }}" method="POST">
                @csrf
                <button type="submit"
                    class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group w-full">
                    <x-heroicon-s-envelope
                        class="mx-auto mb-1 w-5 h-5 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400" />
                    <div class="text-sm text-gray-900 dark:text-white">Contacter</div>
                </button>
            </form>

            {{-- Edit --}}
            <a href="{{ route('collaborators.edit', $collaborator) }}"
                class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                <x-heroicon-s-pencil
                    class="mx-auto mb-1 w-5 h-5 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400" />
                <div class="text-sm text-gray-900 dark:text-white">Modifier</div>
            </a>

            {{-- Delete --}}
            <form action="{{ route('collaborators.destroy', $collaborator) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group w-full">
                    <x-heroicon-s-trash
                        class="mx-auto mb-1 w-5 h-5 text-gray-400 group-hover:text-red-500 dark:text-gray-400 dark:group-hover:text-red-400" />
                    <div class="text-sm text-gray-900 dark:text-white">Supprimer</div>
                </button>
            </form>

        </div>
        @if (session()->has('success'))
            <div class="text-gray-500 text-sm mt-4 p-3 bg-slate-300 border border-gray-400 rounded-md">
                {{ session('success') }}
            </div>
        @endif
        </div>
    </article>
@endsection

@section('styles')
@endsection
