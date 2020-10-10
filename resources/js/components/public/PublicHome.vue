<template>
  <div>
    <!-- Start top-section Area -->
    <section class="top-section-area section-gap">
      <div class="container">
        <div class="row justify-content-between align-items-center d-flex">
          <div class="col-lg-8 top-left">
            <h1 class="text-white mb-20">Fashion News</h1>
            <ul>
              <li>
                <a href="index.html">Home</a>
                <span class="lnr lnr-arrow-right"></span>
              </li>
              <li>
                <a href="category.html">Category</a>
                <span class="lnr lnr-arrow-right"></span>
              </li>
              <li>
                <a href="single.html">Fashion</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- End top-section Area -->

    <div class="post-wrapper pt-100">
      <!-- Start post Area -->
      <section class="post-area">
        <div class="container">
          <div class="row justify-content-center d-flex">
            <post></post>
            <sidebar></sidebar>
            <!-- End post Area -->
          </div>
        </div>
      </section>
      <!-- End post Area -->
    </div>
  </div>
</template>

<script>
import sidebar from './page/Sidebar'
import post from './page/Post'
export default {
  mounted() {
    
  },
  components:{
    sidebar,
    post
  }
};
</script>
