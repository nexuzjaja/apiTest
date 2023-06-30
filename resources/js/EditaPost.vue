<template>
    <div>
        <h3 class="text-center">Edita Applicant</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updatePost">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" v-model="post.name">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" v-model="post.email">
                    </div>
                    <div class="form-group">
                        <label>Puesto</label>
                        <input type="text" class="form-control" v-model="post.job">
                    </div>
                    <div class="form-group">
                        <label>Cumpleaños</label>
                        <input type="date" class="form-control" v-model="post.birthday">
                    </div>
                    <div class="form-group">
                        <label>Dirección</label>
                        <input type="text" class="form-control" v-model="post.addres">
                    </div>
                    <button type="submit" class="btn btn-primary">Actualiza Applicant</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                post: {}
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/applicants/${this.$route.params.id}`)
                .then((response) => {
                    this.post = response.data;
                    // console.log(response.data);
                });
        },
        methods: {
            updatePost() {
                this.axios
                    .post(`http://localhost:8000/api/applicants/${this.$route.params.id}/edit/`, this.post)
                    .then((response) => {
                        this.$router.push({name: 'home'});
                    });
            }
        }
    }
</script>