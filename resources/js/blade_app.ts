import { createApp } from 'vue';
import SimpleCounter from './components/SimpleCounter.vue'; // Asegúrate que la ruta sea correcta

// Montar el componente en un elemento con id="vue-simple-counter"
const app = createApp({});
app.component('simple-counter', SimpleCounter);

// Busca todos los elementos que tengan el atributo data-vue-component
document.querySelectorAll('[data-vue-component]').forEach(el => {
    const componentName = el.getAttribute('data-vue-component');
    if (componentName === 'simple-counter') { // Podrías hacerlo más genérico
        createApp(SimpleCounter).mount(el);
    }
    // Puedes añadir más 'else if' para otros componentes
});

// O si solo tienes un componente principal para montar en un ID específico:
// const simpleCounterElement = document.getElementById('vue-simple-counter');
// if (simpleCounterElement) {
//     createApp(SimpleCounter).mount(simpleCounterElement);
// }
