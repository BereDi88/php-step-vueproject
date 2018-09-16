<template>
    <ControllGutter>
        <div>
            <BootstrapImage
                :src="require('@/assets/logo.png')"
                width="85"
                height="85"
                rounded="circle"
            />
        </div>
        <div>
            User email :
            <BootstrapInput
                v-model="formData.email"
                name="form_user_name"
                v-validate="'required'"
            />
            <span v-show="errors.has('form_user_name')" style="color: red;">
          The field is required<br>
        </span>
            Password :
            <BootstrapInput
                v-model="formData.password"
                name="form_password"
                type="password"
                v-validate="'min:6|required'"
            />
            <span v-show="errors.has('form_password')" style="color: red;">
          Password less than 6 characters<br>
        </span>
        </div>
        <div>
            <BootstrapButton variant="success" @click="authUser">
                Authorisation
            </BootstrapButton>
        </div>
    </ControllGutter>
</template>

<script>


	import BootstrapImage from 'bootstrap-vue/es/components/image/img';
	import BootstrapInput from 'bootstrap-vue/es/components/form-input/form-input';
	import BootstrapButton from 'bootstrap-vue/es/components/button/button';


	import ControllGutter from './ControllGutter';

	export default {
		name: "Authorization",

		components: {
			BootstrapImage,
			BootstrapInput,
			BootstrapButton,
			ControllGutter
		},

		data() {
			return {
				authorize: false,
				formData: {

					email: '',
					password: ''
				}
			};
		},

		methods: {
			validateForm(toastrType = 'Error', toastrMessage = 'Please enter the fields') {
				return this.$validator.validateAll()
				           .then((result) => {
					           if (!result) {
						           this.$toast.error(toastrMessage,toastrType);
						           return false;
					           }
					           //this.$toast.success('Successfully inserted record!', 'OK');
					           return true;
				           });

			},

			authUser() {
				this.validateForm()
				    .then((isFormValid) => {
					    if (!isFormValid) {
						    return;
					    }

					    const userData={
						    formData:{
							    email: this.formData.email,
							    password: this.formData.password
						    }
					    };

					    this.axios({
						    method: 'get',
						    url: 'http://todo.loc/api/server.php',
						    responseType:'json',
						    params: Object.assign(userData, {auth_user : true})
					    })
					        .then((serverRespounse) => {
						        const  response = serverRespounse.data;
						        console.log('auth response', response);

						        if (response.errors.length !==0 && response.errors.includes('email')){
							        this.$toast.error('Wrong email','Error');
							        return;
						        }
						        if (response.errors.length !==0 && response.errors.includes('password')){
							        this.$toast.error('Wrong password','Error');
							        return;
						        }
						        this.$toast.success('Success','OK');

						        // TODO add congratulation modal
					        });
				    });
			}
		}
	}
</script>

<style scoped>
    .content {

    }
</style>