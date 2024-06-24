<template>
    <div>
        <div class="modal fade" id="modalConsentimiento" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalDetalleLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDetalleLabel">{{ titulo }}</h5>
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
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="container">
                                                    <p class="card-text fs-7 fw-bold text-muted">“Es el proceso en que el profesional de salud del Hospital San Juan de Dios, que atiende al paciente, entrega personalmente a éste o a su representante, la información suficiente, razonada y comprensible sobre su diagnóstico, los objetivos de la intervención que se propone, sus características, beneficios y riesgos, los medios de los que dispone el Hospital, así como las alternativas a los procedimientos o intervenciones que se le ofrece con sus beneficios y riesgos, a fin de que el o la paciente, o su representante en su caso, razonadamente autorice o rechace la propuesta de atención médica.”
                                                        Escribir personalmente por el profesional responsable con letra imprenta y legible.
                                                        En caso de pacientes con dificultad de comprensión, alteración de conciencia o menores de edad, se deberá pedir el Consentimiento Informado a sus representantes."
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="container">
                                                    <div class="card-title">
                                                        <p class="card-text fw-bold fs-6">
                                                            <strong> Escribir personalmente por el profesional responsable con letra imprenta y legible.</strong>
                                                        </p>
                                                        <p class="card-text fs-7 fw-bold text-muted"> En caso de pacientes con dificultad de comprensión, alteración de conciencia o menores de edad, se deberá pedir el Consentimiento Informado a sus representantes.</p>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                <div class="card">
                                    <div class="card-body">
                                        <div class="container">
                                            <!-- radio button -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div>
                                                        <label for="bo_imposibilitado_1" class="form-label fw-bold text-primary">Paciente imposibilitado de otorgar C.I.</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" v-model="bo_imposibilitado" name="bo_imposibilitado" id="bo_imposibilitado_1" value="1">
                                                        <label class="form-check-label fw-bold text-secondary" for="inlineRadio1">Sí</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" v-model="bo_imposibilitado" name="bo_imposibilitado" id="bo_imposibilitado_2" value="0">
                                                        <label class="form-check-label fw-bold text-secondary" for="inlineRadio2">No</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div>
                                                        <label class="form-label fw-bold text-primary">Paciente menor, C.I. otorgado por sus representantes.</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" v-model="bo_menor" type="radio" id="bo_menor_1" name="bo_menor" value="1">
                                                        <label class="form-check-label fw-bold text-secondary" for="bo_menor_1">Sí</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" v-model="bo_menor" type="radio" id="bo_menor_2" name="bo_menor" value="0">
                                                        <label class="form-check-label fw-bold text-secondary" for="bo_menor_2">No</label>
                                                    </div>
                                                </div>
                                        </div>
                                        <!-- radio button -->
                                        </div>
                                    </div>
                                </div>
                                <!-- representante legal -->
                                <div class="card">
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="row mt-2">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="nombreRepresentanteLegal" class="form-label fw-bold text-primary"> Nombre del representante legal:</label>
                                                        <input type="text" class="form-control" id="nombreRepresentanteLegal" v-model="gl_nombre_representante" placeholder="Ingrese nombre representante">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="gl_nombre_representante" class="form-label fw-bold text-primary">Rut:</label>
                                                        <input type="text" class="form-control" id="gl_nombre_representante" v-model="gl_rut_representante" placeholder="Ingrese rut representante">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="gl_telefono_representante" class="form-label fw-bold text-primary">Teléfono</label>
                                                        <input type="text" class="form-control" id="gl_telefono_representante" v-model="gl_telefono_representante" placeholder="Ingrese nombre representante">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="nombreRepresentanteLegal" class="form-label fw-bold text-primary">Dirección</label>
                                                        <input type="text" class="form-control" id="gl_domicilio_representante" v-model="gl_domicilio_representante" placeholder="Ingrese dirección">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="gl_parentesco_representante" class="form-label fw-bold text-primary">Parentesco o cercanía</label>
                                                        <input type="text" class="form-control" id="gl_parentesco_representante" v-model="gl_parentesco_representante" placeholder="Ingrese Parentesco">
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
                                                        <label for="gl_diagnostico" class="form-label fw-bold text-primary mb-4">El diagnóstico médico del paciente es:*</label>
                                                        <input type="text" class="form-control" id="gl_diagnostico" v-model="gl_diagnostico" placeholder="Ingrese diagnóstico">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="nombreRepresentanteLegal" class="form-label fw-bold text-primary mb-1">Y que es necesario se efectúe al paciente, el o los siguientes (s) procedimientos (s) diagnóstico (s) , terapéutico (s) y/ o intervención quirúrgica:*</label>
                                                        <input type="text" class="form-control" id="gl_procedimiento" v-model="gl_procedimiento" placeholder="Ingrese procedimiento">
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
                                                <div class="col-md-4">
                                                    <label for="gl_objetivo" class="form-label fw-bold text-primary mb-4">Objetivos y beneficios del procedimiento y/o intervención quirúrgica:*</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="gl_riesgo" class="form-label fw-bold text-primary mb-4">Riesgos del procedimiento y/o intervención quirúrgica:*</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="gl_alternativo" class="form-label fw-bold text-primary mb-4">Alternativa (s) al procedimiento y/o intervención quirúrgica y sus respectivos riesgos y beneficios:*</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <textarea class="form-control" v-model="gl_objetivo" id="gl_objetivo" rows="3"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <textarea class="form-control" v-model="gl_riesgo" id="gl_riesgo" rows="3"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <textarea class="form-control" v-model="gl_alternativo" id="gl_alternativo" rows="3"></textarea>
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" @click="registrar()">Guardar cambios</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { defineComponent } from 'vue';
import InfoPaciente from './paciente/InfoPacienteComponent.vue'
export default defineComponent({
    props: {
        paciente: {
            type: Object,
            required: true
        }, 
        solicitud: {
            type: Object,
            required: true
        }
    },
    components: {
        InfoPaciente
    },
    data() {
        return {
            titulo: 'Consentimiento',
            bo_menor:'',
            bo_imposibilitado: '',
            gl_nombre_representante:'',
            gl_rut_representante:'',
            gl_telefono_representante: '',
            gl_domicilio_representante:'',
            gl_diagnostico:'',
            gl_procedimiento: '',
            gl_parentesco_representante:'',
            gl_objetivo:'',
            gl_riesgo:'',
            gl_alternativo:''
        }
    },
    methods: { 
        registrar(){
            var data = new FormData();
            // se debe cambiar por el ID logueado 
            data.append('id_medico', 1);
            data.append('id_solicitud', this.solicitud.id);
            data.append('bo_menor', this.bo_menor);
            data.append('bo_imposibilitado', this.bo_imposibilitado);
            data.append('gl_nombre_representante', this.gl_nombre_representante);
            data.append('gl_rut_representante', this.gl_rut_representante);
            data.append('gl_telefono_representante', this.gl_teZlefono_representante);
            data.append('gl_domicilio_representante', this.gl_domicilio_representante);
            data.append('gl_diagnostico', this.gl_diagnostico);
            data.append('gl_procedimiento', this.gl_procedimiento);
            data.append('gl_parentesco_representante', this.gl_parentesco_representante);
            data.append('gl_objetivo', this.gl_objetivo);
            data.append('gl_riesgo', this.gl_riesgo);
            data.append('gl_alternativo', this.gl_alternativo);

            axios.post('/consentimiento/registrar', data)
            .then(response => {
                console.log(response.data);
                this.limpiar()
                if(response.data=='ok'){
                    $('#modalConsentimiento').modal('hide')
                }
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
            this.gl_parentesco_representante ='';
            this.gl_objetivo = '';
            this.gl_riesgo = '';
            this.gl_alternativo = '';
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
 
</style>