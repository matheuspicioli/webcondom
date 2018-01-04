<template>
    <div v-bind:class="defineBox">
        <div class="box-header with-border">
            <h3 class="box-title">
                {{ titulo }}
            </h3>
        </div>
        <div class="box-body">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['box', 'titulo'],
        computed: {
            defineBox: function () {
                return "box " + (this.box || "");
            }
        }
    }
</script>