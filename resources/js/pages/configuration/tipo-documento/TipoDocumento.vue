<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Tipo de documento',
        href: '/configuration/tipo-documento',
    },
];
</script>

<template>
    <Head title="Tipo de documento" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="text-center text-2xl font-bold py-10">
                Tipo de documento
            </div>
        </div>
    </AppLayout>
</template>