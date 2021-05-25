<template>
    <Header canLogin canRegister/>

    <div class="mt-5 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <section class="text-gray-600 body-font">
                    <div class="container p-5 mx-auto">
                        <div class="flex flex-wrap -m-4">
                            <CompanyDetails v-bind:company="company.data"/>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</template>

<script>
import Header from "@/Shared/Components/Header";
import CompanyDetails from "@/Pages/Company/Components/CompanyDetails";

export default {
    components: {
        Header,
        CompanyDetails,
    },
    props: {
        errors: Array,
        company: Object,
    },
}
</script>

