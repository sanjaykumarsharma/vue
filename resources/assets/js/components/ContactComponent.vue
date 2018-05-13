<template>
    <div class="container">
        <h1>Contacts Form</h1>
        <form action="#" @submit.prevent="edit ? updateContact(contact.id) : createContact()">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" v-model="contact.name" class="form-control">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" v-model="contact.email" class="form-control">
            </div>

            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" v-model="contact.phone" class="form-control">
            </div>

            <div class="form-group">
                <button v-show="edit" type="submit" class="btn btn-primary">Update Contact</button>
                <button v-show="!edit" type="submit" class="btn btn-primary">Create Contact</button>
            </div>

        </form>

        <div class="panel-body">
        <table class="table table-bordered table-striped table-responsive">
        <!-- <table class="table table-bordered table-striped table-responsive" v-if="contacts.length > 0"> -->
            <tbody>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th></th>
                </tr>
                <tr v-for="(task, index) in contacts">
                    <td>{{ index + 1 }}</td>
                    <td>
                        {{ task.name }}
                    </td>
                    <td>
                        {{ task.email }}
                    </td>
                    <td>
                        {{ task.phone }}
                    </td>
                    <td>
                        <button class="btn btn-success btn-xs" @click="initUpdate(index)">Edit</button>
                        <button class="btn btn-danger btn-xs" @click="deleteContact(index)">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
      </div>
    </div>


</template>

<script>

    export default {
        data: function () {
            return {
                edit:false,
                contacts:[],
                contact:{
                    id:'',
                    name:'',
                    email:'',
                    phone:''
                },
            }
        },
        mounted: function() {
            console.log('Contact Component mounted.')
            this.readContacts();
        },
        methods:{
            readContacts : function(){
                axios.get('api/contact/')
                .then(response => {
                    console.log(response.data.contacts)
                    this.contacts =  response.data.contacts
                    console.log(this.edit)
                })
                .catch(error => {
                    console.log(error)
                    //this.error = error.response.data.message || error.message;
                })
            },
            createContact : function() {
                console.log('creating contact...')
                let self = this;
                let params = Object.assign({},self.contact);
                axios.post('api/contact/store', params)
                .then(function(){
                    self.contact.name='';
                    self.contact.email='';
                    self.contact.phone='';
                    self.edit=false;
                })
                .catch(function(error){
                    console.log(error)
                })
            },
            initUpdate: function(index){
                this.contact={};
                this.contact=this.contacts[index];
                this.edit=true;
            },
            updateContact : function(id) {
                let params = Object.assign({},this.contact);
                axios.patch('api/contact/' + id, params)
                .then(response => {
                    console.log("contact updated successfully")
                    //$("#update_task_model").modal("hide");
                })
                .catch(error => {
                    // this.errors = [];
                    // if (error.response.data.errors.name) {
                    //     this.errors.push(error.response.data.errors.name[0]);
                    // }

                    // if (error.response.data.errors.description) {
                    //     this.errors.push(error.response.data.errors.description[0]);
                    // }
                });
            },
            deleteContact(index)
            {
                let conf = confirm("Do you ready want to delete this task?");
                if (conf === true) {

                    axios.delete('api/contact/' + this.contacts[index].id)
                        .then(response => {

                            this.contacts.splice(index, 1);

                        })
                        .catch(error => {

                        });
                }
            }

        }
    }
</script>
