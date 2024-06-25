<template>
    <div>
      
        <div class="modal fade" id="modalDetalle" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalDetalleLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDetalleLabel">{{ titulo }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                   <div v-if="data.length != 0" class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              <strong>Paciente ID: {{ data.solicitudPabellon.paciente.id }}</strong>
                            </button>
                        </h2>
                        <!-- paciente -->
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">
                           
                                    <div class="col-md-4">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><strong>RUN:</strong> {{ paciente.run }} </li>
                                            <li class="list-group-item"><strong>Ficha:</strong> {{ paciente.ficha }}</li>
                                            <li class="list-group-item d-flex "><strong>Previsión:</strong>  {{ paciente.prevision }} </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><strong>Nombre:</strong>  {{ paciente.nombre }} </li>
                                            <li class="list-group-item"><strong>Sexo:</strong> {{ paciente.sexo }} </li>
                                            <li class="list-group-item"><strong>Dirección:</strong>{{ paciente.direccion }}</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><strong>Fecha de Nacimiento:</strong> {{ paciente.fechaNacimiento }}</li>
                                            <li class="list-group-item"><strong>Edad:</strong> {{ paciente.edad }} años</li>
                                            <li class="list-group-item"><strong>Teléfono:</strong> {{ paciente.telefono }}</li>
                                        </ul>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                               <strong>Solicitud de Intervencion ({{ solicitudPabellon.id }}) </strong>
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-md-4">
             
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item" v-if="solicitudPabellon.desvincular">
                                                <strong>Motivo de Suspención: </strong>{{solicitudPabellon.desvincular.gl_motivo}}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Re-Intervención: </strong>{{solicitudPabellon.re_intervencion}}<br>
                                            </li>
                                            <li class="list-group-item">
                                                 <strong>Unidad Demandante: </strong>{{solicitudPabellon.unidad.gl_nombre}}
                                            </li>
                                            <li class="list-group-item">
                                                 <strong>Fecha/Tiempo Estimado: </strong>{{solicitudPabellon.fc_intervencion}} {{solicitudPabellon.tm_estimado}}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Medico Solicitante: </strong>{{solicitudPabellon.medico.nombre}}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Tipo Intervención: </strong>{{solicitudPabellon.gl_tipo_intervencion}}
                                            </li>
                                            <li class="list-group-item">
                                               <strong>Equipo Quirúrgico: </strong>{{solicitudPabellon.equipo_medico.gl_descripcion}}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <strong>Lista Espera: </strong>{{ solicitudPabellon.lista_espera }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Sala: </strong>{{ solicitudPabellon.gl_sala }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Pabellón: </strong>{{ solicitudPabellon.auge }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Lado: </strong>{{ solicitudPabellon.gl_lado }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Sangre: </strong>{{ solicitudPabellon.sangre }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Radiología: </strong>{{ solicitudPabellon.radiologia }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Cie10: </strong>{{ solicitudPabellon.cie10.gl_glosa }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                 <strong>AUGE: </strong>{{ solicitudPabellon.auge }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Cama: </strong>{{ solicitudPabellon.gl_cama }}
                                            </li>
                                            <li class="list-group-item">
                                                  <strong>Fecha Ingreso: </strong> {{ solicitudPabellon.fc_ingreso }}
                                            </li>
                                            <li class="list-group-item">
                                                 <strong>Cancer: </strong>{{ solicitudPabellon.cancer }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Cama Critica: </strong>{{ solicitudPabellon.cama_critica }}
                                            </li>
                                            <li class="list-group-item">
                                               <strong>Alergia al Látex: </strong>{{ solicitudPabellon.latex }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <strong>Intervenciones</strong>
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Código Fonasa</th>
                                            <th scope="col">Glosa Fonasa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(item, index) in solicitudPabellon.prestaciones" :key="index">
                                            <th scope="row">
                                                {{ item.prs_cod }}
                                            </th>
                                            <td>
                                                {{ item.prs_desc }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" v-if="solicitudPabellon.equipo.length>0">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                <strong>Equipo Médico</strong>
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse show" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Cargo</th>
                                            <th scope="col">Nombre</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(item, index) in solicitudPabellon.equipo" :key="index">
                                            <th scope="row">
                                                {{ item.labor.cod_des }}
                                            </th>
                                            <td>
                                                {{ item.medico.nombre }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Datos de Asignación -->
                    <div class="accordion-item" v-if="solicitudPabellon.asignacion">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                <strong>Datos de Asignación</strong>
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse show" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item" v-if="solicitudPabellon.asignacion.bo_condicional != 0">
                                                <strong>Intervención Condicional por: </strong> 
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Sala Pabellón: </strong>{{ solicitudPabellon.asignacion.nr_pabellon.gl_nombre }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Inicio de Intervención: </strong> {{ solicitudPabellon.asignacion.fc_inicio }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item" v-if="solicitudPabellon.asignacion.bo_condicional != 0">
                                                <strong>Intervención Condicional por: </strong> 
                                            </li>
                                            <li class="list-group-item">
                                                 <strong>Tiempo Asignado: </strong>{{ solicitudPabellon.tm_estimado }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Termino de Intervención: </strong>{{ solicitudPabellon.asignacion.fc_termino }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                     <!-- Datos de protocolo -->
                    <div class="accordion-item" v-if="solicitudPabellon.protocolo">
                        <h2 class="accordion-header" id="headingProtocolos">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseProtocolo" aria-expanded="false" aria-controls="collapseProtocolo">
                                <strong>Datos Protocolo ({{ solicitudPabellon.protocolo.id }})</strong>
                            </button>
                        </h2>
                        <div id="collapseProtocolo" class="accordion-collapse collapse" aria-labelledby="headingProtocolos" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <div class="d-flex flex-row-reverse bd-highlight">
                                            <button type="button" class="btn btn-primary btn-sm ms-1">Small button</button>
                                            <button type="button" class="btn btn-secondary btn-sm">Small button</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <strong>Cirujano: </strong>{{ solicitudPabellon.protocolo.medico.nombre }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Pabellón: </strong>{{ solicitudPabellon.asignacion.pabellon.nombre }}
                                            </li>
                                            <li class="list-group-item">
                                              <strong>Diagnostico Pre-Operatorio Cie10: </strong>{{ solicitudPabellon.protocolo.cie10pre.gl_glosa }}
                                            </li>
                                            <li class="list-group-item">
                                               <strong>Diagnostico Pre-Operatorio: </strong>{{ solicitudPabellon.protocolo.gl_diagnostico_pre }}
                                            </li>
                                            <li class="list-group-item">
                                               <strong>Diagnostico Post-Operatorio Cie10: </strong>{{ solicitudPabellon.protocolo.cie10post.gl_glosa }}
                                            </li>
                                            <li class="list-group-item">
                                               <strong>Diagnostico Post-Operatorio: </strong>{{ solicitudPabellon.protocolo.gl_diagnostico_post }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Fecha (Entrada Pabellón): </strong>{{ solicitudPabellon.protocolo.fc_entrada_pabellon }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Sala: </strong>{{ solicitudPabellon.asignacion.nr_pabellon.gl_nombre }}
                                            </li>
                                        </ul>
                                    </div>
                                  
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <!-- Datos pausas -->
                    <div class="accordion-item" v-if="solicitudPabellon.id_estado==3 || solicitudPabellon.id_estado==2">
                        <h2 class="accordion-header" id="headingPausas">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePausa" aria-expanded="false" aria-controls="collapsePausa">
                                <strong>Datos Pausas</strong>
                            </button>
                        </h2>
                        <div id="collapsePausa" class="accordion-collapse collapse" aria-labelledby="headingPausas" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
    
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Pausa</th>
                                            <th scope="col">Opciones</th>
                                        </tr>
                                    </thead>
                                <tbody>

                                    <!-- pre-operatorio -->
                                    <tr>
                                        <th scope="row">  {{ solicitudPabellon.id_pabellon == 1 ? 'Pre-Operatorio' : 'Ingreso de Enfermería' }} 
                                            <i v-if="solicitudPabellon.pausa_pre" class="fas fa-check" style="color: green"></i>
                                            <i v-else class="fas fa-times" style="color: red"></i>
                                        </th> 
                                        <td v-if="!solicitudPabellon.pausa_pre">  
                                            <div class="flex align-items-center list-user-action"> 
                                                <!-- @if (in_array(351, Session::get('opciones'))) -->
                                                
                                                <a class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip" data-bs-placement="top" :href="`http://10.6.3.43/pabellon/buscar_ficha/pdf_pausa/pre/${solicitudPabellon.id}/${solicitudPabellon.asignacion.id}`" aria-label="Add" data-bs-original-title="Add" >
                                                    <span class="btn-inner">
                                                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.87651 15.2063C6.03251 15.2063 2.74951 15.7873 2.74951 18.1153C2.74951 20.4433 6.01251 21.0453 9.87651 21.0453C13.7215 21.0453 17.0035 20.4633 17.0035 18.1363C17.0035 15.8093 13.7415 15.2063 9.87651 15.2063Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.8766 11.886C12.3996 11.886 14.4446 9.841 14.4446 7.318C14.4446 4.795 12.3996 2.75 9.8766 2.75C7.3546 2.75 5.3096 4.795 5.3096 7.318C5.3006 9.832 7.3306 11.877 9.8456 11.886H9.8766Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M19.2036 8.66919V12.6792" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M21.2497 10.6741H17.1597" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>                                        
                                                    </span>
                                                </a>
                                               
                                            </div>
                                        </td>
                                        <td v-else>  
                                            <div class="flex align-items-center list-user-action ms-1">
                                                <a class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip" data-bs-placement="top" :href="`http://10.6.3.43/pabellon/buscar_ficha/pdf_pausa/pre/${solicitudPabellon.id}/${solicitudPabellon.asignacion.id}`" target="_blank" aria-label="Add" data-bs-original-title="Add">
                                                    <span class="btn-inner">
                                                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.7379 2.76175H8.08493C6.00493 2.75375 4.29993 4.41175 4.25093 6.49075V17.2037C4.20493 19.3167 5.87993 21.0677 7.99293 21.1147C8.02393 21.1147 8.05393 21.1157 8.08493 21.1147H16.0739C18.1679 21.0297 19.8179 19.2997 19.8029 17.2037V8.03775L14.7379 2.76175Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M14.4751 2.75V5.659C14.4751 7.079 15.6231 8.23 17.0431 8.234H19.7981" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M14.2882 15.3584H8.88818" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M12.2432 11.606H8.88721" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>                                                                   
                                                    </span>
                                                </a>
                                                <a class="btn btn-sm btn-icon btn-warning ms-1" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Edit" data-bs-original-title="Edit" @click="editar('pausaPre',solicitudPabellon.pausa_pre.id)">
                                                    <span class="btn-inner">
                                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                    </span>
                                                </a>
                                                <a class="btn btn-sm btn-icon btn-danger ms-1" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Delete" data-bs-original-title="Delete" @click="eliminarPausaPre(solicitudPabellon.pausa_pre.id)">
                                                    <span class="btn-inner">
                                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                                        <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                    </span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    <!-- Chequeo Pabellón -->
                                    <tr>
                                        <th scope="row">  Chequeo Pabellón
                                            <i v-if="solicitudPabellon.pausa_pabellon" class="fas fa-check" style="color: green"></i>
                                            <i v-else class="fas fa-times" style="color: red"></i>
                                        </th>
                                       
                                        <td v-if="!solicitudPabellon.pausa_pabellon">  
                                            <div class="flex align-items-center list-user-action">
                                                <!-- @if (in_array(900, Session::get('opciones')) || (in_array(351, Session::get('opciones')) && $solicitudPabellon->pausaPre)) -->
                                                
                                                <a class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Add" data-bs-original-title="Add">
                                                    <span class="btn-inner">
                                                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.87651 15.2063C6.03251 15.2063 2.74951 15.7873 2.74951 18.1153C2.74951 20.4433 6.01251 21.0453 9.87651 21.0453C13.7215 21.0453 17.0035 20.4633 17.0035 18.1363C17.0035 15.8093 13.7415 15.2063 9.87651 15.2063Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.8766 11.886C12.3996 11.886 14.4446 9.841 14.4446 7.318C14.4446 4.795 12.3996 2.75 9.8766 2.75C7.3546 2.75 5.3096 4.795 5.3096 7.318C5.3006 9.832 7.3306 11.877 9.8456 11.886H9.8766Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M19.2036 8.66919V12.6792" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M21.2497 10.6741H17.1597" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>                                        
                                                    </span>
                                                </a>
                                            </div>
                                        </td>
                                        <td v-else>
                                            <div class="flex align-items-center list-user-action ms-1">
                                                <a class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Add" data-bs-original-title="Add">
                                                    <span class="btn-inner">
                                                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M14.7379 2.76175H8.08493C6.00493 2.75375 4.29993 4.41175 4.25093 6.49075V17.2037C4.20493 19.3167 5.87993 21.0677 7.99293 21.1147C8.02393 21.1147 8.05393 21.1157 8.08493 21.1147H16.0739C18.1679 21.0297 19.8179 19.2997 19.8029 17.2037V8.03775L14.7379 2.76175Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M14.4751 2.75V5.659C14.4751 7.079 15.6231 8.23 17.0431 8.234H19.7981" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M14.2882 15.3584H8.88818" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M12.2432 11.606H8.88721" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                                                                   
                                                    </span>
                                                </a>
                                                <a class="btn btn-sm btn-icon btn-warning ms-1" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Edit" data-bs-original-title="Edit" @click="editar('chequeoPabellon', solicitudPabellon.pausa_pabellon.id)">
                                                    <span class="btn-inner">
                                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                    </span>
                                                </a>
                                                <a class="btn btn-sm btn-icon btn-danger ms-1" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Delete" data-bs-original-title="Delete" @click="eliminarPausaPabellon(solicitudPabellon.pausa_pabellon.id)">
                                                    <span class="btn-inner">
                                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                                        <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                    </span>
                                                </a>
                                            </div>

                                        </td>
                                    </tr>

                                    <!-- Chequeo Anestesia -->
                                    <tr>
                                        <th scope="row">  Chequeo Anestesia
                                            <i v-if="solicitudPabellon.pausa_anestesia" class="fas fa-check" style="color: green"></i>
                                            <i v-else class="fas fa-times" style="color: red"></i>
                                        </th>
                                       
                                        <td v-if="!solicitudPabellon.pausa_anestesia">  
                                            <div class="flex align-items-center list-user-action">
                                                <!-- @if (in_array(351, Session::get('opciones'))) -->
                                                
                                                <a class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Add" data-bs-original-title="Add">
                                                    <span class="btn-inner">
                                                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.87651 15.2063C6.03251 15.2063 2.74951 15.7873 2.74951 18.1153C2.74951 20.4433 6.01251 21.0453 9.87651 21.0453C13.7215 21.0453 17.0035 20.4633 17.0035 18.1363C17.0035 15.8093 13.7415 15.2063 9.87651 15.2063Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.8766 11.886C12.3996 11.886 14.4446 9.841 14.4446 7.318C14.4446 4.795 12.3996 2.75 9.8766 2.75C7.3546 2.75 5.3096 4.795 5.3096 7.318C5.3006 9.832 7.3306 11.877 9.8456 11.886H9.8766Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M19.2036 8.66919V12.6792" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M21.2497 10.6741H17.1597" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>                                        
                                                    </span>
                                                </a>
                                            </div>
                                        </td>
                                        <td v-else>
                                            <div class="flex align-items-center list-user-action ms-1">
                                                <a class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Add" data-bs-original-title="Add">
                                                    <span class="btn-inner">
                                                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M14.7379 2.76175H8.08493C6.00493 2.75375 4.29993 4.41175 4.25093 6.49075V17.2037C4.20493 19.3167 5.87993 21.0677 7.99293 21.1147C8.02393 21.1147 8.05393 21.1157 8.08493 21.1147H16.0739C18.1679 21.0297 19.8179 19.2997 19.8029 17.2037V8.03775L14.7379 2.76175Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M14.4751 2.75V5.659C14.4751 7.079 15.6231 8.23 17.0431 8.234H19.7981" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M14.2882 15.3584H8.88818" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M12.2432 11.606H8.88721" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                                                                   
                                                    </span>
                                                </a>
                                                <a class="btn btn-sm btn-icon btn-warning ms-1" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Edit" data-bs-original-title="Edit" @click="editar('chequeoAnestesia', solicitudPabellon.pausa_anestesia.id)">
                                                    <span class="btn-inner">
                                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                    </span>
                                                </a>
                                                <a class="btn btn-sm btn-icon btn-danger ms-1" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Delete" data-bs-original-title="Delete" @click="eliminarPausaAnestesia(solicitudPabellon.pausa_anestesia.id)">
                                                    <span class="btn-inner">
                                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                                        <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                    </span>
                                                </a>
                                            </div>

                                        </td>
                                    </tr>

                                    <!-- pausa de Seguridad -->
                                    <tr>
                                        <th scope="row">  Pausa de Seguridad
                                            <i v-if="solicitudPabellon.pausa_seguridad !== null" class="fas fa-check" style="color: green"></i>
                                            <i v-else class="fas fa-times" style="color: red"></i>
                                        </th>
                                       
                                        <td v-if="!solicitudPabellon.pausa_seguridad">  
                                            <div class="flex align-items-center list-user-action">
                                                <!-- @if (in_array(351, Session::get('opciones'))) -->
                                                
                                                <a class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Add" data-bs-original-title="Add">
                                                    <span class="btn-inner">
                                                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.87651 15.2063C6.03251 15.2063 2.74951 15.7873 2.74951 18.1153C2.74951 20.4433 6.01251 21.0453 9.87651 21.0453C13.7215 21.0453 17.0035 20.4633 17.0035 18.1363C17.0035 15.8093 13.7415 15.2063 9.87651 15.2063Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.8766 11.886C12.3996 11.886 14.4446 9.841 14.4446 7.318C14.4446 4.795 12.3996 2.75 9.8766 2.75C7.3546 2.75 5.3096 4.795 5.3096 7.318C5.3006 9.832 7.3306 11.877 9.8456 11.886H9.8766Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M19.2036 8.66919V12.6792" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M21.2497 10.6741H17.1597" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>                                        
                                                    </span>
                                                </a>
                                            </div>
                                        </td>
                                        <td v-else>
                                            <div class="flex align-items-center list-user-action ms-1">
                                                <a class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Add" data-bs-original-title="Add">
                                                    <span class="btn-inner">
                                                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M14.7379 2.76175H8.08493C6.00493 2.75375 4.29993 4.41175 4.25093 6.49075V17.2037C4.20493 19.3167 5.87993 21.0677 7.99293 21.1147C8.02393 21.1147 8.05393 21.1157 8.08493 21.1147H16.0739C18.1679 21.0297 19.8179 19.2997 19.8029 17.2037V8.03775L14.7379 2.76175Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M14.4751 2.75V5.659C14.4751 7.079 15.6231 8.23 17.0431 8.234H19.7981" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M14.2882 15.3584H8.88818" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M12.2432 11.606H8.88721" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>                                                                   
                                                    </span>
                                                </a>
                                                <a class="btn btn-sm btn-icon btn-warning ms-1" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Edit" data-bs-original-title="Edit" @click="editar('pausaSeguridad', solicitudPabellon.pausa_seguridad.id)">
                                                    <span class="btn-inner">
                                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                    </span>
                                                </a>
                                                <a class="btn btn-sm btn-icon btn-danger ms-1" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Delete" data-bs-original-title="Delete" @click="eliminarPausaSeguridad(solicitudPabellon.pausa_seguridad.id)">
                                                    <span class="btn-inner">
                                                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                                            <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>
                                                    </span>
                                                </a>
                                            </div>

                                        </td>
                                    </tr>

                                    <!-- Intra-Operatorio  -->
                                    <tr>
                                        <th scope="row">  Intra-Operatorio 
                                            <i v-if="solicitudPabellon.pausa_intra" class="fas fa-check" style="color: green"></i>
                                            <i v-else class="fas fa-times" style="color: red"></i>
                                        </th>
                                       
                                        <td v-if="!solicitudPabellon.pausa_intra">  
                                            <div class="flex align-items-center list-user-action">
                                                <!-- @if (in_array(351, Session::get('opciones'))) -->
                                                
                                                <a class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Add" data-bs-original-title="Add">
                                                    <span class="btn-inner">
                                                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.87651 15.2063C6.03251 15.2063 2.74951 15.7873 2.74951 18.1153C2.74951 20.4433 6.01251 21.0453 9.87651 21.0453C13.7215 21.0453 17.0035 20.4633 17.0035 18.1363C17.0035 15.8093 13.7415 15.2063 9.87651 15.2063Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.8766 11.886C12.3996 11.886 14.4446 9.841 14.4446 7.318C14.4446 4.795 12.3996 2.75 9.8766 2.75C7.3546 2.75 5.3096 4.795 5.3096 7.318C5.3006 9.832 7.3306 11.877 9.8456 11.886H9.8766Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M19.2036 8.66919V12.6792" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M21.2497 10.6741H17.1597" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>                                        
                                                    </span>
                                                </a>
                                            </div>
                                        </td>
                                        <td v-else>
                                            <div class="flex align-items-center list-user-action ms-1">
                                                <a class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Add" data-bs-original-title="Add">
                                                    <span class="btn-inner">
                                                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.7379 2.76175H8.08493C6.00493 2.75375 4.29993 4.41175 4.25093 6.49075V17.2037C4.20493 19.3167 5.87993 21.0677 7.99293 21.1147C8.02393 21.1147 8.05393 21.1157 8.08493 21.1147H16.0739C18.1679 21.0297 19.8179 19.2997 19.8029 17.2037V8.03775L14.7379 2.76175Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M14.4751 2.75V5.659C14.4751 7.079 15.6231 8.23 17.0431 8.234H19.7981" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M14.2882 15.3584H8.88818" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    
                                                            <path d="M12.2432 11.606H8.88721" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                
                                                        </svg>                                                                   
                                                    </span>
                                                </a>
                                                <a class="btn btn-sm btn-icon btn-warning ms-1" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Edit" data-bs-original-title="Edit" @click="editar('pausaIntraOperatoria', solicitudPabellon.pausa_intra.id)">
                                                    <span class="btn-inner">
                                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                    </span>
                                                </a>
                                                <a class="btn btn-sm btn-icon btn-danger ms-1" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Delete" data-bs-original-title="Delete" @click="eliminarPausaIntro(solicitudPabellon.pausa_intra.id)">
                                                    <span class="btn-inner">
                                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                                        <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                    </span>
                                                </a>
                                            </div>

                                        </td>
                                    </tr>

                                    <!-- Recuento -->
                                    <tr>
                                        <th scope="row"> Recuento
                                            <i v-if="solicitudPabellon.pausa_recuento" class="fas fa-check" style="color: green"></i>
                                            <i v-else class="fas fa-times" style="color: red"></i>
                                        </th>
                                       
                                        <td v-if="!solicitudPabellon.pausa_recuento">  
                                            <div class="flex align-items-center list-user-action">
                                                <!-- @if (in_array(351, Session::get('opciones'))) -->
                                                
                                                <a class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Add" data-bs-original-title="Add">
                                                    <span class="btn-inner">
                                                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.87651 15.2063C6.03251 15.2063 2.74951 15.7873 2.74951 18.1153C2.74951 20.4433 6.01251 21.0453 9.87651 21.0453C13.7215 21.0453 17.0035 20.4633 17.0035 18.1363C17.0035 15.8093 13.7415 15.2063 9.87651 15.2063Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.8766 11.886C12.3996 11.886 14.4446 9.841 14.4446 7.318C14.4446 4.795 12.3996 2.75 9.8766 2.75C7.3546 2.75 5.3096 4.795 5.3096 7.318C5.3006 9.832 7.3306 11.877 9.8456 11.886H9.8766Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M19.2036 8.66919V12.6792" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M21.2497 10.6741H17.1597" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>                                        
                                                    </span>
                                                </a>
                                            </div>
                                        </td>
                                        <td v-else>
                                            <div class="flex align-items-center list-user-action ms-1">
                                                <a class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Add" data-bs-original-title="Add">
                                                    <span class="btn-inner">
                                                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.7379 2.76175H8.08493C6.00493 2.75375 4.29993 4.41175 4.25093 6.49075V17.2037C4.20493 19.3167 5.87993 21.0677 7.99293 21.1147C8.02393 21.1147 8.05393 21.1157 8.08493 21.1147H16.0739C18.1679 21.0297 19.8179 19.2997 19.8029 17.2037V8.03775L14.7379 2.76175Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M14.4751 2.75V5.659C14.4751 7.079 15.6231 8.23 17.0431 8.234H19.7981" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M14.2882 15.3584H8.88818" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M12.2432 11.606H8.88721" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                                                                   
                                                    </span>
                                                </a>
                                                <a class="btn btn-sm btn-icon btn-warning ms-1" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Edit" data-bs-original-title="Edit" @click="editar('pausaRecuento',solicitudPabellon.pausa_recuento.id)">
                                                    <span class="btn-inner">
                                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                    </span>
                                                </a>
                                                <a class="btn btn-sm btn-icon btn-danger ms-1" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Delete" data-bs-original-title="Delete" @click="eliminarPausaRecuento(solicitudPabellon.pausa_recuento.id)">
                                                    <span class="btn-inner">
                                                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                                            <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>
                                                    </span>
                                                </a>
                                            </div>

                                        </td>
                                    </tr>

                                    <!-- Recuperación  -->
                                    <tr>
                                        <th scope="row"> Recuperación 
                                            <i v-if="solicitudPabellon.pausa_recuperacion" class="fas fa-check" style="color: green"></i>
                                            <i v-else class="fas fa-times" style="color: red"></i>
                                        </th>
                                       
                                        <td v-if="!solicitudPabellon.pausa_recuperacion">  
                                            <div class="flex align-items-center list-user-action">
                                                <!-- @if (in_array(351, Session::get('opciones'))) -->
                                                
                                                <a class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Add" data-bs-original-title="Add">
                                                    <span class="btn-inner">
                                                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.87651 15.2063C6.03251 15.2063 2.74951 15.7873 2.74951 18.1153C2.74951 20.4433 6.01251 21.0453 9.87651 21.0453C13.7215 21.0453 17.0035 20.4633 17.0035 18.1363C17.0035 15.8093 13.7415 15.2063 9.87651 15.2063Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.8766 11.886C12.3996 11.886 14.4446 9.841 14.4446 7.318C14.4446 4.795 12.3996 2.75 9.8766 2.75C7.3546 2.75 5.3096 4.795 5.3096 7.318C5.3006 9.832 7.3306 11.877 9.8456 11.886H9.8766Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M19.2036 8.66919V12.6792" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M21.2497 10.6741H17.1597" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>                                        
                                                    </span>
                                                </a>
                                            </div>
                                        </td>
                                        <td v-else>
                                            <div class="flex align-items-center list-user-action ms-1">
                                                <a class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Add" data-bs-original-title="Add">
                                                    <span class="btn-inner">
                                                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.7379 2.76175H8.08493C6.00493 2.75375 4.29993 4.41175 4.25093 6.49075V17.2037C4.20493 19.3167 5.87993 21.0677 7.99293 21.1147C8.02393 21.1147 8.05393 21.1157 8.08493 21.1147H16.0739C18.1679 21.0297 19.8179 19.2997 19.8029 17.2037V8.03775L14.7379 2.76175Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M14.4751 2.75V5.659C14.4751 7.079 15.6231 8.23 17.0431 8.234H19.7981" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M14.2882 15.3584H8.88818" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M12.2432 11.606H8.88721" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>                                                                   
                                                    </span>
                                                </a>
                                                <a class="btn btn-sm btn-icon btn-warning ms-1" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Edit" title="Revertir Alta" @click="revertirAlta(solicitudPabellon.id)">
                                                    <span class="btn-inner">
                                                        <i class="fas fa-procedures"></i>
                                                    </span>
                                                </a>
                                                <a class="btn btn-sm btn-icon btn-danger ms-1" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Delete" data-bs-original-title="Delete" @click="eliminarPausa(solicitudPabellon.pausa_recuperacion.id)">
                                                    <span class="btn-inner">
                                                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                                            <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>
                                                    </span>
                                                </a>
                                            </div>

                                        </td>
                                    </tr>

                                    <!-- Recuperación Transitoria  -->
                                    <tr>
                                        <th scope="row"> Recuperación Transitoria 
                                            <i v-if="solicitudPabellon.pausa_recuperacion_transitoria" class="fas fa-check" style="color: green"></i>
                                            <i v-else class="fas fa-times" style="color: red"></i>
                                        </th>
                                       
                                        <td v-if="!solicitudPabellon.pausa_recuperacion_transitoria">  
                                            <div class="flex align-items-center list-user-action">
                                                <!-- @if (in_array(351, Session::get('opciones'))) -->
                                                
                                                <!-- <a class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Add" data-bs-original-title="Add">
                                                    <span class="btn-inner">
                                                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.87651 15.2063C6.03251 15.2063 2.74951 15.7873 2.74951 18.1153C2.74951 20.4433 6.01251 21.0453 9.87651 21.0453C13.7215 21.0453 17.0035 20.4633 17.0035 18.1363C17.0035 15.8093 13.7415 15.2063 9.87651 15.2063Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.8766 11.886C12.3996 11.886 14.4446 9.841 14.4446 7.318C14.4446 4.795 12.3996 2.75 9.8766 2.75C7.3546 2.75 5.3096 4.795 5.3096 7.318C5.3006 9.832 7.3306 11.877 9.8456 11.886H9.8766Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M19.2036 8.66919V12.6792" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M21.2497 10.6741H17.1597" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>                                        
                                                    </span>
                                                </a> -->
                                            </div>
                                        </td>
                                        <td v-else>
                                            <div class="flex align-items-center list-user-action ms-1">
                                                <a class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Add" data-bs-original-title="Add">
                                                    <span class="btn-inner">
                                                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.7379 2.76175H8.08493C6.00493 2.75375 4.29993 4.41175 4.25093 6.49075V17.2037C4.20493 19.3167 5.87993 21.0677 7.99293 21.1147C8.02393 21.1147 8.05393 21.1157 8.08493 21.1147H16.0739C18.1679 21.0297 19.8179 19.2997 19.8029 17.2037V8.03775L14.7379 2.76175Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M14.4751 2.75V5.659C14.4751 7.079 15.6231 8.23 17.0431 8.234H19.7981" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M14.2882 15.3584H8.88818" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M12.2432 11.606H8.88721" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                                                                   
                                                    </span>
                                                </a>
                                                <a class="btn btn-sm btn-icon btn-warning ms-1" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Edit" data-bs-original-title="Edit">
                                                    <span class="btn-inner">
                                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                    </span>
                                                </a>
                                                <a class="btn btn-sm btn-icon btn-danger ms-1" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Delete" data-bs-original-title="Delete" @click="eliminarPausa(solicitudPabellon.pausa_recuperacion_transitoria.id)">
                                                    <span class="btn-inner">
                                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                                        <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                    </span>
                                                </a>
                                            </div>

                                        </td>
                                    </tr>

                                    <!-- Recuperación Transitoria  -->
                                    <tr>
                                        <th scope="row"> Epicrisis Enfermería
                                            <i v-if="solicitudPabellon.pausa_epicrisis" class="fas fa-check" style="color: green"></i>
                                            <i v-else class="fas fa-times" style="color: red"></i>
                                        </th>
                                       
                                        <td v-if="!solicitudPabellon.pausa_epicrisis">  
                                            <div class="flex align-items-center list-user-action">
                                                <!-- @if (in_array(351, Session::get('opciones'))) -->
                                                
                                                <!-- <a class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Add" data-bs-original-title="Add">
                                                    <span class="btn-inner">
                                                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.87651 15.2063C6.03251 15.2063 2.74951 15.7873 2.74951 18.1153C2.74951 20.4433 6.01251 21.0453 9.87651 21.0453C13.7215 21.0453 17.0035 20.4633 17.0035 18.1363C17.0035 15.8093 13.7415 15.2063 9.87651 15.2063Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.8766 11.886C12.3996 11.886 14.4446 9.841 14.4446 7.318C14.4446 4.795 12.3996 2.75 9.8766 2.75C7.3546 2.75 5.3096 4.795 5.3096 7.318C5.3006 9.832 7.3306 11.877 9.8456 11.886H9.8766Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M19.2036 8.66919V12.6792" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M21.2497 10.6741H17.1597" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>                                        
                                                    </span>
                                                </a> -->
                                            </div>
                                        </td>
                                        <td v-else>
                                            <div class="flex align-items-center list-user-action ms-1">
                                                <a class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Add" data-bs-original-title="Add">
                                                    <span class="btn-inner">
                                                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.7379 2.76175H8.08493C6.00493 2.75375 4.29993 4.41175 4.25093 6.49075V17.2037C4.20493 19.3167 5.87993 21.0677 7.99293 21.1147C8.02393 21.1147 8.05393 21.1157 8.08493 21.1147H16.0739C18.1679 21.0297 19.8179 19.2997 19.8029 17.2037V8.03775L14.7379 2.76175Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M14.4751 2.75V5.659C14.4751 7.079 15.6231 8.23 17.0431 8.234H19.7981" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M14.2882 15.3584H8.88818" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M12.2432 11.606H8.88721" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                                                                   
                                                    </span>
                                                </a>
                                                <a class="btn btn-sm btn-icon btn-warning ms-1" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Edit" data-bs-original-title="Edit">
                                                    <span class="btn-inner">
                                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                    </span>
                                                </a>
                                                <a class="btn btn-sm btn-icon btn-danger ms-1" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Delete" data-bs-original-title="Delete">
                                                    <span class="btn-inner">
                                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                                        <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                    </span>
                                                </a>
                                            </div>

                                        </td>
                                    </tr>

                                    <!-- Traslado -->
                                    <tr>
                                        <th scope="row"> Traslado
                                            <i v-if="solicitudPabellon.pausa_traslado" class="fas fa-check" style="color: green"></i>
                                            <i v-else class="fas fa-times" style="color: red"></i>
                                        </th>
                                       
                                        <td v-if="!solicitudPabellon.pausa_traslado">  
                                            <div class="flex align-items-center list-user-action">
                                                <!-- @if (in_array(351, Session::get('opciones'))) -->
                                                
                                                <!-- <a class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Add" data-bs-original-title="Add">
                                                    <span class="btn-inner">
                                                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.87651 15.2063C6.03251 15.2063 2.74951 15.7873 2.74951 18.1153C2.74951 20.4433 6.01251 21.0453 9.87651 21.0453C13.7215 21.0453 17.0035 20.4633 17.0035 18.1363C17.0035 15.8093 13.7415 15.2063 9.87651 15.2063Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.8766 11.886C12.3996 11.886 14.4446 9.841 14.4446 7.318C14.4446 4.795 12.3996 2.75 9.8766 2.75C7.3546 2.75 5.3096 4.795 5.3096 7.318C5.3006 9.832 7.3306 11.877 9.8456 11.886H9.8766Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M19.2036 8.66919V12.6792" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M21.2497 10.6741H17.1597" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>                                        
                                                    </span>
                                                </a> -->
                                            </div>
                                        </td>
                                        <td v-else>
                                            <div class="flex align-items-center list-user-action ms-1">
                                                <a class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Add" data-bs-original-title="Add">
                                                    <span class="btn-inner">
                                                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.7379 2.76175H8.08493C6.00493 2.75375 4.29993 4.41175 4.25093 6.49075V17.2037C4.20493 19.3167 5.87993 21.0677 7.99293 21.1147C8.02393 21.1147 8.05393 21.1157 8.08493 21.1147H16.0739C18.1679 21.0297 19.8179 19.2997 19.8029 17.2037V8.03775L14.7379 2.76175Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M14.4751 2.75V5.659C14.4751 7.079 15.6231 8.23 17.0431 8.234H19.7981" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M14.2882 15.3584H8.88818" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M12.2432 11.606H8.88721" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                                                                   
                                                    </span>
                                                </a>
                                                <a class="btn btn-sm btn-icon btn-warning ms-1" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Edit" data-bs-original-title="Edit">
                                                    <span class="btn-inner">
                                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                    </span>
                                                </a>
                                                <a class="btn btn-sm btn-icon btn-danger ms-1" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Delete" data-bs-original-title="Delete">
                                                    <span class="btn-inner">
                                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                                        <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                    </span>
                                                </a>
                                            </div>

                                        </td>
                                    </tr>

                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <!-- <button type="button" class="btn btn-primary">Understood</button> -->
                    
                </div>
                </div>
            </div>
        </div>
        <modalPrePausa :paciente="paciente" ref="modalPrePausa"></modalPrePausa>
        <modalPausaCheckPabellon :paciente="paciente" ref="modalChequeoPabellon"></modalPausaCheckPabellon>
        <modalPausaCheckAnestesia :paciente="paciente" ref="modalChequeoAnestesia"></modalPausaCheckAnestesia>
        <modalPausaSeguridad :paciente="paciente" ref="modalPausaSeguridad"></modalPausaSeguridad>
        <modalPausaIntraOperatoria :paciente="paciente" ref="modalPausaIntra"></modalPausaIntraOperatoria>
        <modalPausaRecuento :paciente="paciente" ref="modalPausaRecuento"></modalPausaRecuento>
    </div>
</template>
<script>
import { defineComponent } from 'vue';
import $ from 'jquery';
import Swal from 'sweetalert2';
import modalPrePausa from './pausa/PausaPreModalComponent.vue';
import modalPausaCheckPabellon from './pausa/PausaChequeoPabellonComponent.vue';
import modalPausaCheckAnestesia from './pausa/pausaCheckAnestesiaComponent.vue';
import modalPausaSeguridad from  './pausa/pausaSeguridadComponent.vue';
import modalPausaIntraOperatoria from './pausa/pausaIntraOperatoriaComponent.vue';
import modalPausaRecuento from './pausa/pausaRecuentoComponent.vue';

export default defineComponent({
    components: {
        modalPrePausa,
        modalPausaCheckPabellon,
        modalPausaCheckAnestesia,
        modalPausaSeguridad,
        modalPausaIntraOperatoria,
        modalPausaRecuento
    },
    props: {
        data: '',
        paciente: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            titulo: 'Detalles',
        };
    },
    methods: { 
        revertirAlta(id){
            Swal.fire({
                title: "Está Seguro de revertir?",
                text: "Esto no se podrá revertir!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, revertir!",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    var data = new FormData();
                    data.append('id', id);
                    axios.post('/pausa/revertir', data)
                    .then(response => {
                        if(response.data=='ok'){
                            $('#modalDetalle').modal('hide')
                            Swal.fire({
                                title: "Revertido correctamente!",
                                text: "OK.",
                                icon: "success"
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error: ', error);
                    });
                }
            });
        },
        eliminarPausa(id){
            Swal.fire({
                title: "Está Seguro de eliminar pausa?",
                text: "Esto no se podrá revertir después!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, eliminar!",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
           
                    axios.delete(`/pausa/eliminar/${id}`)
                    .then(response => {
                        if(response.data=='ok'){
                            $('#modalDetalle').modal('hide')
                            Swal.fire({
                                title: "Se eliminado correctamente!",
                                text: "OK.",
                                icon: "success"
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error: ', error);
                    });
                }
            });
        },
        eliminarPausaRecuento(id){
            Swal.fire({
                title: "Está Seguro de eliminar pausa recuento?",
                text: "Esto no se podrá revertir después!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, eliminar!",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete(`/pausa/recuento/eliminar/${id}`)
                    .then(response => {
                        if(response.data=='ok'){
                            $('#modalDetalle').modal('hide')
                            Swal.fire({
                                title: "Se eliminado correctamente!",
                                text: "OK.",
                                icon: "success"
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error: ', error);
                    });
                }
            });
        },
        eliminarPausaIntro(id){
            Swal.fire({
                title: "Está Seguro de eliminar pausa intra?",
                text: "Esto no se podrá revertir después!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, eliminar!",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete(`/pausaIntro/eliminar/${id}`)
                    .then(response => {
                        if(response.data=='ok'){
                            $('#modalDetalle').modal('hide')
                            Swal.fire({
                                title: "Se eliminado correctamente!",
                                text: "OK.",
                                icon: "success"
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error: ', error);
                    });
                }
            });
        },
        eliminarPausaSeguridad(id){
            Swal.fire({
                title: "Está Seguro de eliminar pausa seguridad?",
                text: "Esto no se podrá revertir después!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, eliminar!",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete(`/pausaSeguridad/eliminar/${id}`)
                    .then(response => {
                        if(response.data=='ok'){
                            $('#modalDetalle').modal('hide')
                            Swal.fire({
                                title: "Se eliminado correctamente!",
                                text: "OK.",
                                icon: "success"
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error: ', error);
                    });
                }
            });
        },
        eliminarPausaAnestesia(id){
            Swal.fire({
                title: "Está Seguro de eliminar pausa anestesia?",
                text: "Esto no se podrá revertir después!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, eliminar!",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete(`/pausaAnestesia/eliminar/${id}`)
                    .then(response => {
                       
                        if(response.data=='ok'){
                            $('#modalDetalle').modal('hide')
                            Swal.fire({
                                title: "Se eliminado correctamente!",
                                text: "OK.",
                                icon: "success"
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error: ', error);
                    });
                }
            });            
        },
        eliminarPausaPabellon(id){
            Swal.fire({
                title: "Está Seguro de eliminar pausa chequeo pabellón?",
                text: "Esto no se podrá revertir después!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, eliminar!",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete(`/pausaPabellon/eliminar/${id}`)
                    .then(response => {
                        if(response.data=='ok'){
                            $('#modalDetalle').modal('hide')
                            Swal.fire({
                                title: "Se eliminado correctamente!",
                                text: "OK.",
                                icon: "success"
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error: ', error);
                    });
                }
            });            
        },
        eliminarPausaPre(id){   
            Swal.fire({
                title: "Está Seguro de eliminar pausa ingreso enfermería?",
                text: "Esto no se podrá revertir después!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, eliminar!",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete(`/pausaPre/eliminar/${id}`)
                    .then(response => {
                        if(response.data=='ok'){
                            $('#modalDetalle').modal('hide')
                            Swal.fire({
                                title: "Se eliminado correctamente!",
                                text: "OK.",
                                icon: "success"
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error: ', error);
                    });
                }
            });            
        },
        editar(tipo, id){
            if(tipo=='pausaPre'){
                $("#modalPrePausa").modal('show');
                this.$refs.modalPrePausa.getInfo(id, this.solicitudPabellon.id);
            }else if(tipo=='chequeoPabellon'){
                $("#modalChequeoPabellon").modal('show');
                this.$refs.modalChequeoPabellon.getInfo(id, this.solicitudPabellon.id);
            }else if(tipo=="chequeoAnestesia"){
                this.$refs.modalChequeoAnestesia.getInfo(id, this.solicitudPabellon.id);
                $("#modalChequeoAnestesia").modal('show');
            }else if(tipo=='pausaSeguridad'){
                this.$refs.modalPausaSeguridad.getInfo(id, this.solicitudPabellon.id);
                $("#modalPausaSeguridad").modal('show');
            }else if(tipo=='pausaIntraOperatoria'){
                $("#modalPausaIntraOperatoria").modal('show');
                this.$refs.modalPausaIntra.getInfo(id, this.solicitudPabellon.id);
            }else if(tipo=='pausaRecuento'){
                $("#modalPausaRecuento").modal('show');
                this.$refs.modalPausaRecuento.getInfo(id, this.solicitudPabellon.id);
            }
        }   
    }, 
    computed:{
        solicitudPabellon(){
            return this.data.solicitudPabellon
        }
    },
    setup() {

    },
    mounted() {

    }
})
</script>

<style scoped>
 
</style>