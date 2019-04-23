<template lang="pug">
ul#modal-color.modal-options(v-bind:class="{active: active}")
    li(v-for="(option, index) in options" v-bind:key="index")
        a.option.option-color(@click="currentSelection(index)" v-bind:class="{active: option.active}")
            label.input-radio(:for="option.name")
                input.data-input(v-model="data.options.ecard_color.background" v-bind:id="option.name" v-bind:value="option.background" type="radio" name="data-color")
            span.color-palette-block(:id="'color-' + option.name" v-bind:style="'background:' + option.background") {{option.name}}
                span(v-bind:style="'background:' + option.shadow")
</template>


<script>
// Imports
import dataOptions from '../../stores/dataOptions.js'

// Export Component
export default {
  name: 'color',
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
          // Available Color Options
          options: dataOptions.colors,
          // Is active
          active: false
      }
  },
  // Component functions
  methods: {
      // Get current selection, assign to App Data
      currentSelection(index) {
          // Reset options state
          for (var option of this.options){
              option.active = false
          }

          // Reassign new selection
          this.options[index].active = true
          this.data.options.ecard_color = this.options[index]

          // Validate Step
          this.validateStep()
      },
      // Validate user action in Nav
      validateStep() {
          this.data.current_step.status.complete = true
      }
  },
  // Component Mounted
  mounted() {
      var comp = this

      // Set timeout for activation
      setTimeout(function(){
          // Set modal.active to true
          comp.active = true
      }, 300);
  }
}
</script>


<style lang="sass">
#modal-color
    list-style: none
    margin: 0

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

        // Color block
        .color-palette-block
            padding: 25px
            width: 100%
            border-left: 45px solid
            color: transparent
            text-transform: uppercase
            display: block
            cursor: pointer

            span
                position: absolute
                left: 0
                top: 0
                width: 10%
                height: 100%

        // Input
        .input-radio
            position: absolute
            top: 0
            left: 0
            width: 100%
            height: 100%
            display: block
            cursor: pointer

            input[type="radio"]
                visibility: hidden
                display: none
</style>
