<template lang="pug">
#sidebar.ecard-settings
    #intro
        img(src="https://assets.sabre.com/common/edl/img/sabre-logo-slab.svg" width="auto" height="auto")
        h6 Create and send eCards
        p Choose a card design, select an accent color and write your message. You’ll have a chance to review the eCard before sending.

    main-nav(v-if="!dataStore.ecard.status.complete" @steps="getAllSteps" @current-step="getCurrentStep")
    button#action-new(v-else onclick="location.reload();" href="#new") Create another eCard
</template>


<script>
// Imports
import dataStore from '../stores/dataStore.js'
import MainNav from './sidebar/sidebar-nav.vue'

// Export Component
export default {
  name: 'sidebar',
  // Child components
  components: {
      MainNav
  },
  // Component data
  data(){
      return {
          dataStore: dataStore
      }
  },
  // Component Functions
  methods: {
    getAllSteps (steps) {
        dataStore.ecard.steps = steps
    },
    getCurrentStep(step){
        dataStore.ecard.current_step = step
    }
  }
}
</script>


<style scoped lang="sass">
#sidebar
    width: 300px
    height: 100%
    float: left
    background: #fff
    position: fixed
    left: 0
    top: 0
    bottom: 0
    z-index: 2

    // Intro paragraph
    #intro
        padding: 20px
        font-size: 14px

        img
            max-width: 160px
            margin-left: -20px
            margin-top: -20px
            margin-bottom: 20px


    // New ecard
    #action-new
        margin: 0 auto
        display: block
</style>
