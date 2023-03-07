<template>
    <div class="container">
        <button @click="followUser" class="btn btn-primary">Follow</button>
    </div>
</template>

<script>
import axios from 'axios';

    export default {
        props: ['userId'],

        mounted() {
            console.log('Component mounted.')
        },

        methods: {
            followUser() {
                axios.post('/follow/' + this.userId)
                .then(console.log)
            }
        }
    }
</script>
