<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $title = trans('main.todo_list');
        $todos = Todo::where('user_id', auth()->user()->id)->latest()->paginate(20);
        return view('dashboard.todos.index', compact('title','todos'));
    }


    public function create()
    {
        $title = trans('main.todo_list');
        return view('dashboard.todos.create',compact('title'));
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        $todo = new Todo;
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->user_id = auth()->user()->id;

        $todo->save();

        toastr()->success(trans('main.data_added_successfully'));
        return redirect()->route('dashboard.index');
    }

    public function show($id)
    {
        $title = trans('main.todo_list');
        $todo = Todo::findOrFail($id);
        return view('dashboard.todos.show',compact('title','todo'));
    }

    public function edit($id)
    {
        $title = trans('main.todo_list');
        $todo = Todo::findOrFail($id);
        return view('dashboard.todos.edit',compact('title','todo'));
    }


    public function update(Request $request, $id)
    {
        $todo = Todo::findOrFail($id);

        $this->validate($request,[
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        $todo->title = $request->title;
        $todo->description = $request->description;

        $todo->save();

        toastr()->warning(trans('main.data_updated_successfully'));
        return redirect()->route('dashboard.index');
    }

    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();

        toastr()->error(trans('main.data_deleted_successfully'));
        return redirect()->route('dashboard.index');
    }

    public function finish($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->update(['finished' => 1]);
        toastr()->warning(trans('main.data_updated_successfully'));
        return back();
    }
}
