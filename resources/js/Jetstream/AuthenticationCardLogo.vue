<template>
    <inertia-link :href="'/'">
        <img class="w-20 h-20" :src="logo" alt="Logo AuthCardLogo">
    </inertia-link>
</template>
<script>
import logo from "@/assets/logo.png";

export default {
    data: function () {
        return {
            logo: logo
        }
    }
}
</script>
