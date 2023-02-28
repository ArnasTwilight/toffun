import router from "../../../router";

const state = {
    category: null,
    categories: null
}

const getters = {
    category: () => state.category,
    categories: () => state.categories
}

const actions = {
    getCategory({state, commit, dispatch}, id) {
        axios.get(`/api/admin/categories/${id}`)
            .then(res => {
                commit('setCategory', res.data.data)
            })
    },

    getCategories({commit}) {
        axios.get('/api/admin/categories')
            .then(res => {
                commit('setCategories', res.data.data)
            })
    },

    deleteCategory({dispatch, commit}, id) {
        axios.delete(`/api/admin/categories/${id}`)
            .then(res => {
                dispatch('getCategories')
            })
    },

    deleteCategoryShow({dispatch, commit}, id) {
        axios.delete(`/api/admin/categories/${id}`)
            .then(res => {
                router.push({name: 'admin.category.index'})
            })
    },

    update({}, data) {
        axios.patch(`/api/admin/categories/${data.id}`, {title: data.title})
            .then(res => {
                router.push({name: 'admin.category.show', params: {id: data.id}})
            })
    },

    store({}, data) {
        axios.post('/api/admin/categories', {title: data.title,})
            .then(res => {
                router.push({name: 'admin.category.index'})
            })
    }
}

const mutations = {
    setCategory(state, category) {
        state.category = category
    },

    setCategories(state, categories) {
        state.categories = categories
    }
}

export default {
    state, mutations, getters, actions
}
