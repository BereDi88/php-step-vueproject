<template>
    <StyledContentBlock>
        <StyledRegistrationBlock>
            <div>
                <BootstrapImg
                        :src="require('@/assets/img/reg.png')"
                        width="150"
                        height="100"

                />
            </div>

            <div>
                Login: <BootstrapFormInput v-model="formData.login"/>
                Password: <BootstrapFormInput v-model="formData.password"/>
            </div>
            <div>
                <BootstrapButton variant="success">
                    Registration
                </BootstrapButton>
            </div>
        </StyledRegistrationBlock>
    </StyledContentBlock>
</template>

<script>
    import styled from 'vue-styled-components';

    import BootstrapImg from 'bootstrap-vue/es/components/image/img';
    import BootstrapFormInput from 'bootstrap-vue/es/components/form-input/form-input';
    import BootstrapButton from 'bootstrap-vue/es/components/button/button';
    import BootstrapModal from 'bootstrap-vue/es/directives/modal/modal';

    const StyledContentBlock=styled('div')`
          display: grid;
          justify-items: center;
          grid-template-rows: 1fr;
          `;
    const StyledRegistrationBlock=styled('div')`
         display: grid;
         width: 300px;
         grid-template-columns: 1fr;
         grid-template-rows: 1fr 2fr 1fr;
         border: 1px solid blueviolet;
         border-radius: 8px;
         grid-row-gap: 25px;
         padding: 15px;
         `;

    export default {
        name: "Registration",

        components:{
            StyledRegistrationBlock,
            StyledContentBlock,
            BootstrapImg,
            BootstrapFormInput,
            BootstrapButton,
            BootstrapModal
        },

        data (){
            return{
                authorize:false,
                formData:{
                    login:'',
                    password:''
                }
            };
        },

        methods:{
             registrationRequest(){

             }
        }

        // watch:{
        //     'formData.login'(newVal){
        //        console.log()
        //     }
        // }

    }
</script>

<style scoped>
    .content{

    }
</style>