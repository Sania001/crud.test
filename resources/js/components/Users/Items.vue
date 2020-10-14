<template>
    <tbody>
        <tr v-for="(user, index) in listUsers">
            <td scope="col"> {{ user.id}}</td>
            <td scope="col">{{ user.nickname}}</td>
            <td scope="col">{{ user.email}}</td>
        <!--    <td scope="col">{{ user.avatar}}</td> -->
            <td scope="col">{{ user.tag}}</td>
            <td scope="col">{{ user.status}}</td>
            <td scope="col"><button @click="updateUser(user.id)" style="margin: 0 10px;" class="btn btn-warning">Edit</button><button @click="deleteUser(user.id)" class="btn btn-danger">Delete</button></td>
        </tr>
    </tbody>
</template>

<script>
    import store from "../../users-store"
    import { mapGetters } from 'vuex'
    export default {
        store,
        methods: {
            updateUser: (id) => {
                window.location.href = '/users/update/' + id
            },
            deleteUser: (id) => {

                let prompt = confirm('Do you wanna remove that user?');
                if (prompt) {
                    let user = axios.post( "/users/delete/" + id, [])
                        .then(response => {
                            window.location.href = '/users';

                        }).catch(function (error) {
                            let response = error.response.data;
                            if (response.message) {
                                console.info(response.message);
                            }
                        });
                }

            }
        },
        computed: {
            ...mapGetters([
                'listUsers'
            ])
        },
        mounted() {
            console.info('test')
        },
        watch: {

        }
    }
</script>
