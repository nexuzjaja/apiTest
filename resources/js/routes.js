import TodosPost from './components/TodosPosts.vue';
import AgregaPost from './components/AgregaPost.vue';
import EditaPost from './components/EditaPost.vue';
 
export const routes = [
    {
        name: 'home',
        path: '/',
        component: TodosPost
    },
    {
        name: 'add',
        path: '/add',
        component: AgregaPost
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditaPost
    }
];