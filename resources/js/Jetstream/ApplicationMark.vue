<template>
    <img class="w-16 h-16" :src="logo" alt="Logo Mark">
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
