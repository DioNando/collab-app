@extends('layouts.app')

@section('title', 'Collaborators Lists')

@section('content')
    <div>
        <div class="flex justify-start mb-6">
            <a class="text-green-500 hover:text-green-700 underline" href="{{ route('collaborators.create') }}">Add New
                Collaborator</a>
        </div>
        @if (session()->has('success'))
            <div class="text-gray-500 my-4 p-3 bg-slate-300 border border-gray-500 rounded-md">{{ session('success') }}</div>
        @endif
        @forelse ($collaborators as $collaborator)
            <div class="flex flex-col mb-4 pb-2 border-b border-gray-200">
                <div class="flex flex-col">
                    <div class="flex justify-between">
                        <a class="text-lg hover:text-blue-500"
                            href="{{ route('collaborators.show', $collaborator) }}">{{ $collaborator->name }}</a>
                        <div @class([
                            'text-gray-500 text-sm',
                            'text-green-500' => $collaborator->status == 'active',
                        ])>{{ $collaborator->status }}</div>
                    </div>
                    <span class="text-caption text-gray-500">{{ $collaborator->email }}</span>
                </div>
                <div>
                    <a class="text-gray-700 hover:text-orange-500"
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
@endsection
