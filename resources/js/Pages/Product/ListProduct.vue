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
                        <Link
                            href="/products/create"
                            class="btn btn-primary my-3"
                            >create product</Link
                        >

                        <input
                            type="text"
                            class="form-control inlin col-md-4 w-64 rounded-md ml-auto my-1"
                            v-model="search"
                            placeholder="search"
                        />
                        <table class="table table-striped">
                            <thead class="text-center">
                                <th>Name</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Description</th>
                                <th>Action</th>
                            </thead>
                            <tbody class="text-center">
                                <tr v-for="product in products.data" :key="product">
                                    <td>{{ product.name }}</td>
                                    <td>{{ product.price }}</td>
                                    <td>{{ product.stock }}</td>
                                    <td>{{ product.description }}</td>
                                    <td>
                                        <Link
                                            :href="`/products/${product.id}/edit`"
                                            class="btn btn-warning btn-sm mx-2 text-white"
                                            >Edit</Link
                                        >

                                        <Link
                                            :href="`/products/${product.id}`"
                                            method="delete"
                                            onclick="return confirm('are you sure ?')"
                                            class="btn btn-danger btn-sm text-white"
                                            >hapus</Link
                                        >
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <Pagination :data="products" />
                       
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
import { router } from '@inertiajs/vue3'
import Pagination from "@/Components/Pagination.vue";

const props = defineProps({
    products: Object,
    filters : Object
});

let search = ref(props.filters.search);

watch(search, (value) => {
   router.get(
    "/products",
    {search: value},
    {
        preserveState : true
    }
   )
});
</script>
