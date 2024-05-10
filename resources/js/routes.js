import Dashboard from './components/DashboardComponent.vue';
import Paciente from './components/PacienteComponent.vue';
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
    } 
]