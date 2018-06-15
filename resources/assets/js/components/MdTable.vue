<template>
    <div>
        <md-table>
            <md-table-row>
                <md-table-head md-numeric v-for="cabecalho in cabecalhos" v-bind:key="cabecalho" v-bind:cabecalho="cabecalho">
                    <h3 v-bind="cabecalho"></h3>
                </md-table-head>
            </md-table-row>

            <md-table-row v-for="(item, index) in itens" v-bind:key="item.id" v-bind:item="item" v-bind:index="index">
                <md-table-cell md-numeric v-bind="index"></md-table-cell>
                <md-table-cell v-bind="item"></md-table-cell>
            </md-table-row>
        </md-table>
    </div>
</template>

<script>
    export default {
        props: [ 'itens', 'cabecalhos' ],
        computed: {},
        data: () => {
            return {}
        }
    }
</script>