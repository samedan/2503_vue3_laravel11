<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    public function index() {
        // return Task::all();
        Gate::authorize('viewAny', Task::class);

        return TaskResource::collection(auth()->user()->tasks()->get());
    }

    public function show (Task $task) {
        // $this->authorize()
        Gate::authorize('view', $task);
        return TaskResource::make($task);
    }

    public function store(StoreTaskRequest $request) {
        if(request()->user()->cannot('create', Task::class)) {
            abort(403, "This action is unauthorized");
        }
        // $task = $request->user()->create($request->validated());
        $task = $request->user()->tasks()->create($request->validated());
        return TaskResource::make($task);
    }

    public function update(UpdateTaskRequest $request, Task $task) {
        if($request->user()->cannot('update', $task)) {
            abort(403, "This action is unauthorized");
        }
        $task->update($request->validated());
        return TaskResource::make($task);

        // Gate::authorize('update', $task);

        // $task->is_completed = $request->is_completed;

        // $task->save();

        // return TaskResource::make($task);
    }

    public function destroy(Task $task) {
        if(request()->user()->cannot('delete', $task)) {
            abort(403, "This action is unauthorized");
        }
        $task->delete();
        return response()->noContent();
    }
}
