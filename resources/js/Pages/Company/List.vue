<template>
    <Header canLogin canRegister/>

    <div class="mt-10 py-12">
        <div class="mt-10 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <section class="text-gray-600 body-font">
                    <div class="container p-5 mx-auto">
                        <div class="flex flex-wrap -m-4">
                            <CompanyCard v-for="company of companies.data" v-bind:key="company.id" v-bind:company="company"/>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</template>

<script>
import Header from "@/Shared/Components/Header";
import CompanyCard from "@/Pages/Company/Components/CompanyCard";

export default {
    components: {
        Header,
        CompanyCard,
    },
    props: {
        errors: Array,
        companies: Array,
    },
}
</script>

