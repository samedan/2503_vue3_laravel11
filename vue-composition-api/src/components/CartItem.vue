<script>
import { computed, reactive, toRefs } from "vue";

export default {
    props: {
        cartItem: {
            type: Object,
            required: true,
        },
    },
    emits: ["remove"],

    // setup(props, context) {
    setup(props, { emit }) {
        const item = reactive(props.cartItem);

        const increment = () => item.quantity++;
        const decrement = () => item.quantity--;

        const total = computed(() => item.price * item.quantity);

        const { name, price, quantity } = toRefs(item);

        // const remove = () => context.emit('remove', item);
        const remove = () => emit("remove", item);

        return {
            remove,
            quantity,
            increment,
            decrement,
            // item,
            name,
            price,
            total,
        };
    },
};
</script>

<template>
    <div>
        <h1>{{ name }} : {{ price }}: {{ quantity }}</h1>

        <button @click="increment">+</button>
        <button @click="decrement">-</button>
        <br />
        <button @click="remove">remove</button>

        <h3>Total: {{ total }}</h3>
    </div>
</template>

<style scoped></style>
