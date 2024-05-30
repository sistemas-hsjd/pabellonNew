<template>
    <div>
         <div class="modal fade" id="modalAddUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalAddUserLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDetalleLabel">{{ titulo }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" @click="cerrarModal()"></button>
                </div>

                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="run" class="form-label"><strong>RUN:</strong></label>
                                    <input v-model="run" type="email" class="form-control form-control-sm" id="run" minlength="5" maxlength="10" @change="getPersona($event)" placeholder="Ingrese Run">
                                    <span v-if="errorMensajes.gl_rut" class="mensaje-error">{{ errorMensajes.gl_rut }}</span>
                                  
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label"><strong>Nombre</strong></label>
                                    <input v-model="nombre" type="text" class="form-control form-control-sm" id="nombre" placeholder="Ingrese nombre">
                                    <span v-if="errorMensajes.gl_rut" class="mensaje-error">{{ errorMensajes.gl_nombre }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="email" class="form-label"><strong>Email</strong></label>
                                    <input v-model="email" type="email" class="form-control form-control-sm" id="email" placeholder="Ingrese email">
                                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="perfil" class="form-label"><strong>Perfil</strong></label>
                                    <v-select v-model="perfil" multiple :reduce="perfil => perfil.id" :options="perfiles" label="gl_nombre" id="perfil" placeholder="Seleccione Perfil..."></v-select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="bodega" class="form-label"><strong>Bodegas</strong></label>
                                    <v-select v-model="bodega" multiple :options="bodegas" :reduce="bodega => bodega.id" label="gl_nombre" id="bodega" placeholder="...Seleccione bodega..."></v-select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="especialidad" class="form-label"><strong>Especialidad</strong></label>
                                        <v-select v-model="especialidad" multiple :options="especialidades" :reduce="especialidad => especialidad.id" label="gl_nombre" id="especialidad" placeholder="...Seleccione Especialidad..."></v-select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="equipoMedico" class="form-label"><strong>Equipo Médico:</strong></label>
                                    <v-select v-model="equipoMedico" multiple :options="equiposMedicos" :reduce="eMedico => eMedico.id" label="gl_descripcion" id="equipoMedico" placeholder="...Seleccione Equipo Médico..."></v-select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="pabellon" class="form-label"><strong>Pabellón:</strong></label>
                                    <v-select v-model="pabellon" multiple :options="pabellones" :reduce="pabellon => pabellon.id" label="nombre" id="pabellon" placeholder="...Seleccione Pabellón..."></v-select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="form-check form-switch">
                                    <input v-model="anadirEquipoMedico" class="form-check-input" type="checkbox" id="anadirEquipo">
                                    <label class="form-check-label" for="anadirEquipo"><strong>Añadir equipo médico</strong></label>
                                </div>
                            </div>
                        </div>

                        <div v-if="anadirEquipoMedico">
                            <div class="row ">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="labor" class="form-label"><strong>Labor:</strong></label>
                                        <v-select v-model="personaEquipo.selectLabores" multiple :options="labores" :reduce="labor => labor.id" label="gl_nombre" id="labor" placeholder="Seleccione Labor"></v-select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="tProfesional" class="form-label"><strong>Tipo Profesional:</strong></label>
                                        <v-select v-model="personaEquipo.selectTprofesionales" :options="tiposProfesionales" :reduce="tProf => tProf.id" label="text" id="tProfesional" placeholder="Seleccione Tipo Profesional"></v-select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="nombreE" class="form-label"><strong>Nombre</strong></label>
                                        <input v-model="personaEquipo.nombre" type="text" class="form-control form-control-sm" id="nombreE" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="apellidoP" class="form-label"><strong>Primer Apellido:</strong></label>
                                        <input v-model="personaEquipo.apellidoP" type="text" class="form-control form-control-sm" id="apellidoP" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="apellidoM" class="form-label"><strong>Segundo Apellido:</strong></label>
                                        <input v-model="personaEquipo.apellidoM" type="text" class="form-control form-control-sm" id="apellidoM" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" @click="cerrarModal()">Cerrar</button>
                    <button v-if="!update" type="button" class="btn btn-primary" @click="addUser()">Guardar</button>  
                    <button v-if="update" type="button" class="btn btn-primary" @click="editarUser()">Guardar cambios</button>
                </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { defineComponent } from 'vue'
import Swal from 'sweetalert2';
export default defineComponent({
    props: ['datos'],
    components: {
        // Select2
    },
    data() {
       return {
            errorMensajes: [],
            rutNoValido : false,
            update : false,
            titulo:'Crear Cuenta',
            perfil: [], 
            bodega: [], 
            especialidad: [],
            pabellon: [],
            equipoMedico:[],
            nombre: '', 
            run: '',
            email: '',
            anadirEquipoMedico:false,
            personaEquipo:{
                nombre: '',
                apellidoP: '',
                apellidoM: '',
                selectTprofesionales:'',
                selectLabores:[],
            },
            perfiles:[], 
            bodegas:[], 
            especialidades:[],
            equiposMedicos:[],
            pabellones:[],
            labores:[],
            tiposProfesionales:[],
            equipoClinico: ''
        }
    },
    methods: { 
        onSelect(){            
            
        },
        cerrarModal(){
            this.errorMensajes = []
            this.update = false
            this.titulo = 'Crear Cuenta'
            this.perfil = []
            this.bodega = []
            this.especialidad = []
            this.run = ''
            this.email = ''
            this.nombre = ''
            this.anadirEquipoMedico = false
            this.personaEquipo.nombre = ''
            this.personaEquipo.apellidoP = ''
            this.personaEquipo.apellidoM = ''
            this.personaEquipo.selectTprofesionales = ''
            this.personaEquipo.selectLabores = []
            this.pabellon = []
            this.equipoMedico = []
        },
        addUser(){
            (this.anadirEquipoMedico==false) ? this.equipoClinico = 'off' : this.equipoClinico = 'on' 
            var data = new FormData();
            data.append('gl_nombre', this.nombre)
            data.append('gl_rut', this.run)
            data.append('gl_mail', this.email)
            data.append('pro_nombres', this.personaEquipo.nombre)
            data.append('pro_apepat', this.personaEquipo.apellidoP)
            data.append('pro_apemat', this.personaEquipo.apellidoM)
            data.append('pro_tipo', this.personaEquipo.selectTprofesionales)

            data.append('perfiles', this.perfil)
            data.append('bodegas', this.bodega)
            data.append('especialidades', this.especialidad)
            data.append('equiposMedicos', this.equipoMedico)
            data.append('pabellones', this.pabellon)
            data.append('equipoClinico', this.equipoClinico)
            data.append('labores', this.personaEquipo.selectLabores)

            axios.post('/user/registrar', data, {
                headers: {'Content-Type': 'multipart/form-data',},
            })
            .then(response => { 
                //console.log(response.data)
                this.$emit('respuestaRecibida', response.data);
                
            })
            .catch(error => {
                console.error('Error: ', error);
                    if (error.response.status === 422) {
                        // me.loadingRegistrar = false;
                        const validationErrors = error.response.data.errors;
                        let errores = {};
                        Object.keys(validationErrors).forEach(key => {
                            errores[key] = validationErrors[key][0];
                        });
                        this.errorMensajes = errores;
                        console.log(this.errorMensajes)
                    } else {
                        console.error('Error en la solicitud:', error);
                    }
            });
        },
        editarUser(){
            this.addUser()
            this.cerrarModal()
        },
        getPersona(input){
            const rut = input.srcElement.value;
            this.getFonasa(rut)
            var data = new FormData();
            data.append('rut', rut);
            axios.post('/get-fonasa', data)
            .then(response => { 
                const { nombres, paterno, materno } = response.data[0]
                this.nombre = `${nombres}`
                this.personaEquipo.nombre = nombres
                this.personaEquipo.apellidoP = paterno
                this.personaEquipo.apellidoM = materno
            })
            .catch(error => {
                console.error('Error: ', error);
            });
          
        },
        getFonasa(rut){
            var data = new FormData();
            data.append('rut', rut);
            axios.post('/get-fonasa', data, {
                headers: {'Content-Type': 'multipart/form-data'},
            })
            .then(response => { 
                const { nombres, paterno, materno } = response.data[0]
                this.nombre = `${nombres} ${paterno} ${materno}`
                this.personaEquipo.nombre = nombres
                this.personaEquipo.apellidoP = paterno
                this.personaEquipo.apellidoM = materno
            })
            .catch(error => {
                console.error('Error: ', error);
            });
        },
        getCreateUserInfo(){
            axios.get('/api/get-info')
            .then(response => { 
                console.log(response.data)
                const { perfiles, bodegas, especialidades, equiposMedicos, pabellones, labores, tiposProfesionales } = response.data
                this.perfiles = perfiles
                this.bodegas = bodegas
                this.especialidades = especialidades
                this.equiposMedicos = equiposMedicos
                this.pabellones = pabellones
                this.labores = labores
                this.tiposProfesionales = tiposProfesionales
            })
            .catch(error => {
                console.error('Error: ', error);
            });
        },
        setValues(datos){
            //console.log(datos)
            this.update = true
            this.titulo = 'Editar Usuario'
            this.nombre = datos.gl_nombre
            this.run = datos.gl_rut
            this.email = datos.gl_mail
            this.perfil = datos.perfiles.map(perfil => perfil.id)
            this.bodega = datos.bodegas.map(bodega => bodega.id)
            this.equipoMedico = datos.equipos_medicos.map(equipo => equipo.id)
            this.pabellon =  datos.pabellones.map(pabellon => pabellon.id)
            this.especialidad = datos.especialidades.map(especialidad => especialidad.id)
            this.getInfoUser(datos.id)
        },
        getInfoUser(id){
            //console.log(id)
            var data = new FormData();
            data.append('id', id);
            axios.post('/user/get-info', data)
            .then(response => { 
                const { medico } = response.data
                if(medico){
                    this.anadirEquipoMedico = true
                    this.personaEquipo.selectLabores = medico.labores.map(labor => labor.id)
                    this.personaEquipo.nombre = medico.nombre
                    this.personaEquipo.apellidoP = medico.pro_apemat
                    this.personaEquipo.apellidoM = medico.pro_apepat
                    if(medico.pro_tipo){
                        this.personaEquipo.selectTprofesionales = medico.pro_tipo
                    }
                }
            })
            .catch(error => {
                console.error('Error: ', error);
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
    }, 
    computed:{
      
    },

    mounted() {
        this.getCreateUserInfo()
    }
})
</script>

<style scoped>
.v-select-menu--custom {
    max-height: 200px; 
    overflow-y: auto;
}
.mensaje-error{
    color:red;
    font-size: .7em;
    font-weight: 800;
}
</style>