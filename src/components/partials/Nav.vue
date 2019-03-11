<template>
    <ul id="nav" class="ecard-nav">
        <li v-for="item in navItems">
            <a :id="item.slug + '-link'" :class="{active: item.status.active, completed: item.status.complete }" class="nav-link" :href="'#' + item.slug" :data-qt="item.desc" @click.prevent="navigationController(item)">
                <i :class="'edl-icon ' + item.icon"></i>
                {{item.name}}
            </a>
        </li>
    </ul>
</template>

<script>
// Export Component
export default {
  name: 'nav',
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
                  slug: 'design',
                  name: 'Design',
                  icon: 'edl-icon--art-cup',
                  desc: 'Choose a design',
                  status: {
                      complete: false,
                      active: false,
                      step: 0,
                  }
              },
              {
                  slug: 'color',
                  name: 'Accent Color',
                  icon: 'edl-icon--design-palette',
                  desc: 'Choose a color',
                  status: {
                      complete: false,
                      active: false,
                      step: 1,
                  }
              },
              {
                  slug: 'message',
                  name: 'Message',
                  icon: 'edl-icon--message',
                  desc: 'Write your message',
                  status: {
                      complete: false,
                      active: false,
                      step: 2,
                  }
              },
              {
                  slug: 'review',
                  name: 'Review',
                  icon: 'edl-icon--check-circle',
                  desc: 'Review your eCard',
                  status: {
                      complete: false,
                      active: false,
                      step: 3,
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

      // Set local state to active
      item.status.active = !item.status.active

      // Emit changed data back to parent
      this.$emit('current-step', item.status.step)
    }
  },
  // Component is Mounted
  mounted() {
      // Send local progress data back to parent/App
      this.$emit('progress', this.navItems)
  }
}
</script>

<style scoped lang="scss">
#nav {
    list-style: none;
    margin: 0;
    margin-bottom: 30px;

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
