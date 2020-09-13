export default {
    namespaced: true,

    state: {
        token: null,
        user: null
    },
    getters: {
        authenticated(state) {
            return state.token && state.user
        },
        user(state) {
            return state.user
        }

    },
    mutations: {
        SET_TOKEN(state, token) {
            state.token = token
        },
        SET_USER(state, user) {
            state.user = user
        }
    },
    actions: {
        async signIn({ dispatch }, data) {
            let response = await axios.post('/auth/login', data)
            dispatch('attempt', response.data.access_token)
            
        },

        async attempt({ commit }, token) {
            commit('SET_TOKEN', token)
            if(token){
                axios.defaults.headers.common['Authorization'] = 'bearer ' + token
                localStorage.setItem('token', token)
            }else{
                axios.defaults.headers.common['Authorization'] = null
                localStorage.removeItem('token')
            }
            try {
                let response = await axios.get('auth/me')
                commit('SET_USER', response.data)
            } catch (e) {
                console.log('failed')
            }
        }
    }
}