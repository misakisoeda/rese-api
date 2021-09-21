<template>
  <div>

    <header class="header">

        <!-- ハンバーガーメニューのボタン -->
        <div class="hamburger-btn" v-on:click='ActiveBtn=!ActiveBtn'>
          <span class="hamburger-btn__item hamburger-btn__item--1" v-bind:class="{'is-active1':ActiveBtn}"></span>
          <span class="hamburger-btn__item hamburger-btn__item--2" v-bind:class="{'is-active2':ActiveBtn}"></span>
          <span class="hamburger-btn__item hamburger-btn__item--3" v-bind:class="{'is-active3':ActiveBtn}"></span>
        </div>
        <!-- [/hamburger-btn] -->

        <!-- サイトタイトル -->
        <h1><span @click="$router.push('/')">Rese</span></h1>

        <!-- メニュー -->
        <transition name="hamburger-menu">
          <div class="hamburger-menu" v-show="ActiveBtn">
              <ul>
                  <li>
                    <p @click="$router.push('/mypage')">マイページ</p>
                  </li>
                  <li>
                    <p @click="$router.push('/register')">会員登録</p>
                  </li>
                  <li>
                    <p @click="$router.push('/login')">ログイン</p>
                  </li>
                  <li>
                    <p @click="$store.dispatch('logout')">ログアウト</p>
                  </li>
              </ul>
          </div>
        </transition>
        <!-- [/hamburger-menu] -->

    </header>
    <!-- /[header] -->

  </div>
</template>

<script>
export default {
  data() {
    return {
      ActiveBtn: false
    };
  }
};
</script>

<style>
@import "../style.css";
</style>