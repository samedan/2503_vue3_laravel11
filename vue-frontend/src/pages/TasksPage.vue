<template>
    <main style="min-height: 50vh; margin-top: 2rem">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <!-- Add new Task -->
                    <div class="relative">
                        <input
                            type="text"
                            class="form-control form-control-lg padding-right-lg"
                            placeholder="+ Add new task. Press enter to save."
                        />
                    </div>
                    <!-- List of Uncompleted tasks -->
                    <Tasks :tasks="uncompletedTasks" />
                    <!-- show toggle button -->
                    <div
                        class="text-center my-3"
                        v-show="showToggleCompletedBtn"
                    >
                        <button
                            class="btn btn-sm btn-secondary"
                            @click="showCompletedTasks = !showCompletedTasks"
                        >
                            <span v-if="!showCompletedTasks"
                                >Show Completed</span
                            >
                            <span v-else>Hide Completed</span>
                        </button>
                    </div>

                    <!-- List of Completed tasks -->
                    <Tasks
                        :tasks="completedTasks"
                        :show="completedTaskIsVisible && showCompletedTasks"
                    />
                </div>
            </div>
        </div>
    </main>
</template>

<script setup>
import { computed, onMounted, ref } from "vue";
// import api from "../http/api";
import { allTasks } from "../http/task-api";
import Tasks from "@/components/tasks/Tasks.vue";

const tasks = ref([]);

onMounted(async () => {
    // const { data } = await api.get("/tasks");
    const { data } = await allTasks();
    console.log(data);

    tasks.value = data.data;
});

const uncompletedTasks = computed(() =>
    tasks.value.filter((task) => !task.is_completed)
);
const completedTasks = computed(() =>
    tasks.value.filter((task) => task.is_completed)
);
const showToggleCompletedBtn = computed(
    () => uncompletedTasks.value.length > 0 && completedTasks.value.length > 0
);

const completedTaskIsVisible = computed(
    () => uncompletedTasks.value.length === 0 || completedTasks.value.length > 0
);

const showCompletedTasks = ref(false);
</script>
