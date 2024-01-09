// Admin.js
// let users = [];
// let captains = [];
// let captainCount = 1;

// // Function to handle searching for entities
// function handleSearch(inputId, tableId, columns) {
//   document.getElementById(inputId).addEventListener('input', function () {
//     let searchValue = this.value.toLowerCase();
//     let rows = document.querySelectorAll(`#${tableId} tbody tr`);

//     rows.forEach(row => {
//       let shouldDisplay = Array.from(row.cells).some((cell, index) => {
//         if (columns.includes(index + 1)) {
//           return cell.textContent.toLowerCase().startsWith(searchValue);
//         }
//         return false;
//       });

//       row.style.display = shouldDisplay ? '' : 'none';
//     });
//   });
// }

// // Search for captains
// handleSearch('search-captain', 'captains', [1, 2, 4]);

// // Search for users
// handleSearch('search-users', 'users', [1, 2, 3, 4]);

// // Function to handle adding an entity
// function addEntity(sectionId, formId, count) {
//   var name = document.getElementById(formId).elements[`${sectionId.slice(0, -1)}Name`].value;
//   var email = document.getElementById(formId).elements[`${sectionId.slice(0, -1)}Email`].value;
//   var status = document.getElementById(formId).elements[`${sectionId.slice(0, -1)}Status`].value;

//   if (!name || !email) {
//     // Display SweetAlert for empty fields
//     Swal.fire({
//       icon: 'error',
//       title: 'Oops...',
//       text: 'Please fill in all fields!',
//     });
//     return;
//   }

//   var table = document.querySelector(`#${sectionId} table tbody`);
//   var newRow = table.insertRow(table.rows.length);
//   var newId = table.rows.length; // Get the next ID as the number of rows in the table
//   var cell1 = newRow.insertCell(0);
//   var cell2 = newRow.insertCell(1);
//   var cell3 = newRow.insertCell(2);
//   var cell4 = newRow.insertCell(3);
//   var cell5 = newRow.insertCell(4);

//   cell1.innerHTML = newId;
//   cell2.innerHTML = name;
//   cell3.innerHTML = email;
//   cell4.innerHTML = status;
//   cell5.innerHTML = `<button type="button" class="delete delete-button" onclick="deleteEntity(this, '${sectionId}')">Delete</button>`;
// }

// // Function to handle deleting an entity
// function deleteEntity(button, sectionId) {
//   // Display SweetAlert confirmation
//   Swal.fire({
//     title: 'Are you sure?',
//     text: 'You won\'t be able to revert this!',
//     icon: 'warning',
//     showCancelButton: true,
//     confirmButtonColor: '#3085d6',
//     cancelButtonColor: '#d33',
//     confirmButtonText: 'Yes, delete it!'
//   }).then((result) => {
//     if (result.isConfirmed) {
//       // Get the user ID from the button's parent row
//       var entityId = button.parentNode.parentNode.cells[0].textContent;
//       // Determine the entity type based on sectionId
//       var entityType = sectionId === 'users' ? 'User' : 'Captain';

//       // Find and remove the row from the table
//       var table = document.querySelector(`#${sectionId} table tbody`);
//       var row = table.querySelector(`tr:nth-child(${entityId})`);

//       if (!row) {
//         // If the row is not found, show an error
//         Swal.fire({
//           icon: 'error',
//           title: 'Oops...',
//           text: `${entityType} not found!`,
//         });
//         return;
//       }

//       // Remove the row from the table
//       table.removeChild(row);

//       // Update row numbers
//       updateRowNumbers(table);

//       // Show a success message using SweetAlert
//       Swal.fire(
//         'Deleted!',
//         `The ${entityType} has been deleted.`,
//         'success'
//       );
//     }
//   });
// }

// // Function to update row numbers in a table
// function updateRowNumbers(table) {
//   var rows = table.querySelectorAll('tbody tr');
//   rows.forEach((row, index) => {
//     row.cells[0].innerHTML = index + 1; // Update the ID in the first cell
//   });
// }

