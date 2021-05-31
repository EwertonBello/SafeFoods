<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Dashboard 
                        v-bind:accessDeliveries="accessDeliveries" 
                        v-bind:accessDeliveriesCount="accessDeliveriesCount" 
                        v-bind:accessDeliveriesTodayCount="accessDeliveriesTodayCount" 
                    />
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Dashboard from '@/Pages/Company/Dashboard'

    export default {
        props: {
            accessDeliveries: Array,
            accessDeliveriesCount: Number,
            accessDeliveriesTodayCount: Number,
        },
        components: {
            AppLayout,
            Dashboard,
        },
    }
</script>
