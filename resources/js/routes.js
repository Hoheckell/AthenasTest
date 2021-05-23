import Home from './components/Home.vue';
import Editpessoa from './components/Editpessoa.vue';
import Addpessoa from './components/Addpessoa.vue';
export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'editpessoa',
        path: '/editpessoa/:codigo',
        component: Editpessoa
    },
    {
        name: 'newpessoa',
        path: '/newpessoa',
        component: Addpessoa
    }
];
