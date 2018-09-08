<template>
    <div class="content">
        Test authorization
    </div>
</template>

<script>
    export default {
        //name: "Authorization"
        data (){
            return{
                authorize:false,
                formData:{
                    login:'',
                    password:''
                }
            };
        }
    }
</script>

<style scoped>
    .content{

    }
</style>