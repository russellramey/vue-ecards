<template>
    <ul id="nav" class="ecard-nav">
        <li v-for="item in navItems" :key="item.status.step">
            <a @click.prevent="navigationController(item)" :id="item.slug + '-link'" :class="{active: item.status.active, completed: item.status.complete, disabled: item.status.disabled }" class="nav-link" :href="'#' + item.slug" :data-qt="item.desc">
                <i :class="'edl-icon ' + item.meta.icon"></i>
                {{item.meta.name}}
            </a>
        </li>
    </ul>
</template>

<script>
// Export Component
export default {
  name: 'main-nav',
  // Component Properties
  props: {
    // Data from parent/App
    data: {
        type: Object
    }
  },
  // Component Data
  data() {
      return {
          // Nav Array,
          // steps start at 0 for index purposes
          navItems: [
              {
                  id: 0,
                  slug: 'design',
                  meta: {
                      name: 'Design',
                      icon: 'edl-icon--art-cup',
                      desc: 'Choose a design',
                  },
                  status: {
                      disabled: false,
                      complete: false,
                      active: false,
                  }
              },
              {
                  id: 1,
                  slug: 'color',
                  meta: {
                      name: 'Accent Color',
                      icon: 'edl-icon--design-palette',
                      desc: 'Choose a color',
                  },
                  status: {
                      disabled: false,
                      complete: false,
                      active: false,
                  }
              },
              {
                  id: 2,
                  slug: 'message',
                  meta: {
                      name: 'Message',
                      icon: 'edl-icon--message',
                      desc: 'Write your message',
                  },
                  status: {
                      disabled: false,
                      complete: false,
                      active: false,
                  }
              },
              {
                  id: 3,
                  slug: 'review',
                  meta: {
                      name: 'Review',
                      icon: 'edl-icon--check-circle',
                      desc: 'Review your eCard',
                  },
                  status: {
                      disabled: true,
                      complete: false,
                      active: false,
                  }
              },
          ]
      }
  },
  // Component Functions/Methods
  methods: {
    // Navigation Controller
    navigationController(item) {
      // Reset all navItems state
      for(var i in this.navItems){
          this.navItems[i].status.active = false
      }

      // Check if item is disabled
      if (!item.status.disabled){
          // Set local state to active
          item.status.active = !item.status.active

          // Emit changed data back to parent
          this.$emit('current-step', item)

          // Activate Modal
          this.modalController()
      }

    },
    // Modal controller
    modalController() {
        var comp = this
        // Reset modal
        this.data.modal.active = false
        // Set timeout for activation
        setTimeout(function(){
            // Set modal.active to true
            comp.data.modal.active = true
        }, 150);
    }
  },
  // Computed values
  computed: {
    // Return current step
    current_step() {
      return this.data.current_step;
    }
  },
  // Watch for changes
  watch: {
    // whenever current_step changes
    current_step() {
        // Go to navItem
        this.navigationController(this.data.current_step)
    }
  },
  // Component is Mounted
  mounted() {
      // Send local progress data back to parent/App
      this.$emit('steps', this.navItems)
  },
}
</script>

<style scoped lang="scss">
#nav {
    list-style: none;
    margin: 0;
    margin-bottom: 30px;
    position: relative;
    z-index: 1;

    // Navigation / Step Links
    .nav-link {
        display: block;
        color: #555;
        border-top: 1px solid #e4e4e4;
        padding: 20px;
        border-bottom: 1px solid #e4e4e4;
        margin-top: -1px;
        position: relative;

        &:hover,
        &.active {
            background: #eee;
            color: #333;
            border-right: none;
        }
        &.active{
            border-left:4px solid #e50000;
        }

        // Disabled Step
        &.disabled{
            pointer-events: none;
            color: #ccc;

            &:before{
                display: none !important;
            }
        }

        // Completed Step
        &.completed{
            color: #31b98e;
            border-left-color: #31b98e;

            &:before{
                content: "\f178";
                font-family: "spark-icon-line" !important;
                color: #31b98e;
                position: absolute;
                right: 20px;
                font-size: 24px;
            }
        }

        // Icons
        .edl-icon {
            margin-right: 10px;
        }
    }
}
</style>
