// PEOPLE

// Delete User

document.querySelector("#dialog8 .buttons input[value=Delete]").addEventListener("click", function() {
    deleteUser();
});

document.querySelector("#dialog8 .buttons input[value=Cancel]").addEventListener("click", function() {
    closeDialog('Delete User');
});

// Change User Role

document.querySelector("#dialog9 .buttons input[value=Submit]").addEventListener("click", function() {
    changeUserRole();
});

document.querySelector("#dialog9 .buttons input[value=Cancel]").addEventListener("click", function() {
    closeDialog("Change Role");
});

function setupPeopleButtonListerners() {    
    const changeButtons = document.querySelectorAll(".change_permissions_button.edit_button");
    const idChangeButtons = document.querySelectorAll("input[name=userID]");

    for (let i = 0; i < changeButtons.length; i++) {
        changeButtons[i].addEventListener("click", function() {
            openDialog("Change Role", idChangeButtons[i].value);
        });
    }
}

setupPeopleButtonListerners();

const deleteButtons = document.querySelectorAll(".delete_button");
const idDeleteButtons = document.querySelectorAll("input[name=manage_accordion]");

for (let i = 0; i < deleteButtons.length; i++) {
    deleteButtons[i].addEventListener("click", function() {
        openDialog("Delete User", idDeleteButtons[i].getAttribute("id"));
    });
}
