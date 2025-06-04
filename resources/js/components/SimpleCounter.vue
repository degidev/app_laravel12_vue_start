<template>
  <div class="p-4 border rounded-lg shadow-md">
    <h3 class="text-lg font-semibold mb-2">Contador Simple</h3>
    <p class="mb-2">Valor actual: {{ count }}</p>
    <button @click="increment" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 mr-2">
      Incrementar
    </button>
    <button @click="decrement" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
      Decrementar
    </button>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const count = ref(0);

const increment = () => {
  count.value++;
};

const decrement = () => {
  count.value--;
};
</script>

<style scoped>
/* Puedes añadir estilos específicos aquí si lo deseas */
</style>
