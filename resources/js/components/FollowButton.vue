<template>
    <diV>
        <button class="btn btn-primary" @click="followUser">Follow</button>
    </diV>
</template>

<script>
    export default {
        props:['user_id'],
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            followUser(){
                axios.post('/follow/'+this.user_id).then(response =>{
                    console.log(response.data);
                }).catch(e=>{
                    console.log(e);
                })
            }
        }

    }
</script>
