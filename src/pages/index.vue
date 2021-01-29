<template>
    <main class="min-h-vh bg-grey p-x10">
        <div class="bg-white h-full max-w-x22 m-l-auto m-r-auto p-x9">
            <div class="flex space-between">
                <h4 class="m-b-none">
                    User management
                </h4>
                <button @click="openModal" class="txt-s-x9 txt-c-white bd-none bg-pry bd-round-x6 p-l-x5 p-r-x5 m-t-auto m-b-auto">
                    +
                </button>
            </div>

            <div class="m-t-x5">
                <User v-for="user in users" :user="user" :delFnc="deleteUser" class="m-b-x5"/>
            </div>
        </div>

    </main>
</template>

<script>
    // @ is an alias to /src
    import User from "../components/User";
    import CreateNewUser from "../components/CreateNewUser";
    import Graph from "@__path/graph"
    export default {
        name: 'home',
        components: {
            User

        },
        data(){
            return {
                users: []
            }
        },
        methods:{
            async openModal(){

                let data = await this.$openModalAsync(CreateNewUser,{
                    options: {
                        width: 400
                    }
                })
                await this.fetchUsers();

            },
            async deleteUser(user_id){
                let User = new Graph().autoLink().service('User').ref(user_id);
                await User.delete()
                await this.fetchUsers();
                // alert('User deleted!')
            },
            async fetchUsers(){
                let Profile = new Graph().service('Profile/getOne').fetch(
                    'name'
                )
                let User = new Graph().autoLink().service('User/getAll').fetch(
                    "email",
                    "handle",
                    Profile.as('profile'),
                    "profile_id",
                )

                try {
                    this.users = (await User.get()).getData();
                }catch (e) {

                }


            }
        },
        async created () {
            await this.fetchUsers();
        }
    }
</script>
