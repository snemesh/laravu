<template>

    <div class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">{{ project }}</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">

                    <li v-for="link in links" v-bind:class="link.active">
                        <a v-bind:href=link.href> {{ link.name }}</a>

                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                        <ul class="dropdown-menu">

                            <li><a v-for="drm in drmenu" :href="drm.href">{{ drm.name }}</a></li>
                            <li class="divider"></li>
                            <li class="dropdown-header">{{ navheader }}</li>
                            <li><a v-for="nvm in navheadermenu" :href="nvm.href">{{ nvm.name }}</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">

                    <template v-if="isguest.status">
                    <li v-for="stm in staticMenu" v-bind:class="stm.active">
                        <a v-bind:href=stm.href> {{ stm.name }}</a>
                    </li>
                    </template>


                    <li v-else="isguest.status" class="dropdown">

                        <a  href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ isguest.user}} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">

                            <li v-for="lmenu in logoutMenu" v-bind:class="lmenu.active">
                                <a v-bind:href=lmenu.href> {{ lmenu.name }}</a>
                            </li>

                        </ul>
                    </li>

                </ul>
            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </div>
</template>

<script>



    export default {

        data: function () {

            return {
                title: "Test component",
                project:"Some Project",
                links: [
                    { id:0, name:'Home', href:'/', active:'active'},
                    { id:0, name:'Test', href:'/test', active:''},
                    { id:0, name:'Link1', href:'#', active:''},
                    { id:0, name:'Link1', uhrefrl:'#', active:''},
                ],
                drmenu: [
                    { id:0, name:'Link1', href:'#' },
                    { id:0, name:'Link1', href:'#' },
                    { id:0, name:'Link1', href:'#' },
                    { id:0, name:'Link1', href:'#' },
                ],
                navheader:"Nav header",
                navheadermenu:[
                    { id:0, name:"Separated link", href:"#"},
                    { id:0, name:"One more separated link", href:"#"},
                ],
                staticMenu:[

                    { id:0, name:"Login", href:"/login", active:"active"},
                    { id:0, name:"Register", href:"/register", active:""},

                ],
                logoutMenu:[
                    { id:0, name:"My profile", href:"/profile", active:""},
                    { id:1, name:"Logout", href:"/logout", active:""},


                ],

                isguest:[],

            };

        },
        computed: {
            checkStatus: function (data) {

//                for(var key in data){
//                    alert( key );
//                    alert(data[key]);
//
//                }

                //alert(data);

                //return this.isguest;
            }


        },

        mounted() {
            axios.get('/isguest').then(response => this.isguest = response.data);
        },




    }
</script>
