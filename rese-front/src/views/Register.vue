<template>
 <div>
   <Header />
   <div class="wrapper wrapper--center">
       <div class="panel-item">
           <p class="panel-item__ttl">会員登録</p>
           <div class="panel-item__content">
              <input class="panel-item__content-input" placeholder="ユーザーネーム" type="text" v-model="name" />
              <input class="panel-item__content-input" placeholder="メールアドレス" type="email" v-model="email" />
              <input class="panel-item__content-input" placeholder="パスワード" type="password" v-model="password" />
              <button @click="auth" class="panel-item__content-btn">登録</button>
           </div>
       </div>
       <!-- /[panel-item] -->
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
      name: "",
      email: "",
      password: ""
    };
  },
  components: {
    Header
  },
  methods: {
    auth() {
      axios
        .post("http://127.0.0.1:8000/api/register", {
          name: this.name,
          email: this.email,
          password: this.password
        })
        .then(response => {
          console.log(response);
          this.$router.replace("/");
        })
        .catch(error => {
          alert(error);
        });
    }
  }
};
</script>

<style>
@import "../style.css";
</style>
