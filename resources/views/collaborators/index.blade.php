@extends('layouts.app')

@section('title', 'Collaborators Lists')

@section('content')
    <div>
        <div class="flex justify-start mb-6">

            <a class="px-3 py-2 flex items-center gap-2 text-white rounded-lg bg-green-500 hover:bg-green-700 text-medium"
                href="{{ route('collaborators.create') }}"><x-heroicon-s-plus class="w-6 h-6" /> Add New
                Collaborator</a>
        </div>
        @if (session()->has('success'))
            <div class="text-sm text-gray-500 my-4 p-3 bg-slate-300 border border-gray-400 rounded-md">
                {{ session('success') }}</div>
        @endif
        @forelse ($collaborators as $collaborator)
            <div x-data x-on:click="window.location.href='{{ route('collaborators.show', $collaborator) }}'"
                class="collaborator flex flex-col mb-4 pb-2 border-b border-gray-200">
                <div class="flex flex-col">
                    <div class="flex items-center justify-between">
                        <a class="collaborator__name text-lg"
                            href="{{ route('collaborators.show', $collaborator) }}">{{ $collaborator->name }}</a>
                        <div @class([
                            'bg-gray-100 text-gray-800 text-sm font-medium px-2.5 pb-1 rounded-full',
                            'bg-green-100 text-green-800 text-sm font-medium px-2.5 pb-1 rounded-full' =>
                                $collaborator->status == 'active',
                        ])>{{ $collaborator->status }}</div>
                    </div>
                    <span class="text-md text-gray-500">{{ $collaborator->email }}</span>
                </div>
                <div class="mt-2">
                    <a class="text-gray-500 hover:text-orange-500"
                        href="{{ route('collaborators.edit', $collaborator) }}">Edit</a>
                </div>
            </div>
        @empty
            <div class="mt-3">There are no collaborators to display!</div>
        @endforelse
        @if ($collaborators->isNotEmpty())
            <nav>
                {{ $collaborators->links() }}
            </nav>
        @endif
        <div class="flex justify-end mt-6">
            <a class="text-green-500 hover:text-green-700 underline" href="{{ route('collaborators.create') }}">Add New
                Collaborator</a>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .collaborator {
            transition: 250ms;
        }

        .collaborator:hover {
            transform: translateX(1rem);
            cursor: pointer;
        }

        .collaborator:hover .collaborator__name {
            @apply text-blue-500
        }
    </style>
@endsection



