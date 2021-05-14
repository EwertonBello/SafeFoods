<template>
    <img :src="logo" alt="Logo AppLogo">
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
