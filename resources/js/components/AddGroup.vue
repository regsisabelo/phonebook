<template>
    <div>
        <h1>Add Group</h1>
        <button @click="$router.push('/view-group')" class="btn btn-primary">Back</button>
        <div class="form-group">
            <label for="">name</label>
            <input  v-model="name" type="text" class="form-control">
            <button @click="addGroup" class="btn btn-primary">add</button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ["group_id"],
        data(){
            return {
                name: "",
            }
        },
        mounted(){
            if(this.group_id){ // if naay sulod ang group_id, pasabot nag edit siya
                this.getGroups(); // kuhaa nag data sa gi edit nga group
            }
        },
        methods: {
            getGroups(){ // retrieve ug group
                axios.get('/view-group',{
                    params: {
                        id: this.group_id
                    }
                }).then( response => {
                    if(response.data.success){
                        this.name = response.data.group.name;
                    }
                });
            },
            addGroup(){ // create or update ang group
                axios.post('/add-group', {
                    id: this.group_id,
                    name: this.name
                }).then( response => {
                    if(response.data.success){
                        this.$router.push('/view-group');
                    } else {
                        alert("failed to create group");
                    }
                });
            }
        }
    }
</script>

<style scoped>

</style>