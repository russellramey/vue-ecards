<template lang="pug">
#modal-nav
    button.button.button-secondary.off-lt(@click.prevent="goToStep('prev')" v-if="this.data.current_step.id >= 1") Back
    button.button.off-rt(@click.prevent="goToStep('next')" v-if="this.data.current_step.id < 2") Next
    button.button.off-rt(@click.prevent="goToStep('next')" v-else v-bind:class="{disabled: this.data.steps[3].status.disabled}") Done &amp; Review
</template>

<script>
// Export Component
export default {
  name: 'modal-nav',
  // Parent data
  props: {
      data: {
          type: Object
      }
  },
  // Component Functions
  methods: {
      goToStep(direction) {
        // Get current step
        var current = this.data.current_step.id
        // Check direction
        if (direction != 'next'){
            // change global step
            this.data.current_step = this.data.steps[current - 1]
        } else {
            // change global step
            this.data.current_step = this.data.steps[current + 1]
        }
    },
  }
}
</script>

<style lang="sass">
#modal-nav
    position: absolute
    bottom: 0
    left: 0
    right: 0
    padding: 15px 25px 30px 25px
    background: #eee
    border-top: 1px solid #e4e4e4
    opacity: 1
    z-index: 2
    margin-bottom: 0 !important
</style>
