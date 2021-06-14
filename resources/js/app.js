window.axios = require('axios');
window.Vue = require('vue').default;
import TasksComponent from './components/TasksComponent.vue';

Vue.component('tasks-component', TasksComponent);

 const app = new Vue({
    el: "#app",
});
