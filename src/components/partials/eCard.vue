<template>

    <div id="ecard" class="preview preview-data">
        <div class="ecard-graphic" data-qt="Edit design">
            <a @click.prevent="goToStep(0)" href="#design"><img id="ecard-image" class="preview-data" src="https://assets.sabre.com/images/ecards/CNY2019-BANNER-1.jpg" width="auto" height="auto"></a>
        </div>
        <div class="ecard-content">
            <h1 class="ecard-title"><span @click.prevent="goToStep(2)" class="preview-data" data-qt="Edit greeting">Your Greeting</span></h1>
            <p class="ecard-name"><span @click.prevent="goToStep(2)" class="preview-data" data-qt="Edit name">To Name</span>,</p>
            <p class="ecard-message"><span @click.prevent="goToStep(2)" class="preview-data" data-qt="Edit message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla in egestas justo. Aliquam diam nibh, pharetra nec mattis eu, tempor at lacus. Vivamus ac lorem lacus. Mauris augue mi, feugiat in est eget, iaculis tempus nibh. Aliquam tristique, neque sed pellentesque fermentum, massa risus tincidunt ipsum, sed tempor magna sem at nisl.</span></p>
        </div>
        <div class="ecard-meta">
            <p class="ecard-author">Sent by: <span class="preview-data">Name</span><br>March 14, 2019</p>
            <p class="ecard-logo"><img src="https://assets.sabre.com/common/edl/img/sabre-logo-red.svg" width="auto" height="auto"></p>
        </div>
    </div>

</template>

<script>
// Export Component
export default {
  name: 'ecard',
  // Component Properties
  props: {
    // Data from parent/App
    data: {
        type: Object
    }
  },
  // Component Functions
  methods: {
      // Navigate to nav Step action
      goToStep(index) {
        // change global step
        this.data.current_step = this.data.steps[index]
      },
  }
}
</script>

<style lang="scss">
#ecard{
    font-family: helvetica, arial, sans-serif;
    width: 768px;
    background: #fff;
    margin: 0 auto;
    border:3px solid;
    border-bottom:5px solid;
    border-color:#c5c5c5;
    padding-bottom:20px;
    z-index: 1;

    .ecard-meta{
        padding: 20px 60px;
        overflow: hidden;

        .ecard-logo img{
            width: 100%;
            max-width: 150px;
            display: block;
            float: right;
        }

        p{
            float: left;
            width: 50%;
        }
    }

    .ecard-content{
        overflow: visible;
        padding: 20px 60px;
        padding-top: 25px;

        .ecard-title,
        .ecard-name,
        .ecard-message{
            cursor: pointer;
            display: block;
        }

        h1{
            margin: 0;
            text-align: center;
            line-height: 1;
            font-size: 36px;
            font-weight: normal;
        }
    }
}
</style>
