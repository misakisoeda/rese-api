<template>
 <div>
   <Header />
   <div class="wrapper wrapper--center">
       <div class="panel-item">
           <div class="panel-item__content">
               <p class="panel-item__content-caption">会員登録が完了しました</p>
              <button class="panel-item__content-btn">ログインページ</button>
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
 components: {
   Header
 }
};
</script>

<style>
@import "../style.css";
</style>
