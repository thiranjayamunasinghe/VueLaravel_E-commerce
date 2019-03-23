<template>
<div>


<form class="form-signin" @submit.prevent='loginUser'>
            <h1 align="center">Profile</h1>
            <h3>ID : {{ user.id }}</h3>
            <h3>Name : {{ user.firstname }} {{ user.lastname }}</h3>
            <h3>Email : {{ user.email }}</h3>
            
            
</form>

    <button @click="logout" class="btn btn-lg btn-primary btn-block">Sign out</button>
     <button @click="me" class="btn btn-lg btn-primary btn-block">Profile</button>
    </div>
</template>


<script>



    export default {
        data() {
            return {
                user:[]
            }
        },

        props: ['userL'],

        created: function () {
            console.log(this.userL);
            // this.user=response.data.user;
         },

        methods:{
            logout(){
                let $Token=localStorage.getItem('token');
               /* console.log(Token);*/
                
            this.$http.post('http://localhost:8000/api/logout?token='+$Token)
            
                .then(response => {
                    localStorage.removeItem('token');
                    let $Token=localStorage.getItem('token');
                    if(!$Token){
                        this.$router.push('/loginPage');
                    }
                })
                .catch(error => {
                    console.log(error.response);
                    console.log("ERROR");
                    
                })

        },

        me(){
                let $Token=localStorage.getItem('token');
                console.log($Token);
                 

                
            this.$http.post('http://localhost:8000/api/me?token='+$Token)
            
                .then(response => {
                    this.user=response.data.user;
                    if(!$Token){
                        this.$router.push('/loginPage');
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