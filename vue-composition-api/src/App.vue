<script>
import CartItem from "./components/CartItem.vue";
import { ref } from "vue";

export default {
    components: { CartItem },
    setup() {
        const items = ref([
            {
                id: 1,
                name: "product X",
                price: 20,
                quantity: 1,
            },
        ]);

        const handleRemove = (data) => items.value.splice(0, 1);

        return { items, handleRemove };
    },
};
</script>

<template>
    <div>
        <CartItem
            v-for="item in items"
            :cart-item="item"
            :key="item.id"
            @remove="handleRemove"
        />
    </div>
</template>

<style scoped></style>
