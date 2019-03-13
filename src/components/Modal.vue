<template>
    <div id="modal" v-if="data.part != null" :class="{active: data.modal.active}">
        <div>{{data.part.name}} Is Active</div>

        <modal-nav :data="data" />
    </div>
</template>

<script>
// Imports
import ModalNav from './partials/Modal-Nav.vue'

// Export Component
export default {
  name: 'modal',
  // Child components
  components: {
      ModalNav
  },
  // Component properties
  props: {
      // Data from parent/App
      data: {
          type: Object
      }
  },
  // Component Data
  data() {
      return {

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
}

// Options
.modal-options{
    margin: 0;
    padding: 0;
    list-style: none;
    clear: both;
    display: none;
    margin-bottom: 200px;
}
.option {
    margin-bottom:30px;
    border: 8px solid #fff;
    -webkit-transition: 150ms all ease-in-out;
    -o-transition: 150ms all ease-in-out;
    transition: 150ms all ease-in-out;
    cursor: pointer;
    position: relative;
    display: block;
}
.option a{
    display: block;
}
.modal-options:hover .option{
    opacity: .7;
}
.option:hover,
.option.active {
    -webkit-transform: scale(1.05);
    -ms-transform: scale(1.05);
    transform: scale(1.05);
    -webkit-box-shadow: 2px 2px 11px 1px rgba(0,0,0,.125);
    box-shadow: 2px 2px 11px 1px rgba(0,0,0,.125);
    color: white !important;
    border-color: #3399cc;
    opacity: 1 !important;
    z-index: 1;
}
.option.active{
    border-color: #31b98e;
}


/* Options Nav */
// Next / Continue
// .modal-options .modal-next{
//     position: absolute;
//     top: 32px;
//     left: 5%;
// }
.modal-options .options-nav{
    position: absolute;
    bottom:0;
    left:0;
    right: 0;
    padding: 15px 25px 30px 25px;
    background:#eee;
    border-top: 1px solid #e4e4e4;
    opacity: 1;
    z-index: 2;
    margin-bottom:0 !important;
}
.modal-options .options-nav .options-next{
    float: right;
    overflow: hidden;
}
</style>
