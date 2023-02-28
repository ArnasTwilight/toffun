<template>
    <div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6 mt-2">
                        <div v-if="category" class="card">
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <tbody>
                                    <tr>
                                        <td>ID</td>
                                        <td>{{ category.id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Title</td>
                                        <td>{{ category.title }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix d-flex">
                                <router-link
                                    :to="{ name:'admin.category.edit', params: { id: category.id} }"
                                    class="btn btn-success mr-1">Edit
                                </router-link>
                                <button @click.prevent="$store.dispatch('deleteCategoryShow', category.id)"
                                        type="submit"
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

    mounted() {
        this.$store.dispatch('getCategory', this.$route.params.id)
    },

    computed: {
        category() {
            return this.$store.getters.category
        }
    }
}
</script>

<style scoped>

</style>
