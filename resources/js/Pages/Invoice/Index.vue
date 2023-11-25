<template>
    <div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="flex justify-between pb-4 pt-2 bg-white dark:bg-gray-900">
                <div>
                    <Link :href="route('invoice.create')" as="button" type="button"
                        class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                        Создать
                    </Link>
                </div>
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative mt-1">
                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input
                        v-model="search"
                        type="text"
                        id="table-search"
                        class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
                </div>
            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                       ФИО
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Лиц.счет
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Телефон
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Статус
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Исполнитель
                    </th>

                </tr>
                </thead>
                <tbody>
                <tr
                    v-for="item in invoice"
                    :key="item.id"
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ item.name }} {{item.lastname}}
                    </th>
                    <td class="px-6 py-4">
                        {{item.invoice}}
                    </td>
                    <td class="px-6 py-4">
                        {{item.phone}}
                    </td>
                    <td class="px-6 py-4">
                        <p v-show="item.status===1">Не исполнен</p>
                        <p v-show="item.status===0">Исполнен</p>
                    </td>
                    <td
                        v-for="user in item.user_invoice"
                        :key="user.id"
                        class="px-6 py-4">
                        <p v-if="user.id>0">{{user.name}}</p>
                        <p v-else> </p>
                    </td>
                    <td class="flex items-center px-6 py-4">
                        <Link
                            v-if="userRole==0 || userRole==2"
                            :href="route('invoice.edit', item.id)"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 fill="none" viewBox="0 0 24 24"
                                 stroke-width="2"
                                 stroke="currentColor"
                                 class="w-5 h-5 text-green-500">
                                <path strokeLinecap="round" strokeLinejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                        </Link>
                        <Link
                            v-if="userRole==0"
                            onclick="return confirm('Вы действительно хотите удалить?')"
                            :href="route('invoice.delete', item.id)"
                            method="delete" as="button" type="button"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 fill="none" viewBox="0 0 24 24"
                                 stroke-width="2" stroke="currentColor"
                                 class="w-5 h-5 text-red-500 ml-4">
                                <path strokeLinecap="round" strokeLinejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>

                        </Link>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import Layout from "../Layout.vue";
import {Link} from "@inertiajs/inertia-vue3";
import {ref} from "vue";
import {Inertia} from "@inertiajs/inertia";
export default {
    name: "Index",
    layout: Layout,
    components:{Link},
    data(){
        return{
            search: ref(this.searchlist.search),
        }
    },
    props:{
        invoice: Array,
        userRole: Number,
        searchlist: Object,
    },

    watch:{
        search(value){
            Inertia.get('/invoice/list', {search: value}, {
                preserveState: true
            });
        },
    }

}
</script>
