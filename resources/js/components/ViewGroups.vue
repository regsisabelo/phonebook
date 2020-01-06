<template>
    <div>
        <h1>View Groups</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Date Created</th>
                    <th>Settings</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(group,index) in groups" :key="index">
                    <td>{{ group.name }}</td>
                    <td>{{ group.created_at }}</td>
                    <td>
                        <a class="btn btn-danger" @click="deleteGroups(group.id)">Delete</a>
                        <a class="btn btn-default" @click="$router.push('/add-group/'+group.id)">Edit</a>
                    </td>
                </tr>
            </tbody>
        </table>
        <button @click="$router.push('/add-group')" class="btn btn-primary">Add Group</button>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                groups: [],
            }
        },
        mounted(){
            this.getGroups();
        },
        methods: {
            getGroups(){ // retrieve ang tanan groups
                axios.get('/view-group',{
                }).then( response => {
                    if(response.data.success){
                        this.groups = response.data.groups;
                    }
                });
            },
            deleteGroups(id){ // delete ang specific nga group
                axios.post('/delete-group',{
                    id: id 
                }).then( response => {
                    if(response.data.success){
                        this.getGroups();
                        alert("successfully deleted");
                    } else {
                        alert("failed to delete");
                    }
                });
            },
        }
    }
</script>

<style scoped>

</style>