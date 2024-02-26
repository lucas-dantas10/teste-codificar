<script setup>
import Logo from "../../assets/splash_logo.png";
</script>

<template>
    <div>
        <div class="container flex flex-col mx-auto bg-[#141414]">
            <aside
                class="group/sidebar flex flex-col shrink-0 lg:w-[300px] w-[250px] transition-all duration-300 ease-in-out m-0 fixed z-40 inset-y-0 left-0 bg-[#141414] sidenav fixed-start loopple-fixed-start"
                id="sidenav-main"
            >

                <div class="flex items-center justify-between px-8 py-5">
                    <div class="flex items-center mr-5">
                        <div class="mr-5">
                            <div class="inline-block relative shrink-0 cursor-pointer rounded-[.95rem]">
                                <img
                                    class="w-[40px] h-[40px] shrink-0 inline-block rounded-[.95rem]"
                                    :src="Logo"
                                    alt="avatar image"
                                />
                            </div>
                        </div>
                        <div class="mr-2">
                            <a
                                href="javascript:void(0)"
                                class="dark:hover:text-primary hover:text-primary transition-colors duration-200 ease-in-out text-[1.075rem] font-medium dark:text-white text-secondary-inverse"
                                >Seu nome</a
                            >
                            <span class="text-secondary-dark dark:text-white font-medium block text-[0.85rem]"
                                >Seu Email</span
                            >
                        </div>
                    </div>
                </div>

                <div
                    class="hidden border-b border-dashed lg:block dark:border-neutral-700/70 border-neutral-200"
                ></div>

                <div class="relative pl-3 my-5">
                    <div class="flex flex-col w-full font-medium">
                        <!-- menu item -->
                        <div>
                            <span
                                class="select-none flex items-center px-4 py-[.775rem] cursor-pointer my-[.4rem] rounded-[.95rem]"
                            >
                                <a
                                    href="javascript:;"
                                    class="flex items-center flex-grow text-[1.15rem] dark:text-white text-stone-500 hover:text-dark"
                                    >Posts</a
                                >
                            </span>
                        </div>

                        <!-- menu item -->
                        <div>
                            <span
                                class="select-none flex items-center px-4 py-[.775rem] cursor-pointer my-[.4rem] rounded-[.95rem]"
                            >
                                <a
                                    href="javascript:;"
                                    class="flex items-center flex-grow text-[1.15rem] dark:text-white text-stone-500 hover:text-dark"
                                    >Criar post</a
                                >
                            </span>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
        <div class="flex flex-wrap ml-9 my-5">
            <div class="w-full mx-96">
                <slot></slot>
            </div>
        </div>
    </div>
</template>
