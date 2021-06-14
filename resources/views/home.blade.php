@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 mx-48 py-3 mb-2 mt-2 rounded relative" role="alert">
            <p class="font-bold">{{ $message }}</p>
        </div>
    @endif
    <div class="flex  mx-48 py-10 space-x-4">
        <div class="flex flex-col w-1/2 bg-gray-100 border border-gray-300">
            <div class="py-4 px-2 border-b border-gray-300 bg-white">
                <span class="block text-xl text-blue-600 font-medium pl-2">{{ $project->title }}</span>
            </div>
            <ul class="flex flex-col divide-y divide-indigo-200 dropzone">
                @foreach ($project->tasks as $task )
                <li class="bg-white shadow-lg draggable cursor-move" draggable="true">
                   <div
                     class="flex flex-row justify-between items-center p-3 cursor-pointer"
                   >
                     <span class="text-gray-700">{{ $task->title }}</span>
                    <span class="whitespace-nowrap text-sm font-medium">
                       <a href="{{ route('task.edit', ['project' => $project, 'task' => $task]) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                       <a href="{{ route('task.edit', ['project' => $project, 'task' => $task]) }}" class="text-white bg-red-500 hover:bg-red-700 p-1 rounded">Delete</a>
                    </span>
                   </div>
                 </li>
               @endforeach
            </ul>
        </div>
        <a href="{{ route('task.create', ['project' => $project]) }}" class="flex items-center justify-center focus-within:bg-transparent hover:bg-blue-500
                text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded h-12">
            Add Task
            <svg class="ml-2 w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
        </a>
    </div>
@endsection