// // Add captain
// // Function to handle adding a captain
// function addCaptain() {
//   // Display SweetAlert confirmation
//   Swal.fire({
//     title: 'Are you sure?',
//     text: 'Do you want to add this Captain?',
//     icon: 'question',
//     showCancelButton: true,
//     confirmButtonColor: '#3085d6',
//     cancelButtonColor: '#d33',
//     confirmButtonText: 'Yes, add it!'
//   }).then((result) => {
//     if (result.isConfirmed) {
//       // Get the values from the form
//       var name = document.getElementById('addCaptainForm').elements['captainName'].value;
//       var email = document.getElementById('addCaptainForm').elements['captainEmail'].value;
//       var status = document.getElementById('addCaptainForm').elements['captainStatus'].value;

//       // Check if any field is empty
//       if (!name || !email || !status) {
//         // Display SweetAlert for empty fields
//         Swal.fire({
//           icon: 'error',
//           title: 'Oops...',
//           text: 'Please fill the fields!',
//         });
//         return;
//       }

//       // Check if the email is valid
//       if (!isValidEmail(email)) {
//         // Display SweetAlert for invalid email
//         Swal.fire({
//           icon: 'error',
//           title: 'Invalid Email',
//           text: 'Please enter a valid email address!',
//         });
//         return;
//       }

//       // Call the function to add Captain
//       addEntity('captains', 'addCaptainForm', captainCount);

//       // Increment the captainCount for the next captain
//       captainCount++;

//       // Show success message using SweetAlert
//       Swal.fire(
//         'Added!',
//         'The Captain has been added successfully.',
//         'success'
//       );
//     }
//   });
// }

// // Function to validate email format
// function isValidEmail(email) {
//   // Use a simple regular expression for email validation
//   var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
//   return emailRegex.test(email);
// }
// // Function to handle adding a user
// // Function to handle adding a user
// function addUser() {
//   // Display SweetAlert confirmation
//   Swal.fire({
//     title: 'Are you sure?',
//     text: 'Do you want to add this User?',
//     icon: 'question',
//     showCancelButton: true,
//     confirmButtonColor: '#3085d6',
//     cancelButtonColor: '#d33',
//     confirmButtonText: 'Yes, add it!'
//   }).then((result) => {
//     if (result.isConfirmed) {
//       // Get the user form values
//       const userName = document.forms["addUserForm"]["UserName"].value;
//       const userEmail = document.forms["addUserForm"]["UserEmail"].value;
//       const userStatus = document.forms["addUserForm"]["UserStatus"].value;

//       // Check if any field is empty
//       if (!userName || !userEmail || !userStatus) {
//         // Display SweetAlert for empty fields
//         Swal.fire({
//           icon: 'error',
//           title: 'Oops...',
//           text: 'Please fill the fields!',
//         });
//         return;
//       }

//       // Check if the email is valid
//       if (!isValidEmail(userEmail)) {
//         // Display SweetAlert for invalid email
//         Swal.fire({
//           icon: 'error',
//           title: 'Invalid Email',
//           text: 'Please enter a valid email address!',
//         });
//         return;
//       }

//       // Create a new user object
//       const newUser = {
//         id: users.length + 1, // Incrementing the ID
//         name: userName,
//         email: userEmail,
//         status: userStatus,
//       };

//       // Add the user to the array
//       users.push(newUser);

//       // Call a function to update the user table
//       updateUsersTable();

//       // Show a success message using SweetAlert
//       Swal.fire({
//         title: 'User Added!',
//         text: `User ${userName} has been added successfully.`,
//         icon: 'success',
//       });

//       // Clear the form fields
//       document.forms["addUserForm"].reset();
//     }
//   });
// }

// // Function to update the users table
// function updateUsersTable() {
//   // Get the table body
//   const tableBody = document.querySelector("#users tbody");

//   // Clear the existing rows
//   tableBody.innerHTML = "";

//   // Iterate through the users array and add rows to the table
//   users.forEach((user) => {
//     const row = tableBody.insertRow();
//     row.innerHTML = `<td>${user.id}</td>
//                      <td>${user.name}</td>
//                      <td>${user.email}</td>
//                      <td>${user.status}</td>
//                      <td><button class="delete delete-button" onclick="deleteEntity(this, 'users')">Delete</button></td>`;
//   });
// }

// // You might want to initialize the table when the page loads
// document.addEventListener("DOMContentLoaded", function () {
//   updateUsersTable();
// });
