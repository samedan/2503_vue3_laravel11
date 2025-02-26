<template>
    <main style="min-height: 50vh; margin-top: 2rem">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <!-- Add new Task -->
                    <NewTask />

                    <!-- List of UNCOMPLETED tasks -->
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

                    <!-- List of COMPLETED tasks -->
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
import { useTaskStore } from "../stores/task";
import { storeToRefs } from "pinia";
// import api from "../http/api";

import Tasks from "@/components/tasks/Tasks.vue";
import NewTask from "@/components/tasks/NewTask.vue";

// STORE
const store = useTaskStore();
// const { task } = storeToRefs(store);
const { completedTasks, uncompletedTasks } = storeToRefs(store);
const { fetchAllTasks } = store;

onMounted(async () => {
    // await store.fetchAllTasks();
    await fetchAllTasks();
});

const showToggleCompletedBtn = computed(
    () => uncompletedTasks.value.length > 0 && completedTasks.value.length > 0
);

const completedTaskIsVisible = computed(
    () => uncompletedTasks.value.length === 0 || completedTasks.value.length > 0
);

const showCompletedTasks = ref(false);
</script>
