// $(document).ready(function () {

//     var csv_table = $("#dtr_table_compare_csv").DataTable();
//     var db_table  = $("#dtr_table_compare_db").DataTable();

//     csv_table.rows().every(function (index, element) {
//         var row = $(this.node());
//         var i = 0;
//         while (i < 4) {
//             // db_table.rows().every(function(index,element){
//                 // var db_row = $(this.node());
//                 if (row.find("td")[i].innerHTML != db_row.find("td")[i].innerHTML) {
//                     row.find("td")[i].classList.add("bg-danger", "text-white");
//                     // row.find("td")[i].bgColor = "red";
//                 } else {
//                     row.find("td")[i].classList.add("bg-success", "text-white");
//                 }
//             // });
//             i++;
//         }
//         // var row = $(this.node());
//         // var statusElement = row.find('td').eq(6); // Index 6 - the 7th column in the table
//         // var isChecked = statusElement.prop('checked');
//         /* ... etc ... */
//     });

// });
