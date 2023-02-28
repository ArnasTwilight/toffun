<template>
    <div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add New Tag</h3>
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
                                    <button :disabled="!isDisabled" @click.prevent="store" type="submit" class="btn btn-primary">Submit</button>
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

    methods: {
        store() {
            axios.post('/api/admin/tags', {title: this.title,})
                .then(res => {
                    this.$router.push({name: 'admin.tag.index'})
                })
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
