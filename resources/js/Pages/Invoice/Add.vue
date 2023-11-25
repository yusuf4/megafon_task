<template>
  <div>
      <div class="m-8">
          <form @submit.prevent="form.post(route('invoice.store'))">
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
              </div>
              <button
                  :disabled="form.processing"
                  type="submit"
                  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Создать</button>
          </form>
      </div>
  </div>
</template>

<script>
import Layout from "../Layout.vue";
import {Link, useForm} from "@inertiajs/inertia-vue3";
export default {
    name: "Add",
    layout: Layout,
    components: {Link},
    data(){
        return{

        }
    },
    setup(){
        const form = useForm({
            name: null,
            lastname: null,
            phone: null,
            invoice: null,
        })
        return {form};
    }
}
</script>
