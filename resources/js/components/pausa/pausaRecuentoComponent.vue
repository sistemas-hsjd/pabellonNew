<template>
    <div>
        <form @submit.prevent="registrar">
        <div class="modal fade" id="modalPausaRecuento" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalDetalleLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
         
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modalDetalleLabel"><strong>{{ titulo }}</strong> </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="container-fluid">
                        <div class="row g-4">
                        <!-- Start column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-primary card-outline">
                                <div class="card-body">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="container">
                                                <InfoPaciente :paciente="paciente"></InfoPaciente>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- personal -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="container">
                                                <h5 class="card-subtitle mb-2 fw-bold text-secondary mt-2">Personal</h5>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="id_anestesiologo" class="form-label fw-bold text-primary">Anestesiologo <span class="campo_requerido">*</span></label>
                                                            <v-select v-model="id_anestesiologo" :reduce="anes => anes.pro_cod" :options="anestesiologos" label="nombre" id="id_anestesiologo" placeholder="Seleccione..."></v-select>
                                                            <div v-for="(item, index) in errores" :key="index">
                                                                <span class="error" v-if="item.campo=='id_anestesiologo'"> {{ item.mensaje }}</span>  
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="id_arsenalera" class="form-label fw-bold text-primary">Arsenalera <span class="campo_requerido">*</span></label>
                                                            <v-select v-model="id_arsenalera" :reduce="ars => ars.pro_cod" :options="arsenaleras" label="nombre" id="id_arsenalera" placeholder="Seleccione arsenalera.."></v-select>
                                                            <div v-for="(item, index) in errores" :key="index">
                                                                <span class="error" v-if="item.campo=='id_arsenalera'"> {{ item.mensaje }}</span>  
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="id_pabellonera" class="form-label fw-bold text-primary">Pabellonera <span class="campo_requerido">*</span></label>
                                                            <v-select v-model="id_pabellonera" :reduce="pab => pab.pro_cod" :options="pabelloneras" label="nombre" id="id_pabellonera" placeholder="Seleccione Pabellonera..."></v-select>
                                                            <div v-for="(item, index) in errores" :key="index">
                                                                <span class="error" v-if="item.campo=='id_pabellonera'"> {{ item.mensaje }}</span>  
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="id_enfermera" class="form-label fw-bold text-primary">Enfermera <span class="campo_requerido">*</span></label>
                                                            <v-select v-model="id_enfermera" :reduce="enf => enf.pro_cod" :options="enfermeras" label="nombre" id="id_enfermera" placeholder="Seleccione enfermera..."></v-select>
                                                            <div v-for="(item, index) in errores" :key="index">
                                                                <span class="error" v-if="item.campo=='id_enfermera'">{{ item.mensaje }}</span>  
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="id_cirujano" class="form-label fw-bold text-primary">Cirujano <span class="campo_requerido">*</span></label>
                                                            <v-select v-model="id_cirujano" :reduce="cirujano => cirujano.pro_cod" :options="cirujanos" label="nombre" id="id_cirujano" placeholder="Seleccione cirujano..."></v-select>
                                                            <div v-for="(item, index) in errores" :key="index">
                                                                <span class="error" v-if="item.campo=='id_cirujano'">{{ item.mensaje }}</span>  
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                      
                                                    </div>
                                                </div>


                                            </div>
                                     
                                        </div>
                                    </div>

                                    <!-- Recuentos de gasas y compresas -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="container">
                                                <h5 class="card-subtitle mb-2 fw-bold text-secondary mt-2">Recuentos de gasas y compresas</h5>
                                                <!-- head -->
                                                <div class="row">
                                                    <table class="table  table-striped table-hove ">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Hora</th>
                                                                <th scope="col">Tiempo QCO</th>
                                                                <th scope="col">Gasas mesa</th>
                                                                <th scope="col">Gasas afuera</th>
                                                                <th scope="col">Total gasas</th>
                                                                <th scope="col">Compresas mesa</th>
                                                                <th scope="col">Compresas afuera</th>
                                                                <th scope="col">Total Compresas</th>
                                                                <th scope="col">Pabellonera</th>
                                                                <th scope="col"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td width='8%'>
                                                                    <input type="time" class="form-control" id="tm_recuento_gc" v-model="tm_recuento_gc">
                                                                </td>
                                                                <td width='9%'>
                                                                    <input type="text" class="form-control" id="gl_recuento_qco" v-model="gl_recuento_qco">
                                                                </td>
                                                                <td width='9%'>
                                                                    <input type="number" class="form-control" id="nr_gasa_mesa" v-model="nr_gasa_mesa">
                                                                </td>
                                                                <td width='9%'>
                                                                    <input type="number" class="form-control" id="nr_gasa_afuera" v-model="nr_gasa_afuera">
                                                                </td>
                                                                <td width='9%'>
                                                                    <input type="number" class="form-control" id="nr_gasa_total" v-model="nr_gasa_total">
                                                                </td>
                                                                <td width='9%'>
                                                                    <input type="number" class="form-control" id="nr_compresa_mesa" v-model="nr_compresa_mesa">
                                                                </td>
                                                                <td width='9%'>
                                                                    <input type="number" class="form-control" id="nr_compresa_afuera" v-model="nr_compresa_afuera">
                                                                </td>
                                                                <td width='9%'>
                                                                    <input type="number" class="form-control" id="nr_compresa_total" v-model="nr_compresa_total">
                                                                </td>
                                                                <td width='30%'>
                                                                    <v-select v-model="id_pabellonera_gc" :reduce="pab => pab.pro_cod" :options="pabelloneras" label="nombre" id="id_pabellonera_gc" placeholder="Seleccione Pabellonera..."></v-select>
                                                                </td>
                                                                <td width='8%'>
                                                                    <a class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Add" data-bs-original-title="Add" @click="agregarRecuentoGasa()">
                                                                        <span class="btn-inner">
                                                                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M12.0001 8.32739V15.6537" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                <path d="M15.6668 11.9904H8.3335" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    
                                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.6857 2H7.31429C4.04762 2 2 4.31208 2 7.58516V16.4148C2 19.6879 4.0381 22 7.31429 22H16.6857C19.9619 22 22 19.6879 22 16.4148V7.58516C22 4.31208 19.9619 2 16.6857 2Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                
                                                                            </svg>                                                                   
                                                                        </span>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr v-for="(item, index) in gasasCompresas" :key="index">
                                                                <td width='8%' class="text-center">
                                                                    {{ item.tm_recuento }}
                                                                </td>
                                                                <td width='9%' class="text-center">
                                                                    {{ item.gl_recuento_qco }}
                                                                </td>
                                                                <td width='9%' class="text-center">
                                                                    {{ item.nr_gasa_mesa }}
                                                                </td>
                                                                <td width='9%' class="text-center">
                                                                    {{ item.nr_gasa_afuera }}
                                                                </td>
                                                                <td width='9%' class="text-center">
                                                                    {{ item.nr_gasa_total }}
                                                                </td>
                                                                <td width='9%' class="text-center">
                                                                   {{ item.nr_compresa_mesa }}
                                                                </td>
                                                                <td width='9%' class="text-center">
                                                                    {{ item.nr_compresa_afuera }}
                                                                </td>
                                                                <td width='9%' class="text-center">
                                                                   {{ item.nr_compresa_total }}
                                                                </td>
                                                                <td width='30%'>
                                                                   {{ item.pabellonera.nombre }}
                                                                </td>
                                                                <td width="8%">
                                                                    <a class="btn btn-sm btn-icon btn-danger ms-1" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Delete" data-bs-original-title="Delete" @click="eliminarRecuentoGasa(item.id)">
                                                                        <span class="btn-inner"><svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                                                            <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                                                                        </span>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                              
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Recuentos total de agujas -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="container">
                                                <h5 class="card-subtitle mb-2 fw-bold text-secondary mt-2">Recuentos total de agujas</h5>
                                                <!-- head -->
                                                <div class="row">
                                                    <table class="table  table-striped table-hove ">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">N° Sutura <span class="campo_requerido">*</span></th>
                                                                <th scope="col">N° Agujas <span class="campo_requerido">*</span></th>
                                                                <th scope="col">Total Agujas <span class="campo_requerido">*</span></th>
                                                                <th scope="col">Pabellonera <span class="campo_requerido">*</span></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td width='10%'>
                                                                    <input type="number" class="form-control" id="nr_recuento_sutura" v-model="nr_recuento_sutura">
                                                                    <div v-for="(item, index) in errores" :key="index">
                                                                        <span class="error" v-if="item.campo=='nr_recuento_sutura'"> {{ item.mensaje }}</span>  
                                                                    </div>
                                                                </td>
                                                                <td width='10%'>
                                                                    <input type="number" class="form-control" id="nr_recuento_aguja" v-model="nr_recuento_aguja">
                                                                    <div v-for="(item, index) in errores" :key="index">
                                                                        <span class="error" v-if="item.campo=='nr_recuento_aguja'"> {{ item.mensaje }}</span>  
                                                                    </div>
                                                                </td>
                                                                <td width='10%'>
                                                                    <input type="number" class="form-control" id="nr_recuento_aguja_total" v-model="nr_recuento_aguja_total">
                                                                    <div v-for="(item, index) in errores" :key="index">
                                                                        <span class="error" v-if="item.campo=='nr_recuento_aguja_total'"> {{ item.mensaje }}</span>  
                                                                    </div>
                                                                </td>
                                                                <td width='30%'>
                                                                    <v-select v-model="id_pabellonera_aguja" :reduce="pab => pab.pro_cod" :options="pabelloneras" label="nombre" id="id_pabellonera_aguja" placeholder="Seleccione Pabellonera..."></v-select>
                                                                    <div v-for="(item, index) in errores" :key="index">
                                                                        <span class="error" v-if="item.campo=='id_pabellonera_aguja'"> {{ item.mensaje }}</span>  
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                              
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Recuentos de instrumental -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="container">
                                                <h5 class="card-subtitle mb-2 fw-bold text-secondary mt-2">Recuentos de instrumental</h5>
                                                <!-- head -->
                                                <div class="row">
                                                    <table class="table  table-striped table-hove ">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Hora</th>
                                                                <th scope="col">N° caja</th>
                                                                <th scope="col">Nombre caja</th>
                                                                <th scope="col">Instrumental inicio</th>
                                                                <th scope="col">Intrumental termino</th>
                                                                <th scope="col">Pabellonera</th>
                                                                <th scope="col"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td width='8%'>
                                                                    <input type="time" class="form-control" id="tm_recuento_in" v-model="tm_recuento_in">
                                                                </td>
                                                                <td width='9%'>
                                                                    <input type="text" class="form-control" id="nr_recuento_caja" v-model="nr_recuento_caja">
                                                                </td>
                                                                <td width='17%'>
                                                                    <input type="text" class="form-control" id="gl_recuento_caja" v-model="gl_recuento_caja">
                                                                </td>
                                                                <td width='17%'>
                                                                    <input type="number" class="form-control" id="nr_recuento_inicio" v-model="nr_recuento_inicio" placeholder="piezas">
                                                                </td>
                                                                <td width='17%'>
                                                                    <input type="number" class="form-control" id="nr_recuento_termino" v-model="nr_recuento_termino" placeholder="piezas">
                                                                </td>
                                                                <td width='30%'>
                                                                    <v-select v-model="id_pabellonera_in" :reduce="pab => pab.pro_cod" :options="pabelloneras" label="nombre" id="id_pabellonera_in" placeholder="Seleccione Pabellonera..."></v-select>
                                                                </td>
                                                                <td width='6%'>
                                                                    <a class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Add" data-bs-original-title="Add" @click="agregarRecuentoInstrumental()">
                                                                        <span class="btn-inner">
                                                                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M12.0001 8.32739V15.6537" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                <path d="M15.6668 11.9904H8.3335" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    
                                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.6857 2H7.31429C4.04762 2 2 4.31208 2 7.58516V16.4148C2 19.6879 4.0381 22 7.31429 22H16.6857C19.9619 22 22 19.6879 22 16.4148V7.58516C22 4.31208 19.9619 2 16.6857 2Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                
                                                                            </svg>                                                                   
                                                                        </span>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr v-for="(item, index) in recuentosInstrumntales" :key="index">
                                                                <td width='8%' class="text-center">
                                                                    {{ item.tm_recuento  }}
                                                                </td>
                                                                <td width='9%' class="text-center">
                                                                    {{ item.nr_recuento_caja }}
                                                                </td>
                                                                <td width='9%' class="text-center">
                                                                    {{ item.gl_recuento_caja }}
                                                                </td>
                                                                <td width='9%' class="text-center">
                                                                    {{ item.nr_recuento_inicio }}
                                                                </td>
                                                                <td width='9%' class="text-center">
                                                                   {{ item.nr_recuento_termino }}
                                                                </td>
                                                                <td width='9%' class="text-center">
                                                                    <template v-if="item.pabellonera">
                                                                        <p>{{ item.pabellonera.nombre }}</p>
                                                                    </template>
                                                                </td>
                                                                <td width="8%">
                                                                    <a class="btn btn-sm btn-icon btn-danger ms-1" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Delete" data-bs-original-title="Delete" @click="eliminarRecuentoInstrumental(item.id)">
                                                                        <span class="btn-inner"><svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                                                            <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                                                                        </span>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                              
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Observaciones -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="container">
                                                <!-- <h5 class="card-subtitle mb-2 fw-bold text-secondary mt-2">Observaciones</h5> -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="gl_observacion" class="card-subtitle mb-2 fw-bold text-secondary mt-2">Observaciones</label>
                                                            <textarea v-model="gl_observacion" class="form-control" id="gl_observacion" rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                           
                                </div>                            
                            </div>
                            <!-- /.card -->
                        </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button  type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                </div>
                
            </div>
        </div>
        </form>
    </div>
