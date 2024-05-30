<template>
   <div>
      <div class="card card-primary card-outline mt-3">
            <div class="card-header">
              <div class="card-title">
                Buscar Ficha Paciente
              </div>
            </div>
            <form>
              <div class="card-body">
                <div class="row">
                      <label for="exampleInputEmail1" class="form-label">Rut / Pasaporte / DNI / N° Sin Identificacion / FICHA</label>
                    <div class="col-md-4">
                        
                        <select class="form-select" id="selectMbusqueda" @change="metodoBusqueda($event)">
                            <option value="rut" selected>Rut</option>
                            <option value="ficha">FICHA</option> 
                        </select>
                      
                    </div>
                    <div class="col-md-4 contenedor-numero">
                        <div v-if="tipoBusqueda=='rut'">
                            <input type="text" v-model="run" class="form-control" placeholder="Ingrese Run" minlength="5" maxlength="11" @input="validarRutEnTiempoReal($event)">
                        </div>
                    
                         <div v-else-if="tipoBusqueda === 'ficha'">
                            <input type="text" class="form-control" placeholder="Ingrese Ficha" v-model="ficha" id="numericInput" minlength="3" maxlength="20" @input="validarSoloNumeros()">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button v-if="!loadingBuscar" type="button" class="btn btn-primary" @click="buscarPaciente()">Buscar</button>
                        <button v-if="loadingBuscar" class="btn btn-primary mb-2" type="button" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Cargando...
                        </button>
                    </div>
                </div>

                <div class="row mt-5" v-if="verPaciente">
                    <div class="col-md-6">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex">
                                <i class="nav-icon fas fa-solid fa-user mt-2 list-nombre-paciente"></i>
                                <h4 class="nombre-paciente">{{ paciente.nombre }}</h4>
                            </li>
                            <li class="list-group-item d-flex"><span class="span-title">RUN:</span> <p>{{ paciente.run }}</p></li>
                            <li class="list-group-item d-flex"><span class="span-title">FICHA:</span><p>{{ paciente.ficha }}</p></li>
                            <li class="list-group-item d-flex"><span class="span-title">Fecha de Nacimiento: </span><p>{{ paciente.fechaNacimiento }}</p></li>
                            <li class="list-group-item d-flex"><span class="span-title">Dirección: </span><p>{{ paciente.direccion }}</p></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex">
                                <span class="span-title">SEXO:</span><p>{{ paciente.sexo }}</p>
                            </li>
                            <li class="list-group-item d-flex">
                                <span class="span-title">Previsión:</span> <p>{{ paciente.prevision }}</p>
                            </li>
                            <li class="list-group-item d-flex"><span class="span-title">Edad:</span><p>{{ paciente.edad }} años</p></li>
                            <li class="list-group-item d-flex"><span class="span-title">Telefono: </span><p>{{ paciente.telefono }}</p></li>
                        </ul>
                    </div>
                </div>
                
                <div class="row mt-3" v-if="verPaciente">
                    <div class="col-md-12">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Solicitudes
                                        <span class="badge rounded-pill bg-success">{{ this.solicitudes.length }}</span>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Epicrisis
                                        <span class="badge rounded-pill bg-success">{{ epicrisis.length }}</span>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">
                                        Biopsia 
                                        <span class="badge rounded-pill bg-success">{{ informeBiopsia.contadorBiopsia }}</span>
                                    </button>
                                </li>
                            </ul>
                            <!-- Tab panes solicitudes -->
                            <div class="tab-content mt-2" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">INTERVENCION</th>
                                                <th scope="col">EQUIPO</th>
                                                <th scope="col">F. INTERVENCION</th>
                                                <th scope="col">Pabellón</th>
                                                <th scope="col">Estado</th>
                                                <th scope="col"><i class="fa-solid fa-gear"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(item, index) in solicitudes" :key="index">
                                                <th scope="row">{{ item.id }}</th>
                                                <td>
                                                    <div class="descripcion-solicitudes">
                                                        <p>{{ item.prestaciones[0].prs_cod }}</p>
                                                        <p>{{ item.prestaciones[0].prs_desc_original }} </p>
                                                        <span class="fw-bold">{{ item.gl_intevension }}</span>
                                                    </div>
                                                </td>
                                                <td>{{ item.equipo_medico.gl_descripcion }}</td>
                                                <td>{{ item.fc_intervencion }}</td>
                                                <td>{{ item.pabellon.gl_nombre }} <br> {{ item.pabellon.gl_seudonimo }}</td>
                                                <td>{{ item.estado.gl_nombre }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                          
                                                        </button>
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                            <li><a class="dropdown-item" href="#" @click="detalle(item.id)">Detalle</a></li>
                                                            <!-- <li><a class="dropdown-item" href="#">Another action</a></li>
                                                            <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Tav panel epicrisis -->
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Código</th>
                                                <th scope="col">Tipo</th>
                                                <th scope="col">Médico</th>
                                                <th scope="col">F. Ingreso</th>
                                                <th scope="col">F. Egreso</th>
                                                <th scope="col"><i class="fa-solid fa-gear"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(item, index) in epicrisis" :key="index">
                                                <th scope="row">{{ item.pac_corr }}</th>
                                                <td>{{ item.tipo  }}</td>
                                                <td>{{ item.medico.name }}</td>
                                                <td>{{ item.fecha_ingreso }}</td>
                                                <td> {{ item.fecha_egreso }}</td>
                                                <td class="archivo-pdf" @click="getEpicrisis(item.id)"><i class="fa-solid fa-file-pdf"></i></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- biopsia panel -->
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Tipo Estudio</th>
                                                <th scope="col">Código Estudio</th>
                                                <th scope="col">Servicio Solicitante</th>
                                                <th scope="col">F. Toma</th>
                                                <th scope="col">F. Cierre</th>
                                                <th scope="col"><i class="fa-solid fa-gear"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(item, index) in informeBiopsia.informes" :key="index">
                                                <th scope="row">
                                                    <p v-if="item.tipoEstudio=='B'">Biopsia</p>
                                                    <p v-else-if="item.tipoEstudio=='C'">Consulta</p>
                                                    <p v-else-if="item.tipoEstudio=='I'">Interconsulta</p>
                                                    <p v-else>{{ item.tipoEstudio }}</p>
                                                </th>
                                                <td>{{ item.codigoEstudio }}</td>
                                                <td>{{ item.servicio_solitante }}</td>
                                                <td>{{ item.fecha_toma_muestra }}</td>
                                                <td>{{ item.fechaCierre }}</td>
                                                <td class="archivo-pdf" @click="verArchivo(item.informepdf)"><i class="fa-solid fa-file-pdf"></i></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                </div>
              </div>

              <div class="card-footer">
                {{ name }}
              </div>
            </form>
          </div> 
            <!-- Modal -->
            <div class="modal" id="exampleModal"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{ tituloModal }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <embed :src="pdf" type="application/pdf" width="100%" height="500px" />
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                        </div>
                    </div>
                </div>
            </div>
            <ModalDetalle :data="detalles" :paciente="paciente"></ModalDetalle>
    </div>
</template>
<script>
import { defineComponent } from 'vue';
import $ from 'jquery';
import moment from 'moment';
import ModalDetalle from './ModalDetalleComponent.vue'
import Swal from 'sweetalert2';
export default defineComponent({
    components: {
        ModalDetalle
    },
    data() {
        return {
            detalles:[],
            loadingBuscar:false,
            solicitudes:[],
            pdf: '',
            verPaciente: false,
            tipoBusqueda: 'rut',
            name: 'Hospital San Juan de Dios',
            run: '',
            pasaporte : '',
            dni: '',
            sinident: '',
            ficha: '', 
            tituloModal: '',
            informeBiopsia: {
                contadorBiopsia : 0,
                informes: []
            },
            epicrisis:[],
            paciente: {
                run : '', 
                nombre: '',
                ficha: '',
                fechaNacimiento:'',
                direccion: '',
                sexo: '',
                prevision: '',
                edad : '', 
                telefono : ''
            }
        };
    },
    methods: {
        buscarPaciente() {
            if(this.tipoBusqueda=='rut' && this.run ==''){
                return
            }
            if(this.tipoBusqueda=='ficha' && this.ficha ==''){
                return
            }
            this.verPaciente = false;   
            this.loadingBuscar = true;
            var data = new FormData();
            data.append('run', this.run);
            data.append('ficha', this.ficha);
            axios.post('/buscar-ficha', data)
            .then(response => {
                if(response.data=='rut incorrecto'){
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "El RUN ingresado no es válido",
                    });                    
                }else if(response.data=='metodo busqueda'){
                     Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Ingrese RUN o número de Ficha!",
                    });  
                }else{
                    this.loadingBuscar = false;
                    this.verPaciente = true;    
                    this.paciente.run = response.data.paciente.nr_run+'-'+response.data.paciente.tx_digito_verificador;
                    this.paciente.ficha = response.data.paciente.nr_ficha;
                    this.paciente.nombre = response.data.paciente.tx_nombre+' '+response.data.paciente.tx_apellido_paterno+' '+response.data.paciente.tx_apellido_materno;
                    this.paciente.fechaNacimiento = response.data.paciente.fc_nacimiento;
                    this.paciente.direccion = response.data.paciente.tx_direccion;
                    //this.paciente.prevision = response.data.id_prevision;
                    this.paciente.telefono = response.data.paciente.tx_telefono;
                    // this.paciente.sexo = this.getSexo(response.data.id_sexo);
                    this.getSexo(response.data.paciente.id_sexo);
                    this.getPrevision(response.data.paciente.id_prevision);
                    this.paciente.edad = this.fechaNacimientoExacta(response.data.paciente.fc_nacimiento);
    
                    // informes de biopsia paciente
                    this.informeBiopsia.contadorBiopsia = response.data.informeBiopsia.cuenta_biopsia;
                    this.informeBiopsia.informes = response.data.informeBiopsia.informes;
                    // console.log(this.informeBiopsia)
                    this.epicrisis = response.data.epicrisis;
                    this.solicitudes = response.data.solicitudes;
                    // console.log(this.epicrisis)
                }
            })
            .catch(error => {
                console.log(error)
            });
        },
        metodoBusqueda(e){
            this.tipoBusqueda = e.target.value;
        },
        verArchivo(pdf){
            this.tituloModal = 'Biopsia';
            this.pdf = 'data:application/pdf;base64,' + pdf;
            $('#exampleModal').modal('show');
        },
        soloNumeros(){
            $('.input-number').on('input', function () { 
               
                this.value = this.value.replace(/[^0-9]/g,'');
            });
        },
        validarRutEnTiempoReal(event) {
                const rut = event.target.value;
                const rutLimpio = rut.replace(/[^\dkK]/g, '').toUpperCase();
                const numero = rutLimpio.slice(0, -1);
                const digitoVerificador = rutLimpio.slice(-1);

                if (/^\d+$/.test(numero)) {
                    let suma = 0;
                    let multiplo = 2;

                    for (let i = numero.length - 1; i >= 0; i--) {
                    suma += parseInt(numero.charAt(i)) * multiplo;
                    multiplo = multiplo === 7 ? 2 : multiplo + 1;
                    }

                    const resultado = (11 - (suma % 11)) % 11;
                    const digitoCalculado = resultado === 10 ? 'K' : resultado.toString();

                    if (digitoCalculado === digitoVerificador) {
                        this.run = numero.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + '-' + digitoVerificador;
                    }
                }
        },
        fechaNacimientoExacta(fecha){
            var fechaNacimiento = fecha;
            var fechaNacimientoExacta = new Date(fechaNacimiento);
            var hoy = new Date();
            var edad = hoy.getFullYear() - fechaNacimientoExacta.getFullYear();
            var mes = hoy.getMonth() - fechaNacimientoExacta.getMonth();

            if (mes < 0 || (mes === 0 && hoy.getDate() < fechaNacimientoExacta.getDate())) {
                edad--;
            }
            return edad;
        },
        getSexo(id){
            var data = new FormData();
            data.append('id', id);
            axios.post('/get-sexo', data)
            .then(response => { 
                this.paciente.sexo = response.data.tx_descripcion
            })
            .catch(error => {
                console.error('Error: ', error);
            });
        }, 
        getPrevision(id){
            var data = new FormData();
            data.append('id', id);
            axios.post('/get-prevision', data)
            .then(response => { 
                this.paciente.prevision = response.data.tx_descripcion;
            })
            .catch(error => {
                console.error('Error: ', error);
            });
        },
        getEpicrisis(id){
            var data = new FormData();
            data.append('id', id);
            axios.post('/get-epicrisis', data, {
                headers: {'Content-Type': 'multipart/form-data',},
            })
            .then(response => { 
                this.tituloModal = 'Epicrisis';
                this.pdf = 'data:application/pdf;base64,' + response.data;
                $('#exampleModal').modal('show');
            })
            .catch(error => {
                console.error('Error: ', error);
            });
        }, 
        validarSoloNumeros(){
            $('#numericInput').on('input', function(){
                var value = $(this).val();
                $(this).val(value.replace(/\D/g, ''));
            });
        }, 
        detalle(id){
            axios.get(`/api/detalle/${id}`)
            .then(response => {
                $('#modalDetalle').modal('show');
                this.detalles = response.data;
                console.log(this.detalles)
            })
            .catch(error => {
                console.log(error)
            });
        }
    },
    setup() {
        console.log('Este es el consola')
    },
    mounted() {
        this.soloNumeros();
        $( window ).on( "load", function() {
            $('#contenedor-numero').on('input', '.input-number', function () {
                console.log(this.value);
                this.value = this.value.replace(/[^0-9]/g, '');
            });
        });
    }
})
</script>

<style scoped>
    .list-nombre-paciente{
        margin-right: .5em !important;
        color:rgb(182, 176, 176);
        font-size: 1em;
    }
    .span-title{
        font-size: 1em;
        font-weight: bold;
    }
    .nombre-paciente{
        margin-top: .2em;
        font-size: 1.2em;
        font-weight: bold; 
    }
    .list-group-item{
        padding-bottom: 0;
    }

    .list-group-item p{
        margin-left: .5em;
    }
    .archivo-pdf{
        cursor:pointer;
    }
    .descripcion-solicitudes p{
        margin-bottom: 0;
    }    
</style>