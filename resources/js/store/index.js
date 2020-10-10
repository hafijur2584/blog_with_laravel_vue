import auth from '../auth'
export default {
	state: {
		category: [],
		post: [],
		blogpost:[],
		singlepost:[],
		allCategoory:[]
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
		},
		getSinglePost(state){
			return state.singlepost
		},

		//frontend
		getCategories(state){
			return state.allCategoory
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
		},
		singlepost(state, data){
			return state.singlepost = data
		},

		//forntend
		allCategory(state,data){
			return state.allCategoory = data
		},
		allPostByCatId(state,payload){
			return state.blogpost = payload
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
		getPostById(context,id){
			axios.get(`/blogpost/${id}`).then((res) => {
				context.commit('singlepost',res.data)
			  });
			
		},
		pagination(context){
			
		},

		//for users
		category(context){
			axios.get('/categories')
				.then((res) => {
					context.commit('allCategory',res.data)
				});
		},
		allPostByCatId(context,payload){
			axios.get('/categories/'+payload)
				.then((res) => {
					context.commit('allPostByCatId',res.data)
				})
		}

	},
	modules: {
		auth
	}
}