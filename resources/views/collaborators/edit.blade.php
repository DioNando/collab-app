@extends('layouts.app')

@section('title', 'Edit Collaborator')

@section('content')
    <a class="text-medium text-gray-500 hover:text-blue-500 underline" href="{{ route('collaborators.index') }}">Go Back To
        Collaborators</a>
    <form action="{{ route('collaborators.update', $collaborator) }}" method="POST" class="mt-6">
        @csrf
        @method('PUT')
        <div class="flex flex-col gap-2 border-b border-gray-200 mb-3 pb-3">
            <div class="flex flex-col gap-4">
                {{-- Add inputs --}}
                <div class="flex flex-col gap-2">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ $collaborator->name }}">
                    @error('name')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="{{ $collaborator->email }}">
                    @error('email')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <label for="phone">Phone Number</label>
                    <input type="tel" name="phone" id="phone" value="{{ $collaborator->phone }}">
                    @error('phone')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="flex justify-end gap-3">
            <button type="submit" class="hover:text-orange-500">Update</button>
        </div>
    </form>
@endsection

@section('styles')
@endsection
