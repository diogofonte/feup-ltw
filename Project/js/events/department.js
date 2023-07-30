// DEPARTMENTS

// Add Department

document.querySelector("#dialog4 .buttons input[value=Submit]").addEventListener("click", function() {
    addDepartment();
});

document.querySelector("#dialog4 .buttons input[value=Cancel]").addEventListener("click", function() {
    closeDialog('Add Department');
});

document.querySelector("#main_container > main > section > a > input").addEventListener("click", function() {
    openDialog("Add Department");
});

// Delete Department

document.querySelector("#dialog5 .buttons input[value=Cancel]").addEventListener("click", function() {
    closeDialog("Delete Department");
});

document.querySelector("#dialog5 .buttons input[value=Delete]").addEventListener("click", function() {
    deleteDepartment();
});


// Edit Department

document.querySelector("#dialog6 .buttons input[value=Edit]").addEventListener("click", function() {
    editDepartment();
});

document.querySelector("#dialog6 .buttons input[value=Cancel]").addEventListener("click", function() {
    closeDialog("Edit Department");
});

// Assign Agent

document.querySelector("#dialog7 .buttons input[value=Cancel]").addEventListener("click", function() {
    closeDialog('Assign Agent');
});

document.querySelector("#dialog7 .buttons input[value=Add]").addEventListener("click", function() {
    addAgentDepartment();
});

document.querySelector("#dialog7 .buttons input[value=Remove]").addEventListener("click", function() {
    removeAgentDepartment();
});

function setupDepartmentButtonListerners() {
    const changeButtons = document.querySelectorAll("#main_container > main > section > ul > li > div > input[value='Change Agent']");
    const ids = document.querySelectorAll("#main_container > main > section > ul > li > div > input[name=departmentID]");
    const editButtons = document.querySelectorAll("#main_container > main > section > ul > li > div > input[value=Edit]");
    const deleteButtons = document.querySelectorAll("#main_container > main > section > ul > li > div > input.delete_button");

    for (let i = 0; i < editButtons.length; i++) {
        editButtons[i].addEventListener("click", function() {
            openDialog("Edit Department", ids[i].value);
        });
        deleteButtons[i].addEventListener("click", function() {
            openDialog("Delete Department", ids[i].value);
        });
        changeButtons[i].addEventListener("click", function() {
            openDialog("Assign Agent", ids[i].value);
        });
    }
}

setupDepartmentButtonListerners();
