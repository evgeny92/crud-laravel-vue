<template>
    <div>
        <div v-for="(item, index) in items" v-bind:key="index">
            <list-item-component
                    :item="item"
                    class="item"
                    v-on:itemchanged="$emit('reloadlist')"
            />
        </div>
    </div>
</template>

<script>
    import listItemComponent from "./ListItemComponent"

    export default {
        props: ['items'],
        components: {
            listItemComponent
        }
    }
</script>

<style scoped>
    .item {
        background: #6E6E6E;
        padding: 5px;
        margin-top: 5px;
    }
</style>