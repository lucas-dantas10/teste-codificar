<script setup>
import AppLayout from "../../../components/Layout/AppLayout.vue";
import Spinner from "../../../components/Spinner/Spinner.vue";
import { ref, onMounted } from "vue";
import store from "../../../store";
import router from "../../../router";
import { useRoute } from "vue-router";

const route = useRoute();

const form = ref({
    text: "",
});

onMounted(() => {
    store.dispatch('getPost', route.params.id)
        .then(({data}) => {
            form.value.text = data.text;
        });
});

const message = ref("");

function updatePost() {
    store.state.spinner.isLoading = true;
    form.value.id = route.params.id;
    store.dispatch('updatePost', form.value)
        .then(({data}) => {  
            store.state.toast.message = 'Post atualizado!';
            setTimeout(() => store.state.toast.message = '', 3000);  
        })
        .catch(({response}) => {
            store.state.toast.message = 'Erro ao atualizar o post';
            setTimeout(() => store.state.toast.message = '', 3000);  
        })
        .finally(() => store.state.spinner.isLoading = false);
}
</script>

<template>
    <div class="w-full h-full bg-[#2b2d31]">
        <AppLayout>
            <section class="w-full h-screen md:h-screen">
                <div class="border rounded-md p-4 mb-4" v-if="message != ''">
                    <p class="text-white">{{ message }}</p>
                </div>
                <form @submit.prevent="updatePost">
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
                            Atualizar
                        </button>
                    </div>
                </form>
            </section>
        </AppLayout>
    </div>
</template>
