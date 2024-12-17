<template>
    <div>
        <h1>Listado de Lugares</h1>
        <ul>
            <li v-for="place in places" :key="place.id">{{ place.nombre }}</li>
        </ul>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            places: [], // Lista de lugares vacía
        };
    },
    created() {
        axios.get('https://expo-antioquia-79bc482a1286.herokuapp.com/api/places') // Ruta de tu API
            .then(response => {
                this.places = response.data; // Asigna los datos a "places"
            })
            .catch(error => {
                console.error('Error al obtener los lugares:', error);
            });
    },
};
</script>

<style scoped>
h1 {
    color: #333;
}
ul {
    list-style: none;
    padding: 0;
}
li {
    margin: 5px 0;
}
</style>
