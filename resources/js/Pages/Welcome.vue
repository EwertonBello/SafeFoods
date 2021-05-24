<template>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <Header canLogin canRegister/>

        <div class="container mx-auto flex flex-col md:flex-row items-center my-12 md:my-24">
            <div class="flex flex-col w-full lg:w-1/3 mx-auto text-center md:justify-center md:items-start p-8">
                <img class="mx-auto md:mx-0 w-1/2 h-1/2" :src="logo" alt="Logo Welcome">
                <h2 class="text-3xl md:text-5xl leading-relaxed md:leading-snug mb-2">
                    SafeFoods
                </h2>
                <p class="text-sm md:text-base text-gray-600 mb-4">
                    Conheça o lugar onde você come.
                </p>
                <inertia-link :href="route('company.index')" class="bg-transparent hover:bg-purple-800 text-purple-700 hover:text-white rounded shadow hover:shadow-lg py-2 px-4 border border-purple-700 hover:border-transparent">
                    Explorar agora
                </inertia-link>
            </div>
            <div class="p-8 mt-12 mb-6 md:mb-0 md:mt-0 ml-0 md:ml-12 lg:w-2/3  justify-center">
                <img class="w-2/3 mx-auto md:mx-0" :src="chef" alt="Chef">
            </div>
        </div>



    </div>
</template>

<script>
    import chef from "@/assets/chef.svg";
    import logo from "@/assets/logo.png";
    import Header from "@/Shared/Components/Header";

    export default {
        components: {
            Header,
        },
        props: {
            canLogin: Boolean,
            canRegister: Boolean,
        },
        data: function () {
            return {
                chef: chef,
                logo: logo
            }
        }
    }
</script>
