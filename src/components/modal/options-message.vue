<template lang="pug">
ul#modal-message.modal-options(v-bind:class="{active: active}")
    li.row
        .col-sm-6
            label(for="ecard_from_name") Your Name #[span *]
            input(v-model="data.options.ecard_message.from[0].name" type="text" name="ecard_from_name" id="ecard_from_name" @keyup="validateStep()")

        .col-sm-6
            label(for="ecard_from_email") Your Email #[span *]
            input(v-model="data.options.ecard_message.from[0].email" type="email" name="ecard_from_email" id="ecard_from_email" @keyup="validateStep()")

    li.row
        .col-sm-12
            label(for="ecard_greeting") Greeting #[span *]
            input(v-model="data.options.ecard_message.greeting" type="text" name="ecard_greeting" id="ecard_greeting" @keyup="validateStep()")

    li.row
        .col-sm-12
            label(for="ecard_message") Your Message #[span *]
            character-count(@charCountValid="characterCount" v-bind:data="data")
            textarea(v-model="data.options.ecard_message.comments" type="text" name="ecard_message" id="ecard_message" @keyup="validateStep()")

    li.row
        .col-sm-12
            h4 Recipients
            p.notice Each recipient added below will receive a personalized version of the eCard shown in the preview. You can upload multiple recipients at once using the "Import CSV" button below. Make sure to verify that all email addresses are spelled correctly.
            a.clear-recipients(@click="clearAllRecipients" href="#clear" data-qt="Clear all recipients") Clear all
            ul#recipients
                Recipients(v-for="(user, index) in data.options.ecard_message.to" v-bind:key="index" v-bind:data="data" v-bind:index="index")
</template>


<script>
// Imports
import Recipients from '../partials/message-recipients.vue'
import CharacterCount from '../partials/message-charactercount.vue'

// Export Component
export default {
  name: 'message',
  // Child components
  components: {
      Recipients,
      CharacterCount
  },
  // Component properties
  props: {
      // Data from parent/App
      data: {
          type: Object
      }
  },
  // Component data
  data() {
      return {
          // Is active
          active: false,
          // Character Limit Error
          charCountError: false
      }
  },
  // Component functions
  methods: {
      // Validate user action in Nav
      validateStep(){
          // Get message object
          var ecard_message = this.data.options.ecard_message
          // Valid true by defualt
          var valid = true;

          // Loop thru all values
          for (var value in ecard_message){

              // If value is array
              if (typeof ecard_message[value] != 'string' && ecard_message[value] != null){

                  // For each item in array
                  for (var item in ecard_message[value]){

                      // Loop thru each value of each item in array
                      for (var v in ecard_message[value][item]){

                          // If value is null or blank
                          if (ecard_message[value][item][v] === null || ecard_message[value][item][v] === ''){

                              // Reject validation
                              valid = false
                          }
                      }
                  }

              }
              // Else if value is string
              else {

                  // If value is null or blank
                  if (ecard_message[value] === null || ecard_message[value] === ''){

                      // Reject validation
                      valid = false
                  }

              }
          }

          // Check validation, set step validation accordingly
          // Check character count validation
          if (valid && !this.charCountError){
              this.data.current_step.status.complete = true
          } else {
              this.data.current_step.status.complete = false
          }
      },
      // Monitor character count/limit
      characterCount(status) {
          this.charCountError = status
      },
      // Clear recipient list
      clearAllRecipients() {
          // Create a blank/default recipient
          let defaultRecipient = {
              name: null,
              email: null
          }

          // If current recipeint list is larger than 1
          if (this.data.options.ecard_message.to.length > 1){
              // Confirm user actions
              if (confirm("You are about to remove all current Recipients from the recipient list, this action can not be undone.")){
                  // Empty current Recipients array
                  this.data.options.ecard_message.to = []
                  // Reset Recipeint data to defaultRecipient
                  this.data.options.ecard_message.to.push(defaultRecipient)
              }
          }

      }
  },
  // Component Mounted
  mounted() {
      var comp = this

      // Set timeout for activation
      setTimeout(function(){
          // Set modal.active to true
          comp.active = true
      }, 300);
  }
}
</script>


<style lang="sass">
#modal-message
    list-style: none
    margin: 0

    ul
        list-style: none
        margin: 0

    span
        color: #e50000

        &.qt-tooltip
            color: #ffffff

        &.char-limit
            float: right
            color: #999 !important
            font-size: 13px

    textarea
        line-height: 1.4em
        min-height: 200px

    .notice
        font-size: .85rem
        color: #999
        font-style: italic
        line-height: 1.2em

    .clear-recipients
        position: absolute
        top: 3px
        right: 20px
        text-transform: uppercase
        font-size: 12px
        color: #ac0000

        span
            color: #fff
            text-transform: none
</style>
