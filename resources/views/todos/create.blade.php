@extends('layouts.todos')

@section('content')
    <form action="{{ route('todo.store') }}" method="POST" enctype="application/x-www-form-urlencoded"
          class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 dark:text-gray-200 shadow-md overflow-hidden sm:rounded-lg">
        @csrf

        <div class="mt-4">
            <label for="title">Title</label>
            <input id="title" class="block mt-1 w-full dark:bg-gray-900 sm:rounded-lg" type="text" name="title"
                   value="{{ old('title') }}" autofocus autocomplete="title"/>
            @error('title')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-4">
            <label for="content">Content</label>
            <textarea id="content" class="block mt-1 w-full dark:bg-gray-900 sm:rounded-lg" type="text" name="content"
                      autocomplete="content" rows="10">{{ old('content') }}</textarea>
            @error('content')
            <span class="text-red-400">{{ $message }}</span>
            @enderror
        </div>

        <input type="hidden" id="done" name="done" value="0"/>

        <div class="flex items-center justify-end mt-4">
            <a class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
               href="{{ route('todo.index') }}">
                Back
            </a>

            <x-primary-button class="ml-4">
                Create Task
            </x-primary-button>
        </div>
    </form>
@endsection
