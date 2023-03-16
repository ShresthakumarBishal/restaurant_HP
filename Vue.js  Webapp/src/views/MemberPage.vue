<template>
  <!--CEO container-->
  <main class="member_page">
    <div class="CEO">
      <div class="absolute_box">
        <div class="CEO_title">
          <h2 class="title_head">代表 <span class="span_color">CEO</span></h2>
        </div>
        <div class="flex">
          <div class="content">
            <div class="member_name">
              <p class="about_member">代表<br />開発 ビサルクマル</p>
            </div>
            <p class="about_member">
              経歴のテキスト。経歴のテキスト。経歴のテキスト。経歴のテキスト。
              <br /><br />
              想いテキスト。想いテキスト。想いテキスト。想いテキスト。想いテキスト。想いテキスト。想いテキスト。想いテキスト。想いテキスト。
              <br /><br />
              おもしろテキスト。おもしろテキスト。おもしろテキスト。
            </p>
          </div>
          <div class="member_img">
            <img class="img_link" src="../assets/Member.jpg" alt="project_img" />
          </div>
        </div>
      </div>
    </div>
    <!--members container--------->
    <div class="member">
      <!--member one-->
      <div class="member_one">
        <div class="absolute_box">
          <div class="member_title">
            <h2 class="title_head">社員 <span class="span_color">Member</span></h2>
          </div>
          <div class="flex">
            <div class="member_img">
              <img class="img_link" src="../assets/Member.jpg" alt="project_img" />
            </div>
            <div class="content">
              <div class="member_name">
                <p class="about_member">代表<br />開発 ビサルクマル</p>
              </div>
              <p class="about_member">
                経歴のテキスト。経歴のテキスト。経歴のテキスト。経歴のテキスト。
                <br /><br />
                想いテキスト。想いテキスト。想いテキスト。想いテキスト。想いテキスト。想いテキスト。想いテキスト。想いテキスト。想いテキスト。
                <br /><br />
                おもしろテキスト。おもしろテキスト。おもしろテキスト。
              </p>
            </div>
          </div>
        </div>
      </div>
      <!--member two-->
      <div class="member_two">
        <div class="absolute_box">
          <div class="flex">
            <div class="content">
              <div class="member_name">
                <p class="about_member">代表<br />開発 ビサルクマル</p>
              </div>
              <p class="about_member">
                経歴のテキスト。経歴のテキスト。経歴のテキスト。経歴のテキスト。
                <br /><br />
                想いテキスト。想いテキスト。想いテキスト。想いテキスト。想いテキスト。想いテキスト。想いテキスト。想いテキスト。想いテキスト。
                <br /><br />
                おもしろテキスト。おもしろテキスト。おもしろテキスト。
              </p>
            </div>
            <div class="member_img">
              <img class="img_link" src="../assets/Member.jpg" alt="project_img" />
            </div>
          </div>
        </div>
      </div>
      <!--member three-->
      <div class="member_three">
        <div class="absolute_box">
          <div class="flex">
            <div class="member_img">
              <img class="img_link" src="../assets/Member.jpg" alt="project_img" />
            </div>
            <div class="content">
              <div class="member_name">
                <p class="about_member">代表<br />開発 ビサルクマル</p>
              </div>
              <p class="about_member">
                経歴のテキスト。経歴のテキスト。経歴のテキスト。経歴のテキスト。
                <br /><br />
                想いテキスト。想いテキスト。想いテキスト。想いテキスト。想いテキスト。想いテキスト。想いテキスト。想いテキスト。想いテキスト。
                <br /><br />
                おもしろテキスト。おもしろテキスト。おもしろテキスト。
              </p>
            </div>
          </div>
        </div>
      </div>
      <!--member four-->
      <div class="member_three">
        <div class="absolute_box">
          <div class="flex">
            <div class="content">
              <div class="member_name">
                <p class="about_member">代表<br />開発 ビサルクマル</p>
              </div>
              <p class="about_member">
                経歴のテキスト。経歴のテキスト。経歴のテキスト。経歴のテキスト。
                <br /><br />
                想いテキスト。想いテキスト。想いテキスト。想いテキスト。想いテキスト。想いテキスト。想いテキスト。想いテキスト。想いテキスト。
                <br /><br />
                おもしろテキスト。おもしろテキスト。おもしろテキスト。
              </p>
            </div>
            <div class="member_img">
              <img class="img_link" src="../assets/Member.jpg" alt="project_img" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--members container end--------->
  </main>
</template>

<script>
export default {
  name: 'FooterComponent',
  props: {
    getvalue: Function,
  },
  mounted() {
    this.getvalue(true)
  },
}
</script>

<style lang="scss">
$color1: #fafafa;
$color2: #e6e6e6;
$color3: white;
$color4: #fd9603;
$horizontal_line: rgb(121, 119, 119);
$margin_top_value: 30%;

*,
*::after,
*::before {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

.member_page {
  background-color: $color1;
  padding-top: $margin_top_value;
}

.CEO {
  background-color: $color2;
  height: 300px;
  position: relative;
  margin-top: 200px;
}

.absolute_box {
  position: absolute;
  top: -400px;
}

.member {
  margin-top: calc($margin_top_value + 100px);
}

.member_one,
.member_two,
.member_three,
.member_four {
  background-color: $color2;
  height: 300px;
  position: relative;
  margin-top: $margin_top_value;
}

.member_two,
.member_three,
.member_four {
  .absolute_box {
    position: absolute;
    top: -300px;
  }
}

.flex {
  display: flex;
  width: 80%;
  margin: auto;
  padding: 50px 40px;
  background-color: $color3;
}

.span_color {
  color: $color4;
}

.CEO_title,
.member_title {
  display: flex;
  justify-content: flex-end;
  width: 60%;
  margin: auto;
  padding-bottom: 50px;
}

.title_head {
  text-align: center;
  width: 200px;
}

.title_head::after {
  content: '';
  border-bottom: 4px solid $color4;
  display: block;
}

.CEO_name::after,
.member_name::after {
  content: '';
  border-top: 2px solid $horizontal_line;
  display: block;
  height: 20px;
}

.content {
  flex: 50%;
  padding: 30px;
}

.member_img {
  flex: 50%;
  padding: 30px;
}

.img_link {
  width: 100%;
  height: 100%;
  box-shadow: 5px 20px 20px 0 rgba(0, 0, 0, 0.2), 5px 6px 20px 0 rgba(0, 0, 0, 0.19);
}

.about_member {
  padding: 0 20px;
}

/* For SP screen*/
@media screen and (max-width: 796px) {
  .member_page {
    background-color: $color3;
    padding-bottom: 40px;
  }

  .CEO_title,
  .member_title {
    width: 100%;
    justify-content: center;
  }

  .about_member {
    padding: 0 10px;
  }

  .CEO {
    margin: 0 8%;
    height: auto;
    background-color: $color3;
  }

  .member {
    margin: 0 8%;
    margin-top: 0;
    height: auto;
  }

  .member_one,
  .member_two,
  .member_three,
  .member_four {
    background-color: $color3;
    height: auto;
    margin-top: 40px;
  }

  .member_two,
  .member_three,
  .member_four {
    .absolute_box {
      position: static;
    }
  }

  .absolute_box {
    position: static;
  }

  .flex {
    width: 100%;
    flex-direction: column;
    padding: 0;
  }

  .content,
  .member_img {
    width: 100%;
    padding: 0;
  }

  .member_img {
    order: 1;
    padding-bottom: 25px;
  }

  .content {
    order: 2;
  }

  .content::after {
    content: '';
    border-top: 2px solid $horizontal_line;
    display: block;
  }
}
</style>
