<script>
export default {
    setup() {
        const message = "Hello";
        return {
            message,
        };
    },
};
</script>

<template>
    <div>
        <h1>{{ message }}</h1>
    </div>
</template>

<style scoped></style>
