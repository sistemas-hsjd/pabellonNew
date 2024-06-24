<template>
    <div>
        <div class="modal fade" id="modalPrePausa" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalDetalleLabel" aria-hidden="true">
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

                                <hr>
                    
                                <!-- Entrada Servicio LISTO -->
                                <div class="card">
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="row mt-2">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="fc_ingreso_servicio" class="form-label fw-bold text-primary"> Entrada Servicio <span class="campo_requerido">*</span></label>
                                                        <input type="datetime-local" class="form-control" id="fc_ingreso_servicio" v-model="fc_ingreso_servicio">
                                                      
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="gl_aislamiento" class="form-label fw-bold text-primary">Aislamiento<span class="campo_requerido">*</span></label>
                                                        <v-select v-model="gl_aislamiento" multiple :reduce="aislamiento => aislamiento.value" :options="optionsAislamientos" label="text" id="gl_aislamiento" placeholder="Seleccione..."></v-select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <div>
                                                            <label class="form-label fw-bold text-primary">Brazalete <span class="campo_requerido">*</span></label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" v-model="bo_brazalete" type="radio" id="bo_brazalete_1" name="bo_brazalete" value="1">
                                                            <label class="form-check-label fw-bold text-secondary" for="bo_brazalete_1">Sí</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" v-model="bo_brazalete" type="radio" id="bo_brazalete_2" name="bo_brazalete" value="0">
                                                            <label class="form-check-label fw-bold text-secondary" for="bo_brazalete_2">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="id_servicio" class="form-label fw-bold text-primary">Servicio <span class="campo_requerido">*</span></label>
                                                        <v-select v-model="id_servicio" :reduce="unidad => unidad.id" :options="unidades" label="gl_nombre" id="id_servicio" placeholder="Seleccione..."></v-select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="gl_tabaco" class="form-label fw-bold text-primary">Tabaco <span class="campo_requerido">*</span></label>
                                                        <input type="text" class="form-control" id="gl_tabaco" v-model="gl_tabaco">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="gl_alcohol" class="form-label fw-bold text-primary">Alcohol <span class="campo_requerido">*</span></label>
                                                        <input type="text" class="form-control" id="gl_alcohol" v-model="gl_alcohol">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="gl_droga" class="form-label fw-bold text-primary">Droga <span class="campo_requerido">*</span></label>
                                                        <input type="text" class="form-control" id="gl_droga" v-model="gl_droga">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="gl_peso" class="form-label fw-bold text-primary">Peso <span class="campo_requerido">*</span></label>
                                                        <input type="text" class="form-control" id="gl_peso" v-model="gl_peso" placeholder="Ingrese dirección">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="gl_talla" class="form-label fw-bold text-primary">Talla <span class="campo_requerido">*</span></label>
                                                        <input type="text" class="form-control" id="gl_talla" v-model="gl_talla">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="gl_alergia" class="form-label fw-bold text-primary">Alergias <span class="campo_requerido">*</span></label>
                                                        <input type="text" class="form-control" id="gl_alergia" v-model="gl_alergia">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="gl_hgt" class="form-label fw-bold text-primary">HGT <span class="campo_requerido">*</span></label>
                                                        <input type="text" class="form-control" id="gl_hgt" v-model="gl_hgt">
                                                    </div>
                                                </div>
                                               
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- Riesgo de Hipertermia Maligna -->
                                <div class="card">
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-3 d-flex justify-content-center align-items-center">
                                                    <div class="mb-3">
                                                        <div>
                                                            <label for="bo_hipertermia" class="form-label fw-bold text-primary">Riesgo de Hipertermia Maligna* <span class="campo_requerido">*</span></label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" v-model="bo_hipertermia" type="radio" id="bo_hipertermia_1" name="bo_hipertermia" value="1">
                                                            <label class="form-check-label fw-bold text-secondary" for="bo_hipertermia_1">Sí</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" v-model="bo_hipertermia" type="radio" id="bo_hipertermia_2" name="bo_hipertermia" value="0">
                                                            <label class="form-check-label fw-bold text-secondary" for="bo_hipertermia_2">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 d-flex justify-content-center align-items-center">
                                                    <div class="mb-3 ">
                                                        <div>
                                                            <label class="form-label fw-bold text-primary">Cancer <span class="campo_requerido">*</span></label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" v-model="bo_cancer" type="radio" id="bo_cancer_1" name="bo_cancer" value="1">
                                                            <label class="form-check-label fw-bold text-secondary" for="bo_cancer_1">Sí</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" v-model="bo_cancer" type="radio" id="bo_cancer_2" name="bo_cancer" value="0">
                                                            <label class="form-check-label fw-bold text-secondary" for="bo_cancer_2">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5 d-flex justify-content-center align-items-center">
                                                    <div class="mb-3 ">
                                                        <div>
                                                            <label class="form-label fw-bold text-primary">Marcación <span class="campo_requerido">*</span></label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" v-model="id_marcacion" type="radio" id="id_marcacion_1" name="id_marcacion" value="1">
                                                            <label class="form-check-label fw-bold text-secondary" for="id_marcacion_1">Izquierdo</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" v-model="id_marcacion" type="radio" id="id_marcacion_2" name="id_marcacion" value="2">
                                                            <label class="form-check-label fw-bold text-secondary" for="id_marcacion_2">Derecho</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" v-model="id_marcacion" type="radio" id="id_marcacion_3" name="id_marcacion" value="3">
                                                            <label class="form-check-label fw-bold text-secondary" for="id_marcacion_3">Bilateral</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" v-model="id_marcacion" type="radio" id="id_marcacion_4" name="id_marcacion" value="4">
                                                            <label class="form-check-label fw-bold text-secondary" for="id_marcacion_4">No Aplica</label>
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
                                                    <label for="id_diagnostico_pre" class="form-label fw-bold text-primary mb-4">Diag. Pre-Operatorio (CIE10)<span class="campo_requerido">*</span></label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="gl_antecedente_morbido" class="form-label fw-bold text-primary mb-4">Antec. Mórbidos<span class="campo_requerido">*</span></label>
                                                </div>
                                                <!-- <div class="col-md-4">
                                               
                                                </div> -->
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <v-select v-model="id_diagnostico_pre" :reduce="diagnostico => diagnostico.id" :options="diagnosticos" id="id_diagnostico_pre" label="text" @search="fetchData"></v-select>                                               
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <textarea class="form-control" v-model="gl_antecedente_morbido" id="gl_antecedente_morbido" rows="3"></textarea>
                                                    </div>
                                                </div>
                                            
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="gl_antecedente_quirurgico" class="form-label fw-bold text-primary mb-4">Antec. Quirúrgicos<span  class="campo_requerido">*</span></label>
                                                        <textarea class="form-control" v-model="gl_antecedente_quirurgico" id="gl_antecedente_quirurgico" rows="3"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                   
                                                    <div class="mb-3">
                                                        <label for="gl_medicamento" class="form-label fw-bold text-primary mb-4">Medicamentos uso Habitual<span class="campo_requerido">*</span></label>
                                                        <textarea class="form-control" v-model="gl_medicamento" id="gl_alternativo" rows="3"></textarea>
                                                    </div>
                                                </div>
                                                
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- 1 list -->
                                <div class="card">
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <div class="card d-flex justify-content-center align-items-center">
                                                            <div class="card-body">
                                                                <div>
                                                                    <div>
                                                                        <label class="form-label fw-bold text-primary">Conciente<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_conciente" type="radio" id="bo_conciente_1" name="bo_conciente" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_conciente_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_conciente" type="radio" id="bo_conciente_2" name="bo_conciente" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_conciente_2">No</label>
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
                                                                        <label class="form-label fw-bold text-primary">Orientado<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_orientacion" type="radio" id="bo_orientacion_1" name="bo_orientacion" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_orientacion_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_orientacion" type="radio" id="bo_orientacion_2" name="bo_orientacion" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_orientacion_2">No</label>
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
                                                                        <label class="form-label fw-bold text-primary">En Ayunas<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_ayuna" type="radio" id="bo_ayuna_1" name="bo_ayuna" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_ayuna_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_ayuna" type="radio" id="bo_ayuna_2" name="bo_ayuna" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_ayuna_2">No</label>
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
                                                                        <label class="form-label fw-bold text-primary">Vía Venosa<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_via_venosa" type="radio" id="bo_via_venosa_1" name="bo_via_venosa" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_via_venosa_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_via_venosa" type="radio" id="bo_via_venosa_2" name="bo_via_venosa" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_via_venosa_2">No</label>
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

                                <!-- 2 list -->
                                <div class="card">
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <div class="card d-flex justify-content-center align-items-center">
                                                            <div class="card-body">
                                                                <div>
                                                                    <div>
                                                                        <label class="form-label fw-bold text-primary">Fleboclisis<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_fleboclisis" type="radio" id="bo_fleboclisis_1" name="bo_fleboclisis" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_menor_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_fleboclisis" type="radio" id="bo_fleboclisis_2" name="bo_fleboclisis" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_menor_2">No</label>
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
                                                                        <label class="form-label fw-bold text-primary">S.N.G.<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_sng" type="radio" id="bo_sng_1" name="bo_sng" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_sng_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_sng" type="radio" id="bo_sng_2" name="bo_sng" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_sng_2">No</label>
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
                                                                        <label class="form-label fw-bold text-primary">S. Folley<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_folley" type="radio" id="bo_folley_1" name="bo_folley" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_folley_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_folley" type="radio" id="bo_folley_2" name="bo_folley" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_folley_2">No</label>
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
                                                                        <label class="form-label fw-bold text-primary">E.K.G.<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_ekg" type="radio" id="bo_ekg_1" name="bo_ekg" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_ekg_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_ekg" type="radio" id="bo_ekg_2" name="bo_ekg" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_ekg_2">No</label>
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

                                <!-- 3 list -->
                                <div class="card">
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <div class="card d-flex justify-content-center align-items-center">
                                                            <div class="card-body">
                                                                <div>
                                                                    <div>
                                                                        <label class="form-label fw-bold text-primary">TQT Permeable<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_tqt_permeable" type="radio" id="bo_tqt_permeable_1" name="bo_tqt_permeable" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_menor_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_tqt_permeable" type="radio" id="bo_tqt_permeable_2" name="bo_tqt_permeable" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_tqt_permeable_2">No</label>
                                                                    </div> 
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_tqt_permeable" type="radio" id="bo_tqt_permeable_3" name="bo_tqt_permeable" value="2">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_tqt_permeable_3">No Aplica</label>
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
                                                                        <label class="form-label fw-bold text-primary">Cortar Vello<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_cortar_vello" type="radio" id="bo_cortar_vello_1" name="bo_cortar_vello" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_cortar_vello_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_cortar_vello" type="radio" id="bo_cortar_vello_2" name="bo_cortar_vello" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_cortar_vello_2">No</label>
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
                                                                        <label class="form-label fw-bold text-primary">Clasificación SG<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_calificacion_sg" type="radio" id="bo_calificacion_sg_1" name="bo_calificacion_sg" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_calificacion_sg_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_calificacion_sg" type="radio" id="bo_calificacion_sg_2" name="bo_calificacion_sg" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_calificacion_sg_2">No</label>
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
                                                                        <label class="form-label fw-bold text-primary">Ficha<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_ficha" type="radio" id="bo_ficha_1" name="bo_ficha" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_ficha_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_ficha" type="radio" id="bo_ficha_2" name="bo_ficha" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_ficha_2">No</label>
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

                                <!-- 4 list -->
                                <div class="card">
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <div class="card d-flex justify-content-center align-items-center">
                                                            <div class="card-body">
                                                                <div>
                                                                    <div>
                                                                        <label class="form-label fw-bold text-primary">Consentimiento Inf.<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_consentimiento_informado" type="radio" id="bo_consentimiento_informado_1" name="bo_consentimiento_informado" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_consentimiento_informado_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_consentimiento_informado" type="radio" id="bo_consentimiento_informado_2" name="bo_consentimiento_informado" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_consentimiento_informado_2">No</label>
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
                                                                        <label class="form-label fw-bold text-primary">Rayos X<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_rayos_x" type="radio" id="bo_rayos_x_1" name="bo_menor" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_rayos_x_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_rayos_x" type="radio" id="bo_rayos_x_2" name="bo_menor" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_rayos_x_2">No</label>
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
                                                                        <label class="form-label fw-bold text-primary">Eco-scanner<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_eco_scanner" type="radio" id="bo_eco_scanner_1" name="bo_eco_scanner" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_eco_scanner_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_eco_scanner" type="radio" id="bo_eco_scanner_2" name="bo_eco_scanner" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_eco_scanner_2">No</label>
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
                                                                        <label class="form-label fw-bold text-primary">Alergia a medio contraste<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_alergia_medio_contraste" type="radio" id="bo_alergia_medio_contraste_1" name="bo_alergia_medio_contraste" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_alergia_medio_contraste_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_alergia_medio_contraste" type="radio" id="bo_alergia_medio_contraste_2" name="bo_alergia_medio_contraste" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_alergia_medio_contraste_2">No</label>
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

                                <!-- 5 -->
                                <div class="card">
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <div class="card d-flex justify-content-center align-items-center">
                                                            <div class="card-body">
                                                                <div>
                                                                    <div>
                                                                        <label class="form-label fw-bold text-primary">Prótesis Dental<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_protesis_dental" type="radio" id="bo_protesis_dental_1" name="bo_protesis_dental" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_protesis_dental_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_protesis_dental" type="radio" id="bo_protesis_dental_2" name="bo_protesis_dental" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_protesis_dental_2">No</label>
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
                                                                    <label class="form-label fw-bold text-primary">Prótesis Dental<span class="campo_requerido">*</span></label>
                                                                    <input type="text" class="form-control" id="gl_protesis_dental" v-model="gl_protesis_dental">
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
                                                                    <label class="form-label fw-bold text-primary">P/A<span class="campo_requerido">*</span></label>
                                                                    <input type="text" class="form-control" id="gl_presion_arterial" v-model="gl_presion_arterial">
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
                                                                    <label class="form-label fw-bold text-primary">Pulso<span class="campo_requerido">*</span></label>
                                                                    <input type="text" class="form-control" id="gl_pulso" v-model="gl_pulso">
                                                                </div>
                                                            </div>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- 6 -->
                                <div class="card">
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <div class="card d-flex justify-content-center align-items-center">
                                                            <div class="card-body">
                                                                <div>
                                                                    <div>
                                                                        <label class="form-label fw-bold text-primary">Piel Sana<span class="campo_requerido">*</span></label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_piel_sana" type="radio" id="bo_piel_sana_1" name="bo_piel_sana" value="1">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_piel_sana_1">Sí</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" v-model="bo_piel_sana" type="radio" id="bo_piel_sana_2" name="bo_piel_sana" value="0">
                                                                        <label class="form-check-label fw-bold text-secondary" for="bo_piel_sana_2">No</label>
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
                                                                    <label for="gl_piel_sana" class="form-label fw-bold text-primary">Piel Sana<span class="campo_requerido">*</span></label>
                                                                    <input type="text" class="form-control" id="gl_piel_sana" v-model="gl_piel_sana">
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
                                                                        <label for="gl_temperatura" class="form-label fw-bold text-primary">T°<span class="campo_requerido">*</span></label>
                                                                        <input type="text" class="form-control" id="gl_temperatura" v-model="gl_temperatura">
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
                                                                        <label for="gl_saturacion" class="form-label fw-bold text-primary">SAT. O2<span class="campo_requerido">*</span></label>
                                                                        <input type="text" class="form-control" id="gl_saturacion" v-model="gl_saturacion">
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
                                                <div class="col-md-9">
                                                    <div class="mb-3">
                                                        <label for="gl_examen" class="form-label fw-bold text-primary">Exámenes<span class="campo_requerido">*</span></label>
                                                        <textarea v-model="gl_examen" class="form-control" id="gl_examen" rows="3"></textarea>
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
                        <a :href="'http://10.6.3.43/pabellon/pausa/pdf/pre_info/'+id_solicitud" class="btn btn-outline-secondary" target="_blank"><strong>Hoja Información Paciente</strong> </a>
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button> -->
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
            titulo: 'Ingreso de Enfermería',
            id: '',
            id_solicitud: '',
            id_asignacion: '',
            unidades: [],
            pausaPre: [],
            diagnosticos:[],
            // inicio del formulario
            fc_ingreso_servicio:'',
            gl_aislamiento: [],

            optionsAislamientos: [
                { text: 'Contacto', value: 'Contacto'},
                { text: 'Gotitas', value: 'Gotitas' },
                { text: 'Aéreo', value: 'Aéreo' },
                { text: 'No', value: 'No' }
            ],
            bo_brazalete: '',
            id_servicio: '',
            gl_tabaco: '',
            gl_alcohol: '',
            gl_droga: '',
            gl_peso: '',
            gl_talla:'',
            gl_hgt:'',
            gl_alergia: '',
            // segundo form
            bo_hipertermia: '',
            bo_cancer: '',
            id_marcacion: '',
            gl_antecedente_quirurgico: '',
            id_diagnostico_pre: '',
            gl_antecedente_morbido: '',
            gl_medicamento: '', 
            bo_conciente: '',
            bo_orientacion: '',
            bo_ayuna: '',
            bo_via_venosa: '',
            bo_fleboclisis:'',
            bo_sng: '', 
            bo_folley: '',
            bo_ekg: '',
            bo_cortar_vello: '',
            bo_calificacion_sg: '',
            bo_ficha: '',
            bo_consentimiento_informado: '',
            bo_rayos_x: '',
            bo_eco_scanner: '',
            bo_alergia_medio_contraste: '',
            bo_protesis_dental: '', 
            gl_protesis_dental: '',
            gl_presion_arterial: '',
            gl_pulso: '',
            bo_piel_sana: '',
            gl_piel_sana: '',
            gl_temperatura: '',
            gl_saturacion: '',
            gl_examen: '',
            bo_tqt_permeable: '',
        }
    },
    methods: { 
        registrar(){
            var data = new FormData();
            data.append('id_solicitud', this.id_solicitud)
            data.append('bo_brazalete', this.bo_brazalete)
            data.append('fc_ingreso_servicio', this.fc_ingreso_servicio)
            data.append('id_servicio', this.id_servicio)
            data.append('gl_aislamiento', this.gl_aislamiento)
            data.append('gl_tabaco', this.gl_tabaco)
            data.append('gl_alcohol', this.gl_alcohol)
            data.append('gl_peso', this.gl_peso)
            data.append('gl_talla', this.gl_talla)
            data.append('gl_alergia', this.gl_alergia)
            data.append('gl_hgt', this.gl_hgt)
            data.append('bo_cancer', this.bo_cancer)
            data.append('bo_hipertermia', this.bo_hipertermia)
            data.append('id_marcacion', this.id_marcacion)
            data.append('id_diagnostico_pre', this.id_diagnostico_pre)
            data.append('gl_antecedente_morbido', this.gl_antecedente_morbido)
            data.append('gl_antecedente_quirurgico', this.gl_antecedente_quirurgico)
            data.append('gl_medicamento', this.gl_medicamento)
            // radios
            data.append('gl_medicamento', this.gl_medicamento)
            data.append('bo_orientacion', this.bo_orientacion)
            data.append('bo_ayuna', this.bo_ayuna)
            data.append('bo_via_venosa', this.bo_via_venosa)
            data.append('bo_fleboclisis', this.bo_fleboclisis)
            data.append('bo_sng', this.bo_sng)
            data.append('bo_folley', this.bo_folley)
            data.append('bo_ekg', this.bo_ekg)
            data.append('bo_tqt_permeable', this.bo_tqt_permeable)
            data.append('bo_cortar_vello',  this.bo_cortar_vello)
            data.append('bo_calificacion_sg', this.bo_calificacion_sg)
            data.append('bo_ficha', this.bo_ficha)
            data.append('bo_consentimiento_informado', this.bo_consentimiento_informado)
            data.append('bo_rayos_x', this.bo_rayos_x)
            data.append('bo_eco_scanner', this.bo_eco_scanner)
            if( this.bo_alergia_medio_contraste != null) {
                data.append('bo_alergia_medio_contraste', this.bo_alergia_medio_contraste)
            }
            data.append('bo_protesis_dental', this.bo_protesis_dental)
            data.append('gl_protesis_dental', this.gl_protesis_dental)
            data.append('gl_presion_arterial', this.gl_presion_arterial)
            data.append('gl_pulso', this.gl_pulso)
            data.append('bo_piel_sana', this.bo_piel_sana)
            data.append('gl_piel_sana', this.gl_piel_sana)
            data.append('gl_temperatura', this.gl_temperatura)
            data.append('gl_saturacion', this.gl_saturacion)
            data.append('gl_examen', this.gl_examen)    
            axios.post('/pausaPre/registrar',data)
            .then(response => {
                console.log(response.data);
                if(response.data=='ok'){
                    $('#modalPrePausa').modal('hide')
                    this.$toastr.success('¡Actualizada!', 'Pausa Pre Actualizada correctamente');
                }
            })
            .catch(error => {
                console.error('Error: ', error);
            });
        },
        getInfo(id, solicitud_id){
            this.id_solicitud = solicitud_id
            var data = new FormData();
            data.append('id', solicitud_id);
            axios.post('/pausaPre/get-info', data)
            .then(response => {
                this.unidades = response.data.unidades
                this.pausaPre = response.data.SolicitudPabellon.pausa_pre
                console.log( this.pausaPre );
                this.bo_brazalete = this.pausaPre.bo_brazalete
                this.fc_ingreso_servicio = this.pausaPre.fc_ingreso_servicio
            
                // this.getCurrentDateTime()
                this.id_servicio = this.pausaPre.id_servicio
                this.gl_aislamiento = this.pausaPre.gl_aislamiento
                this.gl_tabaco = this.pausaPre.gl_tabaco
                this.gl_alcohol = this.pausaPre.gl_alcohol
                this.gl_droga = this.pausaPre.gl_droga
                this.gl_peso = this.pausaPre.gl_peso
                this.gl_talla = this.pausaPre.gl_talla
                this.gl_alergia = this.pausaPre.gl_alergia
                this.gl_hgt = this.pausaPre.gl_hgt
                this.bo_cancer = this.pausaPre.bo_cancer
                this.bo_hipertermia = this.pausaPre.bo_hipertermia
                this.id_marcacion = this.pausaPre.id_marcacion
                this.id_diagnostico_pre = this.pausaPre.id_diagnostico_pre
                this.traerDiagnostico( this.id_diagnostico_pre )
                this.gl_antecedente_morbido = this.pausaPre.gl_antecedente_morbido
                this.gl_antecedente_quirurgico = this.pausaPre.gl_antecedente_quirurgico
                this.gl_medicamento = this.pausaPre.gl_medicamento

                // radios
                this.bo_conciente = this.pausaPre.bo_conciente
                this.bo_orientacion = this.pausaPre.bo_orientacion
                this.bo_ayuna = this.pausaPre.bo_ayuna
                this.bo_via_venosa = this.pausaPre.bo_via_venosa
                this.bo_fleboclisis = this.pausaPre.bo_fleboclisis
                this.bo_sng = this.pausaPre.bo_sng
                this.bo_folley = this.pausaPre.bo_folley
                this.bo_ekg = this.pausaPre.bo_ekg
                this.bo_tqt_permeable = this.pausaPre.bo_tqt_permeable
                this.bo_cortar_vello = this.pausaPre.bo_cortar_vello
                this.bo_calificacion_sg = this.pausaPre.bo_calificacion_sg
                this.bo_ficha = this.pausaPre.bo_ficha
                this.bo_consentimiento_informado = this.pausaPre.bo_consentimiento_informado
                this.bo_rayos_x = this.pausaPre.bo_rayos_x
                this.bo_eco_scanner = this.pausaPre.bo_eco_scanner
                this.bo_alergia_medio_contraste = this.pausaPre.bo_alergia_medio_contraste
                this.bo_protesis_dental = this.pausaPre.bo_protesis_dental
                
                this.gl_protesis_dental = this.pausaPre.gl_protesis_dental
                this.gl_presion_arterial = this.pausaPre.gl_presion_arterial
                this.gl_pulso = this.pausaPre.gl_pulso
                this.bo_piel_sana = this.pausaPre.bo_piel_sana
                this.gl_piel_sana = this.pausaPre.gl_piel_sana
                this.gl_temperatura = this.pausaPre.gl_temperatura
                this.gl_saturacion = this.pausaPre.gl_saturacion
                this.gl_examen = this.pausaPre.gl_examen
            })
            .catch(error => {
                console.error('Error: ', error);
            });
        },
        limpiar(){
            this.bo_menor = '';
            this.bo_imposibilitado = '';
            this.gl_nombre_representante = '';
            this.gl_rut_representante = '';
            this.gl_telefono_representante = '';
            this.gl_domicilio_representante = '';
            this.gl_diagnostico = '';
            this.gl_procedimiento = '';
            this.gl_parentesco_representante ='';s
            this.gl_objetivo = '';
            this.gl_riesgo = '';
            this.gl_alternativo = '';
        },
        getCurrentDateTime() {
            const now = new Date();
            // Formatea la fecha y hora en el formato requerido para el input de tipo datetime-local
            const formattedDateTime = now.toISOString().slice(0, 16);
            return formattedDateTime;
        },
        fetchData(search) {
            var data = new FormData();
            data.append('search', search);
            axios.post(`/api/get-diagnosticos`, data)
            .then(response => {    
                this.diagnosticos = response.data.results;
               
                console.log(response.data);
            })
            .catch(error => {
                console.error('Error al obtener datos:', error);
            });
        },
        traerDiagnostico(id){
            var data = new FormData();
            data.append('id', id);
            axios.post(`/api/get-diagnosto-id`, data)
            .then(response => {    
                this.diagnosticos = response.data.results;
            })
            .catch(error => {
                console.error('Error al obtener datos:', error);
            });
        }
    }, 
    computed:{
    },
    setup() {

    },
    mounted() {    
        // this.fetchData(null)
        
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