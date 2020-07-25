<template>
    <diV>
        <button class="btn btn-primary" @click="followUser" v-text="buttonText"></button>
    </diV>
</template>

<script>
    export default {
        props:['user_id','follows'],
        mounted() {
            console.log('Component mounted.')
        },
        data:function () {
            return{
               status:this.follows,
            }
        },
        methods:{
            followUser(){
                axios.post('/follow/'+this.user_id).then(response =>{
                    console.log(response.data);
                    this.status =!this.status;
                }).catch(e=>{
                   if(e.response.status == 401){
                         window.location ="/login";
                   }
                })
            }
        },

        computed:{
            buttonText(){
                return (this.status)? "Unfollow" :"Follow"
            }

        }

    }
</script>
