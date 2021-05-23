<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-dark">
                    <div class="card-header text-white">Categorias</div>

                    <div class="card-body">
                        <table class="table table-dark">
                            <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Nome</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="categoria in categorias" :key="categoria.codigo">
                                <td>{{ categoria.codigo }}</td>
                                <td>{{ categoria.nome }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <router-link :to="{name: 'editcategoria', params: { codigo: categoria.codigo }}" class="btn btn-success">Edit</router-link>
                                        <button class="btn btn-danger" @click="deleteCategoria(categoria.codigo)">Delete</button>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <pagination :data="pagination" @pagination-change-page="getResults">
                            <span slot="prev-nav">&lt; Anterior</span>
                            <span slot="next-nav">Próxima &gt;</span>
                        </pagination>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            categorias: [],
            pagination:{}
        }
    },
    mounted() {
        this.getResults();
    },
    methods: {
        deleteCategoria(codigo) {
            this.axios
                .delete('http://localhost:8000/api/categoria/'+codigo)
                .then(response => {
                    let i = this.categorias.map(data => data.codigo).indexOf(codigo);
                    this.categorias.splice(i, 1)
                    console.log(response.status);
                    if(response.status == 200) {
                        this.$notify(
                            {
                                text: "Categoria excluída com sucesso!",
                                type: "success",
                            },
                            3000
                        );
                    }else{
                        this.$notify(
                            {
                                text: "Não foi possível concluir a exclusão",
                                type: "error",
                            },
                            3000
                        );
                    }
                });
        },
        getResults(page = 1) {
            this.axios
                .get( 'http://localhost:8000/api/categoria?page=' + page)
                .then(response => {
                    this.categorias = response.data.data;
                    this.pagination = response.data;
                });
        }
    }
}
</script>
