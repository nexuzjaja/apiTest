<template>
    <div class="container">
        <div class="text-center">
            <span>ApiTest Main</span>
        </div>
        <nav class="navbar navbar-expand-lg">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/" class="nav-item nav-link">Inicio</router-link>
                    <router-link to="/add" class="nav-item nav-link">Agrega Applicant</router-link>
                </div>
            </div>
        </nav>
        <router-view></router-view>
    </div>
</template>
 
<script>
    export default {}
</script>