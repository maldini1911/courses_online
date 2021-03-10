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
                            <th class="text-right"> Control </th>
                        </thead>
                        <tbody>
                            <tr v-for="cat in cats" :key="cat.id">
                                <td>{{cat.id}}</td>
                                <td>{{cat.name}}</td>
                                <td class="td-actions text-right">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" @click="editCat(cat)">
                                            Update
                                    </button>

                                    <button type="button" class="btn btn-danger" @click="destoryCat(cat)"> Delete </button>
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
                            <h5 v-if="edit" class="modal-title" id="exampleModalLabel">Update Category</h5>
                            <h5 v-else class="modal-title" id="exampleModalLabel">Create Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="text" :class="['form-control', errors.name?'is-invalid':'']" v-model="cat.name">
                            <p v-if="errors.name" class='bg-danger p-1'>{{errors.name[0]}}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button v-if="edit" type="button" class="btn btn-primary" @click="updateCat">Update</button>
                            <button v-else type="button" class="btn btn-primary" @click="createCat">Create</button>
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
                cat:{
                    id:'',
                    name:''
                },
                cats:{},
                edit:false,
                delete:false,
                errors:[],
            }
        },
        methods:{
            createCat()
            {
                axios.post('api/create/category', this.cat).then(response=>{
                    if(response.data.status == 'error')
                    {
                        this.errors=response.data.errors
                    }else if(response.data.status == 'success')
                    {
                        this.cats.unshift(response.data.data)
                    }

                    this.cat = {
                                    id:'',
                                    name:''
                                }
                    errors = []
                })
            },
            editCat(cat)
            {
                this.cat = cat
                this.edit = true
            },
            updateCat()
            {
                 axios.put('api/update/category/'+this.cat.id, this.cat).then(response=>{
                    if(response.data.status == 'error')
                    {
                        this.errors=response.data.errors
                    }else if(response.data.status == 'success')
                    {
                        this.cats.unshift(response.data.data)
                    }

                    this.cat = {
                                    id:'',
                                    name:''
                                }
                    errors = []
                })
            },
            destoryCat(cat)
            {
                this.cat = cat
                 axios.delete('api/delete/category/'+this.cat.id, this.cat).then(response=>{

                    if(response.data.status == 'error')
                    {
                        this.errors=response.data.errors
                    }else{
                        this.cats = this.getCats()
                    }

                    this.cat = {
                                    id:'',
                                    name:''
                                }
                    errors = []
                })
            },
            getCats()
            {
                axios.get('api/categories').then(response=>{

                    this.cats = response.data.data

                })
            },
        },
        created(){
            this.getCats()
        }
    }
</script>
