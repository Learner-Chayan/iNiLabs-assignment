import { createStore } from "vuex";
import axios from 'axios';


const store = createStore({
    state(){
        return {
            apiUrl:'http://localhost:8000/api',
            tasks:[],
            errorMsg:null,
            successMsg:null
        }
    },
    mutations:{
        storeTask(state,tasks){
            state.tasks = tasks;
        },
        removeTaskById(state,id){
           state.tasks =  state.tasks.filter((task)=>{
                return task.id != id
            })
        },
        addNewTask(state,{id,title,status}){
            state.tasks.push(
                {id:id,title:title,status:status}
            );
        },
        changeStatus(state,info){
            for (let i = 0; i < state.tasks.length; i++) {
               if(info.id == state.tasks[i].id){
                 state.tasks[i].status = info.status;
               }
            }
        },
        setSuccessMessage(state,msg){
            state.successMsg = msg;
            setTimeout(()=>{ state.successMsg = null; }, 3000);
        },
        setErrorMessage(state,msg){
            state.errorMsg = msg;
            setTimeout(()=>{ state.errorMsg = null; }, 3000);
        }
    },
    getters:{
        getTasks(state){
            return state.tasks;
        },
        getErrorMsg(state){
            return state.errorMsg;
        },
        getSuccessMsg(state){
            return state.successMsg;
        }
    },
    actions:{
        loadTasks({commit,state}){
            axios.get(state.apiUrl+"/task")
                .then((res)=>{
                    console.log(res);
                    commit('storeTask',res.data);
                })
                .catch((err)=>{
                    console.log(err);
                    commit('setErrorMessage', 'Failed to load todo information !! check db connection');
                })
        },
        removeTask({commit,state},id){
           // api call 
           axios.delete(state.apiUrl+"/task/"+id)
            .then((res)=>{
                console.log(res);
                commit('removeTaskById',id)
                commit('setSuccessMessage', 'Task deleted successfully !!');
            })
            .catch((error)=>{
                console.log(error);
                commit('setErrorMessage', 'Failed to delete task !!');
            })

        },
        insertTask({commit,state},title){

            //const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            //axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken;

            axios.post(state.apiUrl+"/task",{title:title})
                .then((res)=>{
                    console.log(res);
                    commit('addNewTask',{id:res.data.id, title:res.data.title, status:res.data.status});
                    commit('setSuccessMessage', 'Task inserted successfully !!');
                })
                .catch((error)=>{
                    if (error.response) {
                        console.log("Response data:", error.response.data);
                        console.log("Response status:", error.response.status);
                        alert(error.response.data.message);
                      } 
                      //console.log("Config:", error.config);
                      commit('setErrorMessage', 'Failed to insert task !!');
                })

        },
        updateStatus({commit,state},info){

            axios.put(state.apiUrl+"/task/"+info.id, info)
            .then((res)=>{
                console.log(res);
                commit('changeStatus',info);
                commit('setSuccessMessage', 'Task status updated successfully !!');
            })
            .catch((error)=>{
                console.log(error);
                commit('setErrorMessage', 'Failed to update task status !!');
            })
        }
    }
})


export default store;