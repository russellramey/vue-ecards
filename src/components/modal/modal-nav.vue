<template lang="pug">
#modal-nav
    button.button.button-secondary.off-lt(@click.prevent="goToStep('prev')" v-if="this.data.current_step.id >= 1") Back
    button.button.off-rt(@click.prevent="goToStep('next')" v-if="this.data.current_step.id < 2") Next
    button.button.off-rt(@click.prevent="goToStep('next')" v-if="this.data.current_step.id === 2" v-bind:class="{disabled: this.data.steps[3].status.disabled}") Done &amp; Review
    button.button.off-rt(@click.prevent="ecardSubmitSend()" v-if="this.data.current_step.id === 3") Submit &amp; Send
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
    ecardSubmitSend() {
        // Get Axios plugin
        const axios = require('axios');
        // Make Axios(HTTP) request
        axios.post('./inc/submit.php', JSON.stringify(this.data.options))
          .then(function (response) {

            console.log(response.data)
            //alert('Submit to blah and show blah and etc.')

            // Set form to complete
            //$this.data.complete = true

            // Route to View to see results
            //$this.$router.push({ name: 'View', params: {uid: $this.data.values.uid, formData: $this.data, formSubmit: $this.data.complete }})

            // Scroll to top
            //window.scrollTo(0, 0);
          })
          .catch(function (error) {
            console.log(error);
          });
    }
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
