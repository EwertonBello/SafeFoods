<template>

    <div class="container mx-auto sm:px-8 max-w-3xl">
        <div class="py-8">
            <div class="-mx-4 sm:-mx-8 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                    ID
                                </th>
                                <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                    ACESSADO EM
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="accessDelivery in accessDeliveries" v-bind:key="accessDelivery.id">
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ accessDelivery.id }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ accessDelivery.created_at }}
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</template>
<script>
    export default {
        props: {
            accessDeliveries: Array,
        },
        mounted(){
            console.log(this.accessDeliveries);
        }
    }
</script>