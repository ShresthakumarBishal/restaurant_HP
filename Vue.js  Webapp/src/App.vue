<template>
  <HeaderComponent />
  <router-view :getvalue="getdata" />
  <FooterComponent :msg="show" />
</template>

<script>
import HeaderComponent from './components/HeaderComponent.vue'
import FooterComponent from './components/FooterComponent.vue'

export default {
  data() {
    return {
      show: true,
    }
  },
  components: {
    HeaderComponent,
    FooterComponent,
  },
  //sending function to get data from child components
  methods: {
    getdata(value) {
      this.show = value
    },
  },
}
</script>
