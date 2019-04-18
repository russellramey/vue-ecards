<template lang="pug">
ul#modal-design
    li(v-for="(option, index) in options" v-bind:key="index")
        a.option.option-design
            label.input-radio(:for="option.image")
                input(v-model="data.options.ecard_design" v-bind:id="option.image" v-bind:value="option.image" type="radio" name="data-design")
                img(v-bind:src="'https://assets.sabre.com/images/ecards/' + option.image" width="auto" height="auto")
                img(src="images/graphic_text_placeholder.png" width="auto" height="auto")
</template>

<script>
// Export Component
export default {
  name: 'design',
  // Component properties
  props: {
      // Data from parent/App
      data: {
          type: Object
      }
  },
  // Component Data
  data() {
      return {
          // Available Design Options
          options: [
              { category: 'chinese new year', image: 'CNY2019-BANNER-1.jpg', active: false },
              { category: 'chinese new year', image: 'CNY2019-BANNER-2.jpg', active: false },
              { category: 'chinese new year', image: 'CNY2019-BANNER-3.jpg', active: false }
          ]
      }
  },
  // Component Mounted
  mounted() {
  }
}
</script>

<style lang="sass">
#modal-design

    // Options
    .option
        margin-bottom: 30px
        border: 8px solid #fff
        -webkit-transition: 150ms all ease-in-out
        -o-transition: 150ms all ease-in-out
        transition: 150ms all ease-in-out
        cursor: pointer
        position: relative
        display: block

        a
            display: block

        &:hover,
        &.active
            -webkit-transform: scale(1.05)
            -ms-transform: scale(1.05)
            transform: scale(1.05)
            -webkit-box-shadow: 2px 2px 11px 1px rgba(0,0,0,.125)
            box-shadow: 2px 2px 11px 1px rgba(0,0,0,.125)
            color: white !important;
            border-color: #3399cc
            opacity: 1 !important
            z-index: 1

        &.active
            border-color: #31b98e

</style>
