<template lang="pug">
#ecard-results
    .edl-message.edl-message--success
        i.edl-icon--check.edl-icon.edl-message--icon
        p #[b eCard sent successfully!] Your eCard has been sent to the recipients listed below.

    table#recipients
        tr
            td
                span.label Name
            td
                span.label Email

        tr(v-for="(recipient, index) in this.data.ecard.status.recipients")
            td
                span.data {{recipient.name}}
            td
                span.data {{recipient.email}}
</template>


<script>
// Export Component
export default {
  name: 'results',
  // Parent data
  props: {
      data:{
          type: Object
      }
  }
}
</script>


<style lang="sass">
#ecard-results
    max-width: 768px
    margin: 30px auto

    // Table
    table
        width: 100%
        margin: 0
        padding: 0
        margin: 0
        background: #fff
        border: 1px solid #ccc
        border-radius: 5px

        tr
            &:nth-child(odd)
                background: #e4e4e4
            &:first-child
                background: none

            td
                width: 50%
                padding: 6px

                .label
                    font-weight: bold
                    text-transform: uppercase
</style>
