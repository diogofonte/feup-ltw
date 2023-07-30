// HASHTAGS

// Add Hashtag

document.querySelector("#dialog1 .buttons input[value=Submit]").addEventListener("click", function() {
    addHashtag();
});

document.querySelector("#dialog1 .buttons input[value=Cancel]").addEventListener("click", function() {
    closeDialog('Add Hashtag');
});

document.querySelector("#main_container > main > section > a > input").addEventListener("click", function() {
    openDialog("Add Hashtag");
});

// Delete Hashtag

document.querySelector("#dialog2 .buttons input[value=Cancel]").addEventListener("click", function() {
    closeDialog("Delete Hashtag");
});

document.querySelector("#dialog2 .buttons input[value=Delete]").addEventListener("click", function() {
    deleteHashtag();
});


// Edit Hashtag

document.querySelector("#dialog3 .buttons input[value=Edit]").addEventListener("click", function() {
    editHashtag();
});

document.querySelector("#dialog3 .buttons input[value=Cancel]").addEventListener("click", function() {
    closeDialog("Edit Hashtag");
});

function setupHashtagButtonListerners() {
    const editButtons = document.querySelectorAll("#main_container > main > section > ul > li > div > input.edit_button");
    const deleteButtons = document.querySelectorAll("#main_container > main > section > ul > li > div > input.delete_button");
    const ids = document.querySelectorAll("#main_container > main > section > ul > li > div > input[type=hidden]");

    for (let i = 0; i < editButtons.length; i++) {
        editButtons[i].addEventListener("click", function() {
            openDialog("Edit Hashtag", ids[i].value);
        });
        deleteButtons[i].addEventListener("click", function() {
            openDialog("Delete Hashtag", ids[i].value);
        });
    }
}

setupHashtagButtonListerners();
