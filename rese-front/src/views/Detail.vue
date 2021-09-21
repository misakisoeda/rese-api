<template>
  <div>
    <Header />
    <div class="wrapper">
      <div class="img-kv">
        <img :src="this.detailList.shop_img" v-bind:alt="this.detailList.shop_name">
      </div>
      <!-- /[img-kv] -->
      <div class="contetainer">
        <h1 class="ttl-page">{{this.detailList.shop_name}}</h1>
        <p class="txt-page">{{this.detailList.shop_place}}／{{this.detailList.shop_genre}}</p>
        <div class="cassette-item">
          <div class="cassette-item__inner">
            <p class="cassette-item__txt">{{this.detailList.shop_content}}</p>
          </div>
          <div class="cassette-item__inner">
            予約フォームを入れる
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Header from "../components/Header.vue";
export default {
  components: {
   Header
  },
  data: function () {
    return {
      detailList:[
        {shop_id: ""},
        {shop_name: ""},
        {shop_place: ""},
        {shop_genre: ""},
        {shop_content: ""},
        {shop_img: ""}
      ]
    };
  },
  methods:{
    async shopDetail(){
      //現在のshopIDを取得する
      const item = await axios.get("http://127.0.0.1:8000/api/shop/" + this.shop_id);
      this.detailList = item.data.data;
    }
  },
  created(){
    this.shopDetail();
  },
  props: ["shop_id"]
};
</script>

<style>
@import "../style.css";
</style>
