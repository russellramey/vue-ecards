<template lang="pug">
#nav.ecard-nav
    li(v-for="item in navItems" v-bind:key="item.status.step")
        a.nav-link(@click.prevent="navigationController(item)" v-bind:id="item.slug + '-link'" v-bind:class="{active: item.status.active, completed: item.status.complete, disabled: item.status.disabled }" v-bind:href="'#' + item.slug" v-bind:data-qt="item.meta.desc")
            i(v-bind:class="'fa ' + item.meta.icon")
            span {{item.meta.name}}
            i(class="fa fa-check off-rt" v-if="item.status.complete")

    a#action-new(href="#new" onclick="location.reload();") Reset
</template>


<script>
// Imports
import dataStore from '../../stores/dataStore.js'
import mixins from '../../mixins/global.js'

// Export Component
export default {
  name: 'main-nav',
  // Component Data
  data() {
      return {
          // App data
          dataStore: dataStore,
          // Nav items,
          navItems: [
              {
                  id: 0,
                  slug: 'design',
                  meta: {
                      name: 'Design',
                      icon: 'fa-image',
                      desc: 'Choose a design',
                  },
                  status: {
                      disabled: false,
                      complete: false,
                      active: false,
                  }
              },
              {
                  id: 1,
                  slug: 'color',
                  meta: {
                      name: 'Accent Color',
                      icon: 'fa-palette',
                      desc: 'Choose a color',
                  },
                  status: {
                      disabled: false,
                      complete: false,
                      active: false,
                  }
              },
              {
                  id: 2,
                  slug: 'message',
                  meta: {
                      name: 'Message',
                      icon: 'fa-comment',
                      desc: 'Write your message',
                  },
                  status: {
                      disabled: false,
                      complete: false,
                      active: false,
                  }
              },
              {
                  id: 3,
                  slug: 'review',
                  meta: {
                      name: 'Review',
                      icon: 'fa-check-circle',
                      desc: 'Review your eCard',
                  },
                  status: {
                      disabled: true,
                      complete: false,
                      active: false,
                  }
              },
          ]
      }
  },
  // Component Functions/Methods
  methods: {
    // Navigation Controller
    navigationController(item) {
      // Reset all navItems state
      for(var i in this.navItems){
          this.navItems[i].status.active = false
      }

      // Check if item is disabled
      if (!item.status.disabled){
          // Set local state to active
          item.status.active = !item.status.active

          // Emit changed data back to parent
          this.$emit('current-step', item)

          // Activate Modal
          this.modalController()
      } else {

          // Hide modal if item is disabled
          dataStore.modal.active = false
      }

    },
    // Modal controller
    modalController() {
        // Reset modal
        dataStore.modal.active = false
        // Set timeout for activation
        setTimeout(function(){
            // Set modal.active to true
            dataStore.modal.active = true
        }, 150);
    }
  },
  // Computed values
  computed: {
    // Return current step
    current_step() {
      return dataStore.ecard.current_step
    },
    // Retun Steps data
    current_step_status() {
        if (dataStore.ecard.current_step){
            return dataStore.ecard.current_step.status.complete
        } else {
            return null
        }
    }
  },
  // Watch for changes
  watch: {
    // whenever Current_Step oj changes
    current_step() {
        // Go to navItem
        this.navigationController(dataStore.ecard.current_step)
    },
    // whenver Steps obj changes
    current_step_status() {
        // Check master validation
        mixins.methods.validationController(dataStore)
    }
  },
  // Component is Mounted
  mounted() {
      // Send all Steps back to parent
      this.$emit('steps', this.navItems)
  },
}
</script>


<style lang="sass">
#nav
    list-style: none
    margin: 0
    margin-bottom: 30px
    position: relative
    z-index: 1

    // Navigation / Step Links
    .nav-link
        display: block
        color: #555
        border-top: 1px solid #e4e4e4
        padding: 20px
        border-bottom: 1px solid #e4e4e4
        margin-top: -1px
        position: relative

        &:hover,
        &.active
            background: #eee
            color: #333
            border-right: none

        &.active
            border-left: 4px solid #e50000

        // Disabled Step
        &.disabled
            pointer-events: none
            color: #ccc

            &:before
                display: none !important

        // Completed Step
        &.completed
            color: #31b98e
            border-left-color: #31b98e

            &:before
                color: #31b98e


        // Icons
        .fa
            margin-right: 10px
            position: relative
            top: 2px

            &:before
                font-size: 21px


    // Start over button
    #action-new
        display: inline-block
        margin: 20px 0
        padding: 0 20px
</style>
