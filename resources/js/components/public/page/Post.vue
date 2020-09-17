<template>
  <div class="col-lg-8">
    <div class="post-lists">
      <div class="single-list flex-row d-flex" v-for="(post,i) in blogpost" :key="i">
        <div class="thumb">
          <div class="date">
            <span>{{post.created_at | day}}</span>
            <br />{{post.created_at | month}}
          </div>
          <img :src="`${post.image}`" alt />
        </div>
        <div class="detail">
          <a href="#">
            <h4 class="pb-20">{{post.title}}</h4>
          </a>
          <p>{{post.description | sortForm(200,'...')}}</p>
          <p class="footer pt-20">
            <i class="fa fa-user" aria-hidden="true"></i>
            <a style="margin-right:10px;" href="#">{{post.user.name}}</a>
            <a href="#">06 Likes</a>
            <i class="ml-20 fa fa-comment-o" aria-hidden="true"></i>
            <a href="#">02 Comments</a>
          </p>
        </div>
      </div>

      <div class="justify-content-center d-flex">
        <a class="text-uppercase primary-btn loadmore-btn mt-40 mb-60" href="#">Load More Post</a>
      </div>
    </div>
    <div class="top-posts pt-50">
      <div class="container">
        <div class="row justify-content-center">
          <div class="single-posts col-lg-6 col-sm-6">
            <img class="img-fluid" src="/user/img/asset/p1.jpg" alt />
            <div class="date mt-20 mb-20">10 Jan 2018</div>
            <div class="detail">
              <a href="#">
                <h4 class="pb-20">
                  Addiction When Gambling
                  <br />Becomes A Problem
                </h4>
              </a>
              <p>inappropriate behavior Lorem ipsum dolor sit amet, consecteturinapprop riate behavior Lorem ipsum dolor sit amet, consectetur.</p>
              <p class="footer pt-20">
                <i class="fa fa-heart-o" aria-hidden="true"></i>
                <a href="#">06 Likes</a>
                <i class="ml-20 fa fa-comment-o" aria-hidden="true"></i>
                <a href="#">02 Comments</a>
              </p>
            </div>
          </div>
          <div class="single-posts col-lg-6 col-sm-6">
            <img class="img-fluid" src="/user/img/asset/p2.jpg" alt />
            <div class="date mt-20 mb-20">10 Jan 2018</div>
            <div class="detail">
              <a href="#">
                <h4 class="pb-20">
                  Addiction When Gambling
                  <br />Becomes A Problem
                </h4>
              </a>
              <p>inappropriate behavior Lorem ipsum dolor sit amet, consecteturinapprop riate behavior Lorem ipsum dolor sit amet, consectetur.</p>
              <p class="footer pt-20">
                <i class="fa fa-heart-o" aria-hidden="true"></i>
                <a href="#">06 Likes</a>
                <i class="ml-20 fa fa-comment-o" aria-hidden="true"></i>
                <a href="#">02 Comments</a>
              </p>
            </div>
          </div>
          <div class="justify-content-center d-flex">
            <a class="text-uppercase primary-btn loadmore-btn mt-70 mb-60" href="#">Load More Post</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  mounted() {
    this.$store.dispatch("allBlogPost");
  },
  computed: {
    blogpost() {
      return this.$store.getters.getBlogPost;
    },
  },
  methods: {},
};
</script>
<style>
.single-list .footer i {
  margin-right: 10px!important;
}
</style>