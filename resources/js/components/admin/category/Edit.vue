<template>
    <div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <div v-if="category" class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Category: {{ category.title }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" v-model="category.title" class="form-control" name="title"
                                               placeholder="Enter title">
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button :disabled="!isDisabled"
                                            @click.prevent="$store.dispatch('update', {id: category.id, title: category.title})"
                                            type="submit"
                                            class="btn btn-primary">Submit
                                    </button>
                                </div>
                            </div>
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
    name: "Edit",

    mounted() {
        this.$store.dispatch('getCategory', this.$route.params.id)
    },

    computed: {
        isDisabled() {
            return this.category.title
        },

        category() {
            return this.$store.getters.category
        }
    }
}
</script>

<style scoped>

</style>
