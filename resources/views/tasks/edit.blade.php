@extends('layouts.app')

@section('content')
    <div class="mx-48 py-10 text-gray-700">
        @if ($message = Session::get('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mb-4 rounded relative" role="alert">
                <p class="font-bold">{{ $message }}</p>
            </div>
        @endif
        <div class="py-4 px-2 bg-white">
            <span class="block text-xl uppercase text-blue-600 font-medium pl-2">{{ $project->title }}</span>
        </div>
        <div class="w-1/2">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('task.update', ['project' => $project, 'task' => $task]) }}">
                @method('PUT')
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="taskname">
                        Task Name
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        name="title" type="text" placeholder="Task name" value="{{ $task->title }}">
                </div>
                <div class="flex items-center justify-between">
                    <button
                        class="bg-green-400 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-xl focus:outline-none focus:shadow-outline"
                        type="submit">
                        Update Task
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
