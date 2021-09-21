<template>
 <div>
   <Header />
   <div class="wrapper wrapper--center">
       <div class="panel-item">
           <p class="panel-item__ttl">ログイン</p>
           <div class="panel-item__content">
              <input class="panel-item__content-input" placeholder="メールアドレス" type="email" v-model="email" />
              <input class="panel-item__content-input" placeholder="パスワード" type="password" v-model="password" />
              <button @click="auth" class="panel-item__content-btn">ログイン</button>
           </div>
       </div>
       <!-- /[panel-item] -->
   </div>
   <!-- [/wrapper] -->
 </div>
</template>

<script>
import Header from "../components/Header";
export default {
  data() {
    return {
      email: "",
      password: ""
    };
  },
  components: {
    Header
  },
  methods: {
    auth() {
      this.$store.dispatch("login", {
        email: this.email,
        password: this.password
      });
    }
  }
};
</script>

<style>
@import "../style.css";
</style>
