<script setup>
import AppLayout from "../../components/Layout/AppLayout.vue";
</script>

<template>
    <div class="w-full h-full bg-[#2b2d31]">
        <AppLayout>
            <section class="w-full h-full md:h-screen flex flex-col justify-center md:flex md:flex-col md:justify-between gap-6">
                <div class="flex flex-col gap-6">
                    <div class="w-full border flex flex-col gap-4 border-black rounded-md p-4 bg-black shadow-lg">
                        <div class="flex items-center justify-between border-b pb-4">
                            <div class="w-full flex items-end justify-between gap-4">
                                <span class="font-bold text-xl text-white">Lucas</span>
                                <span class="text-gray-400">Data do Post: 26/02/2023</span>
                            </div>
                        </div>

                        <div class="flex flex-col gap-4">
                            <p class="text-white">
                                Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in
                                a piece of classical Latin literature from 45 BC, making it over 2000 years old.
                                Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked
                                up one of the more obscure Latin
                            </p>

                            <div class="flex items-center justify-end gap-4">
                                <button class="bg-purple-500 p-2 rounded-md text-white">Editar</button>
                                <button class="bg-red-400 p-2 rounded-md text-white">Excluir</button>
                            </div>
                        </div>
                    </div>
                    <div class="w-full border flex flex-col gap-4 border-black rounded-md p-4 bg-black shadow-lg">
                        <div class="flex items-center justify-between border-b pb-4">
                            <div class="w-full flex items-end justify-between gap-4">
                                <span class="font-bold text-xl text-white">Lucas</span>
                                <span class="text-gray-400">Data do Post: 26/02/2023</span>
                            </div>
                        </div>

                        <div class="flex flex-col gap-4">
                            <p class="text-white">
                                Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in
                                a piece of classical Latin literature from 45 BC, making it over 2000 years old.
                                Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked
                                up one of the more obscure Latin
                            </p>

                            <div class="flex items-center justify-end gap-4">
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
