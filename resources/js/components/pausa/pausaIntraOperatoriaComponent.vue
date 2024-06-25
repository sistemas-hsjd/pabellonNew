<template>
    <div>
        <form @submit.prevent="registrar">
        <div class="modal fade" id="modalPausaIntraOperatoria" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalDetalleLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
         
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modalDetalleLabel"><strong>{{ titulo }}</strong> </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" @click="limpiar()"></button>
                    </div>

                    <div class="modal-body">
                        <div class="container-fluid">
                        <div class="row g-4">
                        <!-- Start column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                
                                </div>
                        
                                <div class="card-body">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="container">
                                                <InfoPaciente :paciente="paciente"></InfoPaciente>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <div class="container">
                                                <h5 class="card-subtitle mb-2 fw-bold text-secondary">CUP</h5>
                                                <!-- Folley -->
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="gl_folley" class="form-label fw-bold text-primary">S.Folley N°</label>
                                                            <input type="text" class="form-control" id="gl_folley" v-model="gl_folley">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="gl_folley_balon" class="form-label fw-bold text-primary">Balon con</label>
                                                            <input type="text" class="form-control" id="gl_folley_balon" v-model="gl_folley_balon" placeholder="CC">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="id_folley_instalada" class="form-label fw-bold text-primary">Instalada por</label>
                                                            <v-select v-model="id_folley_instalada" :reduce="enf => enf.id" :options="enfermeras" label="nombre" id="id_folley_instalada" placeholder="Seleccione enfermera..."></v-select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Accesos Vasculares -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12 d-flex justify-content-between align-items-center mb-3">
                                                        <h5 class="card-subtitle mb-2 fw-bold text-secondary mt-2">Acceso Vasculares</h5>
                                                        <button v-if="!btnEliminarAccVasc" type="button" class="btn btn-sm btn-primary rounded-pill mt-1" @click="generar_tabla_accesos_vasculares(1, 0)">Agregar Acceso vascular</button>   
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="mb-3">
                                                            <label for="gl_tipo_acceso" class="form-label fw-bold text-primary">Tipo acceso vascular</label>
                                                            <v-select v-model="gl_tipo_acceso" :reduce="caida => caida.value" :options="tipoAccesosVasculares" label="text" id="gl_tipo_acceso" placeholder="Seleccione tipo acceso vascular"></v-select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="mb-3">
                                                            <label for="gl_sitio_puncion" class="form-label fw-bold text-primary">Sitio punción</label>
                                                            <input type="text" class="form-control" id="gl_sitio_puncion" v-model="gl_sitio_puncion">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <div class="mb-3">
                                                            <label for="gl_calibre" class="form-label fw-bold text-primary">Calibre</label>
                                                            <input type="text" class="form-control" id="gl_calibre" v-model="gl_calibre">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 ">
                                                        <div class="mb-3">
                                                            <label for="id_responsable" class="form-label fw-bold text-primary">Responsable</label>
                                                            <v-select v-model="id_responsable" :reduce="prof => prof.pro_cod" :options="profesionales" label="nombre" id="id_responsable" placeholder="Seleccione..."></v-select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-1">  
                                                        <div class="mt-4 btn-delete" v-if="btnEliminarAccVasc">
                                                            <a class="btn btn-sm btn-icon btn-danger ms-1" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Delete" data-bs-original-title="Delete" @click="eliminarAccesoVasc(id_acceso_vascular)">
                                                                <span class="btn-inner"><svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                                                    <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Drenajes -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12 d-flex justify-content-between align-items-center mb-3">
                                                        <h5 class="card-subtitle mb-2 fw-bold text-secondary mt-2">Tipo Drenaje</h5>
                                                        <button v-if="!btnEliminarDrenaje" type="button" class="btn btn-sm btn-primary rounded-pill mt-1" @click="generar_tabla_drenajes(1,0)">Agregar drenaje</button>   
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="mb-3">
                                                            <label for="gl_tipo_drenaje" class="form-label fw-bold text-primary">Tipo Drenaje</label>
                                                            <input type="text" class="form-control" id="gl_tipo_drenaje" v-model="gl_tipo_drenaje">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="mb-3">
                                                            <label for="nr_cantidad" class="form-label fw-bold text-primary">N° drenaje</label>
                                                            <input type="number" class="form-control" id="nr_cantidad" v-model="nr_cantidad">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-3 ">
                                                        <div class="mb-3">
                                                            <label for="gl_contenido" class="form-label fw-bold text-primary">Contenido drenaje</label>
                                                            <input type="text" class="form-control" id="gl_contenido" v-model="gl_contenido">
                                                        </div>
        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="id_responsable_drenaje" class="form-label fw-bold text-primary">Responsable</label>
                                                            <v-select v-model="id_responsable_drenaje" :reduce="prof => prof.pro_cod" :options="profesionales" label="nombre" id="id_responsable_drenaje" placeholder="Seleccione..."></v-select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-1">
                                                        <div v-if="btnEliminarDrenaje" class="mt-4 btn-delete">
                                                            <a class="btn btn-sm btn-icon btn-danger ms-1" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Delete" data-bs-original-title="Delete" @click="eliminarDrenaje()">
                                                                <span class="btn-inner"><svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor"><path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ASEO -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <h5 class="card-subtitle mb-2 fw-bold text-secondary mt-2">Aseo Pre Operatorio</h5>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <div class="card d-flex justify-content-center align-items-center">
                                                                <div class="card-body">
                                                                    <div>
                                                                        <div>
                                                                            <label class="form-label fw-bold text-primary">Realizado<span class="campo_requerido">*</span></label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" v-model="bo_aseo_realizado" type="radio" id="bo_aseo_realizado_1" name="bo_aseo_realizado" value="1" @click="aseo(1)">
                                                                            <label class="form-check-label fw-bold text-secondary" for="bo_aseo_realizado_1">Sí</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" v-model="bo_aseo_realizado" type="radio" id="bo_aseo_realizado_2" name="bo_aseo_realizado" value="0" @click="aseo(0)">
                                                                            <label class="form-check-label fw-bold text-secondary" for="bo_aseo_realizado_2">No</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <!-- gl_antiseptico -->
                                                        <div class="mb-3">
                                                            <label for="gl_antiseptico" class="form-label fw-bold text-primary">Antiséptico</label>
                                                            <v-select v-model="gl_antiseptico" :reduce="caida => caida.value" :options="tipoAntisepticos" label="text" id="gl_antiseptico" placeholder="Seleccione..." :disabled="isDisabled"></v-select>
                                                            <div  v-for="(item, index) in errores" :key="index">
                                                                <span class="error" v-if="item.campo=='gl_antiseptico'"> {{ item.mensaje }}</span>  
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="id_responsable_aseo" class="form-label fw-bold text-primary">Instalada por</label>
                                                            <v-select v-model="id_responsable_aseo" :reduce="enf => enf.pro_cod" :options="enfermeras" label="nombre" id="id_responsable_aseo" placeholder="Seleccione Responsable aseo..." :disabled="isDisabled" ></v-select>
                                                            <div v-for="(item, index) in errores" :key="index">
                                                                <span class="error" v-if="item.campo=='id_responsable_aseo'"> {{ item.mensaje }}</span>  
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Uso Pabellón fechas -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <h5 class="card-subtitle mb-2 fw-bold text-secondary mt-2">Uso Pabellón</h5>
                                                    </div>
                                                </div>
                                                <!-- 1 -->
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="fc_entrada_servicio" class="form-label fw-bold text-primary">Entrada Servicio<span class="campo_requerido">*</span></label>
                                                            <input type="datetime-local" class="form-control" v-model="fc_entrada_servicio"  id="fc_entrada_servicio" name="fc_entrada_servicio" @input="verificarFechas">
                                                            <div  v-for="(item, index) in errores" :key="index">
                                                                <span class="error" v-if="item.campo=='fc_entrada_servicio'"> {{ item.mensaje }}</span>  
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="mb-3">
                                                            <label for="gl_observacion_horario" class="form-label fw-bold text-primary">Observaciones Horario</label>
                                                            <input type="text" class="form-control" v-model="gl_observacion_horario" id="gl_observacion_horario" name="gl_observacion_horario">    
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- 2 -->
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="fc_entrada_pabellon" class="form-label fw-bold text-primary">Entrada Quirofano<span class="campo_requerido">*</span></label>
                                                            <input type="datetime-local" class="form-control" v-model="fc_entrada_pabellon" id="fc_entrada_pabellon" name="fc_entrada_pabellon" @input="verificarFechas">
                                                            <div  v-for="(item, index) in errores" :key="index">
                                                                <span class="error" v-if="item.campo=='fc_entrada_pabellon'">{{ item.mensaje }}</span>  
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="fc_inicio_anestesia" class="form-label fw-bold text-primary">Inicio Anestesia<span class="campo_requerido">*</span></label>
                                                            <input type="datetime-local" class="form-control" v-model="fc_inicio_anestesia" id="fc_inicio_anestesia" name="fc_inicio_anestesia" @input="verificarFechas">
                                                            <div  v-for="(item, index) in errores" :key="index">
                                                                <span class="error" v-if="item.campo=='fc_inicio_anestesia'">{{ item.mensaje }}</span>  
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="fc_inicio_intervencion" class="form-label fw-bold text-primary">Inicio Intervención<span class="campo_requerido">*</span></label>
                                                            <input type="datetime-local" class="form-control" v-model="fc_inicio_intervencion" id="fc_inicio_intervencion" name="fc_inicio_intervencion" @input="verificarFechas">
                                                            <div  v-for="(item, index) in errores" :key="index">
                                                                <span class="error" v-if="item.campo=='fc_inicio_intervencion'">{{ item.mensaje }}</span>  
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- 3 -->
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="fc_salida_pabellon" class="form-label fw-bold text-primary">Salida Quirofano<span class="campo_requerido">*</span></label>
                                                            <input type="datetime-local" class="form-control" v-model="fc_salida_pabellon" id="fc_salida_pabellon" name="fc_salida_pabellon" @input="verificarFechas">
                                                            <div  v-for="(item, index) in errores" :key="index">
                                                                <span class="error" v-if="item.campo=='fc_salida_pabellon'">{{ item.mensaje }}</span>  
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="fc_fin_anestesia" class="form-label fw-bold text-primary">Termino Anestesia<span class="campo_requerido">*</span></label>
                                                            <input type="datetime-local" class="form-control" v-model="fc_fin_anestesia" id="fc_fin_anestesia" name="fc_fin_anestesia" @input="verificarFechas">
                                                            <div  v-for="(item, index) in errores" :key="index">
                                                                <span class="error" v-if="item.campo=='fc_fin_anestesia'">{{ item.mensaje }}</span>  
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="fc_fin_intervencion" class="form-label fw-bold text-primary">Termino Intervención<span class="campo_requerido">*</span></label>
                                                            <input type="datetime-local" class="form-control" v-model="fc_fin_intervencion" id="fc_fin_intervencion" name="fc_fin_intervencion" @input="verificarFechas">
                                                            <div  v-for="(item, index) in errores" :key="index">
                                                                <span class="error" v-if="item.campo=='fc_fin_intervencion'">{{ item.mensaje }}</span>  
                                                            </div>
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
            titulo: 'Pausa Intra-Operatoria',
            id_solicitud: '',
            id_asignacion: '',
            enfermeras: [],
            profesionales:[],
            solicitudPabellon: [],
            tipoAccesosVasculares: [
                { text: 'VVP', value: 'VVP'},
                { text: 'CVC', value: 'CVC' },
                { text: 'Linea Arterial', value: 'Linea Arterial' }
            ],
            tipoAntisepticos: [
                { text: 'Povidona', value: 'Povidona'},
                { text: 'Clorhexidina', value: 'Clorhexidina' },
                { text: 'No Aplica', value: 'No Aplica' }
            ],            
            // 2 card
            accesosVasculares: [],
            gl_sitio_puncion: '',
            gl_tipo_acceso: '',
            gl_calibre:'',
            id_responsable:'',
            // 3 drenajes
            gl_tipo_drenaje:'',
            nr_cantidad: '',
            gl_contenido: '',
            // id este se llena cuando se con func getDrenaje
            id_drenaje:'',
            id_responsable_drenaje:'',

            btnEliminarAccVasc: false,
            btnEliminarDrenaje: false,
            id_acceso_vascular: '',

            // 1 card
            gl_folley: '',
            gl_folley_balon: '',
            id_folley_instalada: '',

            gl_antiseptico:'',
            bo_aseo_realizado:'',
            id_responsable_aseo: '',

            isDisabled:true,
            isRequired: false,
            errores: [],

            // 1 time
            fc_entrada_servicio: '',
            gl_observacion_horario:'',
         
            // 2 time
            fc_entrada_pabellon: '',
            fc_inicio_anestesia:'',
            fc_inicio_intervencion: '',

            // 3 time
            fc_salida_pabellon:'',
            fc_fin_anestesia:'',
            fc_fin_intervencion:'',
        }
    },
    methods: { 
        registrar(){
            console.log(this.errores);
            
            if(this.validateForm()){ 
                var data = new FormData();          
                data.append('id_solicitud', this.id_solicitud) 
                data.append('id_asignacion', this.id_asignacion)
                data.append('bo_borrador', this.bo_borrador)
                data.append('gl_folley', this.gl_folley)
                data.append('gl_folley_balon', this.gl_folley_balon)
                data.append('id_folley_instalada', this.id_folley_instalada)
                data.append('bo_aseo_realizado', this.bo_aseo_realizado)
                data.append('gl_antiseptico', this.gl_antiseptico)
                data.append('id_responsable_aseo', this.id_responsable_aseo)
                data.append('fc_entrada_servicio', this.fc_entrada_servicio)
                data.append('gl_observacion_horario', this.gl_observacion_horario)
                data.append('fc_entrada_pabellon', this.fc_entrada_pabellon)
                data.append('fc_inicio_anestesia', this.fc_inicio_anestesia)
                data.append('fc_inicio_intervencion', this.fc_inicio_intervencion)
                data.append('fc_salida_pabellon', this.fc_salida_pabellon)
                data.append('fc_fin_anestesia', this.fc_fin_anestesia)
                data.append('fc_fin_intervencion', this.fc_fin_intervencion)
                data.append('bo_borrador', '0')
                axios.post('/pausaIntro/registrar', data)
                .then(response => {
                    console.log(response.data);
                    if(response.data=='ok'){
                        this.limpiar()
                        $('#modalPausaIntraOperatoria').modal('hide')
                        this.$toastr.success('¡Actualizada!', 'Pausa intra operatoria actualizada correctamente');
                    }
                })
                .catch(error => {
                    console.error('Error: ', error);
                });
            }
        },
        validateForm() {
            this.errores = []; 
            if (this.isRequired) {
                if (this.gl_antiseptico == '' || this.gl_antiseptico == null) {
                    this.errores.push({ campo: 'gl_antiseptico', mensaje: 'El campo antiséptico es requerido.' });
                }
                if(this.id_responsable_aseo == '' || this.id_responsable_aseo == null){
                    this.errores.push({ campo: 'id_responsable_aseo', mensaje: 'El campo responsable es requerido.' });
                }
                if(this.fc_entrada_servicio == ''){
                    this.errores.push({ campo: 'fc_entrada_servicio', mensaje: 'El campo fecha entrada es requerido.' });
                }
                if(this.fc_entrada_pabellon == ''){
                    this.errores.push({ campo: 'fc_entrada_pabellon', mensaje: 'El campo fecha entrada pabellón es requerido.' });
                }
                if(this.fc_inicio_anestesia == ''){
                    this.errores.push({ campo: 'fc_inicio_anestesia', mensaje: 'El campo fecha inicio pabellón es requerido.' });
                }
                if(this.fc_inicio_intervencion == ''){
                    this.errores.push({ campo: 'fc_inicio_intervencion', mensaje: 'El campo fecha inicio intervención es requerido.' });
                }
                if(this.fc_salida_pabellon == ''){
                    this.errores.push({ campo: 'fc_salida_pabellon', mensaje: 'El campo fecha salida pabellón es requerido.' });
                }
                if(this.fc_fin_anestesia == ''){
                    this.errores.push({ campo: 'fc_fin_anestesia', mensaje: 'El campo fecha fin anestesia es requerido.' });
                }
                if(this.fc_fin_intervencion == ''){
                    this.errores.push({ campo: 'fc_fin_intervencion', mensaje: 'El campo fecha fin intervención es requerido.' });
                }
            }
            return this.errores.length === 0;
        },
        getInfo(id, solicitud_id){
            this.id = id
            this.id_solicitud = solicitud_id
            var data = new FormData();
            data.append('id', id);
            data.append('solicitud_id', solicitud_id);
            axios.post('/pausaIntro/get-info', data)
            .then(response => {
                const { profesionales, enfermeras, solicitudPabellon } = response.data
      
                this.solicitudPabellon = solicitudPabellon
                this.profesionales = profesionales
                this.enfermeras = enfermeras
                this.id_asignacion = solicitudPabellon.asignacion.id
                this.buscarAccesoVasc(this.id_solicitud)
                this.getDrenaje(this.id_solicitud)
                this.gl_folley = solicitudPabellon.pausa_intra.gl_folley
                this.gl_folley_balon = solicitudPabellon.pausa_intra.gl_folley_balon
                this.id_folley_instalada = (solicitudPabellon.pausa_intra.id_folley_instalada==0)? '' : solicitudPabellon.pausa_intra.id_folley_instaladas
                
                // aseo
                this.aseo(solicitudPabellon.pausa_intra.bo_aseo_realizado)
                this.gl_antiseptico = solicitudPabellon.pausa_intra.gl_antiseptico
                this.id_responsable_aseo = solicitudPabellon.pausa_intra.id_responsable_aseo

                // fechas 
                this.fc_entrada_pabellon = solicitudPabellon.pausa_intra.fc_entrada_pabellon
                this.gl_observacion_horario = solicitudPabellon.pausa_intra.gl_observacion_horario
                this.fc_entrada_servicio = solicitudPabellon.pausa_intra.fc_entrada_servicio
                this.fc_fin_anestesia = solicitudPabellon.pausa_intra.fc_fin_anestesia
                this.fc_fin_intervencion = solicitudPabellon.pausa_intra.fc_fin_intervencion
                this.fc_inicio_anestesia = solicitudPabellon.pausa_intra.fc_inicio_anestesia
                this.fc_inicio_intervencion = solicitudPabellon.pausa_intra.fc_inicio_intervencion
                this.fc_registro = solicitudPabellon.pausa_intra.fc_registro
                this.fc_salida_pabellon = solicitudPabellon.pausa_intra.fc_salida_pabellon
          
                // drenaje
                this.id_responsable_drenaje = solicitudPabellon.pausa_intra.id_responsable_drenaje
                this.gl_tipo_drenaje = solicitudPabellon.pausa_intra.gl_tipo_drenaje
                this.nr_cantidad = solicitudPabellon.pausa_intra.nr_cantidad
                this.gl_contenido = solicitudPabellon.pausa_intra.gl_contenido
                this.gl_contenido = solicitudPabellon.pausa_intra.gl_contenido
             
               
                // this.gl_sitio_puncion = solicitudPabellon.pausa_intra.gl_sitio_puncion
                // this.gl_teflon = solicitudPabellon.pausa_intra.gl_teflon
            })
            .catch(error => {   
                console.error('Error: ', error);
            });
        },
        buscarAccesoVasc(id_solicitud){
            this.id_solicitud = id_solicitud
            var data = new FormData();
            data.append('id_solicitud', id_solicitud);
            axios.post('/pausaIntro/buscar', data)
            .then(response => {
                if (response.data !== undefined && response.data !== null) {
                    if (Object.keys(response.data).length > 0) {
                        this.btnEliminarAccVasc = true
                        this.gl_calibre =  response.data.gl_calibre
                        this.gl_sitio_puncion = response.data.gl_sitio_puncion
                        this.gl_tipo_acceso = response.data.gl_tipo_acceso
                        this.id_responsable = response.data.id_responsable
                        this.id_acceso_vascular = response.data.id
                    }
                }
            })
            .catch(error => {   
                console.error('Error: ', error);
            });
        },
        limpiar(){      

        },
        generar_tabla_accesos_vasculares(agregar, eliminar){ 
            if((this.gl_tipo_acceso == '' || this.gl_sitio_puncion == '' || this.gl_calibre == '' || this.id_responsable == '') && agregar == 1){
                console.log('Llene todos los datos');
            }else{
                var data = new FormData();
                data.append('id', this.id);
                data.append('agregar', agregar)
                data.append('eliminar', eliminar)
                data.append('id_asignacion', this.id_asignacion)
                data.append('gl_tipo_acceso', this.gl_tipo_acceso)
                data.append('id_solicitud', this.id_solicitud)
                data.append('gl_sitio_puncion', this.gl_sitio_puncion)
                data.append('gl_calibre', this.gl_calibre)
                data.append('id_responsable', this.id_responsable)
                data.append('id_usuario', 1)
                axios.post('/pausaIntro/agregar-acceso-vascular', data)
                .then(response => {
                    this.buscarAccesoVasc(response.data[0].id_solicitud)
                    this.$toastr.success('Correctamente!', 'Acceso vascular registrado');
                })
                .catch(error => {   
                    console.error('Error: ', error);
                });
            }
        },
        eliminarAccesoVasc(){
            var data = new FormData();
            data.append('id', this.id_acceso_vascular);
            axios.post('/pausaIntro/eliminar-acceso-vascular', data)
            .then(response => {
                if(response.data == 'ok'){
                    this.gl_tipo_acceso = ''
                    this.gl_sitio_puncion = ''
                    this.gl_calibre = ''
                    this.id_responsable = ''
                    this.btnEliminarAccVasc = false
                    this.$toastr.success('Eliminada!', 'Acceso vascular eliminado correctamente');
                }
            })
            .catch(error => {   
                console.error('Error: ', error);
            });
        }, 
        eliminarDrenaje(){
            var data = new FormData();
            data.append('id', this.id_drenaje);
            axios.post('/pausaIntro/eliminar-drenaje', data)
            .then(response => {
                if(response.data == 'ok'){
                    this.id_responsable_drenaje = ''
                    this.gl_tipo_drenaje = ''
                    this.nr_cantidad = ''
                    this.gl_contenido = ''
                    this.btnEliminarDrenaje = false
                    this.$toastr.success('Eliminada!', 'Drenaje eliminado correctamente');
                }
            })
            .catch(error => {   
                console.error('Error: ', error);
            });
        },
        generar_tabla_drenajes(agregar, eliminar){
            if((this.gl_tipo == '' || this.nr_cantidad == '' || this.gl_contenido == '' ) && agregar == 1){
                console.log('Llene todos los datos');
            }else{
                var data = new FormData();
                data.append('agregar', agregar)
                data.append('eliminar', eliminar)
                data.append('id_solicitud', this.id_solicitud);
                data.append('id_asignacion', this.id_asignacion);
                data.append('id_responsable', this.id_responsable_drenaje);
                data.append('gl_tipo', this.gl_tipo_drenaje)
                data.append('nr_cantidad', this.nr_cantidad)
                data.append('gl_contenido', this.gl_contenido)
                axios.post('/pausaIntro/agregar-drenaje', data)
                .then(response => {
                    console.log(response.data);
                    this.btnEliminarDrenaje = true
                    this.id_drenaje = response.data.id
                    
                })
                .catch(error => {   
                    console.error('Error: ', error);
                });
            }
        }, 
        getDrenaje(id_solicitud){
            var data = new FormData();
            data.append('id_solicitud', id_solicitud);
            axios.post('/pausaIntro/get-drenaje', data)
            .then(response => {
                if (Object.keys(response.data).length > 0) {
                    this.btnEliminarDrenaje = true
                    this.gl_tipo_drenaje = response.data.gl_tipo
                    this.nr_cantidad = response.data.nr_cantidad
                    this.gl_contenido = response.data.gl_contenido
                    this.id_responsable_drenaje = response.data.id_responsable
                    this.id_drenaje = response.data.id
                }
            })
            .catch(error => {   
                console.error('Error: ', error);
            });
        },
        limpiar(){
            this.id =  '';
            this.id_enfermera_anestesia = '';
            this.id_solicitud = '';
            this.id_asignacion ='';
            this.gl_sitio_puncion = '';
            this.gl_tipo_acceso = '';
            this.gl_calibre = '';
            this.id_responsable = '';
            // drenajes
            this.gl_tipo_drenaje = '';
            this.nr_cantidad = '';
            this.gl_contenido = '';
            // this.accesoVasc = false;
            // this.drenaje = true;
            // this.eliminarDrenaje: false,
            this.id_acceso_vascular = '';
        },
        aseo(realizado){  
            if(realizado == 1){
                this.bo_aseo_realizado = realizado
                this.isDisabled = false 
                $('#gl_antiseptico').prop('required', true);
                $('#id_responsable_aseo').prop('required', true);
                this.isRequired = true
            }else{
                this.gl_antiseptico = ''
                this.id_responsable_aseo = ''
                this.isRequired = false
                this.isDisabled = true 
                this.errores = []; 
            }
        },
        verificarFechas(){
            let fc_entrada_servicio = this.fc_entrada_servicio
            fc_entrada_servicio = fc_entrada_servicio.replace(' ', 'T'); 
            let fechaEntradaServicio = new Date(fc_entrada_servicio);
            // fechaEntradaServicio.setSeconds(0, 0);
            
            let fc_entrada_pabellon = this.fc_entrada_pabellon
            fc_entrada_pabellon = fc_entrada_pabellon.replace(' ', 'T'); 
            let fechaEntradaPabellon = new Date(fc_entrada_pabellon);
            // fechaEntradaPabellon.setSeconds(0, 0);
 
            let fc_inicio_anestesia = this.fc_inicio_anestesia
            fc_inicio_anestesia = fc_inicio_anestesia.replace(' ', 'T'); 

            let fc_inicio_intervencion = this.fc_inicio_intervencion
            fc_inicio_intervencion = fc_inicio_intervencion.replace(' ', 'T'); 

            let fc_salida_pabellon = this.fc_salida_pabellon
            fc_salida_pabellon = fc_salida_pabellon.replace(' ', 'T'); 

            let fc_fin_anestesia = this.fc_fin_anestesia
            fc_fin_anestesia = fc_fin_anestesia.replace(' ', 'T'); 
        
            let fc_fin_intervencion = this.fc_fin_intervencion
            fc_fin_intervencion = fc_fin_intervencion.replace(' ', 'T'); 

            const solicitudPabellon = this.solicitudPabellon;
    
            const fc_intervencion = solicitudPabellon.fc_intervencion;
            const fc_minima = new Date(fc_intervencion);
            const fc_maxima = new Date(fc_intervencion);

            fc_maxima.setDate(fc_maxima.getDate() + 1);
            fc_maxima.setHours(23);
            fc_maxima.setMinutes(59);
            fc_maxima.setSeconds(59);
            fc_minima.setHours(0);
            fc_minima.setMinutes(0,0);
            fc_minima.setSeconds(0,0);
           

            if( fechaEntradaServicio > fechaEntradaPabellon ){
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: `La entrada al servicio debe ser menor a la fecha de entrada del pabellón`,
                });
                this.fc_entrada_servicio = ''
            }
            
            if((new Date(fc_entrada_servicio) > fc_maxima || new Date(fc_entrada_servicio) < fc_minima) ){
                console.log(`fecha entrada servicio: ${ fc_entrada_servicio } < ${fc_entrada_pabellon} `)
              
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: `La entrada al servicio debe ser entre la fecha de intervención ${solicitudPabellon.fc_intervencion}  y un día después`,
                });
                this.fc_entrada_servicio = ''
            }
            if(new Date(fc_entrada_pabellon) > fc_maxima || new Date(fc_entrada_pabellon) < fc_minima){
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: `La entrada al quirofano debe ser entre la fecha de intervención ${solicitudPabellon.fc_intervencion}  y un día después`,
                });
                this.fc_entrada_pabellon = ''
            }
            if(new Date(fc_inicio_anestesia) > fc_maxima || new Date(fc_inicio_anestesia) < fc_minima){
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: `El inicio de Anestesia debe ser entre la fecha de intervención ${solicitudPabellon.fc_intervencion}  y un día después`,
                });
                this.fc_inicio_anestesia = ''
            }
            if(new Date(fc_inicio_intervencion) > fc_maxima || new Date(fc_inicio_intervencion) < fc_minima){
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: `El inicio de intervención debe ser entre la fecha de intervención ${solicitudPabellon.fc_intervencion}  y un día después`,
                });
                this.fc_inicio_intervencion = '' 
            } 
            if(new Date(fc_salida_pabellon) > fc_maxima || new Date(fc_salida_pabellon) < fc_minima){
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: `La salida al quirofano debe ser entre la fecha de intervención ${solicitudPabellon.fc_intervencion}  y un día después`,
                });
                this.fc_salida_pabellon = ''
            }
            if(new Date(fc_fin_anestesia) > fc_maxima || new Date(fc_fin_anestesia) < fc_minima){
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: `El fin de Anestesia debe ser entre la fecha de intervención ${solicitudPabellon.fc_intervencion}  y un día después`,
                });
        
                this.fc_fin_anestesia = ''
            }
            if(new Date(fc_fin_intervencion) > fc_maxima || new Date(fc_fin_intervencion) < fc_minima){
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: `El fin de intervención debe ser entre la fecha de intervención ${solicitudPabellon.fc_intervencion}  y un día después`,
                });
                this.fc_fin_intervencion = ''
            }

            if(fc_entrada_pabellon > fc_salida_pabellon && fc_entrada_pabellon != '' && fc_salida_pabellon != ''){
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: `La salida de quirofano debe ser posterior a la entrada`,
                });
                this.fc_salida_pabellon = ''
            }
            if(fc_inicio_anestesia > fc_fin_anestesia && fc_inicio_anestesia != '' && fc_fin_anestesia != ''){
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: `El termino de la anestesia debe ser posterior al inicio`,
                });
                this.fc_fin_anestesia = ''
            }
            if(fc_inicio_intervencion > fc_fin_intervencion && fc_inicio_intervencion != '' && fc_fin_intervencion != ''){
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: `El termino de la intervención debe ser posterior al inicio`,
                });
                this.fc_fin_intervencion = ''
            }
            if(fc_inicio_intervencion < fc_entrada_pabellon && fc_inicio_intervencion != '' && fc_entrada_pabellon != ''){
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: `El inicio de la intervención debe ser posterior a la entrada a quirofano`,
                });
                this.fc_inicio_intervencion = ''
            }
            if(fc_fin_intervencion > fc_salida_pabellon && fc_fin_intervencion != '' && fc_salida_pabellon != ''){
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: `El termino de la intervención debe ser antes de la salida de quirofano`,
                });
                this.fc_fin_intervencion = ''
            }
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
 .campo_requerido{
    color: red;
    font-size: 1.1em;
    font-weight: bold;
 }
 
 .text-radios-xl{
    display: flex;
    justify-content: center;
    flex-direction: column;
 }
 .badget-info{
    margin-top: 1em;
 }
 .btn-delete{
    margin-top: 2em !important;
 }
 ul {
  list-style-type: none;
  padding: 0;
}
.error {
color:red;
font-size: .9em;
font-weight: 800;
}
</style>