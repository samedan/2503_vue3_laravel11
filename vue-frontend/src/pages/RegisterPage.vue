<template>
    <main class="auth-wrapper">
        <form class="auth-form" @submit.prevent="handleSubmit">
            <h1>
                <span>ToeDoe</span>
                <strong>List</strong>
            </h1>
            <h2 class="h3 mb-4 fw-normal">Register</h2>
            <!-- {{ errors }} -->
            <div class="form-floating mb-2">
                <input
                    type="text"
                    class="form-control"
                    id="name"
                    v-model="form.name"
                    :class="{
                        'is-invalid': errors.name && errors.name[0],
                    }"
                    placeholder="Your name"
                />
                <label for="name">Name</label>
                <div
                    class="invalid-feedback"
                    v-if="errors.name && errors.name[0]"
                >
                    {{ errors.name && errors.name[0] }}
                </div>
            </div>
            <div class="form-floating mb-2">
                <input
                    type="email"
                    class="form-control"
                    id="email"
                    v-model="form.email"
                    :class="{
                        'is-invalid': errors.email && errors.email[0],
                    }"
                    placeholder="name@example.com"
                />
                <label for="email">Email</label>
                <div
                    class="invalid-feedback"
                    v-if="errors.email && errors.email[0]"
                >
                    {{ errors.email && errors.email[0] }}
                </div>
            </div>
            <div class="form-floating mb-3">
                <input
                    type="password"
                    class="form-control"
                    :class="{
                        'is-invalid': errors.password && errors.password[0],
                    }"
                    id="password"
                    v-model="form.password"
                    placeholder="Password"
                />
                <label for="password">Password</label>
                <div
                    class="invalid-feedback"
                    v-if="errors.password && errors.password[0]"
                >
                    {{ errors.password && errors.password[0] }}
                </div>
            </div>
            <div class="form-floating mb-3">
                <input
                    type="password"
                    class="form-control"
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    placeholder="Password Confirmation"
                />
                <label for="password_confirmation">Password Confirmation</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">
                Sign Up
            </button>
        </form>
    </main>
</template>

<script setup>
import { useRouter } from "vue-router";
import { reactive } from "vue";
import { useAuthStore } from "../stores/auth";
import { storeToRefs } from "pinia";

const form = reactive({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
});

const router = useRouter();
const store = useAuthStore();
const { isLoggedIn, errors } = storeToRefs(store);
const { handleRegister } = store;

const handleSubmit = async () => {
    // router.push("/tasks");
    await handleRegister(form);
    if (isLoggedIn.value) {
        router.push({ name: "tasks" });
    }
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