</template>
<script>
import { defineComponent } from 'vue';
import InfoPaciente from '../paciente/InfoPacienteComponent.vue'
import Swal from 'sweetalert2';
// import '../../../assets/css/toastr.css'
import toastr from 'toastr';
import 'toastr/build/toastr.min.css';

export default defineComponent({
    props: {
        paciente: {
            type: Object,
            required: true
        },
    },
    components: {
        InfoPaciente
    },
    data() {
        return {
            id: '',
            titulo: 'Pausa Recuento',
            id_solicitud: '',
            id_asignacion: '',
            enfermeras: [],
            pabelloneras:[],
            cirujanos: [],
            arsenaleras:[],
            anestesiologos: [],
            solicitudPabellon: [],
            gasasCompresas: [],
            recuentosInstrumntales:[],
            tipoAccesosVasculares: [
                { text: 'VVP', value: 'VVP'},
                { text: 'CVC', value: 'CVC' },
                { text: 'Linea Arterial', value: 'Linea Arterial' }
            ],
            // personal
            id_anestesiologo:'',
            id_arsenalera:'',
            id_cirujano: '',
            id_enfermera:'',
            id_pabellonera:'',
            // 1 card
            nr_gasa_afuera:'',
            tm_recuento_gc : '',
            gl_recuento_qco: '',
            nr_gasa_mesa: '',
            nr_gasa_total: '',
            nr_compresa_mesa:'',
            nr_compresa_afuera:'',
            nr_compresa_total:'',
            id_pabellonera_gc:'',
            errores: [],
            // recuento agujas
            nr_recuento_aguja: '',
            nr_recuento_sutura:'',
            id_pabellonera_aguja:'',
            nr_recuento_aguja_total:'',
            // recuento instrumental
            tm_recuento_in:'',
            nr_recuento_caja:'',
            gl_recuento_caja:'',
            nr_recuento_inicio:'',
            id_pabellonera_in:'',
            nr_recuento_termino:'',

            gl_observacion: '',
        }
    },
    methods: { 
        registrar(){
            if(this.validateForm()){   
                var data = new FormData();          
                data.append('id_solicitud', this.id_solicitud) 
                data.append('id_asignacion', this.id_asignacion)
                data.append('bo_borrador', '0')
                data.append('id_arsenalera', this.id_arsenalera)
                data.append('id_anestesiologo', this.id_anestesiologo)
                data.append('id_pabellonera', this.id_pabellonera)
                data.append('id_enfermera', this.id_enfermera)
                data.append('id_cirujano', this.id_cirujano)
                data.append('nr_recuento_sutura', this.nr_recuento_sutura)
                data.append('nr_recuento_aguja', this.nr_recuento_aguja)
                data.append('nr_recuento_aguja_total', this.nr_recuento_aguja_total)
                data.append('id_pabellonera_aguja', this.id_pabellonera_aguja)
                data.append('gl_observacion', this.gl_observacion)
    
                axios.post('/pausaRecuento/registrar', data)
                .then(response => {
                    if(response.data=='ok'){
                        this.limpiar()
                        // $('#modalPausaRecuento').modal('hide')
                        // this.$toastr.success('¡Actualizada!', 'Pausa recuento actualizada correctamente');
                        toastr.success('Pausa recuento actualizada correctamente!');
                    }
                })
                .catch(error => {
                    console.error('Error: ', error);
                });
            }
        },
        validateForm() {
            this.errores = []; 
            if (this.id_anestesiologo == '' || this.id_anestesiologo == null) {
                this.errores.push({ campo: 'id_anestesiologo', mensaje: 'El campo anestesiologo es requerido.' });
            }
            if (this.id_arsenalera == '' || this.id_arsenalera == null) {
                this.errores.push({ campo: 'id_arsenalera', mensaje: 'El campo arsenalera es requerido.' });
            }
            if (this.id_cirujano == '' || this.id_cirujano == null) {
                this.errores.push({ campo: 'id_cirujano', mensaje: 'El campo cirujano es requerido.' });
            }
            if (this.id_enfermera == '' || this.id_enfermera == null) {
                this.errores.push({ campo: 'id_enfermera', mensaje: 'El campo enfermera es requerido.' });
            }
            if (this.id_pabellonera == '' || this.id_pabellonera == null) {
                this.errores.push({ campo: 'id_pabellonera', mensaje: 'El campo pabellonera es requerido.' });
            }
            if (this.nr_recuento_aguja == '') {
                this.errores.push({ campo: 'nr_recuento_aguja', mensaje: 'El campo es requerido.' });
            }
            if (this.nr_recuento_sutura == '') {
                this.errores.push({ campo: 'nr_recuento_sutura', mensaje: 'El campo es requerido.' });
            }
            if (this.nr_recuento_aguja_total == '') {
                this.errores.push({ campo: 'nr_recuento_aguja_total', mensaje: 'El campo es requerido.' });
            }
            if (this.id_pabellonera_aguja == '' || this.id_pabellonera_aguja == null) {
                this.errores.push({ campo: 'id_pabellonera_aguja', mensaje: 'El campo pabellonera es requerido.' });
            }
            return this.errores.length === 0;
        },
        getInfo(id, solicitud_id){
            this.id = id
            this.id_solicitud = solicitud_id
            var data = new FormData();
            data.append('id', id);
            data.append('solicitud_id', solicitud_id);
            axios.post('/pausaRecuento/get-info', data)
            .then(response => {
                const { anestesiologos, arsenaleras, cirujanos, enfermeras, pabelloneras, solicitudPabellon } = response.data  
                console.log( solicitudPabellon.pausa_recuento )
                this.enfermeras = enfermeras
                this.cirujanos = cirujanos
                this.arsenaleras = arsenaleras
                this.anestesiologos = anestesiologos

                this.id_anestesiologo = solicitudPabellon.pausa_recuento.id_anestesiologo
                this.id_arsenalera = solicitudPabellon.pausa_recuento.id_arsenalera
                this.id_asignacion = solicitudPabellon.pausa_recuento.id_asignacion
                this.id_cirujano = solicitudPabellon.pausa_recuento.id_cirujano
                this.id_enfermera = solicitudPabellon.pausa_recuento.id_enfermera
                this.id_pabellonera = solicitudPabellon.pausa_recuento.id_pabellonera
            
                this.id_solicitud = solicitud_id
                this.pabelloneras = pabelloneras
                this.id_asignacion = solicitudPabellon.asignacion.id
                this.getGasasCompresas(solicitud_id)
                this.getRecuentosInstrumentales(solicitud_id)
                // recuento de agujas
                this.id_pabellonera_aguja = solicitudPabellon.pausa_recuento.id_pabellonera_aguja
                this.nr_recuento_aguja = solicitudPabellon.pausa_recuento.nr_recuento_aguja
                this.nr_recuento_aguja_total = solicitudPabellon.pausa_recuento.nr_recuento_aguja_total
                this.nr_recuento_sutura = solicitudPabellon.pausa_recuento.nr_recuento_sutura

            })
            .catch(error => {   
                console.error('Error: ', error);
            });
        },
        agregarRecuentoGasa(){
            var data = new FormData();
            data.append('id_solicitud', this.id_solicitud);
            data.append('id_asignacion', this.id_asignacion);
            data.append('tm_recuento', this.tm_recuento_gc);
            data.append('gl_recuento_qco', this.gl_recuento_qco);
            data.append('nr_gasa_mesa',   this.nr_gasa_mesa );
            data.append('nr_gasa_afuera', this.nr_gasa_afuera);
            data.append('nr_gasa_total', this.nr_gasa_total);
            data.append('nr_compresa_mesa', this.nr_compresa_mesa);
            data.append('nr_compresa_afuera', this.nr_compresa_afuera);
            data.append('nr_compresa_total', this.nr_compresa_total);
            data.append('id_pabellonera', this.id_pabellonera_gc);

            axios.post('/pausaRecuento/registrar-recuento-gasa', data)
            .then(response => { 
                this.$toastr.success('Agregado!', 'Recuento de gasas agregado correctamente!');
                this.getGasasCompresas(this.id_solicitud)
                this.limpiarRecuentoGasas()
            })
            .catch(error => {   
                console.error('Error: ', error);
            });
        },
        limpiarRecuentoGasas(){
            this.tm_recuento_gc = ''
            this.gl_recuento_qco = ''
            this.nr_gasa_mesa = ''
            this.nr_gasa_afuera = ''
            this.nr_gasa_total = ''
            this.nr_compresa_mesa = ''
            this.nr_compresa_afuera = ''
            this.nr_compresa_total = ''
            this.id_pabellonera_gc = ''
        },
        getGasasCompresas(id_solicitud){
            this.id_solicitud = id_solicitud
            var data = new FormData();
            data.append('id_solicitud', id_solicitud);
            axios.post('/pausaRecuento/get-gasas-compresas', data)
            .then(response => { 
                this.gasasCompresas = response.data
            })
            .catch(error => {   
                console.error('Error: ', error);
            });
        },
        getRecuentosInstrumentales(id_solicitud){
            this.id_solicitud = id_solicitud
            var data = new FormData();
            data.append('id_solicitud', id_solicitud);
            axios.post('/pausaRecuento/get-recuentos-instrumentales', data)
            .then(response => { 
                console.log(response.data);
                this.recuentosInstrumntales = response.data
            })
            .catch(error => {   
                console.error('Error: ', error);
            });
        },
        agregarRecuentoInstrumental(){
            var data = new FormData();
            data.append('id_solicitud', this.id_solicitud)
            data.append('id_asignacion', this.id_asignacion)
            data.append('tm_recuento', this.tm_recuento_in)
            data.append('nr_recuento_caja', this.nr_recuento_caja)
            data.append('gl_recuento_caja', this.gl_recuento_caja)
            data.append('nr_recuento_inicio', this.nr_recuento_inicio)
            data.append('nr_recuento_termino', this.nr_recuento_termino) 
            data.append('id_pabellonera', this.id_pabellonera_in)
            axios.post('/pausaRecuento/registrar-instrumental', data)
            .then(response => { 
                console.log(response.data);
                this.$toastr.success('Correctamente!', 'Recuento Instrumental Agregado!');
                this.getRecuentosInstrumentales(this.id_solicitud)
                this.limpiarInstrumental()
            })
            .catch(error => {   
                console.error('Error: ', error);
            });
        },
        limpiarInstrumental(){      
            this.tm_recuento_in = ''
            this.nr_recuento_caja = ''
            this.gl_recuento_caja = ''
            this.nr_recuento_inicio = ''
            this.nr_recuento_termino = ''
            this.id_pabellonera_in = ''
        },
        eliminarRecuentoGasa(id){
            var data = new FormData();
            data.append('id', id);
            axios.post('/pausaRecuento/eliminar-recuento-gasa', data)
            .then(response => {
                if(response.data == 'ok'){
                    this.getGasasCompresas(this.id_solicitud)
                    this.$toastr.success('Eliminado!', 'Recuento de gasas eliminado correctamente!');
                }
            })
            .catch(error => {   
                console.error('Error: ', error);
            });
        },
        eliminarRecuentoInstrumental(id){
            var data = new FormData();
            data.append('id', id);
            axios.post('/pausaRecuento/eliminar-instrumental', data)
            .then(response => {
                if(response.data == 'ok'){
                    this.getRecuentosInstrumentales(this.id_solicitud)
                    this.$toastr.success('Eliminado!', 'Recuento instrumental eliminado correctamente!');
                }
            })
            .catch(error => {   
                console.error('Error: ', error);
            });
        },
        limpiar(){
            this.id_anestesiologo = ''
            this.id_pabellonera = ''
            this.id_enfermera = ''
            this.id_cirujano = ''
            this.nr_recuento_sutura = ''
            this.nr_recuento_aguja = ''
            this.nr_recuento_aguja_total = ''
            this.id_pabellonera_aguja = ''
            this.gl_observacion = ''
            this.id_arsenalera = ''
        }
    }, 
    computed:{
    },
    setup() {

    },
    mounted() {    
 
    }
})
</script>

<style scoped>
    .text-head{
        font-size: .92em;
        font-weight: bold;
    }
</style>