<script>
export default {
    data: () => ({
        jsFrameworks: ["react.js", "vue.js", "angular"],
    }),
    mounted() {
        setTimeout(() => {
            this.jsFrameworks.push("svelte.js");
        }, 3000);
    },
};
</script>

<template>
    <div>
        <!-- <h1>Hello , Vue</h1> -->

        <tags-input :selected-tags="jsFrameworks" />
        <!-- <test-component /> -->
    </div>
</template>

<style scoped>
h1 {
    color: blue;
}
</style>
