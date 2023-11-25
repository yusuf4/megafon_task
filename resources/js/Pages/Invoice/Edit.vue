<template>
    <div class="m-8">
        <form @submit.prevent="form.post(route('invoice.update', form.id))">
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Имя</label>
                    <input
                        v-model.lazy.trim="form.name"
                        type="text"
                        id="first_name"
                        class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Юсуф">
                </div>
                <div>
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Фамиля</label>
                    <input
                        v-model.lazy.trim="form.lastname"
                        type="text"
                        id="last_name"
                        class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Сафаров">
                </div>
                <div>
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Номер телефона</label>
                    <input
                        v-model.lazy.trim="form.phone"
                        type="text"
                        id="phone"
                        class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="902653131">
                </div>
                <div>
                    <label for="visitors" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Лиц.счет</label>
                    <input
                        v-model.lazy.trim="form.invoice"
                        type="number"
                        id="visitors"
                        class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="5546353">
                </div>
                <div>
                    <div class="flex items-center mb-4">
                        <input
                            v-model="form.status"
                            id="default-radio-1"
                            type="radio"
                            value="0"
                            name="default-radio"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Выполнен
                        </label>
                    </div>
                    <div class="flex items-center">
                        <input
                            v-model="form.status"
                            id="default-radio-2"
                            type="radio"
                            value="1"
                            name="default-radio"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-radio-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Не выполнен
                        </label>
                    </div>
                </div>
                <div>
                    <label for="default-radio-2" class="text-sm font-medium text-gray-900 dark:text-gray-300">
                        Исполнител
                    </label>
                    <VueMultiselect
                        v-model="form.user_id"
                        :options="users"
                        :close-on-select="true"
                        :clear-on-select="false"
                        placeholder="Исполнител"
                        label="name"
                        track-by="name"
                    />
                </div>
            </div>
            <button
                :disabled="form.processing"
                type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Обновить
            </button>
        </form>
    </div>
</template>

<script>
import Layout from "../Layout.vue";
import {useForm} from "@inertiajs/inertia-vue3";
import VueMultiselect from 'vue-multiselect'

export default {
    name: "Edit",
    layout: Layout,
    components:{VueMultiselect },
    data(){
        return {
            value: null,
        }
    },
    props:{
        invoiceID: Object,
        users: {
            type: Object,
            default: () => []
        },
    },

    setup(props){
        const form = useForm({
            id: props.invoiceID.id,
            name: props.invoiceID.name,
            lastname: props.invoiceID.lastname,
            phone: props.invoiceID.phone,
            invoice: props.invoiceID.invoice,
            status:props.invoiceID.status,
            user_id: props.invoiceID.user_id,
            _method: "PUT"
        })
        return {form};
    }
}
</script>
<style src="vue-multiselect/dist/vue-multiselect.css"></style>
