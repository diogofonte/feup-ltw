/*
 * dialog 1 : add hashtag
 * dialog 2 : delete hashtag
 * dialog 3 : edit hashtag
 * dialog 4 : add department
 * dialog 5 : delete department
 * dialog 6 : edit department
 * dialog 7 : assign agent department/ticket
 * dialog 8 : delete user
 * dialog 9 : change role
 * dialog 10: add faq
 * dialog 11: delete faq
 * dialog 12: edit faq
 * dialog 13: change department
 * dialog 14: change status
 * dialog 15: change priority
 * dialog 16: delete ticket
 * dialog 17: add ticket
 * dialog 18: link hashtag
 * dialog 7 : delete account
 * dialog 8 : pick department
 * dialog 9 : ticket
 */

// Load the dialogs
let dialog1 = document.getElementById("dialog1");
let dialog2 = document.getElementById("dialog2");
let dialog3 = document.getElementById("dialog3");
let dialog4 = document.getElementById("dialog4");
let dialog5 = document.getElementById("dialog5");
let dialog6 = document.getElementById("dialog6");
let dialog7 = document.getElementById("dialog7");
let dialog8 = document.getElementById("dialog8");
let dialog9 = document.getElementById("dialog9");
let dialog10 = document.getElementById("dialog10");
let dialog11 = document.getElementById("dialog11");
let dialog12 = document.getElementById("dialog12");
let dialog13 = document.getElementById("dialog13");
let dialog14 = document.getElementById("dialog14");
let dialog15 = document.getElementById("dialog15");
let dialog16 = document.getElementById("dialog16");
let dialog17 = document.getElementById("dialog17");
let dialog18 = document.getElementById("dialog18");

function openDialog(value, id1) {
  let setID;
  event.preventDefault();
  switch (value) {
    case "Add Hashtag":
      dialog1.style.display = "block";
      break;
    case "Delete Hashtag":
      setID = document.querySelector("input[name=deleteHashtagID]");
      if (setID && id1 != null) setID.value = id1;
      dialog2.style.display = "block";
      break;
    case "Edit Hashtag":
      setID = document.querySelector("input[name=editHashtagID]");
      if (setID && id1 != null) setID.value = id1;
      dialog3.style.display = "block";
      break;
    case "Add Department":
      dialog4.style.display = "block";
      break;
    case "Delete Department":
      setID = document.querySelector("input[name=deleteDepartmentID]");
      if (setID && id1 != null) setID.value = id1;
      dialog5.style.display = "block";
      break;
    case "Edit Department":
      setID = document.querySelector("input[name=editDepartmentID]");
      if (setID && id1 != null) setID.value = id1;
      dialog6.style.display = "block";
      break;
    case "Assign Agent":
      setID = document.querySelector("input[name=assignAgentDepartment]");
      if (setID && id1 != null) setID.value = id1;
      dialog7.style.display = "block";
      break;
    case "Delete User":
      setID = document.querySelector("input[name=deleteUserID]");
      if (setID && id1 != null) setID.value = id1;
      dialog8.style.display = "block";
      break;
    case "Change Role":
      setID = document.querySelector("input[name=changeUserRoleID]");
      if (setID && id1 != null) setID.value = id1;
      dialog9.style.display = "block";
      break;
    case "Add FAQ":
      dialog10.style.display = "block";
      break;
    case "Delete FAQ":
      setID = document.querySelector("input[name=deleteFAQID]");
      if (setID && id1 != null) setID.value = id1;
      dialog11.style.display = "block";
      break;
    case "Edit FAQ":
      setID = document.querySelector("input[name=editFAQID]");
      if (setID && id1 != null) setID.value = id1;
      dialog12.style.display = "block";
      break;
    case "Change Department":
      dialog13.style.display = "block";
      break;
    case "Change Status":
      dialog14.style.display = "block";
      break;
    case "Change Priority":
      dialog15.style.display = "block";
      break;
    case "Delete Ticket":
      setID = document.querySelector("input[name=deleteTicketID]");
      if (setID && id1 != null) setID.value = id1;
      dialog16.style.display = "block";
      break;
    case "Add Ticket":
      dialog17.style.display = "block";
      break;
    case "Link Hashtag":
      setID = document.querySelector("input[name=linkHashtagID]");
      if (setID && id1 != null) setID.value = id1;
      dialog18.style.display = "block";
      break;
    case "Delete Account":
      dialog7.style.display = "block";
      break;
    case "Ticket":
      getTicket(id1);
      dialog9.style.display = "block";
      break;
  }
}

function closeDialog(value) {
  switch (value) {
    case "Add Hashtag":
      dialog1.style.display = "none";
      break;
    case "Delete Hashtag":
      dialog2.style.display = "none";
      break;
    case "Edit Hashtag":
      dialog3.style.display = "none";
      break;
    case "Add Department":
      dialog4.style.display = "none";
      break;
    case "Delete Department":
      dialog5.style.display = "none";
      break;
    case "Edit Department":
      dialog6.style.display = "none";
      break;
    case "Assign Agent":
      dialog7.style.display = "none";
      break;
    case "Delete User":
      dialog8.style.display = "none";
      break;
    case "Change Role":
      dialog9.style.display = "none";
      break;
    case "Add FAQ":
      dialog10.style.display = "none";
      break;
    case "Delete FAQ":
      dialog11.style.display = "none";
      break;
    case "Edit FAQ":
      dialog12.style.display = "none";
      break;
    case "Change Department":
      dialog13.style.display = "none";
      break;
    case "Change Status":
      dialog14.style.display = "none";
      break;
    case "Change Priority":
      dialog15.style.display = "none";
      break;
    case "Delete Ticket":
      dialog16.style.display = "none";
      break;
    case "Add Ticket":
      dialog17.style.display = "none";
      break;
    case "Link Hashtag":
      dialog18.style.display = "none";
      break;
    case "Delete Account":
      dialog7.style.display = "none";
      break;
    case "Ticket":
      dialog9.style.display = "none";
      break;
  }
}

window.onclick = function(event) {
  switch (event.target) {
    case dialog1:
      dialog1.style.display = "none";
      break;
    case dialog2:
      dialog2.style.display = "none";
      break;
    case dialog3:
      dialog3.style.display = "none";
      break;
    case dialog4:
      dialog4.style.display = "none";
      break;
    case dialog5:
      dialog5.style.display = "none";
      break;
    case dialog6:
      dialog6.style.display = "none";
      break;
    case dialog7:
      dialog7.style.display = "none";
      break;
    case dialog8:
      dialog8.style.display = "none";
      break;
    case dialog9:
      dialog9.style.display = "none";
      break;
    case dialog10:
      dialog10.style.display = "none";
      break;
    case dialog11:
      dialog11.style.display = "none";
      break;
    case dialog12:
      dialog12.style.display = "none";
      break;
    case dialog13:
      dialog13.style.display = "none";
      break;
    case dialog14:
      dialog14.style.display = "none";
      break;
    case dialog15:
      dialog15.style.display = "none";
      break;
    case dialog16:
      dialog16.style.display = "none";
      break;
    case dialog17:
      dialog17.style.display = "none";
      break;
    case dialog18:
      dialog18.style.display = "none";
      break;
    }
};
