@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold">Todos</h1>
        @if (Auth::user()->role === 'Administrator')
                <a href="{{ route('invite') }}" class="btn btn-secondary"><b>Invite Employee</b></a></br>

            <a href="{{ route('todos.create') }}" class="btn btn-primary">Create Todo</a>
        @endif
        <div class="mt-4">
            @foreach($todos as $todo)
                <div class="bg-white p-4 rounded-lg shadow-md mb-4">
                    <h2 class="text-xl font-bold">{{ $todo->title }}</h2>
                    <p>{{ $todo->description }}</p>
                    <p>Status: {{ $todo->status }}</p>
                    @if(auth()->user()->role === 'Administrator')
                        <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" class="inline"
                              onsubmit="return confirm('Are you sure you want to delete this todo?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                        <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    @endif
                    @if(auth()->user()->role === 'Employee' && $todo->user_id === auth()->id())
                        <form action="{{ route('todos.changeStatus', $todo->id) }}" method="POST" class="inline">
                            @csrf
                            <select name="status" class="form-select">
                                <option value="In Progress" {{ $todo->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="Completed" {{ $todo->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                            <button type="submit" class="btn btn-sm btn-primary">Change Status</button>
                        </form>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection
