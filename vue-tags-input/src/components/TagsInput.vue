<template>
    <div>
        <div class="tags-input-wrapper">
            <!-- <div>{{ tags }}</div>
        <div v-text="tags.length"></div>
        <div v-if="!tags.length">You have no tags</div> -->

            <span class="tag-item" v-for="(tag, index) in tags" :key="tag">
                {{ index + " : " + tag }}
                <a class="remove-tag" @click.prevent="removeTag(index)" href="#"
                    >&times;</a
                >
            </span>
            <hr />
            {{ newTag }}

            <input
                class="tag-input"
                type="text"
                v-model.trim="newTag"
                @keydown.enter="addNewtag"
                @keydown.delete="removeLastTag"
                @keydown.tab.prevent="addNewTag"
                v-bind:style="tags.includes(newTag) ? {} : ''"
                :class="{ 'tag-exists': isTagExists }"
            />
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return { tags: [...this.selectedTags], newTag: "preact" };
    },
    props: {
        selectedTags: {
            type: Array,
            default: () => [],
        },
    },
    computed: {
        isTagExists() {
            return this.tags.includes(this.newTag);
        },
    },
    watch: {
        newTag(newVal) {
            // add
            if (newVal.indexOf(",") > -1) {
                this.newTag = this.newTag.slice(0, -1);
                this.addNewTag();
            }
        },
    },
    emits: ["change"],
    methods: {
        addNewTag() {
            if (this.newTag && !this.isTagExists) {
                this.tags.push(this.newTag);
                this.newTag = "";
                this.$emit("change", this.tags);
            }
        },
        removeTag(index) {
            this.tags.splice(index, 1);
            this.$emit("change", this.tags);
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
.tag-input.tag-exists {
    color: red;
    text-decoration: line-through;
}
.tags-input-wrapper {
    background: #fff;
    padding: 0.5em;
    border: 1px solid #dbdbdb;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    min-height: 36px;
    box-sizing: border-box;
}
.tag-item {
    color: #212529;
    background-color: #eee;
    margin-right: 0.3em;
    padding: 0.25em 0.4em;
    font-size: 75%;
    line-height: 1;
    text-align: center;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    padding-right: 1.25em;
    padding-left: 0.6em;
}
.tag-input {
    color: #495057;
    flex: 1;
    background: transparent;
    border: none;
}
.tag-input:focus {
    outline: none;
}
a.remove-tag {
    text-decoration: none;
}
</style>
