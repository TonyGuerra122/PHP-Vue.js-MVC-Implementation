<template>
  <div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="px-8 py-6 mt-4 text-left bg-white shadow-lg">
      <h3 class="text-2xl font-bold text-center">
        Login to your account
      </h3>
      <form @submit.prevent="login">
        <div class="mt-4">
          <div>
            <label
              class="block"
              for="email"
            >Email</label>
            <input
              v-model="email"
              type="email"
              placeholder="Email"
              class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
              required
            >
          </div>
          <div class="mt-4">
            <label
              class="block"
              for="password"
            >Password</label>
            <input
              v-model="password"
              type="password"
              placeholder="Password"
              class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
              required
            >
          </div>
          <div class="flex items-center justify-between mt-4">
            <a
              href="#"
              class="text-sm text-blue-600 hover:underline"
            >Forgot your password?</a>
            <button
              class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:bg-blue-700"
            >
              Login
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      email: "",
      password: "",
    };
  },
  methods: {
    login() {
      // Implement your login logic here
      console.log("Login attempt with:", this.email, this.password);
    },
  },
};
</script>
