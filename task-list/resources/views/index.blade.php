@extends('layouts.app')

@section('title', 'Task Lists')

@section('content')
  
  @forelse ($tasks as $task)
    <div>
      <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
        @class(['line-through' => $task->completed])>{{ $task->title }}</a>
    </div>
  @empty
    <div>There are no tasks!</div>
  @endforelse
  <br>
  <nav class="mb-4">
    <a href="{{ route('tasks.create') }}" class="link">Add</a>
  </nav>
  
  @if ($tasks->count())
    <nav class="mt-4">
      {{ $tasks->links() }}
    </nav>
  @endif


@endsection