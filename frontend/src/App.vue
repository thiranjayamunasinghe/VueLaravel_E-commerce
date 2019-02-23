<template>
<div id="app">
<navbar></navbar>

  <router-view></router-view>

</div>
</template>

<script>


  import Navbar from './components/Navbar.vue'
  import Home from './components/Home.vue'


  export default {
    components:{
      'navbar':Navbar,
      'home':Home

    }
  }


</script>

<style>

</style>
