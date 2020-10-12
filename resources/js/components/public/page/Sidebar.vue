<template>
  <div class="col-lg-4 sidebar-area">
    <div class="single_widget search_widget">
      <div id="imaginary_container">
        <div class="input-group stylish-input-group">
          <input
            @keyup="realSearch"
            type="text"
            class="form-control"
            v-model="keyword"
            placeholder="Search"
          />
          <span class="input-group-addon">
            <button type="submit" @click.prevent="realSearch">
              <span class="lnr lnr-magnifier"></span>
            </button>
          </span>
        </div>
      </div>
    </div>

    <!--<div class="single_widget about_widget">-->
    <!--<img src="/user/img/asset/s-img.jpg" alt />-->
    <!--<h2 class="text-uppercase">Adele Gonzalez</h2>-->
    <!--<p>-->
    <!--MCSE boot camps have its supporters and-->
    <!--its detractors. Some people do not understand why you should have to spend money-->
    <!--</p>-->
    <!--<div class="social-link">-->
    <!--<a href="#">-->
    <!--<button class="btn">-->
    <!--<i class="fa fa-facebook" aria-hidden="true"></i> Like-->
    <!--</button>-->
    <!--</a>-->
    <!--<a href="#">-->
    <!--<button class="btn">-->
    <!--<i class="fa fa-twitter" aria-hidden="true"></i> follow-->
    <!--</button>-->
    <!--</a>-->
    <!--</div>-->
    <!--</div>-->
    <category></category>

    <div class="single_widget recent_widget">
      <h4 class="text-uppercase pb-20">Recent Posts</h4>
      <div class="active-recent-carusel">
        <div class="item">
          <img src="/user/img/asset/slider.jpg" alt />
          <p class="mt-20 title text-uppercase">
            Home Audio Recording
            <br />For Everyone
          </p>
          <p>
            02 Hours ago
            <span>
              <i class="fa fa-heart-o" aria-hidden="true"></i>
              06
              <i class="fa fa-comment-o" aria-hidden="true"></i>02
            </span>
          </p>

          <div class="item">
            <img src="/user/img/asset/slider.jpg" alt />
            <p class="mt-20 title text-uppercase">
              Home Audio Recording
              <br />For Everyone
            </p>
            <p>
              02 Hours ago
              <span>
                <i class="fa fa-heart-o" aria-hidden="true"></i>
                06
                <i class="fa fa-comment-o" aria-hidden="true"></i>02
              </span>
            </p>

            <div class="item">
              <img src="/user/img/asset/slider.jpg" alt />
              <p class="mt-20 title text-uppercase">
                Home Audio Recording
                <br />For Everyone
              </p>
              <p>
                02 Hours ago
                <span>
                  <i class="fa fa-heart-o" aria-hidden="true"></i>
                  06
                  <i class="fa fa-comment-o" aria-hidden="true"></i>02
                </span>
              </p>
            </div>
          </div>

          <div class="single_widget cat_widget">
            <h4 class="text-uppercase pb-20">post archive</h4>
            <ul>
              <li>
                <a href="#">
                  Dec'17
                  <span>37</span>
                </a>
              </li>
              <li>
                <a href="#">
                  Nov'17
                  <span>37</span>
                </a>
              </li>
              <li>
                <a href="#">
                  Oct'17
                  <span>37</span>
                </a>
              </li>
              <li>
                <a href="#">
                  Sept'17
                  <span>37</span>
                </a>
              </li>
              <li>
                <a href="#">
                  Aug'17
                  <span>37</span>
                </a>
              </li>
              <li>
                <a href="#">
                  Jul'17
                  <span>37</span>
                </a>
              </li>
              <li>
                <a href="#">
                  Jun'17
                  <span>37</span>
                </a>
              </li>
            </ul>
          </div>
          <div class="single_widget tag_widget">
            <h4 class="text-uppercase pb-20">Tag Clouds</h4>
            <ul>
              <li>
                <a href="#">Lifestyle</a>
              </li>
              <li>
                <a href="#">Art</a>
              </li>
              <li>
                <a href="#">Adventure</a>
              </li>
              <li>
                <a href="#">Food</a>
              </li>
              <li>
                <a href="#">Technology</a>
              </li>
              <li>
                <a href="#">Fashion</a>
              </li>
              <li>
                <a href="#">Adventure</a>
              </li>
              <li>
                <a href="#">Food</a>
              </li>
              <li>
                <a href="#">Technology</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import category from "./Category";
import _ from 'lodash';
export default {
  data() {
    return {
      keyword: "",
    };
  },
  methods: {
    
    realSearch:_.debounce(function () {
      this.$store.dispatch("searchPost", this.keyword);
    }, 1000)
  },
  mounted() {},
  components: {
    category,
  },
};
</script>