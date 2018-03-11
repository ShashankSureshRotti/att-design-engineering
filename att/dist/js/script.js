//$(document).ready(function() {
//    $('#toolTable').DataTable();
//}); 


        
$('#roleSelect').on('change', function() {
    var roleValue = this.value;
    var e = document.getElementById("serviceSelect");
    var serviceValue = e.options[e.selectedIndex].value;
    var table = document.getElementById("toolTable");
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
    var table = document.getElementById("toolTable");
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
