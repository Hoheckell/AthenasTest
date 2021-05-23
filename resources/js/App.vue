<template>
    <div class="container">
        <notifications />
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/" class="nav-item nav-link">Home</router-link>
                    <router-link to="/pessoas" class="nav-item nav-link">Lista de Pessoas</router-link>
                    <router-link to="/newpessoa" class="nav-item nav-link">Adicionar Pessoa</router-link>
                    <router-link to="/categorias" class="nav-item nav-link">Lista de Ctegorias</router-link>
                    <router-link to="/newcategoria" class="nav-item nav-link">Adicionar Categoria</router-link>
                </div>
            </div>
        </nav>
        <router-view> </router-view>
    </div>
</template>

<script>
export default {}
</script>
