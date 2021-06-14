<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    /**
     * Returns Project's Tasks in Json format
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project)
    {
       $tasks = $project->tasks;

       return response()->json($tasks, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        return view('tasks.create', ['project' => $project]);
    }

    /**
     * Store a new task
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $task = new Task;
        $task->title = $request->input('title');
        $task->increment('priority');
        $task->project_id = $project->id;
        $task->save();

        return redirect()->route('project.home', ['project' => $project])->with('success', "Task ( {$task->title} )created successfully.");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project, Task $task)
    {
        return view('tasks.edit', ['project' => $project, 'task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project, Task $task)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $task->update($request->all());

        return redirect()->route('project.home', ['project' => $project])->with('success', "Task updated successfully");
    }

    public function syncTasksPriority(Request $request,Project $project) {
        $this->validate($request, [
            'tasks.*.priority' => 'required|numeric',
        ]);

        $tasks = $project->tasks;

        foreach ($tasks as $task) {
            $id = $task->id;
            foreach ($request->tasks as $tasksNew) {
                if ($tasksNew['id'] == $id) {
                    $task->update(['priority' => $tasksNew['priority']]);
                }
            }
        }


        return response('Synched Successfully.', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::destroy($id);
        return response()->json('Task deleted');
    }
}
