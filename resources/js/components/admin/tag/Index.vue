<template>
    <div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Tags table</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">ID</th>
                                        <th>Title</th>
                                        <th colspan="3">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="tag in tags">
                                        <td>{{ tag.id }}</td>
                                        <td>
                                            <router-link
                                                :to="{ name:'admin.tag.show', params: { id: tag.id} }">
                                                {{ tag.title }}
                                            </router-link>
                                        </td>
                                        <td>
                                            <router-link
                                                :to="{ name:'admin.tag.show', params: { id: tag.id} }"
                                                class="btn btn-primary">View
                                            </router-link>
                                        <td>
                                            <router-link
                                                :to="{ name:'admin.tag.edit', params: { id: tag.id} }"
                                                class="btn btn-success">Update
                                            </router-link>
                                        <td>
                                            <button @click.prevent="deleteTag(tag.id)" type="submit"
                                                    class="btn btn-danger">Delete
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer clearfix">
                                <router-link class="btn btn-primary" :to="{ name: 'admin.tag.create' }">Add New
                                    Tag
                                </router-link>
                                <div class="pagination-sm m-0 float-right">
                                    #
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
</template>

<script>
export default {
    name: "Index",

    data() {
        return {
            tags: null,
        }
    },

    mounted() {
        this.getTags()
    },

    methods: {
        getTags() {
            axios.get('/api/admin/tags')
                .then(res => {
                    this.tags = res.data.data
                })
        },

        deleteTag(id) {
            axios.delete(`/api/admin/tags/${id}`)
                .then(res => {
                    this.getTags()
                })
        }
    },
}
</script>

<style scoped>

</style>
