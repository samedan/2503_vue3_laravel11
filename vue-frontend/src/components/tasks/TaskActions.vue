<template>
    <div class="task-actions">
        <button class="btn btn-sm btn-circle btn-outline-secondary me-1">
            <iconPencil @click="emit('edit')" />
        </button>
        <button class="btn btn-sm btn-circle btn-outline-danger">
            <iconTrash @click="emit('remove')" />
        </button>
    </div>
</template>

<script setup>
import iconPencil from "../icons/iconPencil.vue";
import iconTrash from "../icons/iconTrash.vue";

const emit = defineEmits(["edit", "remove"]);
</script>
