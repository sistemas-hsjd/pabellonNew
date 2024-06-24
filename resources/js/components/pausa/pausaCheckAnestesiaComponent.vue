<template>
    <div>
        <div class="modal fade" id="modalChequeoAnestesia" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalDetalleLabel" aria-hidden="true">
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

                                <!-- v-select enfermera -->
                                <div class="card">
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="id_tecnico_anestesia" class="form-label fw-bold text-primary">Técnico de Anestesia <span class="campo_requerido">*</span></label>
                                                        <v-select v-model="id_tecnico_anestesia" :reduce="tec => tec.pro_cod" :options="tecnicosAnestesistas" label="nombre" id="id_tecnico_anestesia" placeholder="Seleccione..."></v-select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="id_enfermera_anestesia" class="form-label fw-bold text-primary">Enfermera <span class="campo_requerido">*</span></label>
                                                        <v-select v-model="id_enfermera_anestesia" :reduce="enf => enf.pro_cod" :options="enfermeras" label="nombre" id="id_enfermera_anestesia" placeholder="Seleccione..."></v-select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- 1  radios -->
                                <div class="card">
                                    <div class="card-body">
                                        <div class="container">
                                            
                                            <!-- 1 list  -->
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <div class="card d-flex justify-content-center align-items-center">
                                                            <div class="card-body">
                                                                <div>
                                                                    <div>
                                                                        <label class="form-label fw-bold text-primary">Máquina de Anestesia revisada<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_maquina_anestesia" type="radio" id="bo_maquina_anestesia_1" name="bo_maquina_anestesia" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_maquina_anestesia_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_maquina_anestesia" type="radio" id="bo_maquina_anestesia_2" name="bo_maquina_anestesia" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_maquina_anestesia_2">No</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <div class="card d-flex justify-content-center align-items-center">
                                                            <div class="card-body">
                                                                <div>
                                                                    <div>
                                                                        <label class="form-label fw-bold text-primary">Mónitores Funcionando<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_monitor_funcional" type="radio" id="bo_monitor_funcional_1" name="bo_monitor_funcional" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_monitor_funcional_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_monitor_funcional" type="radio" id="bo_monitor_funcional_2" name="bo_monitor_funcional" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_monitor_funcional_2">No</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <div class="card d-flex justify-content-center align-items-center">
                                                            <div class="card-body">
                                                                <div>
                                                                    <div>
                                                                        <label class="form-label fw-bold text-primary">Cal Sodada<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_cal_sodada" type="radio" id="bo_cal_sodada_1" name="bo_cal_sodada" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_cal_sodada_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_cal_sodada" type="radio" id="bo_cal_sodada_2" name="bo_cal_sodada" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_cal_sodada_2">No</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <div class="card d-flex justify-content-center align-items-center">
                                                            <div class="card-body">
                                                                <div>
                                                                    <div>
                                                                        <label class="form-label fw-bold text-primary">Brazales<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_brazales" type="radio" id="bo_brazales_1" name="bo_brazales" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_brazales_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_brazales" type="radio" id="bo_brazales_2" name="bo_brazales" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_brazales_2">No</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                           
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 2 -->
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <div class="card d-flex justify-content-center align-items-center">
                                                            <div class="card-body">
                                                                <div>
                                                                    <div>
                                                                        <label class="form-label fw-bold text-primary">Laringoscopio Revisado<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_laringoscopio" type="radio" id="bo_laringoscopio_1" name="bo_laringoscopio" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_laringoscopio_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_laringoscopio" type="radio" id="bo_laringoscopio_2" name="bo_laringoscopio" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_laringoscopio_2">No</label>
                                                                    </div>
                                                                  
                                                                </div>
                                                            </div>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <div class="card d-flex justify-content-center align-items-center">
                                                            <div class="card-body">
                                                                <div>
                                                                    <div>
                                                                        <label class="form-label fw-bold text-primary">Aspiración Funcionando<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_aspiracion" type="radio" id="bo_aspiracion_1" name="bo_aspiracion" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_aspiracion_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_aspiracion" type="radio" id="bo_aspiracion_2" name="bo_aspiracion" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_aspiracion_2">No</label>
                                                                    </div>
                                                                  
                                                                </div>
                                                            </div>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <div class="card d-flex justify-content-center align-items-center">
                                                            <div class="card-body">
                                                                <div>
                                                                    <div>
                                                                        <label class="form-label fw-bold text-primary">Picarón<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_picaron" type="radio" id="bo_picaron_1" name="bo_picaron" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_picaron_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_picaron" type="radio" id="bo_picaron_2" name="bo_picaron" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_picaron_2">No</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_picaron" type="radio" id="bo_picaron_3" name="bo_picaron" value="2">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_picaron_3">No Aplica</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <div class="card d-flex justify-content-center align-items-center">
                                                            <div class="card-body">
                                                                <div>
                                                                    <div>
                                                                        <label class="form-label fw-bold text-primary">Portasueros<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_portasueros" type="radio" id="bo_portasueros_1" name="bo_portasueros" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_portasueros_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_portasueros" type="radio" id="bo_portasueros_2" name="bo_portasueros" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_portasueros_2">No</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                           
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 3 -->
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <div class="card d-flex justify-content-center align-items-center">
                                                            <div class="card-body">
                                                                <div>
                                                                    <div>
                                                                        <label class="form-label fw-bold text-primary">Drogas<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_drogas" type="radio" id="bo_drogas_1" name="bo_drogas" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_drogas_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_drogas" type="radio" id="bo_drogas_2" name="bo_drogas" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_drogas_2">No</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <div class="card d-flex justify-content-center align-items-center">
                                                            <div class="card-body">
                                                                <div>
                                                                    <div>
                                                                        <label class="form-label fw-bold text-primary">Insumos<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_insumos_anestesia" type="radio" id="bo_insumos_anestesia_1" name="bo_insumos_anestesia" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_insumos_anestesia_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_insumos_anestesia" type="radio" id="bo_insumos_anestesia_2" name="bo_insumos_anestesia" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_insumos_anestesia_2">No</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <div class="card d-flex justify-content-center align-items-center">
                                                            <div class="card-body">
                                                                <div>
                                                                    <div>
                                                                        <label class="form-label fw-bold text-primary">BIC<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_bic" type="radio" id="bo_bic_1" name="bo_bic" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_bic_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_bic" type="radio" id="bo_bic_2" name="bo_bic" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_bic_2">No</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_bic" type="radio" id="bo_bic_3" name="bo_bic" value="2">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_bic_3">No Aplica</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <div class="card d-flex">
                                                            <div class="card-body">
                                                                <div class="mb-3">
                                                                    <label for="gl_bic" class="form-label fw-bold text-primary">BIC <span class="campo_requerido">*</span></label>
                                                                    <v-select v-model="gl_bic" multiple :reduce="bic => bic.value" :options="glBicOptions" label="text" id="gl_bic" placeholder="Seleccione..."></v-select>
                                                                </div>
                                                            </div>
                                                           
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 4 -->
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <div class="card d-flex justify-content-center align-items-center">
                                                            <div class="card-body">
                                                                <div>
                                                                    <div>
                                                                        <label class="form-label fw-bold text-primary">Carro Anestesia completo<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_carro_anestesia" type="radio" id="bo_carro_anestesia_1" name="bo_carro_anestesia" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_carro_anestesia_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_carro_anestesia" type="radio" id="bo_carro_anestesia_2" name="bo_carro_anestesia" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_carro_anestesia_2">No</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    
                                                    <div class="mb-3">
                                                        <div class="card d-flex justify-content-center align-items-center">
                                                            <div class="card-body">
                                                                <div>
                                                                    <div>
                                                                        <label class="form-label fw-bold text-primary">Fonendoscopio<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_fonendoscopio" type="radio" id="bo_fonendoscopio_1" name="bo_fonendoscopio" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_fonendoscopio_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_fonendoscopio" type="radio" id="bo_fonendoscopio_2" name="bo_fonendoscopio" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_fonendoscopio_2">No</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                               
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <div class="card d-flex justify-content-center align-items-center">
                                                            <div class="card-body">
                                                                <div>
                                                                    <div>
                                                                        <label class="form-label fw-bold text-primary">Game Elastic<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_game_elastic" type="radio" id="bo_game_elastic_1" name="bo_game_elastic" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_game_elastic_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_game_elastic" type="radio" id="bo_game_elastic_2" name="bo_game_elastic" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_game_elastic_2">No</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <div class="card d-flex justify-content-center align-items-center">
                                                            <div class="card-body">
                                                                <div>
                                                                    <div>
                                                                        <label class="form-label fw-bold text-primary">Conductor de tubo<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_conductor" type="radio" id="bo_conductor_1" name="bo_conductor" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_conductor_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_conductor" type="radio" id="bo_conductor_2" name="bo_conductor" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_conductor_2">No</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="gl_observacion" class="form-label fw-bold text-primary">Observaciones <span class="campo_requerido">*</span></label>
                                                        <input type="text" class="form-control" id="gl_observacion" v-model="gl_observacion">
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
                        <button type="button" class="btn btn-primary" @click="registrar()">Guardar cambios</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { defineComponent } from 'vue';
