<template lang="pug">
ul#modal-color
    li(v-for="(option, index) in options" v-bind:key="index")
        a.option.option-color
            label.input-radio(:for="option.name")
                input.data-input(v-model="data.options.ecard_color" v-bind:id="option.name" v-bind:value="[option.color, option.shadow]" type="radio" name="data-color")
                span.color-palette-block(:id="'color-' + option.name") {{option.name}}
</template>

<script>
// Export Component
export default {
  name: 'color-options',
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
              { color: '#e50000', shadow: '#ac0000', name: 'red', active: true },
          ]
      }
  },
  // Component Mounted
  mounted() {
  }
}
</script>

<style lang="sass">
#modal-color

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
            color: white !important
            border-color: #3399cc
            opacity: 1 !important
            z-index: 1

        &.active
            border-color: #31b98e

</style>
