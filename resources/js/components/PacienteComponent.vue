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
                      <label for="exampleInputEmail1" class="form-label">Rut / FICHA</label>
                    <div class="col-md-3">
                        
                        <select class="form-select" id="selectMbusqueda" @change="metodoBusqueda($event)">
                            <option value="rut" selected>Rut</option>
                            <option value="ficha">FICHA</option> 
                        </select>
                      
                    </div>
                    <div class="col-md-3 contenedor-numero">
                        <div v-if="tipoBusqueda=='rut'">
                            <input type="text" v-model="run" class="form-control" placeholder="Ingrese Run" minlength="5" maxlength="11" @input="validarRutEnTiempoReal($event)">
                        </div>
                    
                         <div v-else-if="tipoBusqueda === 'ficha'">
                            <input type="text" class="form-control" placeholder="Ingrese Ficha" v-model="ficha" id="numericInput" minlength="3" maxlength="20" @input="validarSoloNumeros()">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button v-if="!loadingBuscar" type="button" class="btn btn-primary" @click="buscarPaciente()">Buscar</button>
                        <button v-if="loadingBuscar" class="btn btn-primary mb-2" type="button" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Cargando...
                        </button>
                    </div>
                    <div class="col-md-3 d-flex justify-content-end" v-if="verPaciente">

                        <div class="flex align-items-center list-user-action">
                            <a class="btn btn-sm btn-icon btn-success" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Add" data-bs-original-title="Add">
                                <span class="btn-inner">
                                    Perfil Hospitalizado                                      
                                </span>
                            </a>

                            <!-- <a class="btn btn-xxs btn-success btn-xs pull-right" href="http://10.4.237.27/login?rUser={{Auth::user()->gl_rut}}&tUser={{$token}}&pac={{$paciente->id}}" target="_blank"><i class="fa fa-eye"></i> Perfil Hospitalizado </a> -->
                            <a class="btn btn-sm btn-icon btn-warning ms-2" data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Edit" href="#" aria-label="Edit" data-bs-original-title="Edit" @click="abrirModal('paciente')">
                                <span class="btn-inner">
                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                            </a>
                        </div>
            
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
                                <span class="span-title">Previsión:</span> <p>{{ paciente.prevision }}</p> <p v-if="paciente.fonasaClasif">{{ paciente.fonasaClasif.tx_descripcion }}</p>
                            </li>
                            <li class="list-group-item d-flex"><span class="span-title">Edad:</span><p>{{ paciente.edad }} años</p></li>
                            <li class="list-group-item d-flex"><span class="span-title">Telefono: </span><p v-if="paciente.telefono=!'null'">{{ paciente.telefono }}</p></li>
                        </ul>
                    </div>
                </div>
                
                <div class="row mt-3" v-if="verPaciente">
                    <div class="col-md-12">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Solicitudes
                                        <span class="badge rounded-pill bg-success">{{ solicitudes.length }}</span>
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
                                                <td>
                                                    <div v-if="item.estado.gl_nombre=='Confirmada'">
                                                        <span class="badge rounded-pill bg-secondary">{{ item.estado.gl_nombre }}</span>
                                                    </div>
                                                    <div v-if="item.estado.gl_nombre=='Ingresada'">
                                                        <span class="badge rounded-pill bg-primary">{{ item.estado.gl_nombre }}</span>
                                                    </div>
                                                    <!-- <span class="badge rounded-pill bg-primary">{{ item.estado.gl_nombre }}</span> -->
                                                 </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                          
                                                        </button>
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                            <li><a class="dropdown-item" href="#" @click="detalle(item.id)">Detalle</a></li>
                                                            <li v-if="item.protocolo">
                                                                <a class="dropdown-item" :href="'http://10.6.3.43/pabellon/buscar_ficha/pdf_protocolo/'+item.protocolo.id" target="_blank">Protocolo</a>
                                                            </li>
                                                            <li v-else>
                                                                <a v-if="item.estado==2" class="dropdown-item" href="">Ingresar protocolo</a>
                                                            </li> 
                                                      
                                                            <!-- {{ item }} -->
                                                            <li v-if="item.consentimiento">
                                                                <a class="dropdown-item" :href="'http://10.6.3.43/pabellon/buscar_ficha/pdf_consentimiento/'+item.id" target="_blank">Consentimiento Informado</a>
                                                            </li>
                                                            <li v-else>
                                                                <!-- <a class="dropdown-item" @click="ingresarConsentimiento(item.id)">Ingresar Consentimiento Informado</a> -->
                                                                <a v-if="item.id_estado<3" class="dropdown-item a-ingresar-conc-inf" @click="abrirModal('consentimiento', item)" target="_blank">Ingresar Consentimiento Informado</a>
                                                            </li>
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
            <ModalPaciente :paciente="paciente"></ModalPaciente>
            <ModalConsentimiento :paciente="paciente" :solicitud="solicitud"></ModalConsentimiento>
    </div>
