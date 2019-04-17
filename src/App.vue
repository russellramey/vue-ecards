<template lang="pug">
#app
    sidebar
    preview
    modal
</template>

<script>
// Imports
import dataStore from './stores/dataStore.js'
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
          // App Data
          dataStore: dataStore
      }
  },
}
</script>
