<template>
    <section class="vh-100" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-12 col-xl-12">
                <div class="card rounded-3 area">
                    <div class="card-body p-4">

                        <h4 class="text-center my-3 pb-3">To Do Application</h4>

                        <Create />

                        <table class="table mb-4">
                        <thead>
                            <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Todo item</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(task,index) in tasks" :key="index">
                                <th scope="row">{{index + 1 }} </th>
                                <td>{{ task.title }}</td>
                                <td>{{task.status == 0 ? 'Inprogress' : 'Finished'}}</td>
                                <td>
                                    <button type="button" class="btn btn-danger" @click="deleteTask(task.id)" >Delete</button>
                                    &nbsp;

                                    <button v-if="task.status == 0 " type="button" class="btn btn-success ms-1" @click="updateStatus({id:task.id,status:1})">Finished</button>
                                    <button v-else type="button" class="btn btn-info ms-1" @click="updateStatus({id:task.id,status:0})">In progress</button>
                                </td>
                            </tr>

                        </tbody>
                        </table>

                    </div>
                    <h4 v-if="errorMsg !=null" class="notification text-danger text-center">{{errorMsg}}</h4>
                    <h4 v-if="successMsg" class="notification text-success text-center">{{successMsg}}</h4>
                </div>
            </div>
            </div>
        </div>
    </section>
</template>

<script lang="js">
import { computed, onMounted, ref } from 'vue';
import Create from './Create.vue'
import { useStore } from 'vuex';

    //composition api
    export default {
        components:{
            Create
        },
        name: 'List',
        setup(){
            const store = useStore();

            onMounted(()=>{
               store.dispatch('loadTasks');
            });

            function deleteTask(id){
                 store.dispatch('removeTask',id);
            }

            function updateStatus(info){
                console.log(info);
                store.dispatch('updateStatus',info);
            }

            return {
                tasks: computed(()=> store.getters.getTasks),
                errorMsg: computed(()=> store.getters.getErrorMsg),
                successMsg: computed(()=> store.getters.getSuccessMsg),
                deleteTask,
                updateStatus
            }

        }
    }
</script>

<style type="css">
    body {
        position: relative;
    }
    .notification {
        position: absolute;
        top: -6%;
        left: 0%;
        right: 0%;
        margin: 0 auto;

    }
</style>