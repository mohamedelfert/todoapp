<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Todo;

class DashboardController extends Controller
{
    public function index()
    {
        $title = trans('main.todo_list');
        $todos = Todo::where('user_id', auth()->user()->id)->latest()->paginate(20);
        return view('dashboard.welcome', compact('title','todos'));
    }
}
