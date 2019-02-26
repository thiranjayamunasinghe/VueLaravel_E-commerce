<template>
<div>


<form class="form-signin" @submit.prevent='loginUser'>
            <h1 align="center">Login</h1>
            <div class="form-group form-group-lg">
                <input type="email" class="form-control"
                       id="inputEmail3"
                       placeholder="Email"  name="email"
                       autofocus
                       v-validate="'required|email'"
                       v-model="user.email"
                >
                </div>
</form>

    <button @click="logout" class="btn btn-lg btn-primary btn-block">Sign out</button>
     <button @click="me" class="btn btn-lg btn-primary btn-block">Profile</button>
    </div>
</template>


<script>

    


    export default {
        data() {
            return {
                user: {
                    firstname: "",
                    lastname:"lskd",
                    email: 'outToken',
                }
            }
        },

        methods:{
            logout(){
                let outToken=localStorage.getItem('token');
                console.log(outToken);
                
            this.$http.post('http://localhost:8000/api/logout', outToken)
            
                .then(response => {
                    if(!token){
                        this.$router.push('/login');
                    }
                })
                .catch(error => {
                    console.log(error.response);
                    console.log("ERROR");
                })

        },

        me(){
                let outToken=localStorage.getItem('token');
                console.log(outToken);
                
            this.$http.post('http://localhost:8000/api/me',outToken)
            
                .then(response => {
                    if(!token){
                        this.$router.push('/login');
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