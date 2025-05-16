<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Console\View\TaskResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index', ['tasks' => \App\Models\Task::latest()->paginate(5)]); 
})->name('tasks.index');

Route::view('/tasks/create', 'create')->name('tasks.create');

Route::get('/tasks/{task}/edit', function (Task $task){
    return view('edit',['task' => $task]);
})->name('tasks.edit');

Route::get('/tasks/{task}', function (Task $task){
    return view('show',['task' => $task]);
})->name('tasks.show');

Route::post('/taks', function(TaskRequest $request){
  $task = Task::create($request->validated());
  return redirect()->route('tasks.show',['task'=>$task->id])->with('success', 'Task created successfully!');
})->name('tasks.store');

Route::put('/tasks /{task}', function(Task $task, TaskRequest $request){
  $task->update($request->validated());
  return redirect()->route('tasks.show',['task'=>$task->id])->with('success', 'Task updated successfully!');
})->name('tasks.update');

Route::delete('/tasks/{task}',function(Task $task){
    $task->delete();
    return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
})->name('tasks.destroy');

Route::put('tasks/{task}/toggle-complete',function(Task $task){
  $task->toggleComplete();
  return redirect()->back()->with('success', 'Task status updated successfully!');
})->name('tasks.toggle-complete');

Route::fallback(function () {
    return redirect()->route('home'); 
}); 
