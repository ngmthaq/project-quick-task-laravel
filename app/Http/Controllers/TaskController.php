<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    const PAGINATE_NUMBER = 5;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user)
    {
        $tasks = DB::table(User::DB_TABLE)
            ->join(Task::DB_TABLE, User::DB_TABLE . '.id', '=', Task::DB_TABLE . '.user_id')
            ->where(Task::DB_TABLE . '.user_id', $user)
            ->select(
                Task::DB_TABLE . '.*',
                User::DB_TABLE . '.first_name',
                User::DB_TABLE . '.last_name'
            )
            ->paginate(self::PAGINATE_NUMBER);

        $tasks->user_id = $user;

        foreach ($tasks->items() as $task) {
            $task->full_name = $task->first_name . ' ' . $task->last_name;
        }

        return view('pages.task.task-table', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($user)
    {
        return view('pages.task.create-task', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request, $user)
    {
        $request->flash();

        DB::table(Task::DB_TABLE)->insert(
            array_merge(
                $request->only(['title', 'description']),
                [
                    'user_id' => $user,
                    'is_completed' => Task::TASK_IN_PROGRESS,
                ]
            )
        );

        return redirect()->route('users.tasks.index', ['user' => $user]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user, $task)
    {
        $task = DB::table(Task::DB_TABLE)->find($task);
        $task->isCompleted = $task->is_completed === Task::TASK_COMPLETED;

        return view('pages.task.show-task', compact('user', 'task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user, $task)
    {
        $task = DB::table(Task::DB_TABLE)->find($task);
        $task->isCompleted = $task->is_completed === Task::TASK_COMPLETED;

        return view('pages.task.edit-task', compact('user', 'task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaskRequest $request, $user, $task)
    {
        DB::table(Task::DB_TABLE)
            ->where('id', $task)
            ->update($request->only([
                'title',
                'description',
                'is_completed'
            ]));

        return redirect()->route('users.tasks.index', ['user' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user, $task)
    {
        DB::table(Task::DB_TABLE)->delete($task);

        return redirect()->route('users.tasks.index', ['user' => $user]);
    }
}
