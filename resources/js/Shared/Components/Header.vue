<template>
    <div v-if="canLogin" class="fixed top-0 right-0 px-6 py-4 sm:block">
        <inertia-link v-if="$page.props.user" href="/dashboard" class="text-sm text-gray-700 hover:underline">
            Dashboard
        </inertia-link>

        <template v-else>
            <inertia-link :href="route('login')" class="text-sm text-gray-700 hover:underline">
                Entrar
            </inertia-link>

            <inertia-link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-gray-700 hover:underline">
                Cadastrar-se
            </inertia-link>
        </template>
    </div>
</template>

<script>
    export default {
        props: {
            canLogin: Boolean,
            canRegister: Boolean,
        },
    }
</script>
