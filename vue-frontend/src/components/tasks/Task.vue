<template>
    <li class="list-group-item py-3">
        <div class="d-flex justify-content-start align-items-center">
            <input class="form-check-input mt-0 completed" type="checkbox" />
            <div
                class="ms-2 flex-grow-1"
                title="Double click the text to edit or remove"
            >
                <!-- <div class="relative">
                                            <input class="editable-task" type="text" />
                                        </div> -->
                <span>{{ task.name }}</span>
            </div>
            <!-- <div class="task-date">24 Feb 12:00</div> -->
        </div>
        <div class="task-actions">
            <button class="btn btn-sm btn-circle btn-outline-secondary me-1">
                <iconPencil />
            </button>
            <button class="btn btn-sm btn-circle btn-outline-danger">
                <iconTrash />
            </button>
        </div>
    </li>
</template>

<script setup>
import iconPencil from "../icons/iconPencil.vue";
import iconTrash from "../icons/iconTrash.vue";

defineProps({
    task: Object,
});
</script>
