import Vue from 'vue'
import Vuex from 'vuex'
import Category from './modules/admin/category'
import Tag from './modules/admin/tag'


Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        Category,
        Tag,
    }
})
