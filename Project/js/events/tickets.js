// TICKETS

// Add Ticket

document.querySelector("#dialog17 .buttons input[value=Submit]").addEventListener("click", function() {
    addTicket();
});

document.querySelector("#dialog17 .buttons input[value=Cancel]").addEventListener("click", function() {
    closeDialog('Add Ticket');
});
