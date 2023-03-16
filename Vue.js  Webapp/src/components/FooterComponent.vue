<template>
  <div class="footer">
    <div class="footer_container">
      <div class="footer_flex" v-if="msg">
        <router-link to="/inquirypage" class="footer_link">
          <img class="icon" src="../assets/icon_contact.svg" alt="icon" />お問い合わせ
        </router-link>
        <a href="https://www.google.com/" target="_blank" class="footer_link">
          <img class="icon" src="../assets/icon_saiyou.svg" alt="icon" />採用情報
        </a>
      </div>
      <div class="footer_flex_2" v-else>
        <a href="https://www.google.com/" target="_blank" class="inquiry_form_footer">
          <img class="icon" src="../assets/icon_saiyou.svg" alt="icon" />採用情報
        </a>
      </div>
    </div>
    <div class="footer_container">
      <h4 class="rights">@kaihatsu All Rights Reserved.</h4>
    </div>
  </div>
</template>

<script>
export default {
  name: 'FooterComponent',
  props: {
    msg: Boolean,
  },
  //mounted() {
  //let boolOutput2 = this.msg === true
  //this.show = this.msg
  //},
}
</script>

<style lang="scss" scoped>
$primary_color: #fd9603;
$secondary_color: white;
$third_color: rgba(50, 49, 49, 0.914);
$fourth_color: rgba(244, 80, 30, 0.953);
$fifth_color: #e6e6e6;

@mixin footer_variables {
  text-decoration: none;
  color: $secondary_color;
  background-color: $primary_color;
}

*,
*::after,
*::before {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

.icon {
  width: 100px;
  height: 80px;
  margin-right: 20px;
  vertical-align: -1.1em;
}

.footer_flex,
.footer_flex_2 {
  display: flex;
  text-align: center;
}

.footer_link {
  @include footer_variables;
  flex: 50%;
  padding: 40px;
  font-size: 25px;
}

.footer_link:first-child {
  background-color: $fourth_color;
}

.rights {
  padding: 15px 0;
  text-align: center;
  color: $secondary_color;
  background-color: black;
  font-size: 14px;
}

.inquiry_form_footer {
  @include footer_variables;
  width: 40%;
  margin: 60px auto;
  padding: 40px;
  font-size: 25px;
  border-radius: 18px;
  transition: border-radius 1s;
}

.footer_link:hover,
.inquiry_form_footer:hover {
  background-color: $third_color;
  border-radius: 0;
}

.footer_flex_2 {
  background-color: $fifth_color;
}

/* For SP screen*/
@media screen and (max-width: 796px) {
  .icon {
    width: 8vw;
    height: 8vw;
    vertical-align: -0.8em;
  }

  .footer_flex_2 {
    background-color: $secondary_color;
  }

  .footer_link {
    padding: 10px 0;
    font-size: 3.5vw;
  }

  .inquiry_form_footer {
    width: 60%;
    margin: 0 auto 30px auto;
    padding: 12px 0;
    font-size: 4vw;
  }
}
</style>
