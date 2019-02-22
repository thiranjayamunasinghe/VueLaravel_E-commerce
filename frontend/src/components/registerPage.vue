<template>
    <div>
    <div class="container box">
   <form @submit.prevent='registerUser'>



        <h1 align="center">Register</h1>
        <div class="form-group form-group-lg">
            <input type="text" class="form-control" id="inputEmail3" placeholder="First Name" name="firstname" v-model="register.firstname">
        </div>


        <div class="form-group form-group-lg">
            <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name" name="lastname" v-model="register.lastname">
        </div>


        <div class="form-group form-group-lg">
            <input type="email" class="form-control" id="inputPassword3" placeholder="Email" name="email" v-model="register.email">
        </div>


        <div class="form-group form-group-lg">
            <input type="password" class="form-control" id="inputPassword3" placeholder="password" name="password" v-model="register.password">
        </div>



        <div class="form-group form-group-lg">
            <input type="password" class="form-control" id="inputPassword3" placeholder="confirm password" name="confirm_password" v-model="register.confirm_password">
        </div>


        <div class="form-group form-group-lg">
            <button type="submit" class="btn btn-lg btn-primary btn-block">Register</button>

        </div>

    </form>
    </div>
    </div>
</template>



<script>


export default{
    data(){
        return{
            register:{
                firstname:"",
                lastname:"",
                email:"",
                password:"",
                confirm_password:""
            }
        }
    },

    methods:{
        registerUser(){

            this.$http.post('http://localhost:8000/api/register',this.register)
                .then(response=>{
                    console.log("Done");
                    console.log(response);
                  //  this.$router.push('/loginPage');

                })
                .catch(error=>{
                    console.log(error.response);
                    console.log("ERROR");
                })
        }
    }

}

</script>