<template>
 <div>
   <Header />
   <div class="wrapper">

        <div class="contetainer">
            <p class="ttl-login">{{ name }} さん</p>
            <!-- /[ttl-item] -->
        </div>
        <!-- /[contetainer] -->

        <div class="contetainer">

            <p class="ttl-item">予約状況</p>
            <!-- /[ttl-item] -->

            <ul class="list-item list-item--single">
                <li class="list-item__content">
                    <div class="cassette-item">
                        <p class="cassette-item__img">
                            <img src="https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg" alt="仙人">
                        </p>
                        <div class="cassette-item__main">
                            <p class="cassette-item__ttl">仙人</p>
                            <div class="tags-item">
                                <p class="tags-item__txt">#東京都</p>
                                <p class="tags-item__txt">#寿司</p>
                            </div>
                            <!-- /[tags-item] -->
                            <div class="cassette-item__data">
                                <p class="cassette-item__data-item">来店日：0000年00月00日</p>
                                <p class="cassette-item__data-item">来店時刻：00:00</p>
                                <p class="cassette-item__data-item">来店人数：0名</p>
                            </div>
                        </div>
                        <div class="cassette-item__links">
                            <p class="btn-item">変更する</p>
                        </div>
                    </div>
                    <!-- [/cassette-item] -->
                </li>
            </ul>
            <!-- /[list-item] -->

        </div>
        <!-- /[contetainer] -->

       <div class="contetainer">

            <p class="ttl-item">お気に入り店舗</p>
            <!-- /[ttl-item] -->

            <ul class="list-item">
                <li class="list-item__content" v-for="(shop,index) in shops" :key="index">
                    <div class="card-item">
                        <p class="card-item__img">
                            <img :src="shop.shop_img" v-bind:alt="shop.shop_name">
                        </p>
                        <div class="card-item__main">
                            <p class="card-item__ttl">{{shop.shop_name}}</p>
                            <div class="tags-item">
                                <p class="tags-item__txt">#{{ shop.shop_place }}</p>
                                <p class="tags-item__txt">#{{ shop.shop_genre }}</p>
                            </div>
                            <!-- /[tags-item] -->
                            <div class="card-item__bottom">
                                <button class="btn-item" @click="detail(shop.shop_id)">詳しく見る</button>
                            </div>
                        </div>
                        <button class="btn-heart">
                            <img class="btn-heart__img" src="../assets/icon_heart_white.png" />
                        </button>
                    </div>
                    <!-- [/card-item] -->
                </li>
            </ul>
            <!-- /[list-item] -->

        </div>
       <!-- /[contetainer] -->

   </div>
   <!-- [/wrapper] -->
 </div>
</template>

<script>
import Header from "../components/Header";
import axios from "axios";
export default {
    data() {
        return {
            shops: [],
            likes: [],
            name: this.$store.state.user.name,
        };
    },
    methods: {
        //店舗を取得
        async createdShops() {
            const shopsItem = await axios.get("http://127.0.0.1:8000/api/shop");
            this.shops = shopsItem.data.data;
        },
        //お気に入りのを取得
        async createdLikes() {
            const likesItem = await axios.get("http://127.0.0.1:8000/api/like");
            this.likes = likesItem.data.data;
            console.log(likesItem);
            console.log(this.$store.state.user.id);
        },
    },
    created(){
        this.createdShops();
        this.createdLikes();
    },
    components: {
        Header
    }
};
</script>

<style>
@import "../style.css";
</style>