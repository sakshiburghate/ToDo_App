<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use App\Notifications\TodoAssignedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;



class TodoController extends Controller
{
    public function index()
    {
        $todos = Auth::user()->role === 'Administrator' ? Todo::all() : Auth::user()->todos;
        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        $employees = User::where('role', 'Employee')->get();
        return view('todos.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'user_id' => 'required|exists:users,id',
        ]);

        $todo = Todo::create($request->all());
        $employee = User::find($request->user_id);
        $employee->notify(new TodoAssignedNotification($todo));

        return redirect()->route('todos.index')->with('success', 'Todo created successfully!');
    }

    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'status' => 'required|in:Open,In Progress,Completed',
        ]);

        $todo->update($request->all());

        return redirect()->route('todos.index')->with('success', 'Todo updated successfully!');
    }

    public function show(Todo $todo)
    {
        return view('todos.show', compact('todo'));
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect()->route('todos.index');
    }

    public function changeStatus(Request $request, Todo $todo)
    {
        $request->validate(['status' => 'required|in:In Progress,Completed']);

        $todo->update(['status' => $request->status]);

        return redirect()->route('todos.index')->with('success', 'Todo deleted successfully!');
    }

}
