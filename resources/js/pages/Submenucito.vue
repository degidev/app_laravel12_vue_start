<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Menu',
        href: '/menu',
    },
    {
        title: 'Sub menucito',
        href: '/menu/submenucito',
    },
];
</script>

<template>
    <Head title="Sub menucito" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="text-center text-2xl font-bold py-10">
                ¡Hola desde Sub menucito!
            </div>
        </div>
    </AppLayout>
</template>
