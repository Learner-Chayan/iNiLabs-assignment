<template>
        <form class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2">
            <div class="col-6">
                <div class="form-outline">
                    <input v-model="title" type="text" id="form1" class="form-control" placeholder="Enter Task" />
                    <p v-if="title == '' && state.isSubmitted" class="text-danger">The field is required!</p>
                </div>
            </div>

            <div class="col-1">
                <button type="button" class="btn btn-primary" v-on:click="submit">Save</button>
                <p v-if="title == '' && state.isSubmitted"  class="text-danger"> ............. </p>
            </div>

        </form>
</template>

<script lang="js">

import { reactive, ref } from 'vue';
import {useStore } from 'vuex';
 
 export default {
    name: 'Create',
    setup(){

        const title = ref('');
        const state = reactive({
            isSubmitted:false,
        })
        const store = useStore();

        function submit (){
            if(title.value == ''){
                state.isSubmitted = true;
            }else{
                store.dispatch('insertTask', title.value);
                title.value = "";
            }
        }

        return {
            title,
            submit,
            state
        }

    }
 }

</script>