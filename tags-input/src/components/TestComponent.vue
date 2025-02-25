<template>
    <div>
        <hr />
        <div>TEST Component</div>
        <div v-for="(tag, index) in tags">
            <p>
                {{ index }} - {{ tag }}
                <a href="#" @click.prevent="removeTag(index)">X</a>
            </p>
        </div>
        <input
            type="text"
            v-model.trim="newTag"
            @keydown.enter="addNewTag"
            @keydown.delete="removeLastTag"
        />
    </div>
</template>

<script>
export default {
    data: () => ({
        tags: ["unu", "doi", "trei"],
        newTag: "zilion",
    }),
    methods: {
        addNewTag() {
            this.tags.push(this.newTag);
        },
        removeTag(index) {
            this.tags.splice(index, 1);
        },
    },
};
</script>
