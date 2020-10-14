<template>
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nickname</th>
                <th scope="col">Email</th>
            <!--    <th scope="col">Avatar</th> -->
                <th scope="col">Tag</th>
                <th scope="col">Status</th>
                <th scope="col" style="text-align: center;">Actions</th>
            </tr>
            </thead>
            <items></items>
        </table>
    </div>
</template>

<script>

    import Items from "./Items";
    export default {
        methods: {

        },
        components: {
            Items
        },
        mounted() {

        }
    }
</script>
