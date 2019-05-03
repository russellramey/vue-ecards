<template lang="pug">
#csv-import
    label.button.button-secondary(for="csv-import-action") Import CSV
        input(@change="handleFile" type="file" ref="csv_import" id="csv-import-action" accept=".csv")

    a.csv-template(href="#" download) Download CSV Template
</template>


<script>
// Export Component
export default {
  name: 'csv-import',
  // Parent data
  props: {
      data: {
          type: Object
      }
  },
  // Component functions
  methods: {
      handleFile(event) {
            // Variables
            let $this = this
            let file = event.target.files[0]
            let reader = new FileReader()

            // Read file
            reader.readAsText(file)

            // On FileReader Success & Load
            reader.onload = function(event) {
                var csv = event.target.result
                var csvResult = csv.replace(/"/g, '')
                $this.processCsvData(csvResult);
            }

            // On FileReader Error
            reader.onerror = function(event){
                if (event.target.error.name === "NotReadableError") {
                    alert('Whoops, cannot read file.');
                } else {
                    alert('Whoops, looks like something went wrong, please try again.');
                }
            }

            // Clear the file input
            $this.$refs.csv_import.value = ""
      },
      // Processes the CSV file data
      processCsvData(csv) {
          // Create empty array
          var csvArray = []

          // Split data at the rows or new lines
          var rows = csv.split(/\r\n|\n/);

          // Loop through each row and split by semicolon
          for (var i = 1; i < 100; i++) {

              // If more than 100, alert
              if (i <= 100 && rows[i] != null && rows[i] != 'undefined'){
                  // Create single row from rows
                  var row = rows[i].split(",")

                  // Build single object item
                  var item = { name: row[0], email: row[1] }

                  // Push row array
                  csvArray.push(item)

              }

          }

          // if more than 100, break
          if (rows.length > 100 ) {
              alert('Sorry, you can only send to 100 recipients at a time. The first 100 recipients will be added.');
          }

          // Add csvArray to main data object
          this.data.options.ecard_message.to = csvArray
      }
  }
}
</script>


<style lang="sass">
#csv-import
    margin: 20px 0

    input
        width: 0px
        height: 0px
        opacity: 0
        overflow: hidden
        position: absolute
        z-index: -1

    .button
        display: inline-block
        cursor: pointer
        padding: 0px 15px
        font-size: 13px
        margin-right: 10px
        min-height: 30px
        line-height: 30px

    .csv-template
        font-size: 13px
</style>
