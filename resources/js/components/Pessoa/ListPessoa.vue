<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-dark">
                    <div class="card-header text-white">Pessoas</div>

                    <div class="card-body">
                        <table class="table table-dark">
                        <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Categoria</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="pessoa in pessoas" :key="pessoa.codigo">
                            <td>{{ pessoa.codigo }}</td>
                            <td>{{ pessoa.nome }}</td>
                            <td>{{ pessoa.email }}</td>
                            <td>{{ pessoa.categoria.nome }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <router-link :to="{name: 'editpessoa', params: { codigo: pessoa.codigo }}" class="btn btn-success">Edit</router-link>
                                    <button class="btn btn-danger" @click="deletePessoa(pessoa.codigo)">Delete</button>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
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
            pessoas: []
        }
    },
    created() {
        this.axios
            .get( 'http://localhost:8000/api/pessoa/')
            .then(response => {
                this.pessoas = response.data;
            });
    },
    methods: {
        deletePessoa(codigo) {
            this.axios
                .delete('http://localhost:8000/api/pessoa/'+codigo)
                .then(response => {
                    let i = this.pessoas.map(data => data.codigo).indexOf(codigo);
                    this.pessoas.splice(i, 1)
                    if(response.status == 200) {
                        this.$notify(
                            {
                                text: "Pessoa excluída com sucesso!",
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
        }
    }
}
</script>
