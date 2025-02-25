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
        return { items };
    },
};
</script>

<template>
    <div>
        <CartItem v-for="item in items" :cart-item="item" :key="item.id" />
    </div>
</template>

<style scoped></style>
