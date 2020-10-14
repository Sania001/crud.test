<template>
    <div class="row">
        <div class="col-12">
            <div v-if="errors.length > 0" class="alert alert-danger">
                <ul>
                    <li v-for="(error, index) in errors">{{ error }}</li>
                </ul>
            </div>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nickname">Nickname</label>
                    <input type="text" class="form-control" v-if="!user" required id="nickname" v-model="nickname"  aria-describedby="nicknameHelp">
                    <input type="text" class="form-control" v-if="user" required id="nickname" v-model="nickname"  aria-describedby="nicknameHelp">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control"  v-if="!user" required id="email" v-model="email" aria-describedby="emailHelp">
                    <input type="email" class="form-control"  v-if="user" required id="email" v-model="email" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="avatar">Avatar</label>
                    <input type="file" class="form-control-file" v-on:change="avatar" id="avatar">
                </div>
                <div class="form-group col-md-4">
                    <label for="tag">Tag</label>
                    <select id="tag" class="form-control" v-model="tag">
                        <option selected value="0">No tag</option>
                        <option value="1">Tag 1</option>
                        <option value="2">Tag 2</option>
                        <option value="3">Tag 3</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="status">Status</label>
                    <select id="status" class="form-control" v-model="status">
                        <option selected value="active">Active</option>
                        <option value="pending">Pending</option>
                        <option value="banned">Banned</option>
                    </select>
                </div>
                <div v-if="!user" class="form-group">
                    <label for="password">Password</label>
                    <input type="password" required class="form-control" id="password" v-model="password">
                </div>
                <button type="button" @click="saveUser()" v-if="!user" class="btn btn-primary">Save</button>
                <button type="button" @click="updateUser()" v-if="user" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</template>

<script>

    export default {

        data() {
            return {
                nickname: '',
                email: '',
                avatar: '',
                tag: '',
                status: '',
                password: '',
                errors: []
            }
        },
        props: {
            user:Object|Number
        },
        methods: {

            saveUser: function () {
                this.$nextTick(function () {
                    let data = {
                        'nickname': this.nickname,
                        'email': this.email,
                        'avatar': this.avatar,
                        'tag': this.tag,
                        'status': this.status,
                        'password': this.password
                    };
                    let parent = this;
                    let user = axios.post( "/users/save", data)
                        .then(response => {
                            window.location.href = '/users';

                        }).catch(function (error) {
                            let response = error.response.data;
                            if (response.message) {
                                _.forEach(response.errors, (val, key) => {
                                    parent.errors.push(val)
                                })
                            } else {
                                window.location.href = '/users';
                            }
                        });
                });
            },
            updateUser: function () {
                this.$nextTick(function () {
                    let data = {
                        'nickname': this.nickname,
                        'email': this.email,
                        'avatar': this.avatar,
                        'tag': this.tag,
                        'status': this.status
                    };
                    let parent = this;
                    let user = axios.post("/users/change/" + this.user.id, data)
                        .then(response => {
                            window.location.href = '/users';

                        }).catch(function (error) {
                            let response = error.response.data;
                            if (response.message) {
                                _.forEach(response.errors, (val, key) => {
                                    parent.errors.push(val)
                                })
                            } else {
                                window.location.href = '/users';
                            }
                        });
                });


            }
        },
        components: {

        },
        mounted() {
            if (this.user) {
                this.nickname = this.user.nickname;
                this.email = this.user.email;
                this.avatar = this.user.avatar;
                this.tag = this.user.tag;
                this.status = this.user.status;
            }

        },
        watch: {

        }
    }
</script>
