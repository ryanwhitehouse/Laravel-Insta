<template>
    <div class="container">
        <button @click="followUser" v-text="buttonText" class="btn btn-primary"></button>
    </div>
</template>

<script>
import axios from 'axios';

    export default {
        props: ['userId', 'follows'],

        mounted() {
            console.log('Component mounted.')
        },

        data: function() {
            return {
                status: this.follows,
            }
        },

        methods: {
            followUser() {
                axios.post('/follow/' + this.userId)
                .then(result => {
                    this.status = !this.status;
                    console.log(result)
                })
            }
        },

        computed: {
            buttonText() {
                return this.status == true ? 'Unfollow' : 'Follow'
            }
        }
    }
</script>
