<script setup>
import Toast from '../../components/Toast/Toast.vue'; 
import Logo from "../../assets/splash_logo.png";
import { onMounted } from "vue";
import store from "../../store";
import router from '../../router';

onMounted(() => {
    store.dispatch('getCurrentUser')
        .then((data) => {
            return;
        });
});

function logout() {
    store.dispatch('logout')
        .then(() => router.push('/'));
}
</script>

<template>
    <div>
        <Toast />
        <div class="container flex flex-col mx-auto bg-[#141414]">
            <!-- <div class="sm:hidden md:hidden lg:hidden">
                <button @click="toggleSidebar" class="text-white p-3 focus:outline-none">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                    >
                        <path
                            x-show="isSidebarOpen"
                            fill-rule="evenodd"
                            d="M3 5a1 1 0 0 1 0-2h14a1 1 0 0 1 0 2H3zm0 6a1 1 0 0 1 0-2h14a1 1 0 0 1 0 2H3zm0 6a1 1 0 0 1 0-2h14a1 1 0 0 1 0 2H3z"
                            clip-rule="evenodd"
                        />
                        <path
                            x-show="!isSidebarOpen"
                            fill-rule="evenodd"
                            d="M4 6h12a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 5h12a1 1 0 1 1 0 2H4a1 1 0 1 1 0-2zm0 5h12a1 1 0 1 1 0 2H4a1 1 0 1 1 0-2z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </button>
            </div> -->
            <aside
                class="md:group/sidebar md:flex md:flex-col md:shrink-0 lg:w-[300px] w-[250px] transition-all duration-300 ease-in-out md:m-0 md:fixed z-40 md:inset-y-0 left-0 bg-[#141414] md:sidenav md:fixed-start md:loopple-fixed-start"
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
                                >{{ store.state.user.data.name }}</a
                            >
                            <span class="text-secondary-dark dark:text-white font-medium block text-[0.85rem]"
                                >{{store.state.user.data.email}}</span
                            >
                        </div>
                    </div>
                </div>

                <div
                    class="hidden border-b border-dashed lg:block dark:border-neutral-700/70 border-neutral-200"
                ></div>

                <div class="relative pl-3 my-5">
                    <div class="flex flex-col w-full font-medium">
                        <div>
                            <span
                                class="select-none flex items-center px-4 py-[.775rem] cursor-pointer my-[.4rem] rounded-[.95rem]"
                            >
                                <router-link
                                    to="/posts"
                                    class="flex items-center flex-grow text-[1.15rem] dark:text-white text-stone-500 hover:text-dark"
                                >
                                    Posts
                                </router-link>
                            </span>
                        </div>

                        <div>
                            <span
                                class="select-none flex items-center px-4 py-[.775rem] cursor-pointer my-[.4rem] rounded-[.95rem]"
                            >
                                <router-link
                                    to="/create/post"
                                    class="flex items-center flex-grow text-[1.15rem] dark:text-white text-stone-500 hover:text-dark"
                                    >Criar post
                                </router-link>
                            </span>
                        </div>

                        <div>
                            <span
                                class="select-none flex items-center px-4 py-[.775rem] cursor-pointer my-[.4rem] rounded-[.95rem]"
                            >
                                <a
                                    @click="logout()"
                                    class="flex items-center flex-grow text-[1.15rem] dark:text-red-400 text-stone-500 hover:text-dark"
                                    >Logout
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
        <div class="flex items-center p-6 md:flex md:flex-wrap md:ml-9 md:my-5">
            <div class="w-full h-full mx-0 md:mx-96">
                <slot></slot>
            </div>
        </div>
    </div>
</template>
