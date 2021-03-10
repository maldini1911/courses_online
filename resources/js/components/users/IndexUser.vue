<template>
    <div class="all-users">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title "> Title</h4>
                <p class="card-category"> Desc</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th> ID </th>
                            <th> Name </th>
                            <th> Email </th>
                            <th class="text-right"> Control </th>
                        </thead>
                        <tbody>
                            <tr v-for="user in users" :key="user.id">
                                <td>{{user.id}}</td>
                                <td>{{user.name}}</td>
                                <td>{{user.email}} </td>
                                <td class="td-actions text-right">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" @click="editUser(user)">
                                            Update
                                    </button>

                                    <button type="button" class="btn btn-danger" @click="destoryUser(user)"> Delete </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

             <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Create Post
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 v-if="edit" class="modal-title" id="exampleModalLabel">Update New Post</h5>
                            <h5 v-else class="modal-title" id="exampleModalLabel">Create New Post</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="text" :class="['form-control', errors.name?'is-invalid':'']" v-model="user.name">
                            <p v-if="errors.name" class='bg-danger p-1'>{{errors.name[0]}}</p>
                            <hr>
                            <textarea :class="['form-control', errors.email?'is-invalid':'']" v-model="user.email"></textarea>
                            <p v-if="errors.email" class='bg-danger p-1'>{{errors.email[0]}}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button v-if="edit" type="button" class="btn btn-primary" @click="updateUser">Update</button>
                            <button v-else type="button" class="btn btn-primary" @click="createUser">Create</button>
                        </div>
                        </div>
                    </div>
                </div>
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
                edit:false,
                delete:false,
                errors:[],
            }
        },
        methods:{
            createUser()
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
            editUser(user)
            {
                this.user = user
                this.edit = true
            },
            updateUser()
            {
                 axios.put('api/update/user/'+this.user.id, this.user).then(response=>{
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
            destoryUser(user)
            {
                this.user = user
                 axios.delete('api/delete/user/'+this.user.id, this.user).then(response=>{

                    if(response.data.status == 'error')
                    {
                        this.errors=response.data.errors
                    }else{
                        this.users = this.getUsers()
                    }

                    this.user = {
                                    id:'',
                                    name:'',
                                    email:''
                                }
                    errors = []
                })
            },
            getUsers()
            {
                axios.get('api/users').then(response=>{

                    this.users = response.data.data

                })
            },
        },
        created(){
            this.getUsers()
        }
    }
</script>
