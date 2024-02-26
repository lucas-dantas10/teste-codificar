<script setup>
import AppLayout from "../../components/Layout/AppLayout.vue";
import { ref, onMounted } from "vue";
import store from "../../store";

const currentPage = ref(1);
const totalPages = ref(0);
const posts = ref({});

onMounted(() => {
    store.dispatch('getPosts')
        .then((data) => {
            posts.value = store.state.posts.data;
            totalPages.value = posts.value.total
            return;
        });
});

function goToPage(page) {
  if (page >= 1 && page <= totalPages.value) {
    currentPage.value = page;
  }
}
</script>

<template>
    <div class="w-full h-full bg-[#2b2d31]">
        <AppLayout>
            <section class="w-full h-full md:h-screen flex flex-col justify-center md:flex md:flex-col md:justify-between gap-6">
                <div class="flex flex-col gap-6">
                    <div class="w-full border flex flex-col gap-4 border-black rounded-md p-4 bg-black shadow-lg" v-for="(post, I) in posts.posts" :key="i">
                        <div class="flex items-center justify-between border-b pb-4">
                            <div class="w-full flex items-end justify-between gap-4">
                                <span class="font-bold text-xl text-white">{{ post.user.name }}</span>
                                <span class="text-gray-400">Data do Post: {{ post.created_at }}</span>
                            </div>
                        </div>

                        <div class="flex flex-col gap-4">
                            <p class="text-white">
                                {{ post.text }}
                            </p>

                            <div class="flex items-center justify-end gap-4" v-if="post.user.email == store.state.user.email">
                                <button class="bg-purple-500 p-2 rounded-md text-white">Editar</button>
                                <button class="bg-red-400 p-2 rounded-md text-white">Excluir</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center">
                    <button
                        @click="goToPage(currentPage - 1)"
                        :disabled="currentPage === 1"
                        class="bg-gray-600 text-white px-4 py-2 rounded-l-md"
                    >
                        Anterior
                    </button>
                    <template v-for="page in totalPages">
                        <button
                            @click="goToPage(page)"
                            :class="{ 'bg-purple-500': currentPage === page, 'bg-gray-600': currentPage !== page }"
                            class="text-white px-4 py-2"
                        >
                            {{ page }}
                        </button>
                    </template>
                    <button
                        @click="goToPage(currentPage + 1)"
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
