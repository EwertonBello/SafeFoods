<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Estabelecimento - Editar
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-gray-200 border-b border-gray-200">
                        <div class="text-gray-500">
                            <!-- component -->
                            <div class="mx-auto grid bg-white rounded-lg shadow-xl w-11/12 md:w-9/12 lg:w-1/2">
                                <div class="flex justify-center py-4">
                                    <jet-application-mark class="block h-9 w-auto" />
                                </div>

                                <div class="flex justify-center">
                                    <div class="flex">
                                        <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Estabelecimento</h1>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nome</label>
                                    <input 
                                    v-model="form.name"
                                    class="py-2 px-3 rounded-lg border-2 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                                    type="text" 
                                    placeholder="Nome" 
                                    v-bind:class="errors.name ? 'border-red-500': 'border-purple-300'"
                                    />
                                    <div class="text-red-500">{{ errors?.name }}</div>
                                </div>

                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Descrição</label>
                                    <textarea 
                                    v-model="form.description"
                                    class="py-2 px-3 rounded-lg border-2 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                                    type="text"
                                    v-bind:class="errors.description ? 'border-red-500': 'border-purple-300'"
                                    >
                                    </textarea>
                                    <div class="text-red-500">{{ errors?.description }}</div>
                                </div>

                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Vídeo Sobre</label>
                                    <input 
                                    v-model="form.video_presentation"
                                    class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                                    type="text" 
                                    placeholder="https://www.youtube.com/embed/..." />
                                </div>

                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Live</label>
                                    <input 
                                    v-model="form.live"
                                    class="py-2 px-3 rounded-lg border-2 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                                    type="text" 
                                    placeholder="https://www.twitch.tv/..." 
                                    v-bind:class="errors.live ? 'border-red-500': 'border-purple-300'"
                                    />
                                    <div class="text-red-500">{{ errors?.live }}</div>
                                </div>

                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Delivery</label>
                                    <input 
                                    v-model="form.delivery"
                                    class="py-2 px-3 rounded-lg border-2 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                                    type="text" 
                                    placeholder="https://www.ifood.com.br/delivery/..." 
                                    v-bind:class="errors.delivery ? 'border-red-500': 'border-purple-300'"
                                    />
                                    <div class="text-red-500">{{ errors?.delivery }}</div>
                                </div>

                                <div class="grid grid-cols-1 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Banner</label>
                                    <div class='flex items-center justify-center w-full'>
                                        <label class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group'>
                                            <div class='flex flex-col items-center justify-center pt-7'>
                                            <svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                            <p class='lowercase text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>
                                                {{ form.image.size ? form.image.name : "Selecione uma imagem"}}
                                            </p>
                                            </div>
                                        <input 
                                        @input="form.image = $event.target.files[0]"
                                        type='file' 
                                        class="hidden" />
                                        </label>
                                    </div>
                                    <div v-show="errors?.image" class="text-red-500 text-center">
                                            {{ errors.image }}<br/>
                                            Obs: Imagem deve ser 800x600
                                    </div>
                                </div>

                                <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                                <inertia-link :href="route('company')" class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancelar</inertia-link>
                                <button @click="save" class='w-auto bg-purple-500 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Salvar</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import JetApplicationMark from '@/Jetstream/ApplicationMark'

export default {
  data() {
    return {
      form: {
        name: this.company.data.name,
        description: this.company.data.description,
        image: File,
        video_presentation: this.company.data.video_presentation,
        live: this.company.data.live,
        delivery: this.company.data.delivery,
      },
    }
  },
    components: {
        AppLayout,
        JetApplicationMark,
    },
    props: {
        errors: Array,
        company: Object,
    },
    methods: {
        save() {
            this.form._method = 'PUT';
            this.$inertia.post(route('company.update', this.company.data.id), this.form)
            .then(() => {
                if (this.$page.props.flash.success) {
                    Toast.fire({
                        icon: 'success',
                        title: this.$page.props.flash.success
                    });
                }
            });
        }
    }
}
</script>
