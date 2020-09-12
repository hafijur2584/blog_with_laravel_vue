export default {
    namespaced: true,

    state:{
        token: null,
        user: null
    },
    getters:{
        authenticated(state){
            return state.token && state.user
        },
        user(state){
            return state.user
        }
        
    },
    mutations: {
        SET_TOKEN(state,token){
            state.token = token
        },
        SET_USER(state,user){
            state.user = user
        }
    },
    actions: {
        async signIn({ dispatch }, data){
            let response = await axios.post('/auth/login',data)
            dispatch('attempt',response.data.access_token)
            // console.log(response.data)
        },

        async attempt({ commit }, token){
            commit('SET_TOKEN',token)

            axios({
                method: 'post', //you can set what request you want to be
                url: '/auth/me',
                headers: {
                  Authorization: 'Bearer ' + token
                }
              })
              .then((res) =>  {
                  commit('SET_USER',res.data)
                  console.log('test')
            }).catch((e) => {
                commit('SET_TOKEN', null)
                commit('SET_USER', null)
            })
        }
    }
}