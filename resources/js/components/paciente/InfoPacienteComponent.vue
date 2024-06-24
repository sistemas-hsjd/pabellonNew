<template>
    <div class="row" >
    <div class="col-md-6">
        <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex">
                <i class="nav-icon fas fa-solid fa-user mt-2 list-nombre-paciente"></i>
                <h4 class="nombre-paciente">{{ paciente.nombre }}</h4>
            </li>
            <li class="list-group-item d-flex"><span class="span-title text-primary">RUN:</span> <p>{{ paciente.run }}</p></li>
            <li class="list-group-item d-flex"><span class="span-title text-primary">FICHA:</span><p>{{ paciente.ficha }}</p></li>
            <li class="list-group-item d-flex"><span class="span-title text-primary">Fecha de Nacimiento: </span><p>{{ paciente.fechaNacimiento }}</p></li>
            <li class="list-group-item d-flex"><span class="span-title text-primary">Dirección: </span><p>{{ paciente.direccion }}</p></li>
        </ul>
    </div>
    <div class="col-md-6">
        <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex">
                <span class="span-title text-primary">SEXO:</span><p>{{ paciente.sexo }}</p>
            </li>
            <li class="list-group-item d-flex">
                <span class="span-title text-primary">Previsión:</span> <p>{{ paciente.prevision }}</p> <p v-if="paciente.fonasaClasif">{{ paciente.fonasaClasif.tx_descripcion }}</p>
            </li>
            <li class="list-group-item d-flex">
                <span class="span-title text-primary">Edad:</span><p>{{ paciente.edad }} años</p>
            </li>
            <li class="list-group-item d-flex">
                <span class="span-title text-primary">Telefono: </span><p v-if="paciente.telefono=!'null'">{{ paciente.telefono }}</p>
            </li>
        </ul>
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
            titulo: 'Datos Paciente'
        }
    },
    methods: { 

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