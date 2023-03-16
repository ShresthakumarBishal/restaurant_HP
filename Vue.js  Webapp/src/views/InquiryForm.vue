<template>
  <div class="inquiry-details">
    <div class="contact">
      <iframe
        class="inquiry_form"
        src="https://docs.google.com/forms/d/e/1FAIpQLSe_XEDJPUKSSAOtfQyCiD1k_tdvzQ-kgG-xYkbWdq7cUaZsrQ/viewform?embedded=true"
      >
        読み込んでいます…
      </iframe>
    </div>
  </div>
</template>

<script>
export default {
  name: 'InquiryComponent',
  data() {
    return {
      show: false,
    }
  },
  props: {
    getvalue: Function,
  },
  mounted() {
    this.getvalue(this.show)
  },
}
</script>

<style lang="scss">
$primary_color: #e6e6e6;
$secondary_color: #fafafa;
$third_color: white;

.inquiry-details {
  background-color: $primary_color;
  padding-top: 80px;
}

.contact {
  width: 60%;
  height: fit-content;
  margin: auto;
  padding: 30px 20px;
  background-color: $secondary_color;
}

.inquiry_form {
  width: 100%;
  height: 915px;
  border-style: none;
  overflow: hidden;
}

/* For SP screen*/
@media screen and (max-width: 796px) {
  .contact {
    width: 100%;
    padding: 30px 10px;
    background-color: $third_color;
  }

  .inquiry-details {
    padding-top: 0;
    background-color: $third_color;
  }

  .inquiry_form {
    height: 1250px;
  }
}
</style>
