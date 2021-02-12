<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class Todocontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Todo::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = json_decode(file_get_contents('php://input'),true);

        $todo =new Todo;
        $todo->memo =$data['memo'];
        $todo->save();
        return Todo::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        return $todo();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        $todo->title = $request->title;
        $todo->status= $request->status;
        $todo->memo=   $request->memo;
        return $todo;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
    }
}
