<template lang="pug">
#app
    sidebar
    preview
    modal(v-if="!dataStore.ecard.status.complete")
</template>

<script>
// Imports
import dataStore from './stores/dataStore.js'
import mixins from './mixins/global.js'
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
  // On Component mount
  mounted(){
      // Activate tooltips globally
      mixins.methods.tooltip()
      // Register UID for ecard
      dataStore.ecard.options.uid = mixins.methods.makeUid(12)
      // Register today's date for ecard
      dataStore.ecard.options.date = mixins.methods.todayDate()
  }
}
</script>
