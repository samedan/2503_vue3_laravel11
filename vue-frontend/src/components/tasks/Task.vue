<template>
    <li class="list-group-item py-3">
        <div class="d-flex justify-content-start align-items-center">
            <!-- CHECK -->
            <input
                class="form-check-input mt-0 completed"
                :class="completedClass"
                type="checkbox"
                :checked="task.is_completed"
                @change="markTaskAsCompleted"
            />
            <div
                class="ms-2 flex-grow-1"
                :class="completedClass"
                title="Double click the text to edit or remove"
                @dblclick="isEdit = true"
            >
                <div class="relative" v-if="isEdit">
                    <input
                        class="editable-task"
                        type="text"
                        v-focus
                        @keyup.esc="undo"
                        @keyup.enter="updateTask"
                        v-model="editingTask"
                    />
                </div>

                <span v-else>{{ task.name }}</span>
            </div>
            <!-- <div class="task-date">24 Feb 12:00</div> -->
        </div>
        <!-- Buttons -->
        <TaskActions
            @edit="isEdit = true"
            @remove="removeTask"
            v-show="!isEdit"
        />
    </li>
</template>

<script setup>
import { computed, ref } from "vue";
import TaskActions from "./TaskActions.vue";

const props = defineProps({
    task: Object,
});

const emit = defineEmits(["updated", "completed", "removed"]);

const isEdit = ref(false);
const editingTask = ref(props.task.name);

const completedClass = computed(() =>
    props.task.is_completed ? "completed" : ""
);

//  Focus on double clicked element
const vFocus = {
    mounted: (el) => el.focus(),
};

const updateTask = (event) => {
    const updatedTask = { ...props.task, name: event.target.value };
    isEdit.value = false;
    emit("updated", updatedTask);
};

const markTaskAsCompleted = (event) => {
    const updatedTask = {
        ...props.task,
        is_completed: !props.task.is_completed,
    };
    emit("completed", updatedTask);
};

const undo = () => {
    isEdit.value = false;
    editingTask.value = props.task.name;
};

const removeTask = () => {
    if (confirm("Are you sure?")) {
        emit("removed", props.task);
    }
};
</script>
