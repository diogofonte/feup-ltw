// TICKET

// Change Department

document.querySelector("#dialog13 .buttons input[value=Submit]").addEventListener("click", function() {
    changeDepartment();
});

document.querySelector("#dialog13 .buttons input[value=Cancel]").addEventListener("click", function() {
    closeDialog('Change Department');
});

function changeButtonDepartment() {
    if (document.querySelector("#department > input") == null) return;
    document.querySelector("#department > input").addEventListener("click", function() {
        openDialog('Change Department');
    });
}

changeButtonDepartment();

// Change Status

document.querySelector("#dialog14 .buttons input[value=Submit]").addEventListener("click", function() {
    changeStatus();
});

document.querySelector("#dialog14 .buttons input[value=Cancel]").addEventListener("click", function() {
    closeDialog("Change Status");
});

function changeButtonStatus() {
    if (document.querySelector("#status > input") == null) return;
    document.querySelector("#status > input").addEventListener("click", function() {
        openDialog('Change Status');
    });
}

changeButtonStatus();

// Change Priority

document.querySelector("#dialog15 .buttons input[value=Submit]").addEventListener("click", function() {
    changePriority();
});

document.querySelector("#dialog15 .buttons input[value=Cancel]").addEventListener("click", function() {
    closeDialog("Change Priority");
});

function changeButtonPriority() {
    if (document.querySelector("#priority > input") == null) return;
    document.querySelector("#priority > input").addEventListener("click", function() {
        openDialog('Change Priority');
    });
}

changeButtonPriority();

// Assign Agent

document.querySelector("#dialog7 .buttons input[value=Cancel]").addEventListener("click", function() {
    closeDialog('Assign Agent');
});

document.querySelector("#dialog7 .buttons input[value=Submit]").addEventListener("click", function() {
    changeAgentTicket();
});

function changeButtonAgent() {
    if (document.querySelector("#agent > input") == null) return;
    document.querySelector("#agent > input").addEventListener("click", function() {
        openDialog('Assign Agent');
    });
}

changeButtonAgent();

// Link Hashtag

document.querySelector("#dialog18 .buttons input[value=Cancel]").addEventListener("click", function() {
    closeDialog('Link Hashtag');
});

document.querySelector("#dialog18 .buttons input[value=Submit]").addEventListener("click", function() {
    linkHashtagToTicket();
});

// Delete Ticket

document.querySelector("#dialog16 .buttons input[value=Cancel]").addEventListener("click", function() {
    closeDialog("Delete Ticket");
});

const id = document.querySelector("#history > input[name=ticketID]");
document.querySelector("#history > input.delete_button").addEventListener("click", function() {
    openDialog('Delete Ticket', id.value);
});

// Submit Message

document.querySelector("#messages input[value=Submit]").addEventListener("click", function() {
    addMessage();
});