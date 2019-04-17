<template>

    <ul id="modal-color" class="modal-options" :class="{ active: display.active }">

        <li v-for="option in options">
            <a class="option option-color" href="#select">
                <label class="input-radio" :for="option.name">
                    <input type="radio" class="data-input" data-option="color" name="data-color" :id="option.name" :value="option.color + option.shadow">
                    <span :id="'color-' + option.name" class="color-palette-block">{{option.name}}</span>
                </label>
            </a>
        </li>

    </ul>

</template>

<script>
// Export Component
export default {
  name: 'color-options',
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
          // Control
          display: {
              active: false
          },
          // Available Design Options
          options: [
              { color: '#e50000', shadow: '#ac0000', name: 'red', active: true },
          ]
      }
  },
  // Component Mounted
  mounted() {
      var comp = this

      // Set timeout for activation
      setTimeout(function(){
          // Set modal.active to true
          comp.display.active = true
      }, 300);
  }
}
</script>

<style lang="scss">
// Options
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
</style>
