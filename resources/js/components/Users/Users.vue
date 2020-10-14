<template>
    <div class="container">
        <button class="btn btn-success create-user-btn" @click="createUser()">Create User</button>
        <list></list>
    </div>
</template>

<script>

    import List from "./List";
    import store from "../../users-store"
    import { mapActions } from 'vuex'

    export default {
        store,
        props: {
            users: Array
        },
        methods: {
            ...mapActions([
                'updateUsers'
            ]),
            createUser: () => {
                window.location.href = '/users/create'
            }
        },
        components: {
            List
        },
        mounted() {
            this.updateUsers(this.users);
        },
        watch: {
            users: function (newVal) {
                this.updateUsers(this.users);
            }
        }
    }
</script>
