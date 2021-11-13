import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '../views/HomeView.vue';
import FactoriesView from '../views/FactoriesView.vue';
import StatsView from '../views/StatsView.vue';

const routes = [
  {
    path: '/',
    name: 'map',
    component: HomeView,
  },
  {
    path: '/factories',
    name: 'factories',
    component: FactoriesView,
  },
  {
    path: '/stats',
    name: 'stats',
    component: StatsView,
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
