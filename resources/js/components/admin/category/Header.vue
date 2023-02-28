<template>
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Category</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <router-link :to="{ name: 'admin.category.index' }">Category</router-link>
                            </li>
                            <li class="breadcrumb-item">
                                <router-link :to="{ name: 'admin.category.create' }">Add new</router-link>
                            </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
</template>

<script>
export default {
    name: "Header"
}
</script>

<style scoped>

</style>
