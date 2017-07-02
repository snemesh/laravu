<template>

        <div class="form-group">
            <label for="InputName"> {{ someName }} </label>
            <input name="name" id="InputName" class="form-control" ref="input" v-model="value = someValue" @updated="getValue" >
            <label class="control-label" for="InputName" v-text="someError"></label>
        </div>


</template>

<script>




    export default {

        props:[ 'someName', 'someValue','someError'  ],
        data: function () {

            return {

                value: '',

            }

        },

        computed: {

            getInput() {

                this.value = this.$props.someValue;
                return this.value;

            },

        },

        methods :{

            getValue: function () {

                console.log(this.value);
                this.$emit('get-val', this.value);
            },



        },



    }
</script>
