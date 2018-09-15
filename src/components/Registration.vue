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
    </StyledRegistrationBlock>
  </StyledContentBlock>
</template>

<script>
  import styled from 'vue-styled-components';

  import BootstrapImg from 'bootstrap-vue/es/components/image/img';
  import BootstrapFormInput from 'bootstrap-vue/es/components/form-input/form-input';
  import BootstrapButton from 'bootstrap-vue/es/components/button/button';
  import BootstrapModal from 'bootstrap-vue/es/directives/modal/modal';

  const StyledContentBlock = styled('div')`
          display: grid;
          justify-items: center;
          grid-template-rows: 1fr;
          `;
  const StyledRegistrationBlock = styled('div')`
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

    components: {
      StyledRegistrationBlock,
      StyledContentBlock,
      BootstrapImg,
      BootstrapFormInput,
      BootstrapButton,
      BootstrapModal
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
      validateForm(toastrType = 'error', toastrMessage = 'Please enter the fields') {
        return this.$validator.validateAll()
          .then((result) => {
            if (!result) {
              this.$toastr(toastrType, toastrMessage, 'Error');
              return false;
            }
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
              method: 'post',
              url: 'http://todo.loc/api/server.php',
              responseType: 'json',
              data: Object.assign(userData,{add_user:true})
            })
              .then((serverRespounse) => {
                const responseData = JSON.stringify(serverRespounse.data);

                if (responseData.result) {

                  // ToDO redirect to auth page
                }
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