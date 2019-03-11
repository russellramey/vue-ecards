<template>
    <div id="app">
        <Sidebar :data="ecard" />
        <Preview :data="ecard" />
        <Modal :data="ecard" />
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
              step: null,
              progress: {},
              values: {},
              modal: {
                  active: false
              }
          }
      }
  },
  // Component Functions
  methods: {
      getModalData (data) {
        this.ecard.modal = data
      },
  }
}
</script>

<style lang="scss">

</style>
