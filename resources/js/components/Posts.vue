<template>
    <div class="post-preview">
        <a href="slug">
            <h2 class="post-title">
                {{ title }}
            </h2>
            <h3 class="post-subtitle">
                {{ subtitle }}
            </h3>
        </a>
        <p class="post-meta">
            Posted by
            <a href="#">Start Bootstrap</a>
                {{ created_at }}
                <!-- <button @click.prevent="test">
                    <small>{{ likeCount }}</small>
                    <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                </button> -->


                <button class="btn btn-primary" @click="test">Click</button>
        </p>
        <hr>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                likeCount: 0
            }
        },
        props:[
            'title','subtitle','created_at','postId','login'
        ],

        methods:{
            likeIt(){
                if (this.login) {
                    axios.post('/saveLike',{
                        id : this.postId
                    })
                    .then(response=>{
                        this.likeCount += 1;
                        // this.blog = response.data.data;
                        console.log(response);
                    })

                    .catch(function (error) {
                        console.log(error);
                    });
                }else{
                    // window.location.replace('login');
                    console.log(123);
                }
            },

            test() {
                alert(123);
            }
        }
    }
</script>
