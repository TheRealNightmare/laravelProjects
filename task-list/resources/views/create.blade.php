@extends('layouts.app')

@section('title','Add Task')

@section('styles')
<style>
    .error-message {
        color: red;
        font-size: 0.8rem;
    }
</style>
@endsection

@section('content')
    <form method="POST" action="{{route('tasks.store')}}">
        @csrf
        <div>
            <label for="title">
                Title
            </label>
            <input text="text" name="title" id="title" value="{{ old('title') }}"/>
            @error('title')
                <P class="error-message">{{ $message }}</P>
            @enderror
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="5">{{ old('description') }}</textarea>
            @error('title')
                <P class="error-message">{{ $message }}</P>
            @enderror
        </div>
        <div>
            <label for="long_description">Long Description</label>
            <textarea name="long_description" id="long_description" rows="10">{{ old('long_description') }}</textarea>
            @error('title')
                <P class="error-message">{{ $message }}</P>
            @enderror
        </div>
        <button type="submit">add task</button>
    </form>
@endsection