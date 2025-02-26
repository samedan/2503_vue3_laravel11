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

> ![PreRequest script](https://github.com/samedan/2503_vue3_laravel11/blob/main/_printscreens/01_printscreen.jpg)

### API Token

> /routes/ web.php & api.php

### Link Users to Tasks

# New Migration for Tasks table

> php artisan make:migration add_user_id_to_tasks

# Model user

> public function tasks() return $this->hasMany(Task::class);

# Model Task

> public function user() return $this->belongsTo(User::class)

> $table->foreignId('user_id')->constrained()->cascadeOnDelete();

### Policy Auth

> php artisan make:policy TaskPolicy

### FRONTEND

### Vue

> npm init vite@latest

# Online terminal

> vite.new/vue

# Component registered globally

> tags-input/main.js -> app.component("tags-input", TagsInput);

# v-bind

> <input type="text" v-bind:value="newTag" />

> <div v-for="(tag, index) in tags">

# v-on: = @

> v-on:keydown.enter="tags.push($event.target.value)"
> @keydown.enter="tags.push($event.target.value)"

```
<input type="text"
    :value="newTag"
    @keydown.enter="tags.push($event.target.value)"
    @keydown.tab.prevent="tags.push($event.target.value)"
    @input="newTag = $event.target.value"
/>
```

# v-model - Data binding

```
<input type="text"
  v-model="newTag"
  @keydown.enter="tags.push($event.target.value)"
  @keydown.tab.prevent="tags.push($event.target.value)"
/>
```

# v-model Modifiers

> https://vuejs.org/guide/essentials/forms.html

# style binding

> v-bind:style="tags.includes(newTag) ? {} : ''"

# class binding

> v-bind:style="tags.includes(newTag) ? {} : ''"

> OR :class="tags.includes(newTag) ? 'tag-exists' : ''"

# Computed Properties

```
computed: {
        isTagExists() {
            return this.tags.includes(this.newTag);
        },
    },
```

# Watchers: look for an event

# Events Parent <-> Child Components

### Vue 3 Composition API

> import { ref } from "vue";

```
export default {
    setup() {
        const message = ref("Hello");
    }
    }
```

# ref, reactive, toRef, toRefs

### FRONTEND Vue

> https://www.udemy.com/course/laravel-vuejs-fullstack-web-development/learn/lecture/42788496#overview

### Base URL

> /http/api.js

# API functions

> /http/task-api.js

### API working with the Vue Frontend

> ![vue](https://github.com/samedan/2503_vue3_laravel11/blob/main/_printscreens/02_printscreen.jpg)

### Task.vue & Completed Tasks

> ![completedtasks](https://github.com/samedan/2503_vue3_laravel11/blob/main/_printscreens/03_printscreen.jpg)

### PINIA

> https://pinia.vuejs.org/introduction.html

# main.js

```
import { createApp } from "vue";
import { createPinia } from "pinia";
import App from "./App.vue";

const app = createApp(App);
app.use(createPinia());
app.mount("#app");
```

# Store

> /src/stores/task.js -> export const useTaskStore = defineStore("taskStore", {})

# use Store in component

> TasksPage.vue

```
const store = useTaskStore();
const {task} = storeToRefs(store)
```

# Getters

> task.js -> getters: {}
