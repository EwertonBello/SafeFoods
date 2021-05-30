<template>
    <div>
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div>
                <jet-application-logo class="block h-12 w-auto" />
            </div>

            <div class="mt-8 text-2xl">
                Informações como o número de acessos ao delivery entre outros dados pertinentes ao Estabelecimento
                <br>Acessos Total:  {{ accessDeliveriesCount }}
                <ul>
                    <li v-for="accessDelivery in accessDeliveries" v-bind:key="accessDelivery.id">{{ accessDelivery.id }}</li>
                </ul>
            </div>

            <div class="mt-6 text-gray-500">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi non quia dolorum quasi voluptatibus quas, officiis ipsam amet, pariatur placeat ex eos beatae voluptate neque repudiandae officia voluptatum ad cupiditate!
            </div>
        </div>
    </div>
</template>

<script>
import JetApplicationLogo from '@/Jetstream/ApplicationLogo'

export default {
    props: {
        accessDeliveries: Array,
        accessDeliveriesCount: Number,
    },
    components: {
        JetApplicationLogo,
    },
    mounted(){
        console.log(this.accessDeliveries);
    }
}
</script>
