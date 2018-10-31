import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/pages/home/Home'
import Video from '@/pages/video/Video'
import Page from '@/pages/page/Page'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home
    },
    {
      path: '/video/:tagId?',
      name: 'Video',
      component: Video
    },
    {
      path: '/page/:lessonId',
      name: 'Page',
      component: Page
    }
  ]
})
