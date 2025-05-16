<!-- resources/views/show.blade.php -->

<h1>Task Details</h1>

<p><strong>Title:</strong> {{ $task->title }}</p>
<p><strong>Description:</strong> {{ $task->description }}</p>

@if($task->long_description)
    <p><strong>Long Description:</strong> {{ $task->long_description }}</p>
@endif

<p><strong>Completed:</strong> {{ $task->completed ? 'Yes' : 'No' }}</p>
<p><strong>Created at:</strong> {{ $task->created_at }}</p>
<p><strong>Updated at:</strong> {{ $task->updated_at }}</p>

<div>
    <a href={{ route('tasks.edit',['task'=>$task->id ]) }}>Edit</a>
</div>

<div>
    <form method="POST" action="{{  route('tasks.toggle-complete',['task'=>$task]) }}">
        @csrf
        @method('PUT')
        <button type="submit">
            Mark as {{ $task->completed ? 'not completed' : 'completed' }}
        </button>
    </form>
</div>

<div>
    <form method="POST" action="{{ route('tasks.destroy',['task'=>$task->id]) }}">
        @csrf
        @method('DELETE')
        <button type="submit" >Delete Task</button>
    </form>
</div>

<a href="{{ route('tasks.index') }}">← Back to Task List</a>