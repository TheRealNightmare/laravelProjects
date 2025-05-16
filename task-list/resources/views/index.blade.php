<h1>The list of tasks</h1>

<div>
    <a href="{{ route('tasks.create') }}">Add tasks</a>
</div>

<div>
    @forelse($tasks as $task)
        <div>
            <a href="{{ route('tasks.show', ['task' => $task->id]) }}">
                {{ $task->title }}
            </a>
        </div>
    @empty
        <div>There are no tasks</div>
    @endforelse
    @if ($tasks->count())
        <nav>
            {{ $tasks->links() }}
        </nav>
    @endif
</div>
