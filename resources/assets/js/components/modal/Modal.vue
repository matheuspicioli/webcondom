<template>
    <div v-bind:id="nome" class="modal fade" tabindex="-1" role="dialog" v-bind:aria-labelledby="nome">
        <div v-bind:class="defineTamanho" role="document">
            <div class="modal-content">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['nome', 'tamanho'],
        computed: {
            defineTamanho: () => {
                return "modal-dialog "+this.tamanho;
            }
        }
    }
</script>
<style>

</style>