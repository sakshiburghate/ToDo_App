@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold">{{ $todo->title }}</h1>
    <p class="mt-4">{{ $todo->description }}</p>
    <a href="{{ route('todos.index') }}" class="mt-6 inline-block px-4 py-2 bg-blue-500 text-black rounded">Back to Todos</a>
</div>
@endsection
