import Vue from 'vue'

//support moment js
import moment from 'moment';
Vue.filter('timeFormat',(arg)=> {
	return moment(arg).format("DD-MM-YYYY, h:mm a");
});

Vue.filter('sortForm',(text,length,saffix)=>{
	return text.substring(0,length)+saffix;
});