<script setup lang="ts">
import { SidebarGroup, SidebarGroupLabel, SidebarMenu, SidebarMenuButton, SidebarMenuItem, SidebarMenuSub, SidebarMenuSubButton, SidebarMenuSubItem } from '@/components/ui/sidebar';
import { type NavItem, type SharedData } from '@/types';
import { Link, usePage } from '@inertiajs/vue3';
import { ref, onMounted, watch } from 'vue';

const props = defineProps<{
    items: NavItem[];
}>();

const page = usePage<SharedData>();

// Mantener un registro de qué menús están expandidos
const expandedMenus = ref<Record<string, boolean>>({}); 

// Verificar si un ítem está activo
function isActive(href?: string): boolean {
    return href === page.url;
}

// Verificar si un menú tiene algún hijo activo
function hasActiveChild(item: NavItem): boolean {
    if (!item.children) return false;
    
    return item.children.some(child => {
        // Verificar si este hijo coincide con la URL actual
        if (child.href === page.url) return true;
        
        // Verificar recursivamente si algún nieto está activo (si hay nietos)
        if (child.children) {
            return hasActiveChild(child);
        }
        
        return false;
    });
}

// Función para alternar la expansión de un menú
function toggleMenu(title: string) {
    expandedMenus.value[title] = !expandedMenus.value[title];
}

// Inicializar menús expandidos basados en la URL actual
function initializeExpandedMenus() {
    props.items.forEach(item => {
        if (item.children && item.children.length > 0) {
            // Expandir automáticamente si el ítem o alguno de sus hijos está activo
            if (isActive(item.href) || hasActiveChild(item)) {
                expandedMenus.value[item.title] = true;
            }
        }
    });
}

// Observar cambios en la URL para actualizar menús expandidos
watch(() => page.url, () => {
    initializeExpandedMenus();
});

// Inicializar al montar el componente
onMounted(() => {
    initializeExpandedMenus();
});
</script>

<template>
    <SidebarGroup class="px-2 py-0">
        <SidebarGroupLabel>Platform</SidebarGroupLabel>
        <SidebarMenu>
            <template v-for="item in items" :key="item.title">
                <SidebarMenuItem>
                    <!-- Ítem con submenús -->
                    <template v-if="item.children && item.children.length > 0">
                        <!-- Botón del menú principal con flecha (solo para expandir/colapsar) -->
                        <SidebarMenuButton 
                            @click="toggleMenu(item.title)"
                            :tooltip="item.title"
                            class="pl-1.5"
                        >
                            <div class="flex items-center justify-between w-full ">
                                <div class="flex items-center justify-center gap-2 ">
                                    <component :is="item.icon" class="size-[18px]" />
                                    <span>{{ item.title }}</span>
                                </div>
                                <i :class="[
                                    'bi', 
                                    expandedMenus[item.title] ? 'bi-chevron-down' : 'bi-chevron-right',
                                    'text-xs'
                                ]"></i>
                            </div>
                        </SidebarMenuButton>
                        
                        <!-- Submenús (hijos) usando componentes específicos de submenú -->
                        <SidebarMenuSub v-if="expandedMenus[item.title]">
                            <SidebarMenuSubItem v-for="child in item.children" :key="child.title">
                                <SidebarMenuSubButton as-child :is-active="isActive(child.href)" :tooltip="child.title">
                                    <Link :href="child.href">
                                        <component v-if="child.icon" :is="child.icon" />
                                        <i v-else class="bi bi-dot"></i>
                                        <span>{{ child.title }}</span>
                                    </Link>
                                </SidebarMenuSubButton>
                            </SidebarMenuSubItem>
                        </SidebarMenuSub>
                    </template>
                    
                    <!-- Ítem simple (sin submenús) -->
                    <template v-else>
                        <SidebarMenuButton 
                            as-child 
                            :is-active="isActive(item.href)"
                            :tooltip="item.title"
                        >
                            <Link :href="item.href">
                                <component :is="item.icon" />
                                <span>{{ item.title }}</span>
                            </Link>
                        </SidebarMenuButton>
                    </template>
                </SidebarMenuItem>
            </template>
        </SidebarMenu>
    </SidebarGroup>
</template>
