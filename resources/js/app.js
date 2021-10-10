/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import { createApp } from 'vue'
import ExampleComponent from './components/ExampleComponent.vue'
import MatchTab from './components/MatchTab.vue'
import RealtimeMessage from './components/RealtimeMessage.vue'
import ImagePreview from './components/ImagePreview.vue'

import { error } from 'jquery';


createApp({
    components:{
        ExampleComponent,
        MatchTab,
        RealtimeMessage,
        ImagePreview
    }
}).mount('#app')

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('match-tab', require('./components/MatchTab.vue').default);
Vue.component('realtime-message', require('./components/RealtimeMessage.vue').default);
Vue.component('image-preview', require('./components/ImagePreview.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
 
});
const vueContent = new Vue({
    el: '#vue-content',
 
});




const displayEnd = vueContent.$refs.displayEnd;
displayEnd.scrollTop = displayEnd.scrollHeight;
