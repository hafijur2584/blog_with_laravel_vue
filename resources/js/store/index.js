import auth from '../auth'
export default {
	state: {
		category: [],
		post: [],
		blogpost:[]
	},
	getters: {
		getCategtory(state) {
			return state.category
		},
		getPost(state) {
			return state.post
		},
		getBlogPost(state){
			return state.blogpost
		}
	},
	mutations: {
		categories(state, data) {
			return state.category = data
		},
		posts(state, data) {
			return state.post = data
		},
		blogPosts(state,data){
			return state.blogpost = data
		}
	},
	actions: {
		allCategory(context) {



			axios.get('/category')
				.then((res) => {
					// console.log(res.data)
					context.commit('categories', res.data)
				})
		},
		allPost(context) {
			axios.get('/post')
				.then((res) => {
					context.commit('posts', res.data.posts)
				})
		},
		allBlogPost(context){
			axios.get('/blogpost')
			.then((res) => {
				context.commit('blogPosts',res.data.blogposts)
			})
		},
		pagination(context){
			
		}

	},
	modules: {
		auth
	}
}