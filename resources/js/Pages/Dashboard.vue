<template>
    <app-layout>
        <template #header>
            <Breadcrumbs :items="breadcrumbs"/>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-4 px-4">
                    <h1 class="text-2xl font-bold">Welcome to your blog admin panel!</h1>
                    <p class="my-3 italic">Here you can manage your blog posts, categories, blog pages content, and
                        more.</p>

                    <ul class="w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">
                            Manage your profile
                        </li>
                        <li class="py-2 px-4 w-full border-b border-gray-200 dark:border-gray-600">
                            Manage your blog posts
                        </li>
                        <li class="py-2 px-4 w-full border-b border-gray-200 dark:border-gray-600">
                            Manage your blog categories
                        </li>
                        <li class="py-2 px-4 w-full border-b border-gray-200 dark:border-gray-600">
                            Manage your blog pages content
                        </li>
                        <li class="py-2 px-4 w-full rounded-b-lg border-b border-gray-200 dark:border-gray-600">
                            Manage your contact information
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Breadcrumbs from "@/Components/Breadcrumbs";

export default {
    components: {
        AppLayout,
        Breadcrumbs,
    },

    computed: {
        breadcrumbs() {
            return [
                {
                    label: "Dashboard",
                },
            ];
        },
    },
};
</script>
