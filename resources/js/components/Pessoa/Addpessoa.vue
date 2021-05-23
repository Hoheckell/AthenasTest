<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-dark">
                    <div class="card-header text-white">Nova Pessoa</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nome" class="text-white">Nome:</label>
                            <input type="text" name="nome" id="nome" class="form-control" v-model="pessoa.nome" value="">
                        </div>
                        <div class="form-group">
                            <label for="email" class="text-white">Email:</label>
                            <input type="email" name="email" id="email" class="form-control" v-model="pessoa.email" value="">
                        </div>
                        <div class="form-group">
                            <label for="categoria_nome" class="text-white">Categoria:</label>
                            <select name="categoria_nome" id="categoria_nome" class="form-control" v-model="pessoa.categoria_codigo" @change="changePessoaCategoria($event)" >
                                <option v-for="categoria in categorias" :key="categoria.codigo" :value="categoria.codigo">
                                    {{categoria.nome}}
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-block btn-primary" v-on:click="savePessoa()">Adicionar</button>
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
            pessoa: {},
            categorias: []
        }
    },
    mounted() {
        this.axios
            .get('http://localhost:8000/api/categoria')
            .then(response => {
                this.categorias=response.data
            });
    },
    methods: {
        savePessoa() {
            if(this.pessoa.nome != undefined && this.pessoa.nome != undefined && this.pessoa.categoria_codigo != undefined) {
                this.axios
                    .post('http://localhost:8000/api/pessoa', this.pessoa)
                    .then(response => {
                        if (response.status == 200) {
                            this.$notify(
                                {
                                    text: "Pessoa adicionada com sucesso!",
                                    type: "success",
                                },
                                3000
                            );
                            this.$router.push({name: 'pessoas'})
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
                        text: "Campos preenchidos incorretamente",
                        type: "error",
                    },
                    3000
                );
            }
        },
        changePessoaCategoria (event) {
            console.log(event.target.options[event.target.options.selectedIndex].value);
            this.pessoa.categoria_codigo = event.target.options[event.target.options.selectedIndex].value
        }
    }
}
</script>
