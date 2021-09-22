import Vue from 'vue'
import VueRouter from 'vue-router'

import Home from '../views/Home.vue'
import Shop from '../views/Shop.vue'
import Detail from '../views/Detail.vue'
import Register from '../views/Register.vue'
import Thanks from '../views/Thanks.vue'
import Login from '../views/Login.vue'
import Mypage from '../views/Mypage.vue'

import store from "../store/index";

Vue.use(VueRouter)

const routes = [{
  path: '/',
  name: 'Home',
  component: Home
},
{
  path: '/shop',
  name: 'shop',
  component: Shop
},
{
  path: "/detail/:shop_id",
  name: "detail",
  component: Detail,
  props: true,
},
{
  path: '/register',
  name: 'register',
  component: Register
},
{
  path: '/thanks',
  name: 'thanks',
  component: Thanks
},
{
  path: '/login',
  name: 'login',
  component: Login
},
{
  path: '/mypage',
  name: 'mypage',
  component: Mypage,
  meta: {
    requiresAuth: true,
  },
}]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
});

router.beforeEach((to, from, next) => {
  if (
    to.matched.some((record) => record.meta.requiresAuth) &&
    !store.state.auth
  ) {
    next({
      path: "/",
      query: {
        redirect: to.fullPath,
      },
    });
  } else {
    next();
  }
});

export default router