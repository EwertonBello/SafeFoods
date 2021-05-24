<template>
    <Header canLogin canRegister/>

    <div class="mt-5 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <ul>
                    <li v-for="company of companies" v-bind:key="company.id">
                        {{ company }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import Header from "@/Shared/Components/Header";

export default {
    components: {
        AppLayout,
        Header,
    },
    props: {
        errors: Array,
        companies: Array,
    },
}
</script>

