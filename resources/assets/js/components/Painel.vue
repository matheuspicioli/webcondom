<template>
    <div v-bind:class="defineCor">
        <div class="panel-heading">{{ titulo }}
            <span v-if="url"> - <a v-bind:href="url" style="color: #000">{{ nomeurl }}</a> </span>
        </div>

        <div class="panel-body">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['titulo', 'cor', 'url', 'nomeurl'],
        computed:{
            defineCor: function(){
                return "panel "+ (this.cor || "panel-default");
            }
        }
    }
</script>

<style>
    .blue {
        border-color: #242af0;
    }
    .blue > .panel-heading {
        color: #FFFFFF;
        background-color: #242af0;
        border-color: #242af0;
    }

    .orange {
        border-color: #ea5112;
    }
    .orange > .panel-heading {
        color: #FFFFFF;
        background-color: #ea5112;
        border-color: #ea5112;
    }

    .red {
        border-color: #e00d0b;
    }
    .red > .panel-heading {
        color: #FFFFFF;
        background-color: #e00d0b;
        border-color: #e00d0b;
    }
</style>