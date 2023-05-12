@extends('layouts.todos')

@section('content')
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-gray-200">
        <div class="w-[350px]">
            @if(!count($todosList))
                No tasks available
            @endif

            @foreach($todosList as $todo)
                <div
                    class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 dark:text-gray-200 shadow-md overflow-hidden sm:rounded-lg">
                    <div class="mt-4 flex flex-row justify-between">
                        <small>Title</small>
                        <div class="block w-[200px] text-right sm:rounded-lg">{{ $todo->title }}</div>
                    </div>

                    <div class="mt-4 flex flex-row justify-between">
                        <small>Task</small>
                        <div class="block w-[200px] text-right sm:rounded-lg">{{ $todo->content }}</div>
                    </div>

                    <div class="mt-4 flex flex-row justify-between">
                        <small>Created at</small>
                        <div class="block w-[200px] text-right sm:rounded-lg">{{ $todo->created_at }}</div>
                    </div>
                    <div class="mt-4 flex flex-row justify-between">
                        <small>Updated at</small>
                        <div class="block w-[200px] text-right sm:rounded-lg">{{ $todo->updated_at }}</div>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                           href="{{ route('todo.edit', $todo) }}">
                            Edit
                        </a>

                        <form action="{{ route('todo.done', $todo) }}" method="POST"
                              enctype="application/x-www-form-urlencoded">
                            @csrf
                            @method('patch')

                            <input type="hidden" id="title" name="title" value="{{ $todo->title }}"/>
                            <input type="hidden" id="content" name="content" value="{{ $todo->content }}"/>

                            @if(!$todo->done)
                                <input type="hidden" id="done" name="done" value="1"/>

                                <x-primary-button
                                    class="ml-4 bg-green-400 dark:bg-green-400">
                                    Done!
                                </x-primary-button>
                            @else
                                <input type="hidden" id="done" name="done" value="0"/>

                                <x-primary-button
                                    class="ml-4 bg-red-400 dark:bg-red-400">
                                    Undone
                                </x-primary-button>
                            @endif
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
