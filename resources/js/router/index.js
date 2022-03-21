import { createRouter, createWebHistory } from 'vue-router'
import PostsIndex from '../components/posts/PostsIndex.vue'
import PostsCreate from '../components/posts/PostsCreate.vue'
import PostsEdit from '../components/posts/PostsEdit.vue'
import PostsShow from '../components/posts/PostsShow.vue'
import PostsNotFound from '../components/posts/PostsNotFound.vue'
import Login from '../components/auth/Login.vue'

const routes = [
  {
    path: '/dashboard',
    name: 'posts.index',
    component: PostsIndex
  },
  {
    path: '/posts/create',
    name: 'posts.create',
    component: PostsCreate
  },
  {
    path: '/posts/edit',
    name: 'posts.edit',
    component: PostsEdit,
    props: true
  },
  {
    path: '/posts/:id',
    name: 'posts.show',
    component: PostsShow,
    props: true
  },
  {
    path: '/posts/not-found',
    name: 'posts.notFound',
    component: PostsNotFound,
  },
  {
    path: '/auth/login',
    name: 'auth.login',
    component: Login,
  },
];

export default createRouter({
  history: createWebHistory(),
  routes
});
