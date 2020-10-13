<template>
  <div>
    <div class="post-wrapper pt-100">
      <!-- Start post Area -->
      <section v-if="post" class="post-area">
        <div class="container">
          <div class="row justify-content-center d-flex">
            <div class="col-lg-8">
              <div class="single-page-post">
                <img v-if="post.image" class="img-fluid" :src="`${post.image}`" alt />
                <div class="top-wrapper">
                  <div class="row d-flex justify-content-between">
                    <h2 class="col-lg-8 col-md-12 text-uppercase">
                      {{ post.title }}
                    </h2>
                    <div
                      class="col-lg-4 col-md-12 right-side d-flex justify-content-end"
                    >
                      <div class="desc">
                        <h2 v-if="post.user">{{ post.user.name }}</h2>
                        <h3 v-if="post.user">
                          {{ post.user.created_at | timeFormat }}
                        </h3>
                      </div>
                      <div class="user-img">
                        <img src="/user/img/user.jpg" alt />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tags">
                  <ul>
                    <li>
                      <a href="#">lifestyle</a>
                    </li>
                    <li>
                      <a href="#">Art</a>
                    </li>
                    <li>
                      <a href="#">Technology</a>
                    </li>
                    <li>
                      <a href="#">Fashion</a>
                    </li>
                  </ul>
                </div>
                <div v-if="post" class="single-post-content">
                  <p style="text-align: justify">{{ post.description }}</p>
                </div>

                <!-- Start nav Area -->
                <section class="nav-area pt-50 pb-100">
                  <div class="container">
                    <div class="row justify-content-between">
                      <div
                        class="col-sm-6 nav-left justify-content-start d-flex"
                      >
                        <div class="thumb">
                          <img src="/user/img/prev.jpg" alt />
                        </div>
                        <div class="details">
                          <p>Prev Post</p>
                          <h4 class="text-uppercase">
                            <a href="#">A Discount Toner</a>
                          </h4>
                        </div>
                      </div>
                      <div
                        class="col-sm-6 nav-right justify-content-end d-flex"
                      >
                        <div class="details">
                          <p>Prev Post</p>
                          <h4 class="text-uppercase">
                            <a href="#">A Discount Toner</a>
                          </h4>
                        </div>
                        <div class="thumb">
                          <img src="/user/img/next.jpg" alt />
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
                <!-- End nav Area -->

                <!-- Start comment-sec Area -->
                <section class="comment-sec-area pt-80 pb-80">
                  <div class="container">
                    <div class="row flex-column">
                      <h5 class="text-uppercase pb-80">05 Comments</h5>
                      <br />
                      <div class="comment-list">
                        <div
                          class="single-comment justify-content-between d-flex"
                        >
                          <div class="user justify-content-between d-flex">
                            <div class="thumb">
                              <img src="/user/img/asset/c1.jpg" alt />
                            </div>
                            <div class="desc">
                              <h5>
                                <a href="#">Emilly Blunt</a>
                              </h5>
                              <p class="date">December 4, 2017 at 3:12 pm</p>
                              <p class="comment">
                                Never say goodbye till the end comes!
                              </p>
                            </div>
                          </div>
                          <div class="reply-btn">
                            <a href class="btn-reply text-uppercase">reply</a>
                          </div>
                        </div>
                      </div>
                      <div class="comment-list left-padding">
                        <div
                          class="single-comment justify-content-between d-flex"
                        >
                          <div class="user justify-content-between d-flex">
                            <div class="thumb">
                              <img src="/user/img/asset/c2.jpg" alt />
                            </div>
                            <div class="desc">
                              <h5>
                                <a href="#">Emilly Blunt</a>
                              </h5>
                              <p class="date">December 4, 2017 at 3:12 pm</p>
                              <p class="comment">
                                Never say goodbye till the end comes!
                              </p>
                            </div>
                          </div>
                          <div class="reply-btn">
                            <a href class="btn-reply text-uppercase">reply</a>
                          </div>
                        </div>
                      </div>
                      <div class="comment-list left-padding">
                        <div
                          class="single-comment justify-content-between d-flex"
                        >
                          <div class="user justify-content-between d-flex">
                            <div class="thumb">
                              <img src="/user/img/asset/c3.jpg" alt />
                            </div>
                            <div class="desc">
                              <h5>
                                <a href="#">Emilly Blunt</a>
                              </h5>
                              <p class="date">December 4, 2017 at 3:12 pm</p>
                              <p class="comment">
                                Never say goodbye till the end comes!
                              </p>
                            </div>
                          </div>
                          <div class="reply-btn">
                            <a href class="btn-reply text-uppercase">reply</a>
                          </div>
                        </div>
                      </div>
                      <div class="comment-list">
                        <div
                          class="single-comment justify-content-between d-flex"
                        >
                          <div class="user justify-content-between d-flex">
                            <div class="thumb">
                              <img src="/user/img/asset/c4.jpg" alt />
                            </div>
                            <div class="desc">
                              <h5>
                                <a href="#">Emilly Blunt</a>
                              </h5>
                              <p class="date">December 4, 2017 at 3:12 pm</p>
                              <p class="comment">
                                Never say goodbye till the end comes!
                              </p>
                            </div>
                          </div>
                          <div class="reply-btn">
                            <a href class="btn-reply text-uppercase">reply</a>
                          </div>
                        </div>
                      </div>
                      <div class="comment-list">
                        <div
                          class="single-comment justify-content-between d-flex"
                        >
                          <div class="user justify-content-between d-flex">
                            <div class="thumb">
                              <img src="/user/img/asset/c5.jpg" alt />
                            </div>
                            <div class="desc">
                              <h5>
                                <a href="#">Emilly Blunt</a>
                              </h5>
                              <p class="date">December 4, 2017 at 3:12 pm</p>
                              <p class="comment">
                                Never say goodbye till the end comes!
                              </p>
                            </div>
                          </div>
                          <div class="reply-btn">
                            <a href class="btn-reply text-uppercase">reply</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
                <!-- End comment-sec Area -->

                <!-- Start commentform Area -->
                <section class="commentform-area pb-120 pt-80 mb-100">
                  <div class="container">
                    <h5 class="text-uppercas pb-50">Leave a Reply</h5>
                    <div class="row flex-row d-flex">
                      <div class="col-lg-6">
                        <input
                          name="name"
                          placeholder="Enter your name"
                          onfocus="this.placeholder = ''"
                          onblur="this.placeholder = 'Enter your name'"
                          class="common-input mb-20 form-control"
                          required
                          type="text"
                        />
                        <input
                          name="email"
                          placeholder="Enter your email"
                          onfocus="this.placeholder = ''"
                          onblur="this.placeholder = 'Enter your email'"
                          class="common-input mb-20 form-control"
                          required
                          type="email"
                        />
                        <input
                          name="Subject"
                          placeholder="Subject"
                          onfocus="this.placeholder = ''"
                          onblur="this.placeholder = 'Enter your Subject'"
                          class="common-input mb-20 form-control"
                          required
                          type="text"
                        />
                      </div>
                      <div class="col-lg-6">
                        <textarea
                          class="form-control mb-10"
                          name="message"
                          placeholder="Messege"
                          onfocus="this.placeholder = ''"
                          onblur="this.placeholder = 'Messege'"
                          required
                        ></textarea>
                        <a class="primary-btn mt-20" href="#">Comment</a>
                      </div>
                    </div>
                  </div>
                </section>
                <!-- End commentform Area -->
              </div>
            </div>

            <sidebar></sidebar>
          </div>
        </div>
      </section>
    </div>
  </div>
</template>
<script>
import sidebar from "../page/Sidebar";
export default {
  mounted() {
    this.$store.dispatch("getPostById", this.$route.params.id);
  },
  methods: {},
  computed: {
    post() {
      return this.$store.getters.getSinglePost;
    },
  },
  components: {
    sidebar,
  },
};
</script>