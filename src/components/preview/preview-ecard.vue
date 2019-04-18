<template lang="pug">
#ecard.preview.preview-data(v-bind:style="'border-color:' + data.ecard.options.ecard_color[1]")
    .ecard-graphic(data-qt="Edit design")
        a(@click.prevent="goToStep(0)" href="#design")
            img#ecard-image.preview-data(v-bind:src="'https://assets.sabre.com/images/ecards/' + data.ecard.options.ecard_design" width="auto" height="auto")
    .ecard-content
        h1.ecard-title(data-qt="Edit greeting")
            span(@click.prevent="goToStep(2)") {{ data.ecard.options.ecard_greeting }}
        p.ecard-name(data-qt="Edit name")
            span(@click.prevent="goToStep(2)") {{ data.ecard.options.ecard_to[0].name }}
        p.ecard-message(data-qt="Edit message")
            span(@click.prevent="goToStep(2)") {{ data.ecard.options.ecard_message }}
    .ecard-meta
        p.ecard-author
            span.label Sent by:
            span.author {{ data.ecard.options.ecard_from.name }}
            span.date Date here
        p.ecard-logo
            img(src="https://assets.sabre.com/common/edl/img/sabre-logo-red.svg" width="auto" height="auto")
</template>

<script>
// Export Component
export default {
  name: 'ecard',
  // Parent data
  props: {
      data:{
          type: Object
      }
  },
  // Component functions
  methods: {
      // Navigate to nav Step action
      goToStep(index) {
        // change global step
        this.data.ecard.current_step = this.data.ecard.steps[index]
      },
  }
}
</script>

<style lang="sass">
#ecard
    font-family: helvetica, arial, sans-serif
    width: 768px
    background: #fff
    margin: 0 auto
    border: 3px solid
    border-bottom: 5px solid
    border-color: #c5c5c5
    padding-bottom: 20px
    z-index: 1

    .ecard-meta
        padding: 20px 60px
        overflow: hidden

        .ecard-logo img
            width: 100%
            max-width: 150px
            display: block
            float: right

        p
            float: left
            width: 50%

    .ecard-content
        overflow: visible
        padding: 20px 60px
        padding-top: 25px

        .ecard-title,
        .ecard-name,
        .ecard-message
            cursor: pointer
            display: block

        h1
            margin: 0
            text-align: center
            line-height: 1
            font-size: 36px
            font-weight: normal

</style>
