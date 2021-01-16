<template>
    <div class="todoListContainer">
        <div class="heading">
            <h2 id="title">Todo list</h2>
            <add-item-form-component
                    v-on:reloadlist="getList()"
            />
        </div>
        <list-view-component
            :items="items"
            v-on:reloadlist="getList()"
        />
    </div>
</template>

<script>
    import addItemFormComponent from "./AddItemFormComponent"
    import listViewComponent from "./ListViewComponent"

    export default {
        components: {
            addItemFormComponent,
            listViewComponent
        },
        data: function () {
            return{
                items: []
            }
        },
        methods: {
            getList(){
                axios.get('api/items')
                    .then(response =>{
                        this.items = response.data
                    })
                    .catch(error =>{
                        console.log(error)
                    })
            }
        },
        created(){
            this.getList();
        }
    }
</script>

<style scoped>
    .todoListContainer {
        width: 350px;
        border: 1px solid black;
    }

    .heading{
        background: #6E6E6E;
        padding: 10px;
    }
    #title{
        text-align: center;
    }
</style>
