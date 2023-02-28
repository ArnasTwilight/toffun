import Vue from 'vue'
import VueRouter from "vue-router";

Vue.use(VueRouter)

export default new VueRouter({
    mode: 'history',

    routes: [
        {
            path: '/admin/categories',
            components: {
                default: () => import('./components/admin/category/Index'),
                header: () => import('./components/admin/category/Header')
            },
            name: 'admin.category.index'
        },
        {
            path: '/admin/categories/create',
            components: {
                default: () => import('./components/admin/category/Create'),
                header: () => import('./components/admin/category/Header')
            },
            name: 'admin.category.create'
        },
        {
            path: '/admin/categories/:id/edit',
            components: {
                default: () => import('./components/admin/category/Edit'),
                header: () => import('./components/admin/category/Header')
            },
            name: 'admin.category.edit'
        },
        {
            path: '/admin/categories/:id',
            components: {
                default: () => import('./components/admin/category/Show'),
                header: () => import('./components/admin/category/Header')
            },
            name: 'admin.category.show'
        },

        {
            path: '/admin/tags',
            components: {
                default: () => import('./components/admin/tag/Index'),
                header: () => import('./components/admin/tag/Header')
            },
            name: 'admin.tag.index'
        },
        {
            path: '/admin/tags/create',
            components: {
                default: () => import('./components/admin/tag/Create'),
                header: () => import('./components/admin/tag/Header')
            },
            name: 'admin.tag.create'
        },
        {
            path: '/admin/tags/:id/edit',
            components: {
                default: () => import('./components/admin/tag/Edit'),
                header: () => import('./components/admin/tag/Header')
            },
            name: 'admin.tag.edit'
        },
        {
            path: '/admin/tags/:id',
            components: {
                default: () => import('./components/admin/tag/Show'),
                header: () => import('./components/admin/tag/Header')
            },
            name: 'admin.tag.show'
        },

    ]
})
