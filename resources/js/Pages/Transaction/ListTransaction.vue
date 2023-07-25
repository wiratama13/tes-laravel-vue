<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                User
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="container p-5">
                        
                        <input
                            type="text"
                            class="form-control inlin col-md-4 w-64 rounded-md ml-auto my-1"
                            v-model="search"
                            placeholder="search"
                        />
                        <table class="table table-striped">
                            <thead class="text-center">
                                <th>Reference_no</th>
                                <th>Price</th>
                                <th>quantity</th>
                                <th>payment_amount</th>
                                <th>product id</th>
                                <th>Action</th>
                            </thead>
                            <tbody class="text-center">
                                <tr v-for="transaction in transactions.data" :key="transaction">
                                    <td>{{ transaction.reference_no }}</td>
                                    <td>{{ transaction.price }}</td>
                                    <td>{{ transaction.quantity }}</td>
                                    <td>{{ transaction.payment_amount }}</td>
                                    <td>{{ transaction.transaction }}</td>
                                    <td>
                                        <Link
                                            :href="`/transactions/${transaction.id}/edit`"
                                            class="btn btn-warning btn-sm mx-2 text-white"
                                            >Edit</Link
                                        >

                                        <Link
                                            :href="`/transactions/${transaction.id}`"
                                            method="delete"
                                            onclick="return confirm('are you sure ?')"
                                            class="btn btn-danger btn-sm text-white"
                                            >hapus</Link
                                        >
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <PaginationTransaction :data="transactions" />
                       
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import { ref, watch } from "vue";
import { router } from '@inertiajs/vue3';
import PaginationTransaction from "@/Components/PaginationTransaction.vue";

const props = defineProps({
    transactions: Object,
    filters : Object
});

let search = ref(props.filters.search);

watch(search, (value) => {
   router.get(
    "/transactions",
    {search: value},
    {
        preserveState : true
    }
   )
});
</script>
