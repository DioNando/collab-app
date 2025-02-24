@extends('layouts.app')

@section('title', $collaborator->name)

@section('content')
    <a class="text-medium text-gray-500 hover:text-blue-500 underline" href="{{ route('collaborators.index') }}">Go Back To
        Collaborators</a>
    <article class="mt-6">
        <div class="flex flex-col">
            <div class="flex flex-col gap-2 border-b border-gray-200 mb-3 pb-3">
                <div class="text-xl text-bold">{{ $collaborator->name }}</div>
                <div>{{ $collaborator->email }}</div>
                <div>{{ $collaborator->phone }}</div>
                <div class="text-gray-500">{{ $collaborator->status }}</div>
                <p class="text-gray-500 text-sm">
                    Created:
                    {{ $collaborator->created_at->diffForHumans() }} &middot; Modified:
                    {{ $collaborator->updated_at->diffForHumans() }}
                </p>
            </div>
            <div class="flex justify-end gap-3">
                <a class="hover:text-orange-500" href="{{ route('collaborators.edit', $collaborator) }}">Edit</a>
                <form action="{{ route('collaborators.destroy', $collaborator) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="hover:text-red-500">Delete</button>
                </form>
            </div>
        </div>
    </article>
@endsection

@section('styles')
@endsection
