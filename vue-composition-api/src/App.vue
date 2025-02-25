<script>
import { ref, reactive, toRef, toRefs } from "vue";

export default {
    setup() {
        const message = ref("Hello");
        const quantity = ref(1);

        const item = reactive({
            name: "Product 1",
            price: 10,
        });

        const increment = () => quantity.value++;
        const decrement = () => quantity.value--;

        const swapProduct = () => {
            item.name = "Product A";
            item.price = 30;
        };

        // const nameRef = toRef(item, "name");

        // console.log("nameRef: ", nameRef.value);

        // item.name = "New Product";

        // console.log("nameRef: ", nameRef.value);

        // const itemRefs = toRefs(item);
        const { name, price } = toRefs(item);

        // console.log("name", itemRefs.name.value);
        // console.log("price", itemRefs.price.value);

        // item.name = "New product";
        // item.price = 50;

        // console.log("name", itemRefs.name.value);
        // console.log("price", itemRefs.price.value);

        return {
            message,
            quantity,
            increment,
            decrement,
            // item,
            name,
            price,
            swapProduct,
        };
    },
};
</script>

<template>
    <div>
        <h1>{{ name }} : {{ price }}</h1>
        <button @click="swapProduct">Swap product</button>
        <h2>{{ quantity }}</h2>
        <button @click="increment">+</button>
        <button @click="decrement">-</button>
    </div>
</template>

<style scoped></style>
