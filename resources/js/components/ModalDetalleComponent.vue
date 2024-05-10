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
                    <div class="accordion-item">
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
                                                <strong>Intervención Condicional por: </strong> {{ solicitudPabellon.asignacion.condicional.gl_nombre }}
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
                                                <strong>Intervención Condicional por: </strong> {{ solicitudPabellon.asignacion.condicional.gl_nombre }}
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
                    <div class="accordion-item" v-if="solicitudPabellon.protocolo">
                        <h2 class="accordion-header" id="headingPausas">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePausa" aria-expanded="false" aria-controls="collapsePausa">
                                <strong>Datos Pausas</strong>
                            </button>
                        </h2>
                        <div id="collapsePausa" class="accordion-collapse collapse" aria-labelledby="headingPausas" data-bs-parent="#accordionExample">
                            <div class="accordion-body">

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
    </div>
</template>
<script>
import { defineComponent } from 'vue';
import $ from 'jquery';
export default defineComponent({
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