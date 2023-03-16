import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import http from './axios'

const app = createApp(App).use(store).use(router)

app.config.globalProperties.$axios = http

app.mount('#app')
