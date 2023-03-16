<template>
  <div class="header">
    <img class="logo" src="../assets/ロゴ.jpg" alt="CompanyLogo" />
    <div class="header_right">
      <div class="dropdown">
        <button>会社について</button>
        <div class="dropdown_link">
          <router-link to="/" class="header_link">事業内容</router-link>
          <router-link to="/companyoverview" class="header_link">企業概要</router-link>
        </div>
      </div>
      <div class="dropdown">
        <button>社員</button>
        <div class="dropdown_link">
          <router-link to="/memberpage" class="header_link">代表</router-link>
          <router-link to="/memberpage" class="header_link">社員</router-link>
        </div>
      </div>
      <div class="dropdown">
        <button>お問い合わせ</button>
        <div class="dropdown_link">
          <router-link to="/inquirypage" class="header_link">お問い合わせ</router-link>
        </div>
      </div>
      <button @click="openNav" class="header_right_sp"><b>&#x2630;</b></button>
    </div>
  </div>
  <!--mobile Toggle Side panel-->
  <div class="sidepanel" id="mySidepanel">
    <img id="logo_toogle" src="../assets/ロゴ.jpg" alt="CompanyLogo" />
    <button @click="closeNav" id="closebtn">&#x2715;</button>
    <hr />
    <router-link @click="closeNav" class="slidetoogle" to="/companyoverview">企業概要&emsp;&#x3E;</router-link>
    <hr />
    <router-link @click="closeNav" class="slidetoogle" to="/">事業内容&emsp;&#x3E;</router-link>
    <hr />
    <router-link @click="closeNav" class="slidetoogle" to="/memberpage"
      >代表<span class="separate">&#x2571;</span>社員&emsp;&#x3E;</router-link
    >
    <hr />
    <router-link @click="closeNav" class="slidetoogle" to="/inquirypage">お問い合わせ&emsp;&#x3E;</router-link>
    <hr />
  </div>
</template>

<script>
export default {
  name: 'app',
  methods: {
    closeNav() {
      document.getElementById('mySidepanel').style.width = '0'
    },
    openNav() {
      document.getElementById('mySidepanel').style.width = '100%'
    },
  },
}
</script>

<style lang="scss">
.header {
  padding-right: 100px;
  height: 60px;
  background-color: white;
}

.header_right {
  float: right;
  padding-top: 20px;
}

.dropdown {
  float: left;
  color: black;
  margin-left: 10px;
}

.dropdown button {
  padding: 0 10px;
  margin: 0 15px 15px 15px;
  outline: none;
  border: none;
  background-color: inherit;
  border-bottom: 2px solid white;
}
.logo {
  float: left;
  width: 150px;
  padding: 10px;
}
.dropdown button:hover {
  border-color: peru;
  opacity: 0.5;
}

.dropdown_link {
  display: none;
  font-size: 14px;
  padding: 25px;
  padding-top: 15px;
  position: absolute;
  background-color: #f9f9f9;
  box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
  z-index: 1;
}

.dropdown:hover .dropdown_link {
  display: block;
}

.header_link {
  float: none;
  padding: 5px;
  text-decoration: none;
  display: block;
  text-align: center;
}

.header_right_sp {
  display: none;
}

.sidepanel {
  width: 0;
  position: fixed;
  z-index: 1;
  height: 100%;
  top: 0;
  overflow-x: hidden;
  background-color: white;
  font-weight: bold;
}

.sidepanel .slidetoogle {
  padding: 20px 40px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
}

#closebtn {
  position: absolute;
  border: none;
  background-color: inherit;
  color: #818181;
  top: 5px;
  right: 25px;
  font-size: 25px;
}

#logo_toogle {
  padding: 8px;
  width: 100px;
  margin-bottom: 100px;
}

.separate {
  font-size: 20px;
  font-weight: bold;
}

@media screen and (max-width: 796px) {
  .header {
    height: 40px;
    padding-right: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    width: 100%;
  }

  .header_right {
    padding: 0 20px;
  }
  .header_right_sp {
    cursor: pointer;
    display: block;
    font-size: 25px;
    width: 40px;
    border: none;
    background-color: inherit;
  }

  .dropdown {
    padding-top: 0;
    display: none;
  }

  .logo {
    width: 100px;
    padding: 5px;
  }
}
</style>
