<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create User
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="container p-5">
                        <Link href="/products" class="btn btn-primary my-3"
                            >List User</Link
                        >
                        <form @submit.prevent="form.post('/products')">
                            <div class="mb-3">
                                <label for="name" class="form-label"
                                    >Name</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    name="name"
                                    id=""
                                    v-model="form.name"
                                />
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label"
                                    >price</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    name="price"
                                    id=""
                                    v-model="form.price"
                                />
                            </div>
                            <div class="mb-3">
                                <label for="stock" class="form-label"
                                    >stock</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    name="stock"
                                    id=""
                                    v-model="form.stock"
                                />
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label"
                                    >description</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    name="description"
                                    id=""
                                    v-model="form.description"
                                />
                            </div>
                            <button type="submit" class="btn btn-primary bg-blue-600">
                                Save
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const form = useForm({
    'name' : '',
    'price' : '',
    'stock' : '',
    'description' : '',
})
</script>
