<template>
    <div id="sidebar" class="ecard-settings">
        <div id="intro">
            <img src="https://assets.sabre.com/common/edl/img/sabre-logo-slab.svg" width="auto" height="auto">
            <h6>Create and send eCards</h6>
            <p>Choose a card design, select an accent color and write your message. You’ll have a chance to review the eCard before sending.</p>
        </div>

        <main-nav :data="data" @steps="getAllSteps" @current-step="getCurrentStep" />

        <a id="action-new" href="#new" onclick="location.reload();"><i class="edl-icon edl-icon--refresh"></i> Start Over</a>
    </div>
</template>

<script>
// Imports
import MainNav from './partials/Main-Nav.vue'

// Export Component
export default {
  name: 'sidebar',
  // Child components
  components: {
      MainNav
  },
  // Component properties
  props: {
    // Data from parent/App
    data: {
        type: Object
    }
  },
  // Component Functions
  methods: {
    getAllSteps (steps) {
        this.data.steps = steps
    },
    getCurrentStep(step){
        this.data.current_step = step
    }
  }
}
</script>

<style scoped lang="scss">
#sidebar {
    width: 300px;
    height: 100%;
    float: left;
    background: #fff;
    position: fixed;
    left: 0;
    top: 0;
    bottom:0;
    z-index: 2;

    .sidebar-overlay {
        position: absolute;
        top: 0;
        background: rgba(0,0,0,0.2);
        left: 0;
        height: 100%;
        width: 100%;
    }

    .button {
        margin-right: 10px;
        background: #31b98e;
        border: 0px solid #229A77;
        border-bottom: 3px solid #229A77;

        &.disabled {
            background: #eeeeee;
            border-color: #ccc;
        }
    }

    // Intro paragraph
    #intro{
        padding: 20px;
        font-size: 14px;

        img{
            max-width: 160px;
            margin-left: -20px;
            margin-top: -20px;
            margin-bottom:20px;
        }
    }

    // Start over button
    #action-new {
        padding: 0 20px;
    }
}
</style>
