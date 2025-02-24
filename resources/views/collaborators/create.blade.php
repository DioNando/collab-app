@extends('layouts.app')

@section('title', 'New Collaborator')

@section('content')
    <a class="text-medium text-gray-500 hover:text-blue-500 underline" href="{{ route('collaborators.index') }}">Go Back To
        Collaborators</a>
    <form action="{{ route('collaborators.store') }}" method="POST" class="mt-6">
        @csrf
        <div class="flex flex-col gap-2 border-b border-gray-200 mb-3 pb-3">
            <div class="flex flex-col">
                {{-- Add inputs --}}
            </div>
        </div>
        <div class="flex justify-end gap-3">
            <button type="submit" class="hover:text-green-500">Create</button>
        </div>
    </form>
@endsection

@section('styles')
@endsection
