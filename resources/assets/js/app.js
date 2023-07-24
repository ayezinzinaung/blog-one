require('./bootstrap');

import ExampleComponent from './components/ExampleComponent.vue';
import PostsComponent from './components/Posts.vue';

window.Vue = require('vue').default;


Vue.component('example-component', ExampleComponent);
Vue.component('posts-component', PostsComponent);

let url = window.location.href;

let pageNumber = url.split('=')[1];

const app = new Vue({
    el: '#app',
    data:{
        blog:{},
    },

    mounted(){
        axios.post('/getPosts',{
            'page' : pageNumber
        })
            .then(response=>{
                this.blog = response.data.data
                // console.log(response);
            })
        
            .catch(function (error) {
                console.log(error);
            });
    }
});