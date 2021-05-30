<template>
    <div>
        <div class="p-6 sm:px-20 bg-gray-50 border-b border-gray-200">

            <div class="max-w-sm w-full lg:max-w-full lg:flex mx-auto mt-10">
                <div class="mt-2 md:m-2 border-l-8 border-2 border-l-red-400 border-green-400 bg-white rounded-b p-4 flex flex-col justify-between leading-normal">
                    <div class="flex items-center">
                    <span class="w-15 h-15 mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="#34d399">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                    </svg>
                    </span>
                    <div class="text-sm">
                        <p class="text-gray-900 leading-none">Acessos Hoje</p>
                        <p class="text-green-400 text-3xl">{{ accessDeliveriesTodayCount }}</p>
                    </div>
                    </div>
                </div>
                
                <div class="mt-2 md:m-2 border-l-8 border-2 border-l-red-400 border-blue-400 bg-white rounded-b p-4 flex flex-col justify-between leading-normal">
                    <div class="flex items-center">
                    <span class="w-15 h-15 mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="#60a5fa">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                    </svg>
                    </span>
                    <div class="text-sm">
                        <p class="text-gray-900 leading-none">Total Acessos</p>
                        <p class="text-blue-400 text-3xl">{{ accessDeliveriesCount }}</p>
                    </div>
                    </div>
                </div>
            </div>

            <div class="mt-8 text-2xl">
                <TableAccessDelivery v-bind:accessDeliveries="accessDeliveries"/>
            </div>
        </div>
    </div>
</template>

<script>
import TableAccessDelivery from "@/Pages/Company/Components/TableAccessDelivery";

export default {
    props: {
        accessDeliveries: Array,
        accessDeliveriesCount: Number,
        accessDeliveriesTodayCount: Number,
    },
    components: {
        TableAccessDelivery,
    }
}
</script>
