<template>
    <div id="modal" v-if="data.current_step != null" :class="{active: data.modal.active}">

        <div id="modal-meta">
            <a @click.prevent="closeModal" href="#preview" class="modal-close"><i class="edl-icon edl-icon--close"></i></a>
            <h4><span>{{data.current_step.meta.desc}}</span></h4>
        </div>

        <div id="modal-content">
            <transition name="fade">
                <design-options :data="data" v-if="this.data.current_step.slug === 'design'" />
                <color-options :data="data" v-if="this.data.current_step.slug === 'color'" />
            </transition>
        </div>

        <modal-nav :data="data" />

    </div>
</template>

<script>
// Imports
import ModalNav from './partials/Modal-Nav.vue'
import DesignOptions from './partials/Options-Design.vue'
import ColorOptions from './partials/Options-Color.vue'

// Export Component
export default {
  name: 'modal',
  // Child components
  components: {
      ModalNav,
      DesignOptions,
      ColorOptions
  },
  // Component properties
  props: {
      // Data from parent/App
      data: {
          type: Object
      }
  },
  methods: {
      // Close modal action
      closeModal(){
          // Set modal state to false
          this.data.modal.active = false
          // Set active nav to false
          this.data.current_step.status.active = false
      }
  }
}
</script>

<style scoped lang="scss">
#modal{
    background: #eee;
    position: fixed;
    width: 30%;
    min-width: 380px;
    max-width: 500px;
    left: -100%;
    top: 0;
    bottom: 0;
    margin-left: 300px;
    -webkit-transition: left 300ms ease-in-out;
    -o-transition: left 300ms ease-in-out;
    transition: left 300ms ease-in-out;
    box-shadow: 0 0 15px rgba(0,0,0,.25);
    z-index: 1;

    &.active{
        left: 0;
    }

    // Meta
    #modal-meta{
        padding:40px 5%;
        padding-bottom: 10px;
        overflow: hidden;

        .modal-close .edl-icon:before{
            font-size: 24px;
            font-weight: lighter;
        }

        h4{
            display: block;
            margin:0;
            float: left;
        }

        a{
            color: #999;
            text-align: right;
            float: right;
        }

        #modal-submit{
            max-width: auto;
            width: auto;
            float: right;
            margin-top: -5px;
        }
    }

    // Content
    #modal-content{
        padding: 40px 5%;
        padding-top: 15px;
        overflow-x: auto;
        height: 100%;
    }

    // Options
    .modal-options{
        opacity: 0;
        -webkit-transition: opacity 150ms ease-in-out;
        transition: opacity 150ms ease-in-out;
        margin: 0;
        list-style: none;

        &.active{
            opacity: 1;
        }
    }

    // Fade out on unmount (Vue transition)
    .fade-enter,
    .fade-leave-active,
    .fade-leave-to {
      opacity: 0;
    }
}
</style>
