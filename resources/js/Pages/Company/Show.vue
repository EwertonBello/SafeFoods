<template>
    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

        <div class="text-gray-500">
                <div class="container p-5 mx-auto">
                    <div class="flex flex-wrap -m-4">
                        <div class="mx-auto h-full border-2 border-gray-200 rounded-lg overflow-hidden">
                            <img class="lg:h-48 md:h-36 w-full object-cover object-center" v-bind:src="company.data.image" alt="Company Banner">
                            <div class="p-6">
                                <h2 class="tracking-widest text-xs title-font font-medium text-gray-500 mb-1">NOME</h2>
                                <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ company.data.name }}</h1>

                                <h2 class="tracking-widest text-xs title-font font-medium text-gray-500 mb-1">DESCRIÇÃO</h2>
                                <p class="leading-relaxed mb-3">{{ company.data.description }}</p>

                                <h2 class="tracking-widest text-xs title-font font-medium text-gray-500 mb-1">VÍDEO</h2>
                                <p class="truncate leading-relaxed mb-3">{{ company.data.video_presentation }}</p>

                                <h2 class="tracking-widest text-xs title-font font-medium text-gray-500 mb-1">LIVE</h2>
                                <p class="truncate leading-relaxed mb-3">{{ company.data.live }}</p>

                                <h2 class="tracking-widest text-xs title-font font-medium text-gray-500 mb-1">DELIVERY</h2>
                                <p class="truncate leading-relaxed mb-3">{{ company.data.delivery }}</p>

                                <div class="flex items-center flex-wrap ">
                                    <inertia-link :href="route('company.edit', company.data.id)" class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">Editar
                                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14"></path>
                                            <path d="M12 5l7 7-7 7"></path>
                                        </svg>
                                    </inertia-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</template>

<script>
import JetApplicationLogo from '@/Jetstream/ApplicationLogo'

export default {
    components: {
        JetApplicationLogo,
    },
    props: {
        company: Object,
    },
}
</script>
