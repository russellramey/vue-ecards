<template>

    <ul id="modal-design" class="modal-options" :class="{ active: display.active }">

        <li v-for="option in options"  data-category="">
            <a class="option option-design" href="#select">
                <label class="input-radio" :for="option.image">
                    <input v-model="data.options.ecard_design" type="radio" name="data-design" data-option="design" class="data-input" :id="option.image" :value="option.image">
                    <img :src="'https://assets.sabre.com/images/ecards/' + option.image" width="auto" height="auto" />
                    <img src="images/graphic_text_placeholder.png" width="auto" height="auto" />
                </label>
            </a>
        </li>

    </ul>

</template>

<script>
// Export Component
export default {
  name: 'design-options',
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
              { category: 'chinese new year', image: 'CNY2019-BANNER-1.jpg', active: false },
              { category: 'chinese new year', image: 'CNY2019-BANNER-2.jpg', active: false },
              { category: 'chinese new year', image: 'CNY2019-BANNER-3.jpg', active: false }
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
