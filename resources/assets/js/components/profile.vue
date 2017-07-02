<template>

    <form role="form" method="post" action="/updateprofile" @submit.prevent=updateProfile @keydown="errors.clear($event.target.name)">

        <input type="hidden" v-model="profile.id" id="exampleInputID" class="form-control">

        <!--<valfield-->
                <!--someName="Name"-->
                <!--:someValue="profile.name"-->
                <!--:someError="errors.get('name')"-->
                <!--@get-val="handleInput"-->
        <!--&gt;-->
        <!--</valfield>-->

        <div class="form-group">
            <label for="InputName">Name</label>
            <input name="name" v-model="profile.name" id="InputName" class="form-control" v-bind:placeholder="errors.plsholder">
            <label class="control-label text-danger" for="InputName" v-text="errors.get('name')"></label>
        </div>

        <div class="form-group">
            <label for="InputEmail1">Email</label>
            <input name="email" type="email" class="form-control" id="InputEmail1" v-model="profile.email" v-bind:placeholder="errors.plsholder">
            <label class="control-label text-danger" for="InputEmail1" v-text="errors.get('email')"></label>
        </div>
        <div class="form-group">
            <label for="InputCreated">Created</label>
            <input disabled class="form-control" id="InputCreated" v-model="profile.created_at" v-bind:placeholder="errors.plsholder">
            <label class="control-label text-danger" v-text="errors.get('created')"></label>
        </div>

        <button @click="showlog" class="btn btn-primary pull-left">Show log</button>
        <button type="submit" class="btn btn-primary pull-right">Save</button>
    </form>

</template>

<script>


    class Errors {

        constructor() {

            this.errors = {};
            this.has = false;
            this.classdng ={};
            this.plsholder = "";
        }

        get(field) {

            if (this.errors[field]){

               return this.errors[field][0];
            }


        }

        record (errors){

            this.has = true;
            this.classdng = "has-error";
            this.plsholder = "Please enter a text here...";
            this.errors = errors;
        }

        clear(field) {

            delete this.errors[field];

        }

    }

    export default {

        data: function () {

            return {

                profile:[],
                errors: new Errors(),
                test:"fdfgdfg",

            };

        },
        methods: {
            updateProfile() {

                axios.post('/updateprofile', this.profile)
                    .then(response => alert('Sussess'))
                    .catch(error => this.errors.record(error.response.data));


                //                {

//                    id: this.profile.id,
//
//                    name: this.profile.name,
//
//                    email: this.profile.email,


//                });

            },

            showlog(){
                console.log(this.errors);
            },

            handleInput(datavalue){
                this.profile.name = datavalue;
                //console.log(this.profile.name);


            },



        },

        computed:{



        },

        mounted() {
            axios.get('/getUserProfile').then(response => this.profile = response.data);
            axios.get('/getUserProfile').then(response => console.log(response.data));
        },

        components: {


        },

    }
</script>
