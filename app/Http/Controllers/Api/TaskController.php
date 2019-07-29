<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\TaskRequest;
use App\Task;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    public function __construct()
    {
        //
    }

    public function getAll(){
        // get latest 300 task
        return response(Task::orderBy('created_at','DESC')->limit(300)->get()->jsonSerialize(), 200);
    }

    public function store(TaskRequest $request)
    {
        // validate request
        $request->validated();
        $inputs = $request->all();
        $inputs['status'] = 'pending'; 

        $task = Task::create($inputs);
        return response($task->jsonSerialize(), 200);
    }

    public function update(TaskRequest $request, $id)
    {
        // validate request
        $request->validated();

        $task = Task::where('id',$id)->update($request->all());
        return response($task, 200);      
    }

    public function delete($id)
    {
        // delete task with the help of id
        Task::destroy($id);
        return response(null, 200);
    }
}
