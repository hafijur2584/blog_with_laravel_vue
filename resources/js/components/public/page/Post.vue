<template>
  <div class="col-lg-8">
    <div class="post-lists">
      <div
        class="single-list flex-row d-flex"
        v-for="post in blogpost.data"
        :key="post.id"
      >
        <div class="thumb">
          <div class="date">
            <span>{{ post.created_at | day }}</span>
            <br />{{ post.created_at | month }}
          </div>
          <img :src="`${post.image}`" alt />
        </div>
        <div class="detail">
          <router-link :to="`/singlepost/${post.id}`">
            <h4 class="pb-20">{{ post.title }}</h4>
          </router-link>
          <p>{{ post.description | sortForm(200, "...") }}</p>
          <p class="footer pt-20">
            <i class="fa fa-user" aria-hidden="true"></i>
            <a style="margin-right: 10px" href="#">{{ post.user.name }}</a>
            <a href="#">06 Likes</a>
            <i class="ml-20 fa fa-comment-o" aria-hidden="true"></i>
            <a href="#">02 Comments</a>
          </p>
        </div>
      </div>

      <div class="justify-content-center d-flex">
        <pagination 
          :data="blogpost" @pagination-change-page="blogPosts" ></pagination
        >
      </div>

      <!-- <pagination ></pagination> -->
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
              <p>
                inappropriate behavior Lorem ipsum dolor sit amet,
                consecteturinapprop riate behavior Lorem ipsum dolor sit amet,
                consectetur.
              </p>
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
              <p>
                inappropriate behavior Lorem ipsum dolor sit amet,
                consecteturinapprop riate behavior Lorem ipsum dolor sit amet,
                consectetur.
              </p>
              <p class="footer pt-20">
                <i class="fa fa-heart-o" aria-hidden="true"></i>
                <a href="#">06 Likes</a>
                <i class="ml-20 fa fa-comment-o" aria-hidden="true"></i>
                <a href="#">02 Comments</a>
              </p>
            </div>
          </div>
          <div class="justify-content-center d-flex">
            <a
              class="text-uppercase primary-btn loadmore-btn mt-70 mb-60"
              href="#"
              >Load More Post</a
            >
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  mounted() {},
  computed: {
    blogpost() {
      return this.$store.getters.getBlogPost;
    },
  },
  methods: {
    getAllCategoryPost() {
      if (this.$route.params.id != null) {
        this.$store.dispatch("allPostByCatId", this.$route.params.id);
      } else {
        this.$store.dispatch("allBlogPost");
      }
    },
    blogPosts(page) {
      if (typeof page === "undefined") {
        page = 1;
      }
      this.$store.dispatch("allBlogPost", page);
    },
  },
  created() {
    this.blogPosts();
  },
  watch: {
    $route(to, from) {
      this.getAllCategoryPost();
    },
  },
};
</script>
<style>
.single-list .footer i {
  margin-right: 10px !important;
}
</style>