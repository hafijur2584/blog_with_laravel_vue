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
        },
        logInRemove(state, data) {
            localStorage.removeItem('token')
            state.token = null
            Toast.fire({
                icon: 'success',
                title: 'Logout Successfully!'
              })
            hh.push('/admin/login')
            
        }
    },
    actions: {
        async signIn({ dispatch }, data) {
            let response = await axios.post('/auth/login', data)
            dispatch('attempt', response.data.access_token)

        },

        async attempt({ commit ,state}, token) {
            commit('SET_TOKEN', token)
            if (token) {
                axios.defaults.headers.common['Authorization'] = 'bearer ' + token
                localStorage.setItem('token', token)
                Toast.fire({
                    icon: 'success',
                    title: 'LogIn Successfully!'
                  })


                  try {
                    let response = await axios.get('auth/me')
                    commit('SET_USER', response.data)
                } catch (e) {
                    commit('SET_TOKEN',null)
                    commit('SET_USER',null)
    
                }
            } else {

                axios.defaults.headers.common['Authorization'] = null
                localStorage.removeItem('token')
                
                
            }
            
        },
        async logout(context) {
            axios.post('/auth/logout')
                .then((res) => {
                    context.commit('logInRemove', res.data)
                    
                })
        }
    }
}