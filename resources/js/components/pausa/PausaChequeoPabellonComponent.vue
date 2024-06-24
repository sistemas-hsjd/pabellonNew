<template>
    <div>
        <div class="modal fade" id="modalChequeoPabellon" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalDetalleLabel" aria-hidden="true">
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

                                <!-- Pabellonera  enfermera list -->
                                <div class="card">
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="id_servicio" class="form-label fw-bold text-primary">Pabellonera <span class="campo_requerido">*</span></label>
                                                        <v-select v-model="id_pabellonera" :reduce="pab => pab.pro_cod" :options="pabelloneras" label="nombre" id="id_pabellonera" placeholder="Seleccione..."></v-select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="gl_tabaco" class="form-label fw-bold text-primary">Enfermera <span class="campo_requerido">*</span></label>
                                                        <v-select v-model="id_enfermera" :reduce="enf => enf.pro_cod" :options="enfermeras" label="nombre" id="id_enfermera" placeholder="Seleccione..."></v-select>
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
                                                                        <label class="form-label fw-bold text-primary">Mesa Funcionando<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_mesa" type="radio" id="bo_mesa_1" name="bo_mesa" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_conciente_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_mesa" type="radio" id="bo_mesa_2" name="bo_mesa" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_mesa_2">No</label>
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
                                                                        <label class="form-label fw-bold text-primary">Electro-bisturí revisado<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_electro_bisturi" type="radio" id="bo_electro_bisturi_1" name="bo_electro_bisturi" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_electro_bisturi_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_electro_bisturi" type="radio" id="bo_electro_bisturi_2" name="bo_electro_bisturi" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_electro_bisturi_2">No</label>
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
                                                                        <label class="form-label fw-bold text-primary">Lámparas revisadas<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_lampara" type="radio" id="bo_lampara_1" name="bo_lampara" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_lampara_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_lampara" type="radio" id="bo_lampara_2" name="bo_lampara" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_lampara_2">No</label>
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
                                                                        <label class="form-label fw-bold text-primary">Eq. Laparoscopía revisado<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_laparoscopia" type="radio" id="bo_laparoscopia_1" name="bo_laparoscopia" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_via_venosa_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_laparoscopia" type="radio" id="bo_laparoscopia_2" name="bo_laparoscopia" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_via_venosa_2">No</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_laparoscopia" type="radio" id="bo_laparoscopia_3" name="bo_laparoscopia" value="2">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_via_venosa_2">No Aplica</label>
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
                                                                        <label class="form-label fw-bold text-primary">Pierneras<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_pierneras" type="radio" id="bo_pierneras_1" name="bo_pierneras" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_pierneras_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_pierneras" type="radio" id="bo_pierneras_2" name="bo_pierneras" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_pierneras_2">No</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_pierneras" type="radio" id="bo_pierneras_3" name="bo_pierneras" value="2">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_pierneras_3">No Aplica</label>
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
                                                                        <label class="form-label fw-bold text-primary">Piñas revisadas<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_pinia" type="radio" id="bo_pinia_1" name="bo_pinia" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_pinia_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_pinia" type="radio" id="bo_pinia_2" name="bo_pinia" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_pinia_2">No</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_pinia" type="radio" id="bo_pinia_3" name="bo_pinia" value="2">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_pinia_3">No Aplica</label>
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
                                                                        <label class="form-label fw-bold text-primary">Tarimas<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_tarimas" type="radio" id="bo_tarimas_1" name="bo_tarimas" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_tarimas_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_tarimas" type="radio" id="bo_tarimas_2" name="bo_tarimas" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_tarimas_2">No</label>
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
                                                                        <label class="form-label fw-bold text-primary">Arco<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_arco" type="radio" id="bo_arco_1" name="bo_arco" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_arco_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_arco" type="radio" id="bo_arco_2" name="bo_arco" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_arco_2">No</label>
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
                                                                        <label class="form-label fw-bold text-primary">Instrumental<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_instrumental" type="radio" id="bo_instrumental_1" name="bo_instrumental" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_instrumental_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_instrumental" type="radio" id="bo_instrumental_2" name="bo_instrumental" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_instrumental_2">No</label>
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
                                                                        <label class="form-label fw-bold text-primary">Compresor Neumático<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_insumos" type="radio" id="bo_insumos_1" name="bo_insumos" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_insumos_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_insumos" type="radio" id="bo_insumos_2" name="bo_insumos" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_insumos_2">No</label>
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
                                                                        <label class="form-label fw-bold text-primary">Osito<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_osito" type="radio" id="bo_osito_1" name="bo_osito" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_osito_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_osito" type="radio" id="bo_osito_2" name="bo_osito" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_osito_2">No</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_osito" type="radio" id="bo_osito_3" name="bo_osito" value="2">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_osito_3">No Aplica</label>
                                                                    </div>
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
                                                                        <label class="form-label fw-bold text-primary">Insumos Solicitado y Recibido<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_compresor_neumatico" type="radio" id="bo_compresor_neumatico_1" name="bo_compresor_neumatico" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_compresor_neumatico_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_compresor_neumatico" type="radio" id="bo_compresor_neumatico_2" name="bo_compresor_neumatico" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_compresor_neumatico_2">No</label>
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
                                                        <label for="gl_energia" class="form-label fw-bold text-primary">Energía <span class="campo_requerido">*</span></label>
                                                        <v-select v-model="gl_energia" multiple :reduce="energia => energia.value" :options="optionsGlenergia" label="text" id="gl_energia" placeholder="Seleccione..."></v-select>
                                                    </div>
                                                </div>
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
            titulo: 'Chequeo Pabellón',
            id: '',
            id_pabellonera:'',
            id_enfermera:'',
            id_solicitud: '',
            id_asignacion: '',
            enfermeras: [],
            pabelloneras: [],
            solicitudPabellon: [],
            optionsGlenergia: [
                { text: 'Enseal', value: 'Enseal'},
                { text: 'Harmonico', value: 'Harmonico' },
                { text: 'Lisagure', value: 'Lisagure' },
                { text: 'No Amerita', value: 'No Amerita' }
            ],
            // radios
            bo_mesa: '',
            bo_electro_bisturi: '',
            bo_lampara: '', 
            bo_laparoscopia: '',
            bo_pierneras: '',
            bo_pinia: '',
            bo_tarimas: '',
            bo_arco: '',
            bo_aspiracion: '',
            bo_instrumental: '',
            bo_insumos: '',
            bo_compresor_neumatico: '',
            bo_osito: '',
            gl_energia:[],
            gl_observacion: ''
        }
    },
    methods: { 
        registrar(){
            var data = new FormData();
            data.append('id_solicitud', this.id_solicitud)
            data.append('bo_mesa', this.bo_mesa) 
            data.append('bo_electro_bisturi', this.bo_electro_bisturi)  
            data.append('bo_lampara', this.bo_lampara)  
            data.append('bo_laparoscopia', this.bo_laparoscopia) 
            data.append('bo_pierneras', this.bo_pierneras) 
            data.append('bo_pinia' , this.bo_pinia) 
            data.append('bo_tarimas', this.bo_tarimas) 
            data.append('bo_arco', this.bo_arco) 
            data.append('bo_aspiracion', this.bo_aspiracion)  
            data.append('bo_instrumental', this.bo_instrumental)  
            data.append('bo_insumos', this.bo_insumos) 
            data.append('bo_compresor_neumatico', this.bo_compresor_neumatico) 
            data.append('bo_osito', this.bo_osito) 
            data.append('gl_energia', this.gl_energia)  
            data.append('gl_observacion', this.gl_observacion)  
            data.append('id_enfermera', this.id_enfermera)  
            data.append('id_pabellonera', this.id_pabellonera) 
            axios.post('/pausaPabellon/registrar', data)
            .then(response => {
                if(response.data=='ok'){
                    $('#modalChequeoPabellon').modal('hide')
                    this.$toastr.success('¡Actualizada!', 'Pausa Pabellón actualizada correctamente');
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
            axios.post('/pausaPabellon/get-info', data)
            .then(response => {
                const { enfermeras, pabelloneras, solicitudPabellon } = response.data
                console.log(solicitudPabellon);
                
                this.enfermeras = enfermeras
                this.pabelloneras = pabelloneras
                this.solicitudPabellon = solicitudPabellon
                // radios
                this.bo_mesa = this.solicitudPabellon.pausa_pabellon.bo_mesa
                this.bo_electro_bisturi = this.solicitudPabellon.pausa_pabellon.bo_electro_bisturi
                this.bo_lampara = this.solicitudPabellon.pausa_pabellon.bo_lampara
                this.bo_laparoscopia = this.solicitudPabellon.pausa_pabellon.bo_laparoscopia
                this.bo_pierneras = this.solicitudPabellon.pausa_pabellon.bo_pierneras
                this.bo_pinia = this.solicitudPabellon.pausa_pabellon.bo_pinia
                this.bo_tarimas = this.solicitudPabellon.pausa_pabellon.bo_tarimas
                this.bo_arco = this.solicitudPabellon.pausa_pabellon.bo_arco
                this.bo_aspiracion = this.solicitudPabellon.pausa_pabellon.bo_aspiracion
                this.bo_instrumental = this.solicitudPabellon.pausa_pabellon.bo_instrumental
                this.bo_insumos = this.solicitudPabellon.pausa_pabellon.bo_insumos
                this.bo_compresor_neumatico = this.solicitudPabellon.pausa_pabellon.bo_compresor_neumatico
                this.bo_osito = this.solicitudPabellon.pausa_pabellon.bo_osito
                if(solicitudPabellon.pausa_pabellon.gl_energia!==null){
                    this.gl_energia = solicitudPabellon.pausa_pabellon.gl_energia.split(',')
                }
                (this.solicitudPabellon.pausa_pabellon.gl_observacion != 'null') ? this.gl_observacion = this.solicitudPabellon.pausa_pabellon.gl_observacion : this.gl_observacion = '' 
                this.id_enfermera = this.solicitudPabellon.pausa_pabellon.id_enfermera
                this.id_pabellonera =  this.solicitudPabellon.pausa_pabellon.id_pabellonera
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