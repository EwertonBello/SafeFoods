<template>

    <div class="p-4 md:w-1/3">
        <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
        <img class="lg:h-48 md:h-36 w-full object-cover object-center" v-bind:src="company.image" alt="Company Image">
        <div class="p-6">
            <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ company.name }}</h1>
            <p class="leading-relaxed mb-3">{{ company.description }}</p>
            <div class="flex items-center flex-wrap ">
                <inertia-link v-bind:href="route('company.show', company.id)" class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">
                    Ver Mais
                    <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"></path>
                    <path d="M12 5l7 7-7 7"></path>
                    </svg>
                </inertia-link>
            </div>
        </div>
        </div>
    </div>

</template>
<script>
export default {
    props: {
        company: Object,
    },
}
</script>