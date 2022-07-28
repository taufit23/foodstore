import Home from '../components/Home.vue'

export default {
    mode: 'history',

    routes: [{
            path: '/',
            name: 'home',
            component: Home,
        }
    ]
}
