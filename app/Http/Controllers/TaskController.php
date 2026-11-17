<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function allTasks(){
        $tasks=$this->getAllTasks();

        //tarefas do id 4
        Task::TaskByUser(4);

        //chamar pela variável do modelo
        Task::STATUS_COMPLETED;

        return view('tasks.all_tasks', compact('tasks'));
    }

    public function deleteTasks(int $id){
        Task::where('id', $id)->delete();

        return back();
    }

    public function editTasks(int $id){
        $taskInfo = Task::join('users', 'tasks.user_id','=' ,'users.id')->where('tasks.id', $id)->select('tasks.id', 'tasks.description','tasks.due_at', 'tasks.status', 'tasks.name','users.name as user_name')->first();

        return view('tasks.edittask', compact('taskInfo'));
    }

    public function addTasks(){
        $users = $this->getAllUsers();

        return view('tasks.add_task', compact('users'));
    }

    private function getAllUsers(){
        $users = User::select('id','name')->get();

        return $users;
    }

    public function storeTasks(Request $request){
        $request->validate([
            'name' => 'max:50|string|required',
            'user_id' =>'required|exists:users,id'
        ]);


      Task::insert([
            'name' => $request->name,
             'description' => $request->description,
              'user_id' => $request->user_id
        ]);
         return redirect()->route('tasks.all')->with('message', 'Tarefa adicionada com sucesso!');
    }


    protected function getAllTasks(){
        $tasks= Task::join('users', 'tasks.user_id','=' ,'users.id')
        ->select('tasks.id', 'tasks.due_at', 'tasks.status', 'tasks.name','users.name as user_name')
        ->get();

        return $tasks;
    }
}