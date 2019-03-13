<template>
    <div id="app">
        <sidebar :data="ecard" />
        <preview :data="ecard" />
        <modal :data="ecard" />
    </div>
</template>

<script>
// Imports
import Sidebar from './components/Sidebar.vue'
import Preview from './components/Preview.vue'
import Modal from './components/Modal.vue'

// Export Component
export default {
  name: 'app',
  // Child components
  components: {
    Sidebar,
    Preview,
    Modal
  },
  // Component Data
  data() {
      return {
          // eCard data controller
          ecard: {
              steps: {},
              current_step: null,
              options: {
                  ecard_design: null,
                  ecard_from_email: null,
                  ecard_from_name: null,
                  ecard_message: null,
                  ecard_to_email: [],
                  ecard_to_name: []
              },
              modal: {
                  content: null,
                  active: false
              }
          }
      }
  },
}
</script>

<style lang="scss">

</style>
