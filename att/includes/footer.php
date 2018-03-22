<!-- jQuery -->
<script src="http://code.jquery.com/jquery-2.2.4.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<!-- DataTables Plugin -->
<!--<script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-3.2.1/dt-1.10.16/fh-3.1.3/r-2.2.1/datatables.min.js"></script>-->

<!-- JS for the site -->
<script src="../dist/js/script.js"></script>
<script>
        
        
        $('#filterByService').on('change', function() {
          var serviceValue = this.value;
          var table = document.getElementById("selectFavTable");
          var tableRows = table.getElementsByTagName("tr");
          var tableData, i;

          //Loop through all table rows, and hide those who don't match the search 
          for (i = 0; i< tableRows.length; i++) {
              tableData = tableRows[i].getElementsByTagName("td")[1];
              if(tableData) {
                  if(tableData.innerHTML.indexOf(serviceValue) > -1) {
                      tableRows[i].style.display = "";                        
                  } else {
                      tableRows[i].style.display = "none";
                  }
              }
          }
        });
        
      
      
</script>