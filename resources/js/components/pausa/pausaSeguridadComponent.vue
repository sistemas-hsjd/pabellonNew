<template>
    <div>
        <div class="modal fade" id="modalPausaSeguridad" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalDetalleLabel" aria-hidden="true">
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

                                <!-- 1  radios -->
                                <div class="card">
                                    <div class="card-body">
                                        <div class="container">
                                            
                                            <!-- CUP  -->
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <div class="card d-flex justify-content-center align-items-center">
                                                            <div class="card-body">
                                                                <div>
                                                                    <div>
                                                                        <label class="form-label fw-bold text-primary">Nombre Paciente<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_nombre_paciente" type="radio" id="bo_nombre_paciente_1" name="bo_nombre_paciente" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_nombre_paciente_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_nombre_paciente" type="radio" id="bo_nombre_paciente_2" name="bo_nombre_paciente" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_nombre_paciente_2">NN</label>
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
                                                                        <label class="form-label fw-bold text-primary">Intervención Quirúrgica<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_intervencion_quirurgica" type="radio" id="bo_intervencion_quirurgica_1" name="bo_intervencion_quirurgica" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_intervencion_quirurgica_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_intervencion_quirurgica" type="radio" id="bo_intervencion_quirurgica_2" name="bo_intervencion_quirurgica" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_intervencion_quirurgica_2">No</label>
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
                                                                        <label class="form-label fw-bold text-primary">Lado Intervención<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_lado_intervencion" type="radio" id="bo_lado_intervencion_1" name="bo_lado_intervencion" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_lado_intervencion_1">Izq.</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_lado_intervencion" type="radio" id="bo_lado_intervencion_2" name="bo_lado_intervencion" value="2">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_lado_intervencion_2">Der.</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_lado_intervencion" type="radio" id="bo_lado_intervencion_3" name="bo_lado_intervencion" value="3">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_lado_intervencion_3">No Aplica</label>
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
                                                                        <label class="form-label fw-bold text-primary">Pasos Crítico de Cirugía<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_pasos_criticos" type="radio" id="bo_pasos_criticos_1" name="bo_pasos_criticos" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_pasos_criticos_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_pasos_criticos" type="radio" id="bo_pasos_criticos_2" name="bo_pasos_criticos" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_pasos_criticos_2">No</label>
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
                                                                        <label class="form-label fw-bold text-primary">Riesgo Qco. y Anestésico<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_riesgo_q_a" type="radio" id="bo_riesgo_q_a_1" name="bo_riesgo_q_a" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_riesgo_q_a_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_riesgo_q_a" type="radio" id="bo_riesgo_q_a_2" name="bo_riesgo_q_a" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_riesgo_q_a_2">No</label>
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
                                                                    <div class="mb-3">
                                                                        <label for="tm_aprox_cirugia" class="form-label fw-bold text-primary">Tiempo Aprox. de Cirugía <span class="campo_requerido">*</span></label>
                                                                        <input type="time" class="form-control" id="tm_aprox_cirugia" v-model="tm_aprox_cirugia">
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
                                                                        <label class="form-label fw-bold text-primary">Eq. Anestesia<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_equipo_anestesia" type="radio" id="bo_equipo_anestesia_1" name="bo_equipo_anestesia" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_equipo_anestesia_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_equipo_anestesia" type="radio" id="bo_equipo_anestesia_2" name="bo_equipo_anestesia" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_equipo_anestesia_2">No</label>
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
                                                                        <label class="form-label fw-bold text-primary">Oximetro Puesto y funcionando<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_oximetro" type="radio" id="bo_oximetro_1" name="bo_oximetro" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_oximetro_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_oximetro" type="radio" id="bo_oximetro_2" name="bo_oximetro" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_oximetro_2">No</label>
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
                                                                        <label class="form-label fw-bold text-primary">Bandeja revisada por Anest<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_bandeja_revisada" type="radio" id="bo_bandeja_revisada_1" name="bo_bandeja_revisada" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_bandeja_revisada_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_bandeja_revisada" type="radio" id="bo_bandeja_revisada_2" name="bo_bandeja_revisada" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_bandeja_revisada_2">No</label>
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
                                                                        <label class="form-label fw-bold text-primary">Instrumental Estéril e Insumos<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_instrumental_esteril" type="radio" id="bo_instrumental_esteril_1" name="bo_instrumental_esteril" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_instrumental_esteril_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_instrumental_esteril" type="radio" id="bo_instrumental_esteril_2" name="bo_instrumental_esteril" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_instrumental_esteril_2">No</label>
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
                                                                        <label class="form-label fw-bold text-primary">Disponibilidad de Sangre<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_disponibilidad_sangre" type="radio" id="bo_disponibilidad_sangre_1" name="bo_disponibilidad_sangre" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_disponibilidad_sangre_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_disponibilidad_sangre" type="radio" id="bo_disponibilidad_sangre_2" name="bo_disponibilidad_sangre" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_disponibilidad_sangre_2">N/A</label>
                                                                    </div>
                                                                   
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                       
                                            </div>

                                            <!-- 4 -->
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <div class="mb-3">
                                                        <div class="card d-flex justify-content-center align-items-center">
                                                            <div class="card-body">
                                                                <div>
                                                                    <div>
                                                                        <label class="form-label fw-bold text-primary">Profilaxis ETE<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="gl_profilaxis_ete" type="radio" id="gl_profilaxis_ete_1" name="gl_profilaxis_ete" value="Medidas Antiembólicas">
                                                                        <label class="form-check-label fw-bold text-secondary" for="gl_profilaxis_ete_1">Medidas Antiembólicas</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="gl_profilaxis_ete" type="radio" id="gl_profilaxis_ete_2" name="gl_profilaxis_ete" value="Compresor Mecánico">
                                                                        <label class="form-check-label fw-bold text-secondary" for="gl_profilaxis_ete_2">Compresor Mecánico</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="gl_profilaxis_ete" type="radio" id="gl_profilaxis_ete_3" name="gl_profilaxis_ete" value="Medidas Antiembólicas - Compresor Mecánico">
                                                                        <label class="form-check-label fw-bold text-secondary radio-text" for="gl_profilaxis_ete_3">
                                                                            <div class="text-radios-xl">
                                                                                <div>Medidas Antiembólicas</div>  <div>- Compresor Mecánico</div>
                                                                            </div>
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="gl_profilaxis_ete" type="radio" id="gl_profilaxis_ete_4" name="gl_profilaxis_ete" value="No Aplica">
                                                                        <label class="form-check-label fw-bold text-secondary" for="gl_profilaxis_ete_4">N/A</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    
                                                    <div class="mb-3">
                                                        <div class="card d-flex justify-content-center align-items-center">
                                                            <div class="card-body">
                                                                <div>
                                                                    <div>
                                                                        <label class="form-label fw-bold text-primary">Biopsia<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_pausa_biopsia" type="radio" id="bo_pausa_biopsia_1" name="bo_pausa_biopsia" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_pausa_biopsia_1">Diferida</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_pausa_biopsia" type="radio" id="bo_pausa_biopsia_2" name="bo_pausa_biopsia" value="2">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_pausa_biopsia_2">Rápida</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_pausa_biopsia" type="radio" id="bo_pausa_biopsia_3" name="bo_pausa_biopsia" value="3">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_pausa_biopsia_3">Múltiple</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_pausa_biopsia" type="radio" id="bo_pausa_biopsia_4" name="bo_pausa_biopsia" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_pausa_biopsia_4">No</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                               
                                                </div>
                                                
                                            </div>

                                            <!-- 5 -->
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <div class="card d-flex justify-content-center align-items-center">
                                                            <div class="card-body">
                                                                <div>
                                                                    <div>
                                                                        <label class="form-label fw-bold text-primary">Profilaxis Antibiótica<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_profilaxis_antibiotica" type="radio" id="bo_profilaxis_antibiotica_1" name="bo_profilaxis_antibiotica" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_profilaxis_antibiotica_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_profilaxis_antibiotica" type="radio" id="bo_profilaxis_antibiotica_2" name="bo_profilaxis_antibiotica" value="2">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_profilaxis_antibiotica_2">No</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_profilaxis_antibiotica" type="radio" id="bo_profilaxis_antibiotica_3" name="bo_profilaxis_antibiotica" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_profilaxis_antibiotica_3">N/A</label>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-6">
                                                        <div class="card d-flex justify-content-center align-items-center">
                                                            <div class="card-body">
                                                                <div>
                                                                    <div>
                                                                        <label class="form-label fw-bold text-primary">Alergias<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_alergia" type="radio" id="bo_alergia_1" name="bo_alergia" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_alergia_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_alergia" type="radio" id="bo_alergia_2" name="bo_alergia" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_alergia_2">No</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                              
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <div class="card d-flex">
                                                            <div class="card-body">
                                                                <div class="mb-3">
                                                                    <label for="gl_alergeno" class="form-label fw-bold text-primary">Nombre del Alérgeno <span class="campo_requerido">*</span></label>
                                                                    <input type="text" class="form-control" id="gl_alergeno" v-model="gl_alergeno">
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
                                                        <label for="id_prevencion_caida" class="form-label fw-bold text-primary">Prevención de caídas <span class="campo_requerido">*</span></label>
                                                        <v-select v-model="id_prevencion_caida" :reduce="caida => caida.id" :options="prevencionesCaida" label="gl_nombre" id="id_prevencion_caida" placeholder="Seleccione Prevención Caida..."></v-select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="gl_prevencion_upp" class="form-label fw-bold text-primary">Prevención UPP <span class="campo_requerido">*</span></label>
                                                        <v-select v-model="gl_prevencion_upp" multiple :reduce="prev => prev.id" :options="optionsPrevencionUpp" label="gl_nombre" id="gl_prevencion_upp" placeholder="Seleccione Prevención Caida..."></v-select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="gl_observatm_profilaxis_antibioticacion" class="form-label fw-bold text-primary">Tiempo de Profilaxis Antibiótica<span class="campo_requerido">*</span></label>
                                                        <input type="time" class="form-control" id="tm_profilaxis_antibiotica" v-model="tm_profilaxis_antibiotica">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="tm_administracion" class="form-label fw-bold text-primary">Hora de Administración<span class="campo_requerido">*</span></label>
                                                        <input type="time" class="form-control" id="tm_administracion" v-model="tm_administracion">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 d-flex align-items-center badget-info">
                                                    <button type="button" class="btn btn-outline-danger" @click="resetearTM">Sin Profilaxis Antibiótica</button>
                                                    <!-- <span class="badge rounded-pill bg-danger">Sin Profilaxis Antibiótica</span> -->
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="gl_tipo_antibiotico" class="form-label fw-bold text-primary">Tipo Antibiótico<span class="campo_requerido">*</span></label>
                                                        <input type="text" class="form-control" id="gl_tipo_antibiotico" v-model="gl_tipo_antibiotico">
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
            titulo: 'Pausa Seguridad',
            id: '',
            id_enfermera_anestesia:'',
            id_solicitud: '',
            id_asignacion: '',
            optionsPrevencionUpp:[],
            solicitudPabellon: [],
            glBicOptions: [
                { text: 'PCA', value: 'PCA'},
                { text: 'BIC', value: 'BIC' },
                { text: 'No Amerita', value: 'No Amerita' }
            ],
            // radios

            bo_nombre_paciente: '',
            bo_intervencion_quirurgica: '',
            bo_lado_intervencion: '',
            bo_riesgo_q_a: '',
            bo_pasos_criticos: '',
            bo_equipo_anestesia: '',
            bo_oximetro: '',
            bo_bandeja_revisada: '',
            bo_instrumental_esteril: '',
            gl_profilaxis_ete: '',
            bo_pausa_biopsia: '',
            bo_profilaxis_antibiotica: '', 
            bo_alergia: '',
            gl_alergeno: '',
            id_prevencion_caida: '',
            gl_prevencion_upp:[],
            tm_profilaxis_antibiotica:'',
            tm_administracion:'',
            gl_tipo_antibiotico: '',
            bo_disponibilidad_sangre: '',
        }
    },
    methods: { 
        registrar(){
            var data = new FormData();
            data.append('id_solicitud', this.id_solicitud)  
            data.append('tm_aprox_cirugia',this.tm_aprox_cirugia)
            data.append('bo_bandeja_revisada',this.bo_bandeja_revisada)
            data.append('bo_nombre_paciente',this.bo_nombre_paciente)

            data.append('tm_administracion', this.tm_administracion)
            data.append('tm_aprox_cirugia',this.tm_aprox_cirugia)
            data.append('bo_bandeja_revisada',this.bo_bandeja_revisada)
            data.append('bo_nombre_paciente',this.bo_nombre_paciente)

            data.append('bo_intervencion_quirurgica', this.bo_intervencion_quirurgica) 
            data.append('bo_lado_intervencion', this.bo_lado_intervencion)
            data.append('bo_riesgo_q_a', this.bo_riesgo_q_a)
            data.append('bo_pasos_criticos', this.bo_pasos_criticos)
            data.append('bo_equipo_anestesia', this.bo_equipo_anestesia)
            data.append('bo_oximetro',this.bo_oximetro)
      
            data.append('bo_instrumental_esteril',this.bo_instrumental_esteril)
            data.append('gl_profilaxis_ete',this.gl_profilaxis_ete)
            data.append('bo_pausa_biopsia',this.bo_pausa_biopsia)
            data.append('bo_profilaxis_antibiotica',this.bo_profilaxis_antibiotica)
            if(this.bo_alergia!=null){
                data.append('bo_alergia',this.bo_alergia) 
            } 
            (this.gl_alergeno != 'null') ? data.append('gl_alergeno',this.gl_alergeno) : data.append('gl_alergeno','')  
            data.append('id_prevencion_caida',this.id_prevencion_caida)
            axios.post('/pausaSeguridad/registrar', data)
            .then(response => {
                console.log(response.data);
                if(response.data=='ok'){
                    $('#modalPausaSeguridad').modal('hide')
                    this.$toastr.success('¡Actualizada!', 'Pausa de seguridad actualizada correctamente');
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
            axios.post('/pausaSeguridad/get-info', data)
            .then(response => {
                console.log(response.data);
                const { prevencionesCaida, prevencionesUPP, solicitudPabellon } = response.data
                this.prevencionesCaida = prevencionesCaida
                this.optionsPrevencionUpp = prevencionesUPP
         
                this.tm_administracion = solicitudPabellon.pausa_seguridad.tm_administracion
                this.tm_aprox_cirugia = solicitudPabellon.pausa_seguridad.tm_aprox_cirugia
                this.bo_bandeja_revisada = solicitudPabellon.pausa_seguridad.bo_bandeja_revisada
                this.bo_nombre_paciente = solicitudPabellon.pausa_seguridad.bo_nombre_paciente

                this.tm_administracion = solicitudPabellon.pausa_seguridad.tm_administracion
                this.tm_aprox_cirugia = solicitudPabellon.pausa_seguridad.tm_aprox_cirugia
                this.bo_bandeja_revisada = solicitudPabellon.pausa_seguridad.bo_bandeja_revisada
                this.bo_nombre_paciente = solicitudPabellon.pausa_seguridad.bo_nombre_paciente

                this.bo_intervencion_quirurgica = solicitudPabellon.pausa_seguridad.bo_intervencion_quirurgica
                this.bo_lado_intervencion = solicitudPabellon.pausa_seguridad.bo_lado_intervencion
                this.bo_riesgo_q_a = solicitudPabellon.pausa_seguridad.bo_riesgo_q_a
                this.bo_pasos_criticos = solicitudPabellon.pausa_seguridad.bo_pasos_criticos
                this.bo_equipo_anestesia = solicitudPabellon.pausa_seguridad.bo_equipo_anestesia   
                this.bo_oximetro = solicitudPabellon.pausa_seguridad.bo_oximetro
      
                this.bo_instrumental_esteril = solicitudPabellon.pausa_seguridad.bo_instrumental_esteril
                this.gl_profilaxis_ete = solicitudPabellon.pausa_seguridad.gl_profilaxis_ete
                this.bo_pausa_biopsia = solicitudPabellon.pausa_seguridad.bo_pausa_biopsia
                this.bo_profilaxis_antibiotica = solicitudPabellon.pausa_seguridad.bo_profilaxis_antibiotica  
                this.bo_alergia = solicitudPabellon.pausa_seguridad.bo_alergia
                this.gl_alergeno = solicitudPabellon.pausa_seguridad.gl_alergeno
                this.id_prevencion_caida = solicitudPabellon.pausa_seguridad.id_prevencion_caida
                this.gl_prevencion_upp = solicitudPabellon.pausa_seguridad.gl_prevencion_upp.split(",").map(numero => parseInt(numero));
                this.tm_profilaxis_antibiotica = solicitudPabellon.pausa_seguridad.tm_profilaxis_antibiotica
                this.gl_tipo_antibiotico = solicitudPabellon.pausa_seguridad.gl_tipo_antibiotico
                this.bo_disponibilidad_sangre = solicitudPabellon.pausa_seguridad.bo_disponibilidad_sangre
            })
            .catch(error => {   
                console.error('Error: ', error);
            });
        },
        resetearTM(){
            $("#tm_profilaxis_antibiotica").val('00:00');
            $("#tm_administracion").val('00:00');
            $("#gl_tipo_antibiotico").val('Sin Profilaxis Antibiótica');
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
 
 .text-radios-xl{
    display: flex;
    justify-content: center;
    flex-direction: column;
 }
 .badget-info{
    margin-top: 1em;
 }
</style>