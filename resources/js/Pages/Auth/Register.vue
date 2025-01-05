<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm, router } from "@inertiajs/vue3";

const form = useForm({
  name: "",
  email: "",
  password: "",
  password_confirmation: "",
});

const submit = () => {
  form.post(route("register"), {
    onFinish: () => form.reset("password", "password_confirmation"),
    onSuccess: () => {
      // Redirect to the email verification notice page
      router.visit(route("verification.notice"));
    },
  });
};
</script>
<style scoped>
.main-container {
  position: absolute;
  width: 100vw;
  height: 100vh;
  overflow: hidden;
}
.main-container .form {
  position: relative;
  width: 35%;
  height: auto;
}
</style>
<template>
  <Head title="Register" />
  <div
    class="main-container d-flex flex-row justify-content-center align-items-center"
  >
    <form @submit.prevent="submit" class="form">
      <h2 class="text-dark text-center fw-semibold">Register now!</h2>
      <div>
        <InputLabel for="name" value="Name" />

        <TextInput
          id="name"
          type="text"
          class="mt-1 block w-full"
          v-model="form.name"
          required
          autofocus
          autocomplete="name"
          style="border-radius: 10px"
          placeholder="your name"
        />

        <InputError class="mt-2" :message="form.errors.name" />
      </div>

      <div class="mt-4">
        <InputLabel for="email" value="Email" />

        <TextInput
          id="email"
          type="email"
          class="mt-1 block w-full"
          v-model="form.email"
          required
          autocomplete="username"
          style="border-radius: 10px"
          placeholder="you@example.com"
        />

        <InputError class="mt-2" :message="form.errors.email" />
      </div>

      <div class="mt-4">
        <InputLabel for="password" value="Password" />

        <TextInput
          id="password"
          type="password"
          class="mt-1 block w-full"
          v-model="form.password"
          required
          autocomplete="new-password"
          style="border-radius: 10px"
          placeholder="8 letters and long"
        />

        <InputError class="mt-2" :message="form.errors.password" />
      </div>

      <div class="mt-4">
        <InputLabel for="password_confirmation" value="Confirm Password" />

        <TextInput
          id="password_confirmation"
          type="password"
          class="mt-1 block w-full"
          v-model="form.password_confirmation"
          required
          autocomplete="new-password"
          style="border-radius: 10px"
          placeholder="8 letters and long"
        />

        <InputError class="mt-2" :message="form.errors.password_confirmation" />
      </div>

      <div
        class="mt-4 d-flex flex-row gap-2 align-items-center justify-content-start"
      >
        <div><input type="checkbox" style="border-radius: 5px" /></div>
        <div class="pt-3">
          <p>
            I agree to the
            <a href="#" class="text-dark text-underline">terms and policy</a>
          </p>
        </div>
      </div>

      <div class="mt-4 d-flex flex-column align-items-center">
        <button
          class="bg-dark text-light w-100 rounded text-center py-2"
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
        >
          Register
        </button>

        <div class="mt-4">
          Already registered?
          <Link :href="route('login')" class="text-primary"> signin </Link>
        </div>
      </div>
    </form>
  </div>
</template>
