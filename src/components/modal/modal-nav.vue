<template lang="pug">
#modal-nav
    button.button.button-secondary.off-lt(@click.prevent="goToStep('prev')" v-if="this.data.current_step.id >= 1") Back
    button.button.off-rt(@click.prevent="goToStep('next')" v-if="this.data.current_step.id < 2") Next
    button.button.off-rt(@click.prevent="goToStep('next')" v-if="this.data.current_step.id === 2" v-bind:class="{disabled: this.data.steps[3].status.disabled}") Done &amp; Review
    button.button.off-rt(@click.prevent="ecardSubmitSend()" v-if="this.data.current_step.id === 3")
        span(v-if="loading") #[i.edl-icon.edl-icon--arrows-update] Sending...
        span(v-else) Submit &amp; Send
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
  // Component data
  data() {
      return {
          // Wating on server
          loading: false
      }
  },
  // Component Functions
  methods: {
      // Navigation for modal actions
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
    // eCard Submit Action
    ecardSubmitSend() {
        // Component
        let $this = this

        // Change server status
        this.loading = true

        // Get Axios plugin
        const axios = require('axios');

        // Make Axios(HTTP) request
        axios.post('http://ecards:8888/inc/submit.php', JSON.stringify(this.data.options))
          .then(function (response) {

            // If response is an 'error'
            if (response.data.indexOf('error') > -1){
                // Change server status, back to false
                $this.loading = false
                alert('Whoops! Looks like there was an error. Please make sure all input fields are filled out width a valid format and try again.\n\n'
                        + '\t• Check that you have selected a card design.\n'
                        + '\t• check that you have selected a card accent color\n'
                        + '\t• Check all input fields in the "Message" tab have been completed.\n'
                        + "\t• Make sure all email addresses are in a valid email format."
                )
            } else {

                // Debug
                alert('Success, send data to backend')

                // Set form to complete
                $this.data.status.complete = true
                // Save response to data
                $this.data.status.recipients = response.data
            }



            // Scroll to top
            //window.scrollTo(0, 0);
          })
          .catch(function (error) {
            alert(error)
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

    button.disabled
        border: 1px solid #ccc
        border-bottom: 3px solid #ccc
</style>
