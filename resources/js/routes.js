import Dashboard from './components/DashboardComponent.vue';
import Paciente from './components/PacienteComponent.vue';
import User from './components/UserComponent.vue';
import AddUser from './components/AddUserComponent.vue';

export default [
    {
        path: '/', 
        name: 'admin.dashboard',
        component: Dashboard,
    }, 
    {
        path: '/buscar-ficha', 
        name: 'admin.buscarPaciente',
        component: Paciente,
    }, 
    {
        path: '/lista-de-usuarios', 
        name: 'admin.listaUser',
        component: User,
    },
    {
        path: '/crear-usuario', 
        name: 'admin.crearUser',
        component: AddUser,
    } 
]