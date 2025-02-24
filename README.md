### Source

> https://www.udemy.com/course/laravel-vuejs-fullstack-web-development/learn/lecture/36619256#questions

### This Git

> https://github.com/samedan/2503_vue3_laravel11

### Routes

> Api.php

```
Route::prefix('v1')->group(function() {
    Route::apiResource('/tasks', TaskController::class);
});
```

### Refine returned data

> TaskResource -> public function toArray()

> php artisan route:list

> TaskController.php

```
public function show (Task $task) {
        return TaskResource::make($task);
    }
```

### Create a task

> StoreTaskRequest

```
public function rules(): array
    {
        return [
            'name' => 'required|string|max:255'
        ];
    }
```

### Auth Sanctum

# Login Route

> http://127.0.0.1:8000/auth/login

# Login route pre-request

```
pm.sendRequest({
    url: "http://127.0.0.1:8000/sanctum/csrf-cookie",
    method: "GET"
}, function(err, res, {cookies}) {
    if(!err) {
        pm.globals.set('csrf-token', cookies.get('XSRF-TOKEN'))
    }
})
```
