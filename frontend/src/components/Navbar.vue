<template>
    <div>

        <div>
            <b-navbar toggleable="lg" type="dark" variant="info">
                <b-navbar-brand tag="h1" class="mb-0" href="/home">JewelPack</b-navbar-brand>

                <b-navbar-toggle target="nav_collapse" />

                <b-collapse is-nav id="nav_collapse">
                    <b-nav tabs>
                        <b-nav-item><router-link to="/home" active>Home</router-link></b-nav-item>
                        <b-nav-item name="Login"><router-link to="/loginPage">Login</router-link></b-nav-item>
                        <b-nav-item name="Register"><router-link to="/registerPage">Register</router-link></b-nav-item>
                        <b-nav-item disabled>Disabled</b-nav-item>


                        <b-navbar-nav class="ml-auto">
                            <b-nav-form class="form-inline my-2 my-lg-0">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>

                            </b-nav-form>
                        </b-navbar-nav>
                    </b-nav>

                </b-collapse>
            </b-navbar>
        </div>

        </div>

</template>

<script>

</script>