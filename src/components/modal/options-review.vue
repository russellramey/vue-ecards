<template lang="pug">
ul#modal-review.modal-options(v-bind:class="{active: active}")
    li.ecard-part.ecard-design
        span.label Design &amp; Color
        span.data(v-bind:style="'border: 12px solid ' + data.options.ecard_color.background")
            img(v-if="data.options.ecard_design.image" v-bind:src="'images/' + data.options.ecard_design.image" width="auto" height="auto")
            img(src="images/text_placeholder.jpg" width="auto" height="auto")

    li.ecard-part.ecard-message
        table
            tr
                td
                    span.label Your name
                    span.data {{ data.options.ecard_message.from[0].name }}
                td
                    span.label Your email
                    span.data {{ data.options.ecard_message.from[0].email }}

            tr
                td(colspan="2")
                    span.label Your Greeting
                    span.data {{ data.options.ecard_message.greeting }}

            tr
                td(colspan="2")
                    span.label Your Message
                    span.data {{ data.options.ecard_message.comments }}

    li.ecard-part.ecard-recipients
        span.label Recipients
        span.notice Each recipient listed below will receive a personalized version of the ecard with their name and your message shown in the preview. Make sure to verify that all email addresses are spelled correctly.
        br
        table
            tr
                td
                    span.label Name
                td
                    span.label Email

            tr(v-for="(recipient, index) in data.options.ecard_message.to")
                td
                    span.data {{recipient.name}}
                td
                    span.data {{recipient.email}}
</template>


<script>
// Export Component
export default {
  name: 'review',
  // Component properties
  props: {
      // Data from parent/App
      data: {
          type: Object
      }
  },
  // Component Data
  data() {
      return {
          // Is active
          active: false
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
#modal-review
    list-style: none
    margin: 0

    li
        opacity: 1 !important
        margin-bottom: 30px

    span
        display: block

        &.label
            font-weight: bold
            text-transform: uppercase
            font-size: 0.9rem

    // Table
    table
        width: 100%
        margin: 0
        padding: 0
        margin: 0 -6px

        td
            width: 50%
            padding: 6px

    // Recipient list
    .ecard-recipients
        .notice
            font-size: .85rem
            color: #999
            font-style: italic
            line-height: 1.2em

        table
            tr
                &:nth-child(odd)
                    background: #e4e4e4
                &:first-child
                    background: none
</style>
