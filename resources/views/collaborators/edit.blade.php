@extends('layouts.app')

@section('title', 'Edit Collaborator')

@section('content')
    <a class="text-medium text-gray-500 hover:text-blue-500 underline" href="{{ route('collaborators.index') }}">Go Back To
        Collaborators</a>
    <form action="{{ route('collaborators.update', $collaborator) }}" method="POST" class="mt-6">
        @csrf
        @method('PUT')
        <div class="flex flex-col gap-2 border-b border-gray-200 mb-3 pb-3">
            <div class="flex flex-col">
                <a class="text-lg" href="{{ route('collaborators.show', $collaborator) }}">{{ $collaborator->name }}</a>
                <span class="text-caption text-gray-500">{{ $collaborator->email }}</span>
                <p class="text-gray-500 text-sm">
                    Created:
                    {{ $collaborator->created_at->diffForHumans() }} &middot; Modified:
                    {{ $collaborator->updated_at->diffForHumans() }}
                </p>
            </div>
        </div>
        <div class="flex justify-end gap-3">
            <button type="submit" class="hover:text-orange-500">Update</button>
        </div>
    </form>
@endsection

@section('styles')
@endsection
