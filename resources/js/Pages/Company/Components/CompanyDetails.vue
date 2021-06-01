<template>
    <section class="text-gray-600 body-font mx-auto">
        <div class="container flex p-5 items-center justify-center flex-col">
            <img class="w-6/7 mb-10 object-cover object-center rounded" alt="hero" v-bind:src="company.image">
            <div class="text-center lg:w-5/6 w-full">
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ company.name }}</h1>
                <p class="mb-8 leading-relaxed">{{ company.description }}</p>
                <div class="flex justify-center">
                    <a v-bind:href="company.live" class="inline-flex text-white bg-purple-500 border-0 py-2 px-6 focus:outline-none hover:bg-purple-600 rounded text-lg">Live</a>
                    <button v-on:click="goToDelivery" class="ml-4 inline-flex text-white bg-red-600 border-0 py-2 px-6 focus:outline-none hover:bg-red-800 rounded text-lg">Delivery</button>
                </div>
                <div class="relative mt-8" style="padding-top: 56.25%">
                    <iframe class="absolute inset-0 w-full h-full" v-bind:src="company.video_presentation" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
export default {
    props: {
        company: Object,
    },
    methods: {
        goToDelivery(){
            this.$inertia.get(route('company.delivery', this.company.id));
        }
    }
}
</script>