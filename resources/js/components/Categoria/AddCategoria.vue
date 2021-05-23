<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-dark">
                    <div class="card-header text-white">Nova Categoria</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nome" class="text-white">Nome:</label>
                            <input type="text" name="nome" id="nome" class="form-control" v-model="categoria.nome" value="">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-block btn-primary" v-on:click="saveCategoria()">Adicionar</button>
                        </div>
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
            categoria: {}
        }
    },
    mounted() {
    },
    methods: {
        saveCategoria() {
            if(this.categoria.nome != undefined) {
                this.axios
                    .post('http://localhost:8000/api/categoria', this.categoria)
                    .then(response => {
                        if (response.status == 200) {
                            this.$notify(
                                {
                                    text: "Categoria adicionada com sucesso!",
                                    type: "success",
                                },
                                3000
                            );
                            this.$router.push({name: 'categorias'})
                        } else {
                            this.$notify(
                                {
                                    text: "Não foi possível concluir a inserção",
                                    type: "error",
                                },
                                3000
                            );
                        }
                    });
            }else{
                this.$notify(
                    {
                        text: "Campo preenchido incorretamente",
                        type: "error",
                    },
                    3000
                );
            }
        }
    }
}
</script>
