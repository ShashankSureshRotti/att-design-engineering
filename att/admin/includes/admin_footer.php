<!-- jQuery -->
<script
src="https://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<!-- JS for Datatable -->

<script>
//    $(document).ready(function() {
//        $('#manageToolsTable').DataTable();
//    }); 
  
//    $(document).ready(function() {
//        $('#manageUserTable').DataTable();
//    }); 
  
var $userRows = $('#manageUsersTable tr:not(:first)');
$('#searchUser').keyup(function() {
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
    
    $userRows.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
});

var $rows = $('#manageToolsTable tr:not(:first)');
$('#searchTool').keyup(function() {
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
    
    $rows.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
});

  
$('#accessSelect').on('change', function() {
    var accessValue = this.value;
    var table = document.getElementById("manageUsersTable");
    var tableRows = table.getElementsByTagName("tr");
    var tableData, i;

    //Loop through all table rows, and hide those who don't match the search 
    for (i = 0; i< tableRows.length; i++) {
        tableData = tableRows[i].getElementsByTagName("td")[6];
        if(tableData) {
            if(tableData.innerHTML.indexOf(accessValue) > -1) {
                tableRows[i].style.display = "";                        
            } else {
                tableRows[i].style.display = "none";
            }
        }
    }
});
  
$('#statusSelect').on('change', function() {
    var statusValue = this.value;
    var table = document.getElementById("manageUsersTable");
    var tableRows = table.getElementsByTagName("tr");
    var tableData, i;

    //Loop through all table rows, and hide those who don't match the search 
    for (i = 0; i< tableRows.length; i++) {
        tableData = tableRows[i].getElementsByTagName("td")[3];
        if(tableData) {
            if(tableData.innerHTML.indexOf(statusValue) > -1) {
                tableRows[i].style.display = "";                        
            } else {
                tableRows[i].style.display = "none";
            }
        }
    }
});
  
$('#roleSelect').on('change', function() {
    var roleValue = this.value;
    var e = document.getElementById("serviceSelect");
    var serviceValue = e.options[e.selectedIndex].value;
    var table = document.getElementById("manageToolsTable");
    var tableRows = table.getElementsByTagName("tr");
    var tableData, i;

    //Loop through all table rows, and hide those who don't match the search 
    for (i = 0; i< tableRows.length; i++) {
        tableData = tableRows[i].getElementsByTagName("td")[1];
        tableData1 = tableRows[i].getElementsByTagName("td")[2];
        if(tableData && tableData1) {
            if(tableData.innerHTML.indexOf(serviceValue) > -1 &&
              tableData1.innerHTML.indexOf(roleValue) > -1) {
                tableRows[i].style.display = "";                        
            } else {
                tableRows[i].style.display = "none";
            }
        }
    }
});
        
$('#serviceSelect').on('change', function() {
    var serviceValue = this.value;
    var e = document.getElementById("roleSelect");
    var roleValue = e.options[e.selectedIndex].value;
    var table = document.getElementById("manageToolsTable");
    var tableRows = table.getElementsByTagName("tr");
    var tableData, i;

    //Loop through all table rows, and hide those who don't match the search 
    for (i = 0; i< tableRows.length; i++) {
        tableData = tableRows[i].getElementsByTagName("td")[1];
        tableData1 = tableRows[i].getElementsByTagName("td")[2];
        if(tableData && tableData1) {
            if(tableData.innerHTML.indexOf(serviceValue) > -1 &&
              tableData1.innerHTML.indexOf(roleValue) > -1) {
                tableRows[i].style.display = "";                        
            } else {
                tableRows[i].style.display = "none";
            }
        }
    }
});

</script>