<template>
 <div>
   <Header />
   <div class="wrapper">
     <ul class="list-item">
       <li class="list-item__content" v-for="(shop, index) in shops" :key="index">
         <div class="card-item">
           <p class="card-item__img">
             <img :src="shop.shop_img" v-bind:alt="shop.shop_name">
           </p>
           <div class="card-item__main">
            <p class="card-item__ttl">{{ shop.shop_name }}</p>
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
            {{ shop.shop_id }}
            <img src="../assets/icon_heart_white.png" class="btn-heart__img" v-if="show" @click="fav(index); change();" alt="">
            <img src="../assets/icon_heart_pink.png" class="btn-heart__img" v-else @click="favDel(index)" alt="">
          </button>
         </div>
         <!-- [/card-item] -->
       </li>
     </ul>
     <!-- /[list-item] -->
   </div>
   <!-- [/wrapper] -->
 </div>
</template>

<script>
import Header from "../components/Header";
import axios from "axios";
export default {
  props: ["id"],
  data: function () {
    return {
      shops: [],
      show: true
    }
  },
  methods: {
    async created() {
      const item = await axios.get("http://127.0.0.1:8000/api/shop");
      this.shops = item.data.data;
    },
    detail(shop_id) {
      //詳細ページのリンク
      this.$router.push({path: '/detail/'+ shop_id, params:{shop_id:shop_id}});
    },
    fav(index) {
      axios
      .post("http://127.0.0.1:8000/api/like", {
        user_id: this.$store.state.user.id,
        shop_id: this.shops[index].shop_id
      }).then((response) => {
        console.log(response);
      })
      .catch(error => {
        console.log(error);
      });
    },
    favDel(index) {
      axios.delete('http://127.0.0.1:8000/api/like', {
        data: {
          user_id: this.$store.state.user.id,
          shop_id: this.shops[index].shop_id
        }
      })
      .then((res) => {
        console.log(res);
      })
      .catch((err)=> {
        console.log(err);
      })
    },
    // favDel(index) {
    //   axios.request({
    //     method: 'delete',
    //     url: "http://127.0.0.1:8000/api/like",
    //     data: {
    //       user_id: this.$store.state.user.id,
    //       shop_id: this.shops[index].shop_id
    //     }
    //   }).then((response) => {
    //     // レスポンスが200の時の処理
    //     console.log(response);
    //     console.log("消しといたよ");
    //   })
    //   .catch(error => {
    //     console.log(('えらー'));
    //     console.log(error);
    //   });
    // },
    change() {
      this.show = !this.show
    }
  },
  created(){
    this.created();
  },
  components: {
    Header
  }
};
</script>

<style>
@import "../style.css";
</style>