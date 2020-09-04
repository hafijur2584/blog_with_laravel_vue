export default{
	state:{
		category:[],
		post:[]
	},
	getters:{
		getCategtory(state){
			return state.category
		},
		getPost(state){
			return state.post
		}
	},
	mutations:{
		categories(state,data){
			return state.category = data
		},
		posts(state,data){
			return state.post =data
		}
	},
	actions:{
		allCategory(context){
			// console.log(state.page)
			axios.get('/api/category')
			.then((res)=>{
				context.commit('categories',res.data.categories)
			})
		},
		allPost(context){
			axios.get('/api/post')
			.then((res)=>{
				context.commit('posts',res.data.posts)
			})
		}
	}
}