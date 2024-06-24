<template>
    <div>
      
        <div class="modal fade" id="modalPaciente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalDetalleLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
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
                            <div class="card-title">
                                {{ titulo }}
                            </div>
                           
                        </div>
                        <form>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="modTipo" class="form-label">Tipo de Identificación *</label>
                                        <select v-model="tipoIdentificacion" class="form-select" aria-label="Default select example">
                                            <option value="rut" selected>Rut</option>
                                            <option value="ficha">Ficha</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="modalrut" class="form-label">RUN</label>
                                            <input type="text" class="form-control" id="modalrut" v-model="paciente.run" placeholder="Ingrese rut">
                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="modalNombre" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="modalNombre" v-model="paciente.nombres" placeholder="Ingrese nombre">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="modalApellidoP" class="form-label">Apellido Paterno</label>
                                            <input type="email" class="form-control"  v-model="paciente.apellidoP" id="modalApellidoP" placeholder="Ingrese apellido mmaterno">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="modalApellidoM" class="form-label"> Apellido Materno</label>
                                            <input type="text" class="form-control" id="modalApellidoM" v-model="paciente.apellidoM" placeholder="Ingrese apellido paterno">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="modFicha" class="form-label"><strong>Ficha</strong> </label>
                                            <input type="number" class="form-control" id="modFicha" v-model="paciente.ficha" placeholder="Ingrese ficha">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <!-- <label for="modSexo" class="form-label"><strong>Sexo</strong></label>
                                            <input type="email" class="form-control"  v-model="paciente.sexo" id="modSexo" placeholder="Seleccione Sexo"> -->
                                            <label for="mComuna" class="form-label"><strong>Sexo</strong></label>
                                            <v-select v-model="paciente.sexo_id" :options="optionsSexos" :reduce="sexo => sexo.id" label="text" id="mSexo" placeholder="Seleccione Sexo"></v-select>                                              
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="modFechnacimniento" class="form-label"> <strong>Fecha nacimiento</strong>  <span>*</span> </label>
                                            <input type="date" class="form-control" id="modFechnacimniento" v-model="paciente.fechaNacimiento" placeholder="Ingrese Fecha nacimiento">
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- datos paciente  -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="modTelefono" class="form-label"> <strong>Teléfono/Celular</strong> </label>
                                            <input type="text" class="form-control" id="modTelefono" v-model="paciente.cel" placeholder="Ingrese Teléfono">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="mComuna" class="form-label"><strong>Comuna</strong></label>
                                            <v-select v-model="paciente.comuna_id" :options="optionsComuna" :reduce="com => com.id" label="text" id="mComuna" placeholder="Seleccione comuna"></v-select>                                            
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="modDireccion" class="form-label"> <strong>Dirección</strong> <span>*</span> </label>
                                            <input type="text" class="form-control" id="modDireccion" v-model="paciente.direccion" placeholder="Ingrese dirección">
                                        </div>
                                    </div>
                                </div>

                                <!-- datos prevision -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <!-- <label for="modPrevision" class="form-label"> <strong>Previsión</strong> </label>
                                            <input type="text" class="form-control" id="modPrevision" v-model="paciente.prevision" placeholder="Ingrese "> -->

                                            <label for="mPrevision" class="form-label"><strong>Previsión</strong></label>
                                            <v-select v-model="paciente.prevision_id" :options="optionsPrevisiones" :reduce="prev => prev.id" label="text" id="mPrevision" placeholder="Seleccione previsión"></v-select>  
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="mClasFonasa" class="form-label"><strong>Clasificación</strong></label>
                                            <v-select v-model="paciente.fonasa_clasificacion_id" :options="optionsClasFonasa" :reduce="clasificacion => clasificacion.id" label="text" id="mClasFonasa" placeholder="Seleccione clasificación"></v-select>  
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!-- <div class="mb-3">
                                            <label for="modFechnacimniento" class="form-label"> Fecha nacimiento <span>*</span> </label>
                                            <input type="date" class="form-control" id="modFechnacimniento" v-model="paciente.fechaNacimiento" placeholder="Ingrese Fecha nacimiento">
                                        </div> -->
                                    </div>
                                </div>

                            </div>
                       
                        </form>
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

export default defineComponent({
    props: {
        paciente: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            titulo: 'Editar Paciente',
            rut: '',
            comuna: '',
            optionsComuna:[],
            optionsSexos:[],
            optionsPrevisiones:[],
            optionsClasFonasa:[],
            tipoIdentificacion: 'rut'
        }
    },
    methods: { 
        registrar(){
            var data = new FormData();
            data.append('id', this.paciente.id);
            data.append('id_comuna', this.paciente.comuna_id);
            data.append('rut', this.paciente.run);
            data.append('ficha', this.paciente.ficha);
            data.append('nombres', this.paciente.nombres);
            data.append('apellidoP', this.paciente.apellidoP);
            data.append('apellidoM', this.paciente.apellidoM);
            data.append('id_clasificacion_fonasa', this.paciente.fonasa_clasificacion_id);
            data.append('sexo_id', this.paciente.sexo_id);
            data.append('fecha_nacimiento', this.paciente.fechaNacimiento);
            data.append('telefono', this.paciente.telefono);
            data.append('direccion', this.paciente.direccion);
            data.append('comuna_id',  this.paciente.comuna_id);
            data.append('prevision_id',  this.paciente.prevision_id);

            data.append('tipoIdent', this.tipoIdentificacion);
            axios.post('/paciente/registrar', data)
            .then(response => {
                // console.log(response.data)
                if(response.data=='ok'){
                    $('#modalPaciente').modal('hide')
                }
            })
            .catch(error => {
                console.error('Error: ', error);
            });
        },
        cargarSelectComuna(){
            axios.post('/get-comunas')
            .then(response => {
                this.optionsComuna = response.data;
            })
            .catch(error => {
                console.error('Error: ', error);
            });
        },
        cargarSelectPrevision(){
            axios.post('/get-previsiones')
            .then(response => {
                this.optionsPrevisiones = response.data;
                // console.log(this.optionsPrevisiones)
            })
            .catch(error => {
                console.error('Error: ', error);
            });
        },
        cargarSelectClasFonasa(){
            axios.post('/get-clasif-fonasa')
            .then(response => {
                this.optionsClasFonasa = response.data
                // console.log( this.optionsClasFonasa )
            })
            .catch(error => {
                console.error('Error: ', error);
            });
        },
        cargarSelectSexo(){
            axios.post('/get-sexos')
            .then(response => {
                // console.log( response.data )
                this.optionsSexos = response.data
            })
            .catch(error => {
                console.error('Error: ', error);
            });
        }
    }, 
    computed:{
        solicitudPabellon(){
            //return this.data.solicitudPabellon
        }
    },
    setup() {

    },
    mounted() {
        this.cargarSelectComuna()
        this.cargarSelectPrevision()
        this.cargarSelectClasFonasa()
        this.cargarSelectSexo()
    }
})
</script>

<style scoped>
 
</style>