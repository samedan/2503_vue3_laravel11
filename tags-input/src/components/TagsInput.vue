<template>
    <div>
        <div>{{ tags }}</div>
        <div>{{ tags.length }}</div>
        <div>{{ tags[0].toUpperCase() }}</div>
        <input type="text" />
    </div>
</template>

<script>
export default {
    data: () => ({
        tags: ["vue", "react", "angular"],
    }),
};
</script>
