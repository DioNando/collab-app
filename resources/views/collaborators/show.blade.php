@extends('layouts.app')

@section('title', $collaborator->name)

@section('content')
    <a class="text-medium text-gray-500 hover:text-blue-500 underline" href="{{ route('collaborators.index') }}">Go Back To
        Collaborators</a>
    <article class="mt-6">
        <div class="flex flex-col">
            <div class="flex flex-col gap-2 border-b border-gray-200 mb-3 pb-3">
                <div class="flex justify-between">
                    <div class="text-xl text-bold">{{ $collaborator->name }}</div>
                    <div @class(['text-gray-500 text-sm', 'text-green-500' => $collaborator->status == 'active'])>{{ $collaborator->status }}</div>
                </div>
                <div>{{ $collaborator->email }}</div>
                <div>{{ $collaborator->phone }}</div>
                <p class="text-gray-500 text-sm">
                    Created:
                    {{ $collaborator->created_at->diffForHumans() }} &middot; Modified:
                    {{ $collaborator->updated_at->diffForHumans() }}
                </p>
            </div>
            <div class="flex justify-end gap-3">
                <form action="{{ route('collaborators.toggle-status', $collaborator) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="text-gray-500 hover:text-gray-600">Mark as
                        {{ $collaborator->status == 'active' ? 'inactive' : 'active' }}</button>
                </form>
                <form action="{{ route('collaborators.contact', $collaborator) }}" method="POST">
                    @csrf
                    <button type="submit" class="hover:text-blue-500">Contact</button>
                </form>
                <a class="hover:text-orange-500" href="{{ route('collaborators.edit', $collaborator) }}">Edit</a>
                <form action="{{ route('collaborators.destroy', $collaborator) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="hover:text-red-500">Delete</button>
                </form>
            </div>
            @if (session()->has('success'))
                <div class="text-gray-500 my-4 p-3 bg-slate-300 border border-gray-500 rounded-md">{{ session('success') }}
                </div>
            @endif
        </div>
    </article>
@endsection

@section('styles')
@endsection
