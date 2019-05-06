<template lang="pug">
#modal(v-if="dataStore.ecard.current_step != null" v-bind:class="{active: dataStore.modal.active}")
    #modal-meta
        a.modal-close(@click.prevent="closeModal" href="#preview")
            i.fa.fa-times
        h4 {{dataStore.ecard.current_step.meta.desc}}

    #modal-content
        design-options(:data="dataStore.ecard" v-if="dataStore.ecard.current_step.slug === 'design'")
        color-options(:data="dataStore.ecard" v-if="dataStore.ecard.current_step.slug === 'color'")
        message-options(:data="dataStore.ecard" v-if="dataStore.ecard.current_step.slug === 'message'")
        review-options(:data="dataStore.ecard" v-if="dataStore.ecard.current_step.slug === 'review'")

    modal-nav(:data="dataStore.ecard")
</template>

<script>
// Imports
import dataStore from '../stores/dataStore.js'
import ModalNav from './modal/modal-nav.vue'
import DesignOptions from './modal/options-design.vue'
import ColorOptions from './modal/options-color.vue'
import MessageOptions from './modal/options-message.vue'
import ReviewOptions from './modal/options-review.vue'

// Export Component
export default {
  name: 'modal',
  // Child components
  components: {
      ModalNav,
      DesignOptions,
      ColorOptions,
      MessageOptions,
      ReviewOptions
  },
  // Component data
  data(){
      return{
          // App data
          dataStore: dataStore
      }
  },
  methods: {
      // Close modal action
      closeModal(){
          // Set modal state to false
          dataStore.modal.active = false
          // Set active nav to false
          dataStore.ecard.current_step.status.active = false
      }
  }
}
</script>

<style lang="sass">
#modal
    background: #eee
    position: fixed
    width: 30%
    min-width: 380px
    max-width: 500px
    left: -100%
    top: 0
    bottom: 0
    margin-left: 300px
    -webkit-transition: left 300ms ease-in-out
    -o-transition: left 300ms ease-in-out
    transition: left 300ms ease-in-out
    box-shadow: 0 0 15px rgba(0,0,0,.25)
    z-index: 1

    &.active
        left: 0

    // Meta
    #modal-meta
        padding: 40px 5%
        padding-bottom: 10px
        overflow: hidden

        .modal-close .fa:before
            font-size: 28px
            font-weight: lighter

        h4
            display: block
            margin: 0
            float: left

        a
            color: #999
            text-align: right
            float: right

        #modal-submit
            max-width: auto
            width: auto
            float: right
            margin-top: -5px

    // Content
    #modal-content
        padding: 40px 5%
        padding-top: 15px
        overflow-x: auto
        height: 100%

        // Options
        .modal-options
            opacity: 0
            -webkit-transition: opacity 150ms ease-in-out
            transition: opacity 150ms ease-in-out
            margin-bottom: 200px

            &.active
                opacity: 1

            li
                transition: all 150ms ease-in-out

            &:hover

                li
                    opacity: .75

                    &:hover
                        opacity: 1
</style>
