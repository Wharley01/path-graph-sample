<template>
    <div class="p-x5">
        <h4>
            Create new User
        </h4>
        <form @submit.prevent="addNewUser" class="m-t-x5">
            <input class="p-x-x4 m-t-x5 p-y-x5 bd-none  bd-round-x6 shadow-x3 w-full"
                   v-model="form.name"
                   placeholder="Enter user name">
            <input class="p-x-x4 m-t-x5 p-y-x5 bd-none  bd-round-x6 shadow-x3 w-full"
                   v-model="form.email"
                   placeholder="Enter email">
            <input class="p-x-x4 m-t-x5 p-y-x5 bd-none  bd-round-x6 shadow-x3 w-full"
                   v-model="form.handle"
                   placeholder="Enter handle">
            <textarea class="p-x-x4 m-t-x5 p-y-x5 bd-none  bd-round-x6 shadow-x3 w-full"
                   v-model="form.about"
                      rows="10"
                      placeholder="Write short note about user"></textarea>
            <button class="p-x-x4 p-y-x5 bg-pry txt-c-white w-full bd-none bd-round-x6 m-t-x6">
                Submit
            </button>
        </form>
    </div>
</template>

<script>
    import Graph from '@__path/graph'
    export default {
        name: "CreateNewUser",
        data(){
            return {
                form: {
                    name: '',
                    email: '',
                    handle: '',
                    about: ''
                }
            }
        },
        methods:{
            async addNewUser(){
                let user = new Graph().service('User')
                try {
                    await user.set(this.form);
                    this.$emit('close',this.form);
                }catch (e) {
                    alert(e.getMsg());
                }
            }
        }
    }
</script>

<style scoped>

</style>