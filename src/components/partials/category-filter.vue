<template lang="pug">
p.custom-select
    select#cateogry(v-model="currentCategory" @change="selectCategoryFilter")
        option(disabled selected value="null") Filter designs by...
        option(value="all") SHOW ALL
        option(v-for="(category, index) in designOptionCategories" v-bind:value="category.toLowerCase()") {{ category }}
</template>


<script>
// Export Component
export default {
  name: 'category-filter',
  // Parent data
  props: {
      options: {
          type: Array
      }
  },
  // Component data
  data() {
      return{
          // Current Design Category
          currentCategory: null,
      }
  },
  // Component functions
  methods: {
      // Get current category
      selectCategoryFilter() {
          // Emit category data to parent
          this.$emit('current-category', this.currentCategory)
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
}
</script>


<style lang="sass">
// Select / Filter
.custom-select
    position: relative

    &:after
        content: '\0203A'
        display: block
        position: absolute
        top: 12px
        right: 15px
        transform: rotate(90deg)
        font-size: 28px
        line-height: 1
</style>