</template>
<script>
import { defineComponent } from 'vue';
import $ from 'jquery';
import moment from 'moment';
import ModalDetalle from './ModalDetalleComponent.vue';
import ModalPaciente from './ModalPacienteComponent.vue';
import ModalConsentimiento from './ModalConsentimiento.vue';



import Swal from 'sweetalert2';
export default defineComponent({
    components: {
        ModalDetalle,
        ModalPaciente,
        ModalConsentimiento,
    },
    data() {
        return {
            id: '',
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
            solicitud: {
                id:''
            },
            paciente: {
                id:'',
                run : '', 
                nombres: '',
                nombre: '',
                apellidoM: '',
                apellidoP: '',
                ficha: '',
                fechaNacimiento:'',
                direccion: '',
                sexo: '',
                sexo_id: '',
                prevision: '',
                fonasa_id: '',
                edad : '', 
                telefono : '',
                fonasaClasif: '',
                fonasa_clasificacion_id: '',
                comuna_id: '', 
                cel:''
            }
        };
    },
    methods: {
        abrirModal(tipo, solicitud=[]){            
            if(tipo=='paciente'){
                $('#modalPaciente').modal('show');
            }else if(tipo=='consentimiento'){
                this.solicitud.id = solicitud.id
                $('#modalConsentimiento').modal('show');
            }
        },
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
                    if(response.data.paciente.tx_telefono=='null'){
                        this.paciente.cel = ''
                    }else{
                        this.paciente.cel = response.data.paciente.tx_telefono;
                    }

                    this.loadingBuscar = false;
                    this.verPaciente = true;    
                    this.paciente.id = response.data.paciente.id;
                    this.paciente.run = response.data.paciente.nr_run+'-'+response.data.paciente.tx_digito_verificador;
                    this.paciente.ficha = response.data.paciente.nr_ficha;
                    this.paciente.nombre = response.data.paciente.tx_nombre+' '+response.data.paciente.tx_apellido_paterno+' '+response.data.paciente.tx_apellido_materno;
                    this.paciente.nombres = response.data.paciente.tx_nombre;
                    this.paciente.apellidoP = response.data.paciente.tx_apellido_paterno;
                    this.paciente.apellidoM = response.data.paciente.tx_apellido_materno;
                    this.paciente.fechaNacimiento = response.data.paciente.fc_nacimiento;
                    this.paciente.direccion = response.data.paciente.tx_direccion;
                  
                    this.getSexo(response.data.paciente.id_sexo);
                    this.getPrevision(response.data.paciente.id_prevision);
                    if(response.data.paciente.clasificacion_fonasa){
                        this.paciente.fonasa_clasificacion_id = response.data.paciente.clasificacion_fonasa.id
                        this.paciente.fonasaClasif = response.data.paciente.clasificacion_fonasa
                    }
                    this.paciente.sexo_id = response.data.paciente.id_sexo
                    this.paciente.prevision_id = response.data.paciente.id_prevision
                    this.paciente.comuna_id = response.data.paciente.id_comuna
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
        ingresarConsentimiento(id){
            var data = new FormData();
            data.append('id', id);
            axios.post('/consentimiento/registrar', data)
            .then(response => { 
                console.log(response.data);
            })
            .catch(error => {
                console.error('Error: ', error);
            });
        },
        metodoBusqueda(e){
            this.tipoBusqueda = e.target.value;

            if(this.tipoBusqueda=='rut'){
                this.ficha = ''
            }else{
                this.run = ''
            }
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
            })
            .catch(error => {
                console.log(error)
            });
        }
    },
    setup() {
        // console.log('Este es el consola')
    },
    mounted() {
        const vm = this;
        vm.soloNumeros();
        $( window ).on( "load", function() {
            $('#contenedor-numero').on('input', '.input-number', function () {
                this.value = this.value.replace(/[^0-9]/g, '');
            });
        });
    }
})
</script>

<style scoped>
    
</style>