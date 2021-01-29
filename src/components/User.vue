<template>
    <div class="shadow-soft bd-c-grey bd-x1 flex bg-white p-x7 bd-round-x6">
        <div class="h-x12 w-x12 bd-round-x12 min-w-x1 bd-round 2 bg-pry">

        </div>
        <div class="flex col m-l-x4">
            <b>
                {{user.profile.name}}
            </b>
            <span>
                @{{user.handle}}
            </span>
        </div>
        <span @click="delFnc(user.id)" class="custom-class m-y-auto m-l-auto">
            <trash-2-icon  size="2x" ></trash-2-icon>
        </span>
    </div>
</template>

<script>
    import { Trash2Icon } from 'vue-feather-icons'
    export default {
        name: "User",
        props:{
            user: Object,
            delFnc: [Promise,Function]
        },
        components:{
            Trash2Icon
        }
    }
</script>

<style scoped>

</style>