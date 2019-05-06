<template lang="pug">
li.recipient-group
    .row.row-nm
        .col-sm-6
            label(for="ecard_to_name") Name #[span *]
            input(v-model="data.options.ecard_message.to[index].name" type="text" name="ecard_to_name[]" v-bind:id="'ecard_to_name-' + index" @keyup="this.$parent.validateStep")

        .col-sm-6
            label(for="ecard_to_email") Email #[span *]
            input(v-model="data.options.ecard_message.to[index].email" type="text" name="ecard_to_email[]" v-bind:id="'ecard_to_email-' + index" @keyup="this.$parent.validateStep")

    .recipient-action
        a.recipient-add(data-qt="Add another" @click="addRecipient(index)")
            i.fa.fa-plus
        a.recipient-remove(v-if="data.options.ecard_message.to.length > 1" data-qt="Remove" @click="deleteRecipient(index)")
            i.fa.fa-times
</template>


<script>
// Imports
import mixins from '../../mixins/global.js'

// Export Component
export default {
  name: 'recipient',
  // Component properties
  props: {
      // Data from parent/App
      data: {
          type: Object
      },
      index: Number
  },
  // Component functions
  methods: {
      // Add
      addRecipient(index){
          // Create new user/recipient group
          var recipient = {
              name: null, email: null
          }
          // Add new user to ecard obj
          this.data.options.ecard_message.to.splice(index + 1, 0, recipient)
      },
      // Remove
      deleteRecipient(index){
          // Add new user to ecard obj
          this.data.options.ecard_message.to.splice(index, 1)

          // Run validation, from parent
          this.$parent.validateStep()
      }
  },
  // On Component Mount
  mounted() {
      // Initialize tooltips
      mixins.methods.tooltip()

      // Run validation, from parent
      this.$parent.validateStep()
  }
}
</script>


<style lang="sass">
.recipient-group
    position: relative
    margin-bottom: 20px
    transition: all 150ms ease-in-out
    padding-right: 60px

    .recipient-action
        position: absolute
        right: -20px
        top: 50%
        width: 70px
        margin-top: -5px

        .recipient-add,
        .recipient-remove
            cursor: pointer
            display: inline-block
            border-radius: 50%
            width: 30px
            height: 30px
            background: #fff
            text-align: center
            padding: 3px
            color: #999
            float: left
            margin-right: 5px

            &:hover
                color: #ffffff
                background: #31B98E

            .fa
                position: relative
                top: 1px

        .recipient-remove
            background: transparent
            visibility: hidden

            &:hover
                color: #ffffff
                background: #ac0000

        // Recipient-action Hover
        &:hover

            .recipient-remove
                visibility: visible
</style>
