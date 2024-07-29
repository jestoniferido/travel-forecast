import { createRouter, createWebHistory } from 'vue-router'
import { ongoingRequests } from '@/services/axios-instance'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import('../views/HomeView.vue')
    },
    {
      path: '/place',
      name: 'place',
      component: () => import('../views/PlaceList.vue')
    },
    {
      path: '/place/:location/:id',
      name: 'place-detail',
      component: () => import('../views/PlaceDetail.vue')
    },
    {
      path: '/related-place/:location/:id/:related',
      name: 'related-place-detail',
      component: () => import('../views/RelatedPlaceDetail.vue')
    }
  ]
})

router.beforeEach((to, from, next) => {
  ongoingRequests.forEach((req) => req.cancel('Request canceled!'))

  next()
})

export default router
