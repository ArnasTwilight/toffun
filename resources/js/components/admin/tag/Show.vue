<template>
    <div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6 mt-2">
                        <div v-if="tag" class="card">
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <tbody>
                                    <tr>
                                        <td>ID</td>
                                        <td>{{ tag.id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Title</td>
                                        <td>{{ tag.title }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix d-flex">
                                <router-link
                                    :to="{ name:'admin.tag.edit', params: { id: tag.id } }"
                                    class="btn btn-success mr-1">Edit
                                </router-link>
                                <button @click.prevent="deleteTag(tag.id)" type="submit"
                                        class="btn btn-danger">Delete
                                </button>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
</template>

<script>

export default {
    name: "Show",

    data() {
        return {
            tag: null,
        }
    },

    mounted() {
        this.getTag()
    },

    methods: {
        getTag() {
            axios.get(`/api/admin/tags/${this.$route.params.id}`)
                .then(res => {
                    this.tag = res.data.data
                })
        },

        deleteTag(id) {
            axios.delete(`/api/admin/tags/${id}`)
                .then(res => {
                    this.$router.push({name: 'admin.tag.index'})
                })
        }
    }
}
</script>

<style scoped>

</style>
