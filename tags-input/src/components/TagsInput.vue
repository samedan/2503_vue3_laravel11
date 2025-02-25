<template>
    <div>
        <!-- <div>{{ tags }}</div>
        <div v-text="tags.length"></div>
        <div v-if="!tags.length">You have no tags</div> -->

        <div v-for="(tag, index) in tags">{{ index + " : " + tag }}</div>

        <input
            type="text"
            :value="newTag"
            @keydown.enter="tags.push($event.target.value)"
            @keydown.tab.prevent="tags.push($event.target.value)"
        />
    </div>
</template>

<script>
export default {
    data: () => ({
        tags: ["vue", "react", "angular"],
        newTag: "preact",
    }),
};
</script>
