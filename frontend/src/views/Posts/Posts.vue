<script setup>
import AppLayout from "../../components/Layout/AppLayout.vue";
</script>

<template>
    <div class="w-screen h-screen bg-[#2b2d31]">
        <AppLayout>
            <section class="flex flex-col gap-4">
                <div class="w-full border flex flex-col gap-4 border-white rounded-md p-4">
                    <div class="flex items-center justify-between text-white border-b pb-4">
                        <div class="flex items-center gap-4">
                            <span class="font-bold text-xl">Lucas</span>
                            <span class="text-gray-400">26/02/2023</span>
                        </div>
                        
                    </div>

                    <div class="flex flex-col gap-4">
                        <p class="text-white">
                            Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a
                            piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard
                            McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of
                            the more obscure Latin
                        </p>

                        <div class="flex items-center justify-end gap-4">
                            <button class="bg-purple-500 p-2 rounded-md">Editar</button>
                            <button class="bg-red-400 p-2 rounded-md">Excluir</button>
                        </div>
                    </div>
                </div>
            </section>
        </AppLayout>
    </div>
</template>
