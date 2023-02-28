<template>
    <div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add New Category</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" v-model="title" class="form-control" name="title"
                                               placeholder="Enter title">
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button :disabled="!isDisabled" @click.prevent="$store.dispatch('store', {title})"
                                            type="submit" class="btn btn-primary">Submit
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
    name: "Create",

    data() {
        return {
            title: null,
        }
    },

    computed: {
        isDisabled() {
            return this.title
        }
    }
}
</script>

<style scoped>

</style>
