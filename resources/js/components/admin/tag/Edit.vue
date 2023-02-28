<template>
    <div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Category: {{ title }}</h3>
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
                                    <button :disabled="!isDisabled" @click.prevent="update" type="submit" class="btn btn-primary">Submit
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

    data() {
        return {
            title: null,
        }
    },

    mounted() {
        this.getTag()
    },

    methods: {
        getTag() {
            axios.get(`/api/admin/tags/${this.$route.params.id}`)
                .then(res => {
                    this.title = res.data.data.title
                })
        },

        update() {
            axios.patch(`/api/admin/tags/${this.$route.params.id}`, {title: this.title})
                .then(res => {
                    this.$router.push({name: 'admin.tag.show', params: {id: this.$route.params.id}})
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
