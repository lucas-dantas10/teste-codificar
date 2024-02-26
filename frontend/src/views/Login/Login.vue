<script setup>
import Logo from "../../assets/splash_logo.png";
import { ref } from "vue";
import store from '../../store/index.js';
import router from '../../router/index.js';

const form = ref({
    email: '',
    password: ''
});

const error = ref("");

function login() {
    store.dispatch('login', form.value)
        .then((data) => {
            router.push('/posts');
        })
        .catch(({response}) => {
            error.value = response.data.message
        });
}
</script>

<template>
    <div class="bg-[#141414] h-screen w-screen flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" :src="Logo" alt="Logo da cloud txt" />
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-white">
                Entre com a sua conta
            </h2>
        </div>

        <div class="sm:mx-auto sm:w-full sm:max-w-sm" v-show="error != ''">
            <img class="mx-auto h-10 w-auto" :src="Logo" alt="Your Company" />
            <h2 class="mt-10 text-sm border border-red-500 p-4 rounded-md bg-red-500 font-bold leading-9 tracking-tight text-white">
                {{ error }}
            </h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="#" @submit.prevent="login">
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-white">Email</label>
                    <div class="mt-2">
                        <input
                            id="email"
                            name="email"
                            type="email"
                            v-model.trim="form.email"
                            autocomplete="email"
                            required
                            class="block w-full rounded-md border-0 px-2 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        />
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-white">Senha</label>
                    </div>
                    <div class="mt-2">
                        <input
                            id="password"
                            name="password"
                            type="password"
                            v-model.trim="form.password"
                            autocomplete="current-password"
                            required
                            class="block w-full rounded-md border-0 px-3 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        />
                    </div>
                </div>

                <div>
                    <button
                        type="submit"
                        class="flex w-full justify-center rounded-md bg-[#7526a9] px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-[#400a63] ease-in-out delay-50 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                    >
                        Entrar
                    </button>
                </div>
            </form>

            <div class="text-sm mt-4">
                <router-link to="/register" class="font-semibold text-white hover:text-[#7526a9]">Não possui conta?</router-link>
            </div>
        </div>
    </div>
</template>
