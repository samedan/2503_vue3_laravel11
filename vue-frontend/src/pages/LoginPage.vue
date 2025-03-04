<template>
    <main class="auth-wrapper">
        <form class="auth-form" @submit.prevent="handleSubmit">
            <h1>
                <span>ToeDoe</span>
                <strong>List</strong>
            </h1>
            <h2 class="h3 mb-4 fw-normal">Please sign in</h2>
            <!-- {{ form }} -->
            <div class="form-floating mb-2">
                <input
                    type="email"
                    class="form-control"
                    id="email"
                    v-model="form.email"
                    placeholder="name@example.com"
                />
                <label for="email">Email</label>
            </div>
            <div class="form-floating mb-3">
                <input
                    type="password"
                    class="form-control"
                    id="password"
                    v-model="form.password"
                    placeholder="Password"
                />
                <label for="password">Password</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">
                Sign in
            </button>
        </form>
    </main>
</template>

<script setup>
import { useRouter } from "vue-router";
import { reactive } from "vue";
import { useAuthStore } from "../stores/auth";

const form = reactive({
    email: "",
    password: "",
});

const router = useRouter();
const store = useAuthStore();

const handleSubmit = async () => {
    // router.push("/tasks");
    await store.handleLogin(form);
    router.push({ name: "tasks" });
};
</script>

<style scoped>
.auth-wrapper {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    min-height: 60vh;
    margin-top: 2rem;
}

.auth-form {
    width: 400px;
}
</style>
