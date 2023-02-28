<template>
    <div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Categories table</h3>
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

                                    <tr v-for="category in categories">
                                        <td>{{ category.id }}</td>
                                        <td>
                                            <router-link
                                                :to="{ name:'admin.category.show', params: { id: category.id} }">
                                                {{ category.title }}
                                            </router-link>
                                        </td>
                                        <td>
                                            <router-link
                                                :to="{ name:'admin.category.show', params: { id: category.id} }"
                                                class="btn btn-primary">View
                                            </router-link>
                                        </td>
                                        <td>
                                            <router-link
                                                :to="{ name:'admin.category.edit', params: { id: category.id} }"
                                                class="btn btn-success">Update
                                            </router-link>
                                        <td>
                                            <button @click.prevent="$store.dispatch('deleteCategory', category.id)"
                                                    type="submit"
                                                    class="btn btn-danger">Delete
                                            </button>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer clearfix">
                                <router-link class="btn btn-primary" :to="{ name: 'admin.category.create' }">Add New
                                    Category
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

    mounted() {
        this.$store.dispatch('getCategories')
    },

    computed: {
        categories() {
            return this.$store.getters.categories
        }
    }
}
</script>

<style scoped>

</style>
