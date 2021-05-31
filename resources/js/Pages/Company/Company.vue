<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Estabelecimento
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <ShowDataCompany v-bind:company="company" />
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import ShowDataCompany from '@/Pages/Company/Components/ShowDataCompany'

export default {
    components: {
        AppLayout,
        ShowDataCompany,
    },
    props: {
        errors: Array,
        company: Object,
    },
}
</script>

