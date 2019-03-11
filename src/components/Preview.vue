<template>
    <div id="preview" class="ecard-preview">
        <span id="view-preview"></span>

        <p v-if="data.step != null">{{data.progress[data.step].name}} Is Active</p>
    </div>
</template>

<script>
// Export Component
export default {
  name: 'preview',
  // Component properties
  props: {
    // Data from parent/App
    data: {
        type: Object
    },
  }
}
</script>

<style scoped lang="scss">
#preview {
    position: fixed;
    top: 0;
    right: 0;
    height: 100%;
    left:300px;
    background: #ccc;
    padding:30px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;

    #view-preview{
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        cursor: pointer;
    }
}

</style>
