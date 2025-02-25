<script>
export default {
    data: () => ({
        jsFrameworks: ["react.js", "vue.js", "angular"],
        backendFrameworks: [],
    }),
    // mounted() {
    //     setTimeout(() => {
    //         this.jsFrameworks.push("svelte.js");
    //     }, 3000);
    // },
    methods: {
        handleChange(tags) {
            this.jsFrameworks = [...tags];
        },
    },
};
</script>

<template>
    <div>
        <h1>Favourite frameworks</h1>
        <div>{{ jsFrameworks }}</div>
        <tags-input :selected-tags="jsFrameworks" @change="handleChange" />

        <div>{{ backendFrameworks }}</div>
        <tags-input
            :selected-tags="backendFrameworks"
            @change="backendFrameworks = [...$event]"
        />
        <!-- <test-component /> -->
    </div>
</template>

<style scoped>
h1 {
    color: blue;
}
</style>
