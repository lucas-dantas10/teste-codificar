<script setup>
import AppLayout from "../../../components/Layout/AppLayout.vue";
import Spinner from "../../../components/Spinner/Spinner.vue";
import { ref } from "vue";
import store from "../../../store";

const form = ref({
    text: "",
});

function createPost() {
    store.state.spinner.isLoading = true;
    store.dispatch('registerPost', form.value)
        .then(({data}) => {   
            store.state.toast.message = 'Post criado!';
            setTimeout(() => store.state.toast.message = '', 3000);
        })
        .catch(({response}) => {
            store.state.toast.message = 'Erro ao cadastrar o post!';
            setTimeout(() => store.state.toast.message = '', 3000);
        })
        .finally(() => store.state.spinner.isLoading = false);
}
</script>

<template>
    <div class="w-full h-full bg-[#2b2d31]">
        <AppLayout>
            <section class="w-full h-screen md:h-screen">
                <form @submit.prevent="createPost">
                    <div>
                        <label for="name" class="block text-xl font-medium leading-6 text-white">Texto</label>
                        <div class="mt-2">
                            <textarea
                                id="name"
                                name="name"
                                v-model.trim="form.text"
                                type="text"
                                autocomplete="name"
                                required
                                class="block w-full rounded-md border-0 px-2 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            ></textarea>
                        </div>
                    </div>

                    <div class="w-full flex items-end justify-end mt-4">
                        <button class="flex items-center border border-blue-500 px-2 py-1 bg-blue-500 rounded-md text-white">
                            <Spinner />
                            Cadastrar
                        </button>
                    </div>
                </form>
            </section>
        </AppLayout>
    </div>
</template>
