<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-3">
                    <h5 class="card-header">{{ titulo }}</h5>
                    <div class="card-body">
                       
                       <div class="row">
                            <div class="col-md-12 d-flex justify-content-end">
                                <button type="button" class="btn btn-primary" @click="addUser()"><i class="fa-solid fa-user-plus"></i></button>
                            </div>
                       </div>

                        <div class="row">
                            <div class="col-md-12">
                                <DataTable
                                :data="data"
                                class="table table-hover table-striped"
                                width="100%"
                                >
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Rut</th>
                                        <th>Email</th>
                                        <th>Activo</th>
                                        <th>Bodega</th>
                                        <th>Especialidad</th>
                                        <th>Equipo</th>
                                        <th>Médico</th>
                                        <th>Pabellón</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Rut</th>
                                        <th>Email</th>
                                        <th>Activo</th>
                                        <th>Bodega</th>
                                        <th>Especialidad</th>
                                        <th>Equipo</th>
                                        <th>Médico</th>
                                        <th>Pabellón</th>
                                        <th>Opciones</th>
                                    </tr>
                                </tfoot>
                                </DataTable>
                            </div>
                          
                        </div>
                    </div>
                    <ModalAddUser @respuestaRecibida="respuesta"></ModalAddUser>
                </div>
            </div>
        </div>
        
    </div>
</template>
<script>
import { defineComponent } from 'vue';
import DataTable from 'datatables.net-vue3';
import DataTablesCore from 'datatables.net-bs5';
import ModalAddUser from './AddUserComponent.vue'
DataTable.use(DataTablesCore);
import Swal from 'sweetalert2';

export default defineComponent({
    props:['respuestaRecibida'],
    components: {
        DataTable,
        ModalAddUser
    },
    data() {
       return {
            titulo: 'Agregar Usuario',
            data : [[1,'Nelson Serrano','15500246-8',4,5,6,7,8,9,10,11],[1,2,3,4,5,6,7,8,9,10,11],[1,2,3,4,5,6,7,8,9,10,13]],
        }
    },
    methods: { 
        addUser(){
            console.log('desde el boton')
            $('#modalAddUser').modal('show');
        },
        respuesta(datosRespuesta){
            if(datosRespuesta=='Usuario guardado correctamente'){
                Swal.fire({
                    title: "Agregado!",
                    text: " Usuario agregado correctamente!",
                    icon: "success"
                });    
                $('#modalAddUser').modal('hide')         
            }
        }
        
    }, 
    computed:{

    },
    mounted() {
  
    }
})
</script>

<style scoped>
 
</style>