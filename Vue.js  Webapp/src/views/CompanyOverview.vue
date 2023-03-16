<template>
  <div class="company_overview">
    <h1 class="company_about">企業概要</h1>
    <table>
      <tr>
        <td>会社名</td>
        <td>株式会社ABC</td>
      </tr>
      <tr>
        <td>住所</td>
        <td>神奈川県平塚市</td>
      </tr>
      <tr>
        <td>代表</td>
        <td>ビサルクマル</td>
      </tr>
      <tr>
        <td>資本金</td>
        <td>00000</td>
      </tr>
      <tr>
        <td>設立</td>
        <td>2020</td>
      </tr>
      <tr>
        <td>電話番号</td>
        <td>0000000000</td>
      </tr>
    </table>
    <div class="map">
      <h2>アクセス</h2>
      <div id="map_tokyo">
        <h3 class="place_name">東京</h3>
        <div class="map_url">
          <iframe
            class="map_iframe"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d52062.543336073264!2d139.30704215!3d35.35790565!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6019ab8b9d70d3fd%3A0x26b8b2e214f3e956!2sHiratsuka%2C%20Kanagawa!5e0!3m2!1sen!2sjp!4v1672230712476!5m2!1sen!2sjp"
            scrolling="no"
          />
          <address>〒000-0000 神奈川県平塚市</address>
        </div>
      </div>
      <div id="map_oosaka">
        <h3 class="place_name">大阪</h3>
        <div class="map_url">
          <iframe
            class="map_iframe"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d52062.543336073264!2d139.30704215!3d35.35790565!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6019ab8b9d70d3fd%3A0x26b8b2e214f3e956!2sHiratsuka%2C%20Kanagawa!5e0!3m2!1sen!2sjp!4v1672230712476!5m2!1sen!2sjp"
            scrolling="no"
          />
          <address>〒000-0000 神奈川県平塚市</address>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'OverviewComponent',
  props: {
    getvalue: Function,
  },
  mounted() {
    this.getvalue(true)
  },
}
</script>

<style lang="scss">
$primary-color: #fd9603;

*,
*::after,
*::before {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

.company_overview {
  padding-bottom: 100px;
}

.company_about {
  text-align: center;
  margin: 180px 0 120px 0;
}

.place_name::before {
  content: '\A';
  width: 10px;
  height: 10px;
  border-radius: 50%;
  margin-right: 0.5em;
  background: $primary-color;
  display: inline-block;
}

.place_name {
  padding: 25px 0;
}

table {
  margin: 0 auto;
  text-align: left;
}

table td {
  padding: 40px;
  font-size: 20px;
}

.map {
  margin-top: 100px;
  text-align: center;
  width: 80%;
  margin-left: auto;
  margin-right: auto;
}

.map_url {
  display: flex;
  flex-direction: column;
}

.map_iframe {
  width: 100%;
  height: 600px;
}
address {
  flex: 100%;
  padding: 20px 0;
}

/* For SP screen*/
@media screen and (max-width: 796px) {
  .company_about {
    margin: 120px 0 80px 0;
  }

  table td {
    padding: 10px;
  }
  .map {
    width: 100%;
  }
  .map_iframe {
    height: 250px;
    order: 2;
    margin-bottom: 10px;
  }
  address {
    order: 1;
    padding: 0 0 20px 0;
  }

  .company_overview {
    padding-bottom: 60px;
  }
}
</style>
