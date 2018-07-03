<template>
    <div>
        <div class="form-inline">
            <a v-if="criar && !modal" v-bind:href="criar">Criar</a>
            <modal-link v-if="criar && modal" tipo="button" nome="adicionar" titulo="Abrir modal component" css=""></modal-link>
            <div class="form-group pull-right">
                <input type="search" class="form-control" placeholder="Buscar" v-model="buscar">
            </div>
        </div>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th style="cursor: pointer;" v-on:click="ordenaColuna(index)" v-for="(titulo, index) in titulos">
                        {{ titulo }}
                        <span class="glyphicon glyphicon-arrow-down"></span>
                        <span class="glyphicon glyphicon-arrow-up"></span>
                    </th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in lista">
                    <td v-for="i in item">{{ i }}</td>
                    <td v-if="detalhe || editar || deletar">
                        <form v-bind:id="index" v-if="deletar && token" action="" method="POST">
                            <input type="hidden" name="_method" value="DELTE">
                            <input type="hidden" name="_token" v-bind:value="token">

                            <a v-if="editar && !modal" v-bind:href="editar">Editar |</a>
                            <modal-link v-if="editar && modal" tipo="link" nome="editar" titulo="Editar |"></modal-link>

                            <a v-if="detalhe" v-bind:href="detalhe">Detalhe |</a>
                            <a href="#" v-on:click="executaForm(index)">Deletar</a>
                        </form>
                        <span v-if="!token">
                            <a v-if="editar && !modal" v-bind:href="editar">Editar |</a>
                            <modal-link v-if="editar && modal" tipo="link" nome="editar" titulo="Editar |"></modal-link>
                            <a v-if="detalhe" v-bind:href="detalhe">Detalhe |</a>
                            <a v-if="deletar" v-bind:href="deletar">Deletar</a>
                        </span>
                        <span v-if="token && !token">
                            <a v-if="editar && !modal" v-bind:href="editar">Editar |</a>
                            <modal-link v-if="editar && modal" tipo="link" nome="editar" titulo="Editar |"></modal-link>
                            <a v-if="detalhe" v-bind:href="detalhe">Detalhe</a>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props: ['titulos', 'itens', 'ordem', 'ordemcol', 'criar', 'detalhe', 'editar', 'deletar', 'token', 'modal'],
        data: function () {
            return {
                buscar: "",
                ordemAux: this.ordem || "asc",
                ordemAuxCol: this.ordemcol || 0
            }
        },
        methods:{
            executaForm: function (index) {
                document.getElementById(index).submit();
            },
            ordenaColuna: function (coluna) {
                this.ordemAuxCol = coluna;
                if(this.ordemAux.toLowerCase() == "asc")
                    this.ordemAux = "desc";
                else
                    this.ordemAux = "asc";
            }
        },
        computed:{
            lista: function () {
                let ordem = this.ordemAux;
                let ordemCol = this.ordemAuxCol;
                ordem = ordem.toLowerCase();
                ordemCol = parseInt(ordemCol);

                if(ordem == "asc"){
                    this.itens.sort(function(a,b){
                        if(Object.values(a)[ordemCol] > Object.values(b)[ordemCol]) return 1;
                        if(Object.values(a)[ordemCol] < Object.values(b)[ordemCol]) return -1;
                        return 0;
                    });
                } else {
                    this.itens.sort(function(a,b){
                        if(Object.values(a)[ordemCol] < Object.values(b)[ordemCol]) return 1;
                        if(Object.values(a)[ordemCol] > Object.values(b)[ordemCol]) return -1;
                        return 0;
                    });
                }

                if(this.buscar){
                    return this.itens.filter(item => {
                        for(let i = 0; i < item.length; i++){
                            if((item[i] + "").toLowerCase().indexOf(this.buscar.toLowerCase()) >= 0)
                                return true;
                        }
                        return false;
                    });
                }

                return this.itens;
            }
        }
    }
</script>
<style>

</style>