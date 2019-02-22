<template>
    <div class="container box">

        <form class="form-signin" @submit.prevent='loginUser'>
            <h1 align="center">Login</h1>
            <div class="form-group form-group-lg">
                <input type="email" class="form-control"
                       id="inputEmail3"
                       placeholder="Email"  name="email"
                       autofocus
                       v-validate="'required|email'"
                       v-model="login.email"
                >

                <div v-show="errors.has('email')" class="help block alert alert-danger">
                    {{ errors.first('email') }}
                </div>
            </div>

            </br>


            <div class="form-group form-group-lg">
                <input type="password" class="form-control"
                       id="inputPassword3" placeholder="password"
                       name="password"
                       v-validate="'required'"
                       v-model="login.password"
                        >
                <div v-show="errors.has('password')" class="help block alert alert-danger">
                    {{ errors.first('password') }}
                </div>
            </div>




            <div class="form-group form-group-lg">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck1">
                    <label class="form-check-label" for="gridCheck1">
                        Remember Me
                    </label>
                </div>
            </div>


            <div class="form-group form-group-lg">
                <button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
            </div>


        </form>


    </div>

</template>

<script>



    export default {
        data() {
            return {
                login: {
                    email: "",
                    password: ""
                }
            }
        },

        methods:{
            loginUser(){
            this.$http.post('http://localhost:8000/api/login', this.login)
                .then(response => {

                    let token=response.data.token;
                    let name=response.data.currentUser.firstname;
                    let msg=response.data.msg;
                    console.log(msg);

                    if(token){
                        localStorage.setItem('token',token);
                        let testToken=localStorage.getItem('token');
                        this.$router.push('/profile');
                        console.log(name);
                        console.log(localStorage.getItem('token'));
                        
                    }else{
                        console.log(msg);
                    }
                })
                .catch(error => {
                    console.log(error.response);
                    console.log("ERROR");
                })

        }
        }
    }
</script>