import InfoPaciente from '../paciente/InfoPacienteComponent.vue'

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
            titulo: 'Chequeo Anestesia',
            id: '',
            id_enfermera_anestesia:'',
            id_tecnico_anestesia:'',
            id_solicitud: '',
            id_asignacion: '',
            enfermeras: [],
            tecnicosAnestesistas: [],
            solicitudPabellon: [],
            glBicOptions: [
                { text: 'PCA', value: 'PCA'},
                { text: 'BIC', value: 'BIC' },
                { text: 'No Amerita', value: 'No Amerita' }
            ],
            // radios
            bo_maquina_anestesia:'',
            bo_monitor_funcional:'',
            bo_cal_sodada: '',
            bo_brazales:'',
            bo_laringoscopio:'',
            bo_aspiracion: '',
            bo_picaron: '',
            bo_portasueros: '',
            bo_drogas: '',
            bo_insumos_anestesia:'',
            bo_bic: '',
            bo_carro_anestesia:'',
            bo_fonendoscopio: '',
            bo_game_elastic: '',
            bo_conductor:'',
            gl_observacion:'',
        }
    },
    methods: { 
        registrar(){
            var data = new FormData();
            data.append('id_solicitud', this.id_solicitud)  
            data.append('id_enfermera_anestesia', this.id_enfermera_anestesia)  
            data.append('id_tecnico_anestesia', this.id_tecnico_anestesia) 
            data.append('bo_maquina_anestesia', this.bo_maquina_anestesia)
            data.append('bo_monitor_funcional', this.bo_monitor_funcional) 
            data.append('bo_cal_sodada', this.bo_cal_sodada)  
            data.append('bo_brazales', this.bo_brazales) 
            data.append('bo_laringoscopio', this.bo_laringoscopio) 
            data.append('bo_aspiracion', this.bo_aspiracion) 
            data.append('bo_picaron' , this.bo_picaron) 
            data.append('bo_portasueros', this.bo_portasueros) 
            data.append('bo_drogas', this.bo_drogas) 
            data.append('bo_insumos_anestesia', this.bo_insumos_anestesia)  
            data.append('bo_bic', this.bo_bic)  
            data.append('bo_carro_anestesia', this.bo_carro_anestesia) 
            data.append('bo_game_elastic', this.bo_game_elastic) 
            data.append('bo_conductor', this.bo_conductor) 
            data.append('gl_observacion', this.gl_observacion)  
            
            axios.post('/pausaAnestesia/registrar', data)
            .then(response => {
                console.log(response.data);
                
                if(response.data=='ok'){
                    $('#modalChequeoAnestesia').modal('hide')
                    this.$toastr.success('¡Actualizada!', 'Pausa anestesia actualizada correctamente');
                }
            })
            .catch(error => {
                console.error('Error: ', error);
            });
        },
        getInfo(id, solicitud_id){
            this.id_solicitud = solicitud_id
            var data = new FormData();
            data.append('id', id);
            data.append('solicitud_id', solicitud_id);
            axios.post('/pausaAnestesia/get-info', data)
            .then(response => {
                console.log(response.data);
                const { enfermeras, tecnicosAnestesistas, solicitudPabellon, pausaAnestesia } = response.data
                this.enfermeras = enfermeras
                this.tecnicosAnestesistas = tecnicosAnestesistas

                this.bo_maquina_anestesia = pausaAnestesia.bo_maquina_anestesia
                this.bo_monitor_funcional =  pausaAnestesia.bo_monitor_funcional
                this.bo_cal_sodada =  pausaAnestesia.bo_cal_sodada
                this.bo_brazales =  pausaAnestesia.bo_brazales
                this.bo_laringoscopio = pausaAnestesia.bo_laringoscopio
                this.bo_aspiracion =  pausaAnestesia.bo_aspiracion
                this.bo_picaron =  pausaAnestesia.bo_picaron
                this.bo_portasueros = pausaAnestesia.bo_portasueros
                this.bo_drogas = pausaAnestesia.bo_drogas
                this.bo_insumos_anestesia = pausaAnestesia.bo_insumos_anestesia
                this.bo_bic = pausaAnestesia.bo_bic
                this.bo_carro_anestesia = pausaAnestesia.bo_carro_anestesia
                this.bo_fonendoscopio = pausaAnestesia.bo_fonendoscopio
                this.bo_game_elastic = pausaAnestesia.bo_game_elastic
                this.bo_conductor = pausaAnestesia.bo_conductor
                this.gl_observacion = pausaAnestesia.gl_observacion
                this.id_enfermera_anestesia = pausaAnestesia.id_enfermera_anestesia
                this.id_tecnico_anestesia = pausaAnestesia.id_tecnico_anestesia
            })
            .catch(error => {   
                console.error('Error: ', error);
            });
        },
        limpiar(){      

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
</style>