@extends('layouts.app')

@section('title', 'Edit Collaborator')

@section('content')
    <a class="text-medium text-gray-500 hover:text-blue-500 underline" href="{{ route('collaborators.index') }}">Retour à la liste</a>
    <div class="flex flex-col mt-6 w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-8">
        <form action="{{ route('collaborators.update', $collaborator) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="flex flex-col gap-2">
                <div class="flex flex-col gap-4">
                    {{-- Add inputs --}}
                    <div class="flex flex-col gap-2">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="{{ $collaborator->name }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @error('name')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" value="{{ $collaborator->email }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @error('email')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="phone">Phone Number</label>
                        <input type="tel" name="phone" id="phone" value="{{ $collaborator->phone }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @error('phone')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <hr class="mt-6 mb-4">
            <div class="flex justify-end gap-3">
                <button type="submit" class="hover:text-orange-500">Mette à jour</button>
            </div>
        </form>
    </div>
@endsection

@section('styles')
@endsection
