<template>
	<ControllGutter>
      <div>
        <BootstrapImg
            :src="require('@/assets/img/reg.png')"
            width="150"
            height="100"
        />
      </div>

      <div>
        Name:
        <BootstrapFormInput
            v-model="formData.name"
            v-validate="'required'"
            name="form_name"
        />
        <span v-show="errors.has('form_name')" style="color: red">
                   The field is required<br>
                </span>
        Email:
        <BootstrapFormInput
            v-model="formData.email" type="email"
            v-validate="'email|required'"
            name="form_email"
        />
        <span v-show="errors.has('form_email')" style="color: darkred">
                   Email is not valited<br>
                </span>
        UserName:
        <BootstrapFormInput
            v-model="formData.userName"
            v-validate="'required'"
            name="form_username"
        />
        <span v-show="errors.has('form_username')" style="color: lightcoral">
                   Name is not valited<br>
                </span>
        Password:
        <BootstrapFormInput
            v-model="formData.password"
            type="password"
            name="form_password"
            v-validate="'min:6|required'"
        />
        <span v-show="errors.has('form_password')" style="color: darkgreen">
                   Password less the 6 characters<br>
        </span>
      </div>
      <div>
        <BootstrapButton variant="success" @click="addUser">
          Registration
        </BootstrapButton>
      </div>
		</ControllGutter>
</template>

<script>

  import BootstrapImg from 'bootstrap-vue/es/components/image/img';
  import BootstrapFormInput from 'bootstrap-vue/es/components/form-input/form-input';
  import BootstrapButton from 'bootstrap-vue/es/components/button/button';
  import BootstrapModal from 'bootstrap-vue/es/directives/modal/modal';

  import ControllGutter from './ControllGutter';

  export default {
    name: "Registration",

    components: {

      BootstrapImg,
      BootstrapFormInput,
      BootstrapButton,
	    BootstrapModal,
	    ControllGutter
    },

    data() {
      return {
        authorize: false,
        formData: {
          name: '',
          email: '',
          userName: '',
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

      addUser() {
        this.validateForm()
          .then((isFormValid) => {
            if (!isFormValid) {
              return;
            }

            const userData={
              formData:{
                name: this.formData.name,
                email: this.formData.email,
                user_name: this.formData.userName,
                password: this.formData.password
              }
            };

            this.axios({
              method: 'get',
              url: 'http://todo.loc/api/server.php',
							responseType:'json',
              params: Object.assign(userData, {add_user:true})
            })
              .then((serverRespounse) => {
	              const  response = serverRespounse.data;

	              if (response.errors.length !==0 && response.errors.includes('email')){
		              this.$toast.error('User with this email is already exist','Error');
		              return;
	              }
	              this.$router.push('/auth');
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