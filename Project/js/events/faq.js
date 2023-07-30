// FAQ

// Add FAQ

document.querySelector("#dialog10 .buttons input[value=Submit]").addEventListener("click", function() {
    addFAQ();
});

document.querySelector("#dialog10 .buttons input[value=Cancel]").addEventListener("click", function() {
    closeDialog('Add FAQ');
});

if (document.querySelector("#main_container > main > div > a > input") != null) {
    document.querySelector("#main_container > main > div > a > input").addEventListener("click", function() {
        openDialog("Add FAQ");
    });
}

// Delete FAQ

document.querySelector("#dialog11 .buttons input[value=Cancel]").addEventListener("click", function() {
    closeDialog("Delete FAQ");
});

document.querySelector("#dialog11 .buttons input[value=Delete]").addEventListener("click", function() {
    deleteFAQ();
});

// Edit FAQ

document.querySelector("#dialog12 .buttons input[value=Edit]").addEventListener("click", function() {
    editFAQ();
});

document.querySelector("#dialog12 .buttons input[value=Cancel]").addEventListener("click", function() {
    closeDialog("Edit FAQ");
});

function setupFAQButtonListerners() { 
    if (document.querySelector("#main_container > main > div > ul > li > div > input[name=FAQID]") == null) return;
    if (document.querySelector("#main_container > main > div > ul > li > div > input.edit_button") == null) return;
    if (document.querySelector("#main_container > main > div > ul > li > div > input.delete_button") == null) return;
    const ids = document.querySelectorAll("#main_container > main > div > ul > li > div > input[name=FAQID]");
    const editButtons = document.querySelectorAll("#main_container > main > div > ul > li > div > input.edit_button");
    const deleteButtons = document.querySelectorAll("#main_container > main > div > ul > li > div > input.delete_button");

    for (let i = 0; i < editButtons.length; i++) {
        editButtons[i].addEventListener("click", function() {
            openDialog("Edit FAQ", ids[i].value);
        });
        deleteButtons[i].addEventListener("click", function() {
            openDialog("Delete FAQ", ids[i].value);
        });
    }
}

setupFAQButtonListerners();
