<template lang="pug">
#ecard.preview.preview-data(v-bind:style="'border-color:' + data.ecard.options.ecard_color.shadow")
    .ecard-graphic.data-container
        img#ecard-image.preview-data(v-if="data.ecard.options.ecard_design.image" v-bind:src="'images/' + data.ecard.options.ecard_design.image" width="auto" height="auto")
        img#ecard-image.preview-data(v-else src="images/graphic_placeholder.jpg" width="auto" height="auto")
        .data-mask(@click="goToStep(0)" data-qt="Edit design")

    .ecard-content
        h1.ecard-title.data-container
            span(v-bind:style="'color:' + data.ecard.options.ecard_color.background")
                span(v-if="data.ecard.options.ecard_message.greeting") {{ data.ecard.options.ecard_message.greeting }}
                span(v-else) Your Greeting
            span.data-mask(@click.prevent="goToStep(2)" data-qt="Edit greeting")
        p.ecard-name.data-container
            span(v-if="data.ecard.options.ecard_message.to[0].name") {{ data.ecard.options.ecard_message.to[0].name }}
            span(v-else) To Name
            span.data-mask(@click.prevent="goToStep(2)" data-qt="Edit name")
        p.ecard-message.data-container
            span(v-if="data.ecard.options.ecard_message.comments") {{ data.ecard.options.ecard_message.comments }}
            span(v-else) Your message will show here, consectetur adipiscing elit. Nulla in egestas justo. Aliquam diam nibh, pharetra nec mattis eu, tempor at lacus. Vivamus ac lorem lacus. Mauris augue mi, feugiat in est eget, iaculis tempus nibh. Aliquam tristique, neque sed pellentesque fermentum, massa risus tincidunt ipsum, sed tempor magna sem at nisl.
            span.data-mask(@click.prevent="goToStep(2)" data-qt="Edit message")

    .ecard-meta
        p.ecard-author
            span.label Sent by:
            span.author(v-if="data.ecard.options.ecard_message.from[0].name") {{ data.ecard.options.ecard_message.from[0].name }}
            span.author(v-else) Name
            br
            span.date {{ data.ecard.options.date }}
        p.ecard-logo
            img(src="images/logo_placeholder.jpg" width="auto" height="auto")
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

        .ecard-author
            span
                display: inline-block

            .author
                margin-left: 8px

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

        .ecard-message
            span
                white-space: pre-wrap

        .ecard-name
            display: inline-block

        h1
            margin: 0
            text-align: center
            line-height: 1
            font-size: 36px
            font-weight: normal

    .data-container
        position: relative

        .data-mask
            position: absolute
            top: 0
            left: 0
            width: 100%
            height: 100%
            cursor: pointer
</style>
