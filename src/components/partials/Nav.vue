<template>
    <ul id="nav" class="ecard-nav">
        <li v-for="item in navItems">
            <a :id="item.slug + '-link'" class="nav-link" :href="'#' + item.slug" :data-part="item.step" :data-qt="item.desc">
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
  props: {
    data: {
        type: Object
    }
  },
  data() {
      return {
          navItems: {
              design: {
                  step: 1,
                  slug: 'design',
                  name: 'Design',
                  icon: 'edl-icon--art-cup',
                  desc: 'Choose a design'
              },
              color: {
                  step: 2,
                  slug: 'color',
                  name: 'Accent Color',
                  icon: 'edl-icon--design-palette',
                  desc: 'Choose a color'
              },
              message: {
                  step: 3,
                  slug: 'message',
                  name: 'Message',
                  icon: 'edl-icon--message',
                  desc: 'Write your message'
              },
              review: {
                  step: 4,
                  slug: 'review',
                  name: 'Review',
                  icon: 'edl-icon--check-circle',
                  desc: 'Review your eCard'
              },
          }
      }
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
