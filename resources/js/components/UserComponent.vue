<template>
    <div class="container-fluid">
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
                                <div class="table-responsive">
                                    <table id="tabla-usuarios" class="display table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Run</th>
                                            <th>Email</th>
                                            <th>Activo</th>
                                            <th>Perfil</th>
                                            <th>Bodega</th>
                                            <th>Especialidad</th>
                                            <th>Equipo Médico</th>
                                            <th>Pabellón</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    
                                </table>
                                </div>
                               
                            </div>
                          
                        </div>
                    </div>
                    <ModalAddUser @respuestaRecibida="respuesta" ref="modalAddUser"></ModalAddUser>
                </div>
            </div>
        </div>
        
    </div>
</template>
<script>
import { defineComponent } from 'vue';
import DataTable from 'datatables.net-vue3';
// import DataTable from 'datatables.net-dt';
import DataTablesCore from 'datatables.net-bs5';
import ModalAddUser from './AddUserComponent.vue'
import 'datatables.net-bs5/css/dataTables.bootstrap5.min.css'
// import 'datatables.net-dt/css/jquery.dataTables.min.css'
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
            titulo: 'Listados de usuarios',
            users:[]
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
                $('#tabla-usuarios').DataTable().destroy();

                this.tabla()     
            }
        },
        getUsers(){
            // axios.post('/get-users')
            // .then(response => { 
            //     console.log(response.data)
            //     this.users = response.data
            // })
            // .catch(error => {
            //     console.error('Error: ', error);
            // });
        },
        abrirModal( datos, accion ){
            if(accion=='update'){
                $('#modalAddUser').modal('show');
                 this.$refs.modalAddUser.setValues(datos);
            }
        },
        eliminarUsuario(datos){
            Swal.fire({
                title: "Está seguro de eliminar el usuario?",
                text: "esto no se puede revertir después!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, eliminar!",
                cancelButtonText: "Cancelar!"
            }).then((result) => {
                if (result.isConfirmed) {
                    var data = new FormData();
                    data.append('id', datos.id);
                    axios.post('/user/eliminar', data)
                    .then(response => { 
                        console.log(response.data)
                        if(response.data=='ok'){
                            Swal.fire({
                                title: "Eliminado!",
                                text: "El usuario ha sido eliminado correctamente.",
                                icon: "success"
                            });
                            $('#tabla-usuarios').DataTable().destroy();
                            this.tabla()    
                        }else{
                            Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: "Intente eliminar nuevamente!",
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error: ', error);
                    });
                   
                }
            });
        },
        resetPassword(datos){
            Swal.fire({
                title: "Desea resetear password?",
                text: "Se reiniciará la contraseña del usuario!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, resetear!",
                cancelButtonText: "Cancelar!"
            }).then((result) => {
                if (result.isConfirmed) {
                    var data = new FormData();
                    data.append('id', datos.id);
                    axios.post('/user/reset-password', data)
                    .then(response => { 
                        console.log(response.data)
                        // if(response.data=='ok'){
                        //     Swal.fire({
                        //         title: "Usuario !",
                        //         text: "El usuario ha sido eliminado correctamente.",
                        //         icon: "success"
                        //     });
                        // }else{
                        //     Swal.fire({
                        //         icon: "error",
                        //         title: "Oops...",
                        //         text: "Intente eliminar nuevamente!",
                        //     });
                        // }
                    })
                    .catch(error => {
                        console.error('Error: ', error);
                    });
                   
                }
            });
        },
        tabla(){
            const lenguaje = {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros por página",
                "sZeroRecords": "No se encontraron resultados",
                "sInfo": "Mostrando desde _START_ hasta _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 hasta 0 de 0 registros",
                "sInfoFiltered": "(filtrado de _MAX_ registros en total)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sPrevious": "Anterior",
                    "sNext": "Siguiente",
                    "sLast": "Último"
                },
                "sEmptyTable": "No hay registros disponibles",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                }
            }
         setTimeout(() => {
            $('#tabla-usuarios').DataTable({
                language: lenguaje
            });
            $.ajax({
               url: "/api/get-users",
               type: "get",
               dataType: "json",
               success: function(data) {
                  $('#tabla-usuarios').DataTable({
                     "order": [[0, "desc"]],
                     "processing": true,
                     "destroy": true,
                     "data": data,
                     "responsive": true,
                     language: lenguaje,
                     "columns": [
                           {
                              "data": "id",
                              "render": function(data, type, row, meta) {
                                 return `${row.id}`;
                              }
                           },
                           {
                              "data": "nombre",
                              "render": function(data, type, row, meta) {
                                 return `${row.gl_nombre}`;
                              }
                           },
                           {
                              "data": "run",
                              "render": function(data, type, row, meta) {
                                return row.gl_rut;
                              }
                           },
                           {
                              "data": "email",
                              "render": function(data, type, row, meta) {
                                 return row.gl_mail  ? `${row.gl_mail}` : '';
                              }
                           },
                           {
                              "data": "activo",
                              "render": function(data, type, row, meta) {
                                if( row.bo_suspendido == 1 ) {
                                    return 'NO'
                                }else{
                                    return 'Sí'
                                } 
                              }
                           },
                           {
                              "data": "perfil",
                              "render": function(data, type, row, meta) {
                                 return `${row.perfiles.map(perfil => perfil.gl_nombre).join(', ')}`;
                              }
                           },
                           {
                              "data": "bodegas",
                              "sortable": false,
                              "render": function(data, type, row, meta) {
                                return `${row.bodegas.map(bodega => bodega.gl_nombre).join(', ')}`;
                              }
                           },
                           {
                              "data": "especialidades",
                              "sortable": false,
                              "render": function(data, type, row, meta) {
                                return `${row.especialidades.map(especialidad => especialidad.gl_nombre).join(', ')}`;
                              }
                           },
                           {
                              "data": "equipoMedico",
                              "sortable": false,
                              "render": function(data, type, row, meta) {
                                return `${row.equipos_medicos.map(equipo => equipo.gl_descripcion).join(', ')}`;
                              }
                           },
                           {
                              "data": "pabellones",
                              "sortable": false,
                              "render": function(data, type, row, meta) {
                                return `${row.pabellones.map(equipo => equipo.gl_nombre).join(', ')}`;
                              }
                           },
                       
                           {
                              "data": "id",
                              "sortable": false,
                              "render": function(data, type, row, meta) {
                                 return `
                                 <div data-v-01ab55f4="" class="dropdown">
                                    <span data-v-01ab55f4="" id="dropdownMenuButton06" role="button" data-bs-toggle="dropdown" aria-expanded="false" class="align-items-center d-flex">
                                        <!-- Three dots icon for kebab menu -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                            <path d="M9 4a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm0 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm0 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                        </svg>                          
                                    </span> 
                                    <div data-v-01ab55f4="" aria-labelledby="dropdownMenuButton06" class="dropdown-menu dropdown-menu-end" style="">

                                       <a data-v-01ab55f4="" href="#" class="dropdown-item editarUsuario">
                                          <svg data-v-01ab55f4="" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-2 icon-20">
                                            <path data-v-01ab55f4="" d="M13.7476 20.4428H21.0002" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                             <path data-v-01ab55f4="" fill-rule="evenodd" clip-rule="evenodd" d="M12.78 3.79479C13.5557 2.86779 14.95 2.73186 15.8962 3.49173C15.9485 3.53296 17.6295 4.83879 17.6295 4.83879C18.669 5.46719 18.992 6.80311 18.3494 7.82259C18.3153 7.87718 8.81195 19.7645 8.81195 19.7645C8.49578 20.1589 8.01583 20.3918 7.50291 20.3973L3.86353 20.443L3.04353 16.9723C2.92866 16.4843 3.04353 15.9718 3.3597 15.5773L12.78 3.79479Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> 
                                             <path data-v-01ab55f4="" d="M11.021 6.00098L16.4732 10.1881" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                          </svg>
                                          Editar Usuario
                                       </a> 

                                       <a data-v-01ab55f4="" href="#" class="dropdown-item resetPassword">
                                            <svg data-v-01ab55f4="" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-2 icon-20">
                                                <path d="M16.4232 9.4478V7.3008C16.4232 4.7878 14.3852 2.7498 11.8722 2.7498C9.35925 2.7388 7.31325 4.7668 7.30225 7.2808V7.3008V9.4478" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.683 21.2497H8.042C5.948 21.2497 4.25 19.5527 4.25 17.4577V13.1687C4.25 11.0737 5.948 9.37671 8.042 9.37671H15.683C17.777 9.37671 19.475 11.0737 19.475 13.1687V17.4577C19.475 19.5527 17.777 21.2497 15.683 21.2497Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M11.8628 14.2026V16.4236" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>  
                                            Reiniciar Contraseña
                                        </a>

                                       <a data-v-01ab55f4="" href="#" class="dropdown-item eliminarUsuario">
                                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-2 icon-20">
                                                <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                            Eliminar
                                       </a> 
                                 </div>
                                 
                                 </div>
                                 `
                                 }
                              },
                     ]
                  });
            }
            });
         }, 0)
   },

    }, 
    computed:{

    },
    mounted() {
        const vm = this;
        this.tabla()
        this.getUsers()
        $(document).on("click", ".editarUsuario", function(){
            var datos = [];
            var tabla = $('#tabla-usuarios').DataTable();
            datos = tabla.row($(this).parents("tr")).data();
            vm.abrirModal(datos, 'update')
        });
        $(document).on("click", ".eliminarUsuario", function(){
            var datos = [];
            var tabla = $('#tabla-usuarios').DataTable();
            datos = tabla.row($(this).parents("tr")).data();
            vm.eliminarUsuario(datos)
        });
        $(document).on("click", ".resetPassword", function(){
            var datos = [];
            var tabla = $('#tabla-usuarios').DataTable();
            datos = tabla.row($(this).parents("tr")).data();
            vm.resetPassword(datos)
        });
        
    }
})
</script>

<style scoped>
    table.dataTable {
      font-size: .8em;
      color: rgb(32, 31, 31);
    }
    table.dataTable thead th{
      font-size: 1em;
      font-weight:bold;
      color: rgb(32, 31, 31);
    }
</style>