<template>
    <div id="modal-nav">
        <button @click.prevent="goToStep('prev')" v-if="this.data.current_step.id >= 1" type="button" class="button button-secondary off-lt">Back</button>
        <button @click.prevent="goToStep('next')" type="button" class="button off-rt">Next</button>
    </div>
</template>

<script>
// Export Component
export default {
  name: 'modal-nav',
  // Component Properties
  props: {
    // Data from parent/App
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

<style lang="scss">
#modal-nav{
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 15px 25px 30px 25px;
    background: #eee;
    border-top: 1px solid #e4e4e4;
    opacity: 1;
    z-index: 2;
    margin-bottom: 0 !important;
}
</style>
