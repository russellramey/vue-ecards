<template lang="pug">
#preview.ecard-preview(v-bind:style="'background:' + dataStore.ecard.options.ecard_color[0]")
    span#view-preview(@click.prevent="goToStep(1)")
    eCard(v-bind:data="dataStore")
</template>

<script>
// Imports
import dataStore from '../stores/dataStore.js'
import eCard from './preview/preview-ecard.vue'

// Export Component
export default {
  name: 'preview',
  // Child components
  components: {
      eCard
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

    #view-preview
        position: absolute
        top: 0
        left: 0
        width: 100%
        height: 100%
        cursor: pointer

</style>
