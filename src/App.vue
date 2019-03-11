<template>
    <div id="app">
        <Sidebar :data="ecard" />

        <Preview :data="ecard" />
    </div>
</template>

<script>
// Imports
import Sidebar from './components/Sidebar.vue'
import Preview from './components/Preview.vue'

// Export Component
export default {
  name: 'app',
  components: {
    Sidebar,
    Preview
  },
  data() {
      return {
          ecard: {
              step: null,
              progress: {},
              values: {}
          }
      }
  }
}
</script>

<style lang="scss">

</style>
