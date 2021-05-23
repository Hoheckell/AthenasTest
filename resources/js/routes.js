import Home from './components/Home.vue';
import Editpessoa from './components/Pessoa/Editpessoa.vue';
import Addpessoa from './components/Pessoa/Addpessoa.vue';
import ListPessoa from './components/Pessoa/ListPessoa.vue';
import AddCategoria from "./components/Categoria/AddCategoria";
import ListCategoria from "./components/Categoria/ListCategoria";
import EditCategoria from "./components/Categoria/EditCategoria";
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
    },,
    {
        name: 'pessoas',
        path: '/pessoas',
        component: ListPessoa
    },
    {
        name: 'newpessoa',
        path: '/newpessoa',
        component: Addpessoa
    },
    {
        name: 'categorias',
        path: '/categorias',
        component: ListCategoria
    },
    {
        name: 'newcategoria',
        path: '/newcategoria',
        component: AddCategoria
    },
    {
        name: 'editcategoria',
        path: '/editcategoria/:codigo',
        component: EditCategoria
    }

];
