<script setup>
import AppLayout from "../../components/Layout/AppLayout.vue";
import Spinner from "../../components/Spinner/Spinner.vue";
import { ref, onMounted } from "vue";
import store from "../../store";

const currentPage = ref(1);
const totalPages = ref(0);
const posts = ref({});

onMounted(() => {
    getPosts();
});

function getPosts(url = null) {
    store.state.spinner.isLoading = true;
    store.dispatch('getPosts', url)
        .then((data) => {
            posts.value = store.state.posts.data;
            totalPages.value = posts.value.total
            currentPage.value = store.state.posts.data.current_page;
        })
        .finally(() => store.state.spinner.isLoading = false);
}

function nextPage() {
    getPosts(store.state.posts.data.next_page_url);
}

function previousPage() {
    getPosts(store.state.posts.data.previous_page_url);
}

function removePost(post) {
    if (!confirm(`Deseja deletar o post? `)) {
        return;
    }

    store.dispatch('removePost', post.id)
        .then(() => {
            store.state.toast.message = "Post removido com sucesso";
            getPosts();
        })
        .finally(() => {
            setTimeout(() => {
                store.state.toast.message = '';
            }, 3000);
        });
}
</script>

<template>
    <div class="w-full h-full bg-[#2b2d31]">
        <AppLayout>
            <section class="w-full h-full md:h-screen flex flex-col justify-center md:flex md:flex-col md:justify-between gap-6">
                <div class="flex flex-col gap-6">
                    <div v-if="posts.length == 0">
                        <p class="text-white text-2xl">Não possui posts!</p>
                    </div>
                    <div 
                        class="w-full border flex flex-col gap-4 border-black rounded-md p-4 bg-black shadow-lg" 
                        v-for="(post, i) in posts.posts" 
                        :key="i"
                        v-else
                    >
                        <div class="flex items-center justify-between border-b pb-4">
                            <div class="w-full flex items-end justify-between gap-4">
                                <span class="font-bold text-xl text-white">{{ post.user.name }}</span>
                                <span class="text-gray-400">Criado {{ post.created_at }}</span>
                            </div>
                        </div>

                        <div class="flex flex-col gap-4">
                            <p class="text-white">
                                {{ post.text }}
                            </p>

                            <div class="flex items-center justify-end gap-4" v-if="post.user.email == store.state.user.data.email">
                                <router-link :to="'/edit/post/' + post.id" class="bg-purple-500 p-2 rounded-md text-white">Editar</router-link>
                                <button @click.prevent="removePost(post)" class="bg-red-400 p-2 rounded-md text-white">Excluir</button>
                            </div>
                        </div>
                    </div>

                    <Spinner />
                </div>

                <div class="flex items-center justify-center gap-4">
                    <button
                        @click="previousPage()"
                        :disabled="currentPage === 1"
                        class="bg-gray-600 text-white px-4 py-2 rounded-l-md"
                    >
                        Anterior
                    </button>
                    <div>
                            <p class="text-white text-xl">Total de posts {{ totalPages }}</p>
                    </div>
                    <button
                        @click="nextPage()"
                        :disabled="currentPage === totalPages"
                        class="bg-gray-600 text-white px-4 py-2 rounded-r-md"
                    >
                        Próximo
                    </button>
                </div>
            </section>
        </AppLayout>
    </div>
</template>
