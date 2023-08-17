import './bootstrap';

import {createApp} from 'vue'
import App from './components/App.vue'
import router from './router.js';
import store from './store';


import 'bootstrap/dist/css/bootstrap.css'
import bootstrap from 'bootstrap/dist/js/bootstrap.js'


createApp(App)
.use(bootstrap)
.use(store)
.use(router)
.mount("#app")