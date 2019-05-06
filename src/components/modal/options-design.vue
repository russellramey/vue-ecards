<template lang="pug">
ul#modal-design.modal-options(v-bind:class="{active: active}")
    li
        p.edl-select
            select#cateogry(v-model="currentCategory")
                option(disabled selected value="null") Filter designs by...
                option(value="all") SHOW ALL
                option(v-for="(category, index) in designOptionCategories" v-bind:value="category.toLowerCase()") {{ category }}

    li(v-for="(option, index) in options" v-bind:key="index" v-if="option.category.toLowerCase() === currentCategory || currentCategory === null || currentCategory === 'all'")
        a.option.option-design(@click="currentSelection(index)" v-bind:class="{active: option.active}")
            label.input-radio(:for="option.image")
                input(v-model="data.options.ecard_design.image" v-bind:id="option.image" v-bind:value="option.image" type="radio" name="data-design")
            img(v-bind:src="'https://assets.sabre.com/images/ecards/' + option.image" width="auto" height="auto")
            img(src="images/text_placeholder.jpg" width="auto" height="auto")
</template>


<script>
// Imports
import dataOptions from '../../stores/dataOptions.js'

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
          options: dataOptions.designs,
          // Available Design Categories
          categoryOptions: null,
          // Current Design Category
          currentCategory: null,
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
          this.data.options.ecard_design = this.options[index]

          // Validate Step
          this.validateStep()
      },
      // Validate user action in Nav
      validateStep() {
          this.data.current_step.status.complete = true
      }
  },
  // Component computed data
  computed: {
      // Create Category Filter Options
      designOptionCategories: function() {
          // Empty category array
          let categories = []

          // For each option in available options
          for (var option in this.options) {

              // Save category as var, and make it all uppercase
              let category = this.options[option].category.toUpperCase()

              // If current category is not in the Category array, add it
              if (!categories.includes(category)){
                  categories.push(category)
              }

          }

          // Return data
          return categories.sort()
      }
  },
  // Component Mounted
  mounted() {
      var comp = this

      // Set timeout for activation
      setTimeout(function(){
          // Set modal.active to true
          comp.active = true
      }, 300)

  }
}
</script>


<style lang="sass">
#modal-design
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
            color: white !important;
            border-color: #3399cc
            opacity: 1 !important
            z-index: 1

        &.active
            border-color: #31b98e


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
