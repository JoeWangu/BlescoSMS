// // Add event listener for the add row button
// document.getElementById("add-row").addEventListener("click", function () {
//   // Get a reference to the table body
//   var tableBody = document.querySelector("table tbody");
//   // Create a new row element
//   var newRow = document.createElement("tr");
//   // Create a new cell for the first column
//   var col1 = document.createElement("td");
//   col1.innerHTML = "New Row, Column 1";
//   // Create a new cell for the second column
//   var col2 = document.createElement("td");
//   col2.innerHTML = "New Row, Column 2";
//   // Create a new cell for the third column
//   var col3 = document.createElement("td");
//   col3.innerHTML = "New Row, Column 3";
//   // Create a new cell for the actions
//   var col4 = document.createElement("td");
//   col4.innerHTML = '<button class="btn btn-danger btn-sm">Delete</button>';
//   // Append the cells to the row
//   newRow.appendChild(col1);
//   newRow.appendChild(col2);
//   newRow.appendChild(col3);
//   newRow.appendChild(col4);
//   // Append the row to the table body
//   tableBody.appendChild(newRow);
// });

//   // Add event listener to the table
//   document.querySelector("table").addEventListener("click", function(event) {
//     // Check if the clicked element is a delete button
//     if (event.target.classList.contains("btn-danger")) {
//       // Get the parent row of the button that was clicked
//       var rowToDelete = event.target.parentNode.parentNode;
//       // Get the parent table of the row that is to be deleted
//       var table = rowToDelete.parentNode;
//       // Remove the row from the table
//       table.removeChild(rowToDelete);
//     }
//   });


//   /////////////////////////////////////////////////save table rows locally
//   // Saving the data
// var rowsData = [];

// document.querySelector("table").addEventListener("click", function(event) {
//     if (event.target.classList.contains("btn-danger")) {
//       // Get the parent row of the button that was clicked
//       var rowToDelete = event.target.parentNode.parentNode;
//       // Get the parent table of the row that is to be deleted
//       var table = rowToDelete.parentNode;
//       // Remove the row from the table
//       table.removeChild(rowToDelete);
//     }
//     if (event.target.classList.contains("btn-success")) {
//       // Get the data from the row
//       var rowData = {};
//       var cells = event.target.parentNode.parentNode.querySelectorAll("td");
//       rowData.col1 = cells[0].innerHTML;
//       rowData.col2 = cells[1].innerHTML;
//       rowData.col3 = cells[2].innerHTML;
      
//       // Add the data to the array
//       rowsData.push(rowData);
      
//       // Save the array to local storage
//       localStorage.setItem("rowsData", JSON.stringify(rowsData));
//     }
// });

// //Retrieve data
// document.addEventListener("DOMContentLoaded", function() {
//     var rowsData = JSON.parse(localStorage.getItem("rowsData"));
//     if (rowsData) {
//         rowsData.forEach(function(rowData) {
//             // Create a new row
//             var newRow = document.createElement("tr");
//             // Create the cells
//             var col1 = document.createElement("td");
//             col1.innerHTML = rowData.col1;
//             var col2 = document.createElement("td");
//             col2.innerHTML = rowData.col2;
//             var col3 = document.createElement("td");
//             col3.innerHTML = rowData.col3;
            
//             // Append the cells to the row
//             newRow.appendChild(col1);
//             newRow.appendChild(col2);
//             newRow.appendChild(col3);
//             // Append the row to the table
//             document.querySelector("table").appendChild(newRow);
//         });
//     }
// });


// ////////////////////////////////////////////////////////////edit
// // Add edit button to each row
// var rows = document.querySelectorAll("table tr");
// rows.forEach(function(row) {
//     var editBtn = document.createElement("button");
//     editBtn.innerHTML = "Edit";
//     editBtn.classList.add("btn", "btn-warning", "edit-btn");
//     row.appendChild(editBtn);
// });

// // Add event listener to the edit button
// document.querySelector("table").addEventListener("click", function(event) {
//     if (event.target.classList.contains("edit-btn")) {
//         // Get the cells in the row
//         var cells = event.target.parentNode.querySelectorAll("td");
//         // Make the cells editable
//         cells.forEach(function(cell) {
//             var cellContent = cell.innerHTML;
//             cell.innerHTML = "<input type='text' value='" + cellContent + "'>";
//         });
//         // Change the text of the button to "Save"
//         event.target.innerHTML = "Save";
//         event.target.classList.remove("edit-btn");
//         event.target.classList.add("save-btn");
//     } else if (event.target.classList.contains("save-btn")) {
//         // Get the cells in the row
//         var cells = event.target.parentNode.querySelectorAll("td");
//         // Get the new data from the inputs
//         cells.forEach(function(cell) {
//             var input = cell.querySelector("input");
//             cell.innerHTML = input.value;
//         });
//         // Change the text of the button back to "Edit"
//         event.target.innerHTML = "Edit";
//         event.target.classList.remove("save-btn");
//         event.target.classList.add("edit-btn");
//     }
// });
