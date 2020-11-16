import auth from '../auth'
export default {
	state: {
		category: {},
		post: {},
		blogpost:{},
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
		searchCategoryByAdmin(state, data){
			return state.category = data
		},
		posts(state, data) {
			return state.post = data
		},
		searchPostByAdmin(state, data){
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
		},
		searchByKey(state,data){
			return state.blogpost = data
		}

	},
	actions: {
		allCategory(context,payload) {

			axios.get('/category?page=' + payload)
			.then(response => {
				// this.laravelData = response.data;
				context.commit('categories', response.data)
			})
		},
		adminSearchCategory(context,payload){
			
			axios.get('/admin/searchcategory?s=' + payload)
			.then((res) => {
				context.commit('searchCategoryByAdmin',res.data)
			})
		}
		,
		allPost(context,payload) {
			axios.get('/post?page=' + payload)
			.then(response => {
				// this.laravelData = response.data;
				context.commit('posts', response.data.posts)
			})

			// axios.get('/post')
			// 	.then((res) => {
			// 		context.commit('posts', res.data.posts)
			// 	})
		},
		adminSearchPost(context,payload){
			axios.get('/admin/searchpost?s='+payload)
			.then((res) => {
				context.commit('searchPostByAdmin',res.data)
			})
		}
		,
		allBlogPost(context,payload){
			axios.get('/blogpost?page='+payload)
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
		},
		searchPost(context, payload){
			axios.get('/search?s=' + payload,[
				
			])
			.then((res) => {
				console.log(res.data)
				context.commit('searchByKey',res.data)
			})
		}

	},
	modules: {
		auth
	}
}