<!-- resources/views/admin/dashboard.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    @if (Auth::user()->role === 'Administrator')
    <a href="{{ route('invite') }}" class="btn btn-primary">Invite Employees</a>
    @endif

    <!-- Rest of your dashboard content -->
</div>
@endsection
