<template>
    <div>
        <!-- <div>{{ tags }}</div>
        <div v-text="tags.length"></div>
        <div v-if="!tags.length">You have no tags</div> -->

        <div v-for="(tag, index) in tags">
            {{ index + " : " + tag }}
            <a @click.prevent="removeTag(index)" href="#">&times;</a>
        </div>
        <hr />
        {{ newTag }}

        <input
            type="text"
            v-model.trim="newTag"
            @keydown.enter="addNewtag"
            @keydown.delete="removeLastTag"
            @keydown.tab.prevent="addNewTag"
            v-bind:style="tags.includes(newTag) ? {} : ''"
            :class="{ 'tag-exists': tags.includes(newTag) }"
        />
    </div>
</template>

<script>
export default {
    data: () => ({
        tags: ["vue", "react", "angular"],
        newTag: "preact",
    }),
    methods: {
        addNewTag() {
            if (this.newTag) {
                this.tags.push(this.newTag);
                this.newTag = "";
            }
        },
        removeTag(index) {
            this.tags.splice(index, 1);
        },
        removeLastTag() {
            if (this.newTag.length == 0) {
                // if input is empty
                this.removeTag(this.tags.length - 1);
            }
        },
    },
};
</script>

<style scoped>
.tag-exists {
    color: red;
    text-decoration: line-through;
}
</style>
