<!-- resources/views/todos/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold">Edit Todo</h1>
    <form action="{{ route('todos.update', $todo->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" id="title" class="form-input mt-1 block w-full" value="{{ $todo->title }}" required>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" class="form-textarea mt-1 block w-full">{{ $todo->description }}</textarea>
        </div>
        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
            <select name="status" id="status" class="form-select mt-1 block w-full">
                <option value="Open" {{ $todo->status == 'Open' ? 'selected' : '' }}>Open</option>
                <option value="In Progress" {{ $todo->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                <option value="Completed" {{ $todo->status == 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
