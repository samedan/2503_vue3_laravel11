<template>
    <span
        class="d-flex justify-content-between align-items-center"
        :class="{ 'text-primary': selected }"
    >
        {{ text }}
        <iconCheck v-show="selected" />
    </span>
</template>

<script setup>
import iconCheck from "@/components/icons/iconCheck.vue";

defineProps({
    text: {
        type: String,
        required: true,
    },
    selected: {
        type: Boolean,
        default: false,
    },
});
</script>
