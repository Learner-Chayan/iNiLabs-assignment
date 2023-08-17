import { createRouter, createWebHashHistory } from 'vue-router';
import Test from './components/Test.vue'; 
import List from './components/todo/List.vue';

const routes = [
  {
    path: '/',
    component: List,
  },
  {
    path:'/list',
    component:List
  }
  // Other routes...
];

const router = createRouter({
  history: createWebHashHistory(),
  routes,
});

export default router;