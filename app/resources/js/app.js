import {createApp} from "vue";
import {createRouter, createWebHistory} from "vue-router"
import './index.css'
import "../sass/styles.scss"

import App from "./components/App";
import Home from "./pages/Home";
import About from "./pages/About";
import Hotels from "./pages/Hotels";
import Login from "./pages/Login";
import Register from "./pages/Register";


const app = createApp(App);

const routes = [
    {path: "/", component: Home},
    {path: "/about", component: About},
    {path: "/hotels", component: Hotels},
    {path: "/login", component: Login},
    {path: "/register", component: Register},
]

const router = createRouter({
    history: createWebHistory("/fil-rouge-youcode"),
    routes,
})


app.use(router)


app.mount("#app")
