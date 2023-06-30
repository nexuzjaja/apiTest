<template>
    <div>
        <h3 class="text-center">Todos los Applicants</h3><br/>
         <table class="table">
            <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th>job</th>
                <th>birthday</th>
                <th>addres</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="post in posts" :key="post.id">
                <td>{{ post.id }}</td>
                <td>{{ post.name }}</td>
                <td>{{ post.email }}</td>
                <td>{{ post.job }}</td>
                <td>{{ post.birthday }}</td>
                <td>{{ post.addres }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: post.id }}" class="btn btn-primary">
                            Editar
                        </router-link>
                        <button class="btn btn-warning" @click="deletePost(post.id)">
                            Borrar
                        </button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                posts: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/applicants')
                .then(response => {
                    this.posts = response.data;
                });
        },
        methods: {
            deletePost(id) {
                this.axios
                    .delete(`http://localhost:8000/api/applicants/${id}/delete`)
                    .then(response => {
                        let i = this.posts.map(item => item.id).indexOf(id); // find index of your object
                        this.posts.splice(i, 1)
                    });
            }
        }
    }
</script>