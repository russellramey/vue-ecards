<template lang="pug">
span#char-limit(v-bind:class="{error: this.charCountError}") #[b.char-count {{charCount}}] characters remaining
</template>


<script>
// Export Component
export default {
  name: 'character-count',
  // Parent data
  props: {
      // Data from parent/App
      data: {
          type: Object
      }
  },
  // Component data
  data() {
      return{
          // Character limit
          charCount: 500,
          // Character Limit Error
          charCountError: false
      }
  },
  // Component functions
  methods: {
      // Monitor character limit
      characterLimit() {
          // If message/comments value exists
          if (this.data.options.ecard_message.comments){

              // Calulate the current length of the message
              this.charCount = 500 - this.data.options.ecard_message.comments.length

              // If Character Count is less than 0
              if (this.charCount < 0) {
                  this.charCountError = true
              } else {
                  this.charCountError = false
              }

              // Send character count info back to parent (options-message)
              this.$emit('charCountValid', this.charCountError)

          }

      }
  },
  computed: {
      // Get curren message value, if exists
      messageLength(){
          if (this.data.options.ecard_message.comments){
              return this.data.options.ecard_message.comments
          } else {
              return null
          }
      }
  },
  // Watch for changes
  watch: {
    // whenever Message/Comments value changes
    messageLength() {
        // Check character count
        this.characterLimit()
    }
  },
  // On component mount
  mounted() {
      // Check character count
      this.characterLimit()
  }
}
</script>


<style lang="sass">
#char-limit
    float: right
    color: #999 !important
    font-size: 13px

    &.error
        color: #e50000 !important
</style>
