import Vue from 'vue'
import Router from 'vue-router'
import Index from './components/pages/Index.vue'
import NextPage from './components/pages/NextPage.vue'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'index',
      component: Index
    },
    {
      path: '/next',
      name: 'next',
      component: NextPage
    }
  ]
})