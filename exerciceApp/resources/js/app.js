require('./bootstrap');

import Alpine from 'alpinejs';

/*window.Alpine = Alpine;

Alpine.start();*/

// 1. Importation de vue.js
import Vue from "vue"
// 2. Enregistrement du composant "MonComponent.vue"
Vue.component(
    "mon-component",
    require("./components/MonComponent.vue").default
)
// 3. L'instance de l'application Vue
const app = new Vue({
    el : "#app"
});

// Le composent d'upload du fichier
Vue.component(
    "upload-file",
    require("./components/UploadFileComponent.vue").default
)
// 3. L'instance Vue
const upload = new Vue({
    el : "#upload"
});

