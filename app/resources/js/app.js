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
import Apartments from "./pages/Apartments";
import PropertyDetails from "./pages/PropertyDetails";
import PropertyForm from "./pages/PropertyForm";


const app = createApp(App);

const routes = [
    {path: "/", component: Home},
    {path: "/about", component: About},
    {path: "/hotels", component: Hotels},
    {path: "/apartments", component: Apartments},
    {path: "/login", component: Login},
    {path: "/register", component: Register},
    {path: "/properties/:property", component: PropertyDetails},
    {path: "/properties/create", component: PropertyForm},
]

const router = createRouter({
    history: createWebHistory("/fil-rouge-youcode"),
    routes,
})

const dataScript = document.querySelector("#app_data");
if (dataScript) {
    app.config.globalProperties.$data = JSON.parse(dataScript.textContent);
}

app.config.globalProperties.$API_URL = "http://localhost/fil-rouge-youcode"


app.use(router)


app.mount("#app")
