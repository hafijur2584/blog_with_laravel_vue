import auth from '../auth'
export default {
	state: {
		category: [],
		post: []
	},
	getters: {
		getCategtory(state) {
			return state.category
		},
		getPost(state) {
			return state.post
		}
	},
	mutations: {
		categories(state, data) {
			return state.category = data
		},
		posts(state, data) {
			return state.post = data
		}
	},
	actions: {
		allCategory(context) {
			// console.log(state.page)
			// let headers = {
			// 	Auhorization: 'bearer ' + auth.state.token
			// }


			axios({
                method: 'get', //you can set what request you want to be
                url: '/category',
                headers: {
                  Authorization: 'Bearer ' + auth.state.token
                }
              })
				.then((res) => {
					context.commit('categories', res.data.categories)
				})
		},
		allPost(context) {
			axios.get('/api/post')
				.then((res) => {
					context.commit('posts', res.data.posts)
				})
		}
	},
	modules:{
		auth
	}
}