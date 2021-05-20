<template>
    <div>
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div>
                <jet-application-logo class="block h-12 w-auto" />
            </div>

            <div class="mt-8 text-2xl">
                Informações relacionadas ao estabelecimento
            </div>

            <div class="mt-6 text-gray-500">
                <ul>
                    <li>{{ company.data.name }}</li>
                    <li>{{ company.data.description }}</li>
                    <li>{{ company.data.image }}</li>
                    <li>{{ company.data.video_presentation }}</li>
                    <li>{{ company.data.live }}</li>
                    <li>{{ company.data.delivery }}</li>
                </ul>
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
