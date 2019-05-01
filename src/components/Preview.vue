<template lang="pug">
#preview.ecard-preview
    #view-preview(v-if="!dataStore.ecard.status.complete")
        span(@click.prevent="goToStep(1)" v-bind:style="'background:' + dataStore.ecard.options.ecard_color.background")
        eCard(v-bind:data="dataStore")

    #view-confirm(v-else)
        eCard-results(v-bind:data="dataStore")
</template>

<script>
// Imports
import dataStore from '../stores/dataStore.js'
import eCard from './preview/preview-ecard.vue'
import eCardResults from './preview/preview-results.vue'

// Export Component
export default {
  name: 'preview',
  // Child components
  components: {
      eCard,
      eCardResults
  },
  // Component data
  data(){
      return{
          // App data
          dataStore: dataStore
      }
  },
  // Component functions
  methods: {
      // Navigate to nav Step action
      goToStep(index) {
        // change global step
        dataStore.ecard.current_step = dataStore.ecard.steps[index]
      },
  }
}
</script>

<style scoped lang="sass">
#preview
    position: fixed
    top: 0
    right: 0
    height: 100%
    left: 300px
    background: #ccc
    padding: 30px

    #view-preview
        position: absolute
        top: 0
        left: 0
        width: 100%
        height: 100%
        cursor: pointer
        display: -webkit-box
        display: -ms-flexbox
        display: flex
        -webkit-box-orient: vertical
        -webkit-box-direction: normal
        -ms-flex-direction: column
        flex-direction: column
        -webkit-box-pack: center
        -ms-flex-pack: center
        justify-content: center

        span
            display: block
            position: absolute
            top: 0
            left: 0
            width: 100%
            height: 100%

</style>
