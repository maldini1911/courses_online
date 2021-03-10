<template>
    <div class="row">
        <div class="col-md-12">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Username</label>
            <input type="text" class="form-control" v-model="name">
        </div>
        </div>
        <div class="col-md-12">
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Email</label>
                <input type="email" class="form-control" v-model="email">
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Password</label>
                 <input type="password" class="form-control" v-model="email">
            </div>
        </div>

        <div class="col-md-6">
            <label class="bmd-label-floating">Users Group</label>
            <div class="form-group bmd-form-group">
                <select class="form-control" name="group">
                    <option value="admin"> Admin</option>
                    <option value="user">User</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-success" @click="createPost">Create</button>
    </div>
</template>
<script>

 export default{
        data(){
            return{
                user:{
                    id:'',
                    name:'',
                    email:''
                },
                users:{},
                errors:[],
            }
        },
        methods:{
            createPost()
            {
                axios.post('api/create/user', this.user).then(response=>{
                    if(response.data.status == 'error')
                    {
                        this.errors=response.data.errors
                    }else if(response.data.status == 'success')
                    {
                        this.users.unshift(response.data.data)
                    }

                    this.user = {
                                    id:'',
                                    name:'',
                                    email:''
                                }
                    errors = []
                })
            },

        },
        created(){

        }
    }

</script>
