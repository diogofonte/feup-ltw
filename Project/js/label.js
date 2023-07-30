let color;
let isUserVar;
let isAddVar;
let listID;

// ADD

function addHashtag() {
    let name = document.querySelector(".modal-content input[name=hashtagName]").value;

    if (name == "") return false;

    let request = new XMLHttpRequest();
    request.addEventListener("load", finishAddHashtag);
    request.open("post", "../actions/api_add_hashtag.php", true);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send(
        encodeForAjax({
        name: name,
        })
    );
}

function finishAddHashtag(event) {
    event.preventDefault();
    let ul = document.getElementsByClassName("fixed_accordion");
    let li;
    if (ul.length != 0) li = document.getElementsByClassName("fixed_accordion")[0].lastChild;
    let hashtag = JSON.parse(this.responseText);
    if (hashtag == "") {
        closeDialog("Add Hashtag");
        return;
    }

    if (ul.length != 0) {
        let newLi = document.createElement("li");
        newLi.innerHTML ='<p>#' + htmlEntities(hashtag.name) + '</p><div>' +
        '<input type="hidden" name="hashtagID" value="' + hashtag.id + '">' +
        '<input class="edit_button" type="button" value="Edit" style="margin-right:4px;">' +
        '<input class="delete_button" type="button" value="Delete"></div>';
        ul[0].insertBefore(newLi, li);
    }
    
    document.querySelector(".modal-content input[name=hashtagName]").value = "";
    setupHashtagButtonListerners();
    closeDialog("Add Hashtag");
}

function addFAQ() {
    let question = document.querySelector(".modal-content input[name=faqQuestion]").value;
    let answer = document.querySelector(".modal-content input[name=faqAnswer]").value;

    if (question == "" || answer == "") return false;

    let request = new XMLHttpRequest();
    request.addEventListener("load", finishAddFAQ);
    request.open("post", "../actions/api_add_faq.php", true);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send(
        encodeForAjax({
        question: question,
        answer: answer
        })
    );
}

function finishAddFAQ(event) {
    event.preventDefault();
    let ul = document.getElementsByClassName("manage_accordion");
    let li;
    if (ul.length != 0) li = document.getElementsByClassName("manage_accordion")[0].lastChild;
    let faq = JSON.parse(this.responseText);
    if (faq == "") {
        closeDialog("Add FAQ");
        return;
    }

    if (ul.length != 0) {
        let newLi = document.createElement("li");
        newLi.innerHTML = '<input type="checkbox" name="manage_accordion" id="' + htmlEntities(faq.id) + '">' +
        '<label for="' + htmlEntities(faq.id) + '">' + htmlEntities(faq.question) + '</label>' +
        '<div class="manage_content"><p>' + htmlEntities(faq.answer) + '</p>' +
        '<input type="hidden" name="FAQID" value="' + faq.id + '">' +
        '<input class="edit_button" type="button" value="Edit" style="margin-right:4px;">' + 
        '<input class="delete_button" type="button" value="Delete"></div>';
        ul[0].insertBefore(newLi, li);
    }
    
    document.querySelector(".modal-content input[name=faqQuestion]").value = "";
    document.querySelector(".modal-content input[name=faqAnswer]").value = "";
    setupFAQButtonListerners();
    closeDialog("Add FAQ");
}



function addDepartment() {
    let nameValue = document.querySelector(".modal-content input[name=departmentName]").value;
    let colorValue = document.querySelector(".modal-content input[name=departmentColor]").value;
    
    if (nameValue == "" || colorValue == "" || colorValue == "#") return false;

    let request = new XMLHttpRequest();
    request.addEventListener("load", finishAddDepartment);
    request.open("post", "../actions/api_add_department.php", true);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send(
        encodeForAjax({
        departmentName: nameValue,
        departmentColor: colorValue
        })
    );
}

function finishAddDepartment(event) {
    event.preventDefault();
    let ul = document.getElementsByClassName("manage_accordion");
    let li;
    if (ul.length != 0) li = document.getElementsByClassName("manage_accordion")[0].lastChild;
    let department = JSON.parse(this.responseText);
    if (department == "") {
        closeDialog("Add Department");
        return;
    }

    if (ul.length != 0) {
        let newLi = document.createElement("li");
        newLi.innerHTML = '<input type="checkbox" name="manage_accordion" id="' + htmlEntities(department.id) + '">' +
        '<label for="' + htmlEntities(department.id) + '">' + htmlEntities(department.name) + '&nbsp;<div class="circle" style="background:' + htmlEntities(department.color) + '"></div></label>' +
        '<div class="manage_content"><input class="edit_button" type="button" value="Change Agent" style="margin-right:4px;">' +
        "<input type='hidden' name='departmentID' value='" + department.id + "'>" + 
        '<input class="edit_button" type="button" value="Edit" style="margin-right:4px;">' +
        '<input class="delete_button" type="button" value="Delete"></div>';
        ul[0].insertBefore(newLi, li);
    }
    
    document.querySelector(".modal-content input[name=departmentName]").value = "";
    document.querySelector(".modal-content input[name=departmentColor]").value = "#";
    setupDepartmentButtonListerners();
    closeDialog("Add Department");
}

// EDIT

function editHashtag() {
    let id = document.querySelector(".modal-content input[name=editHashtagID]").value;
    let name = document.querySelector(".modal-content input[name=hashtagNewName]").value;

    if (name == "") return false;

    let request = new XMLHttpRequest();
    request.addEventListener("load", finishEditHashtag);
    request.open("post", "../actions/action_edit_hashtag.php", true);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send(
        encodeForAjax({
        id: id,
        name: name,
        })
    );
}

function finishEditHashtag(event) {
    event.preventDefault();
    let ul = document.getElementsByClassName("fixed_accordion");
    let li;
    let hashtag = JSON.parse(this.responseText);
    if (hashtag == "") {
        location.reload();
        document.querySelector("input[name=hashtagNewName]").value = "";
        closeDialog("Edit Hashtag");
        return;
    }
    if (ul.length != 0) {
        for (let i = 0; i < ul[0].children.length; i++) {
            if (ul[0].children[i].querySelector("p").innerText == "#" + hashtag.old_name) {
                li = ul[0].children[i].querySelector("p");
                break;
            }
        }
    }
    li.innerText = "#" + hashtag.name;
    document.querySelector("input[name=hashtagNewName]").value = "";
    closeDialog("Edit Hashtag");
}

function editDepartment() {
    let id = document.querySelector(".modal-content input[name=editDepartmentID]").value;
    let name = document.querySelector(".modal-content input[name=departmentNewName]").value.trim();
    let color = document.querySelector(".modal-content input[name=departmentNewColor]").value;

    if (name == "" && color == "" && color == "#") return false;
    let request = new XMLHttpRequest();
    request.addEventListener("load", finishEditDepartment);
    request.open("post", "../actions/action_edit_department.php", true);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send(
        encodeForAjax({
        id: id,
        name: name,
        color: color,
        })
    );
}

function finishEditDepartment(event) {
    event.preventDefault();
    let ul = document.getElementsByClassName("manage_accordion");
    let li;
    let department = JSON.parse(this.responseText);
    if (department == "") {
        location.reload();
        document.querySelector("input[name=departmentNewName]").value = "";
        document.querySelector("input[name=departmentNewColor]").value = "#";
        closeDialog("Edit Department");
        return;
    }
    if (ul.length != 0) {
        for (let i = 0; i < ul[0].children.length; i++) {
            if (ul[0].children[i].querySelector("label").innerText.trim() == department.old_name) {
                li = ul[0].children[i].querySelector("label");
                break;
            }
        }
    }
    li.innerHTML = htmlEntities(department.name) + '&nbsp;<div class="circle" style="background:' + htmlEntities(department.color) + '"></div>';
    document.querySelector("input[name=departmentNewName]").value = "";
    document.querySelector("input[name=departmentNewColor]").value = "#";
    closeDialog("Edit Department");
}

function editFAQ() {
    let id = document.querySelector(".modal-content input[name=editFAQID]").value;
    let answer = document.querySelector(".modal-content input[name=faqNewAnswer]").value;

    if (answer == "") return false;

    let request = new XMLHttpRequest();
    request.addEventListener("load", finishEditFAQ);
    request.open("post", "../actions/action_edit_faq.php", true);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send(
        encodeForAjax({
        id: id,
        answer: answer,
        })
    );
}

function finishEditFAQ(event) {
    event.preventDefault();
    let ul = document.getElementsByClassName("manage_accordion");
    let li;
    let faq = JSON.parse(this.responseText);
    if (faq == "") {
        location.reload();
        document.querySelector("input[name=faqNewAnswer]").value = "";
        closeDialog("Edit FAQ");
        return;
    }
    if (ul.length != 0) {
        li = ul[0].querySelector("li label[for='" + faq.id + "']");
        for (let i = 0; i < ul[0].children.length; i++) {
            if (ul[0].children[i].querySelector("label") == li) {
                ul[0].children[i].querySelector("div.manage_content p").innerText = faq.answer;
                break;
            }
        }
    }
    document.querySelector("input[name=faqNewAnswer]").value = "";
    closeDialog("Edit FAQ");
}

function changeUserRole() {
    let id = document.querySelector(".modal-content input[name=changeUserRoleID]").value;
    let role;
    if (document.querySelector("input[type=radio][name=role]:checked") != null) {
        role = document.querySelector("input[type=radio][name=role]:checked").getAttribute("id").substring(4);
        document.querySelector("input[type=radio][name=role]:checked").checked = false;
    };
    
    let request = new XMLHttpRequest();
    request.addEventListener("load", finishChangeUserRole);
    request.open("post", "../actions/action_change_user_role.php", true);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send(encodeForAjax({userID: id,
                                role: role}));
}

function finishChangeUserRole(event) {
    event.preventDefault();
    let ul = document.getElementsByClassName("manage_accordion");
    let li;
    let user = JSON.parse(this.responseText);
    if (user == "") {
        location.reload();
        closeDialog("Change Role");
        return;
    }
    if (ul.length != 0) {
        for (let i = 0; i < ul[0].children.length; i++) {
            if (ul[0].children[i].querySelector("label").innerText.trim() == user.username + ' - ' + user.old_role) {
                li = ul[0].children[i].querySelector("label");
                break;
            }
        }
    }
    if (user.role == "admin") {
        li.innerHTML = htmlEntities(user.username) + ' - ' + htmlEntities(user.role);
    } else {
        li.innerHTML = htmlEntities(user.username) + ' - ' + htmlEntities(user.role) + "<input class='change_permissions_button edit_button' type='button' value='Change'><input type='hidden' name='userID' value='" + user.id + "'>";
    }
    setupPeopleButtonListerners();
    closeDialog("Change Role");
}

// DELETE

function deleteHashtag() {
    let id = document.querySelector(".modal-content input[name=deleteHashtagID]").value;

    let request = new XMLHttpRequest();
    request.addEventListener("load", finishDeleteHashtag);
    request.open("post", "../actions/action_delete_hashtag.php", true);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send(
        encodeForAjax({
        id: id,
        })
    );
}

function finishDeleteHashtag(event) {
    event.preventDefault();
    let ul = document.getElementsByClassName("fixed_accordion");
    let li;
    let hashtag = JSON.parse(this.responseText);
    if (hashtag == "") {
        location.reload();
        closeDialog("Delete Hashtag");
        return;
    }
    if (ul.length != 0) {
        for (let i = 0; i < ul[0].children.length; i++) {
            if (ul[0].children[i].querySelector("p").innerText == "#" + hashtag.name) {
                li = ul[0].children[i];
                break;
            }
        }
    }
    li.remove();
    closeDialog("Delete Hashtag");
}

function deleteDepartment() {
    let id = document.querySelector(".modal-content input[name=deleteDepartmentID]").value;

    let request = new XMLHttpRequest();
    request.addEventListener("load", finishDeleteDepartment);
    request.open("post", "../actions/action_delete_department.php", true);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send(
        encodeForAjax({
        id: id,
        })
    );
}

function finishDeleteDepartment(event) {
    event.preventDefault();
    let ul = document.getElementsByClassName("manage_accordion");
    let li;
    let department = JSON.parse(this.responseText);
    if (department == "") {
        location.reload();
        closeDialog("Delete Department");
        return;
    }
    if (ul.length != 0) {
        for (let i = 0; i < ul[0].children.length; i++) {
            if (ul[0].children[i].querySelector("label").innerText.trim() == department.name) {
                li = ul[0].children[i];
                break;
            }
        }
    }
    li.remove();
    closeDialog("Delete Department");
}

function deleteFAQ() {
    let id = document.querySelector(".modal-content input[name=deleteFAQID]").value;

    let request = new XMLHttpRequest();
    request.addEventListener("load", finishDeleteFAQ);
    request.open("post", "../actions/action_delete_faq.php", true);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send(
        encodeForAjax({
        id: id,
        })
    );
}

function finishDeleteFAQ(event) {
    event.preventDefault();
    let ul = document.getElementsByClassName("manage_accordion");
    let li;
    let faq = JSON.parse(this.responseText);
    if (faq == "") {
        location.reload();
        closeDialog("Delete FAQ");
        return;
    }
    li = ul[0].querySelector("li label[for='" + faq.id + "']");
    for (let i = 0; i < ul[0].children.length; i++) {
        if (ul[0].children[i].querySelector("label") == li) {
            ul[0].children[i].remove();
            break;
        }
    }
    closeDialog("Delete FAQ");
}

function deleteUser() {
    let id = document.querySelector(".modal-content input[name=deleteUserID]").value;

    let request = new XMLHttpRequest();
    request.addEventListener("load", finishDeleteUser);
    request.open("post", "../actions/action_delete_user.php", true);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send(
        encodeForAjax({
        id: id,
        })
    );
}

function finishDeleteUser(event) {
    event.preventDefault();
    let ul = document.getElementsByClassName("manage_accordion");
    let li;
    let user = JSON.parse(this.responseText);
    if (user == "") {
        location.reload();
        closeDialog("Delete User");
        return;
    }
    if (ul.length != 0) {
        for (let i = 0; i < ul[0].children.length; i++) {
            if (ul[0].children[i].querySelector("label").innerText.trim() == user.username + ' - ' + user.role) {
                li = ul[0].children[i];
                break;
            }
        }
    }
    li.remove();
    closeDialog("Delete User");
}

function addMessage() {
    let message = document.querySelector("#messages input[type=text]").value;

    if (message == "" || message == null) return false;

    let request = new XMLHttpRequest();
    request.addEventListener("load", finishAddMessage);
    request.open("post", "../actions/api_add_message.php", true);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send(
        encodeForAjax({
        message: message,
        })
    );
}

function finishAddMessage(event) {
    event.preventDefault();

    let data = JSON.parse(this.responseText);
    if (data == "") {
        return;
    }
    let messages = data.messages;
    let users = data.users;
    let ul = document.querySelector("#ticket_container #messages ul");
    ul.innerHTML = "";
    let li;
    for (let i = 0; i < messages.length; i++) {
        li = document.createElement("li");
        li.innerHTML = "<p><strong>" + htmlEntities(users[i]) + "</strong> " + htmlEntities(messages[i].message) + "<strong> " + htmlEntities(messages[i].message_date) + "</strong></p>";
        ul.appendChild(li);
    }
    document.querySelector("#messages input[type=text]").value = "";
}

function searchDepartment(color) {
    let all = document.querySelectorAll(".list_box");
    if (all == null) return;
    for (let i = 0; i < all.length; i++) {
        all[i].style.display = "none";
    }
    let newcolor = "." + color;
    let selected = document.querySelectorAll(newcolor);

    if (selected == null) return;
    for (let i = 0; i < selected.length; i++) {
        selected[i].style.display = "flex";
    }
}

function resetSearchDepartment() {
    let all = document.querySelectorAll(".list_box");
    if (all == null) return;
    for (let i = 0; i < all.length; i++) {
        all[i].style.display = "flex";
    }
}

function addAgentDepartment() {
    let id = document.querySelector(".modal-content input[name=assignAgentDepartment]").value;
    let agent;
    if (document.querySelector("input[type=radio][name=agent]:checked") != null) {
        agent = document.querySelector("input[type=radio][name=agent]:checked").getAttribute("id").substring(5);
        document.querySelector("input[type=radio][name=agent]:checked").checked = false;
    };
    
    let request = new XMLHttpRequest();
    request.addEventListener("load", finishAddAgentDepartment);
    request.open("post", "../actions/action_add_agent_department.php", true);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send(encodeForAjax({departmentID: id,
                                agent: agent}));
}

function finishAddAgentDepartment(event) {
    event.preventDefault();
    let ul = document.getElementsByClassName("manage_accordion");
    let li;
    let department = JSON.parse(this.responseText);
    if (department == "") {
        location.reload();
        closeDialog("Assign Agent");
        return;
    }
    if (ul.length != 0) {
        for (let i = 0; i < ul[0].children.length; i++) {
            if (ul[0].children[i].querySelector("label").innerText.trim() == department.name) {
                li = ul[0].children[i].querySelector("div.manage_content");
                break;
            }
        }
    }
    li.innerHTML = "";
    let newP = document.createElement("p");
    newP.innerHTML = "<em style='font-weight:bold'>Assigned To: </em>";
    li.appendChild(newP);
    for (let i = 0; i < department.agents.length; i++) {
        newP = document.createElement("p");
        newP.innerHTML = "<span class='lnr lnr-arrow-right'>&nbsp;</span>" + department.agents[i];
        li.appendChild(newP);
    }
    let inputs = "<input class='edit_button' type='button' value='Change Agent' style='margin-right: 4px;'>" +
        "<input type='hidden' name='departmentID' value='" + department.id + "'>" + 
        "<input class='edit_button' type='button' value='Edit' style='margin-right: 4px;'>" +
        "<input class='delete_button' type='button' value='Delete'>";
    li.innerHTML += inputs;
    setupDepartmentButtonListerners();
    closeDialog("Assign Agent");
}

function removeAgentDepartment() {
    let id = document.querySelector(".modal-content input[name=assignAgentDepartment]").value;
    let agent;
    if (document.querySelector("input[type=radio][name=agent]:checked") != null) {
        agent = document.querySelector("input[type=radio][name=agent]:checked").getAttribute("id").substring(5);
        document.querySelector("input[type=radio][name=agent]:checked").checked = false;
    };
    
    let request = new XMLHttpRequest();
    request.addEventListener("load", finishRemoveAgentDepartment);
    request.open("post", "../actions/action_remove_agent_department.php", true);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send(encodeForAjax({departmentID: id,
                                agent: agent}));
}

function finishRemoveAgentDepartment(event) {
    event.preventDefault();
    let ul = document.getElementsByClassName("manage_accordion");
    let li;
    let department = JSON.parse(this.responseText);
    if (department == "") {
        location.reload();
        closeDialog("Assign Agent");
        return;
    }
    if (ul.length != 0) {
        for (let i = 0; i < ul[0].children.length; i++) {
            if (ul[0].children[i].querySelector("label").innerText.trim() == department.name) {
                li = ul[0].children[i].querySelector("div.manage_content");
                break;
            }
        }
    }
    for (let i = 0; i < li.childNodes.length; i++) {
        if (li.childNodes[i].innerText != undefined) {
            if (li.childNodes[i].innerText.trim() == department.agent) {
                li.childNodes[i].remove();
                break;
            }
        }
    }
    if (li.querySelector("span.lnr.lnr-arrow-right") == null) {
        for (let i = 0; i < li.childNodes.length; i++) {
            if (li.childNodes[i].innerText == "Assigned To:") {
                li.childNodes[i].remove();
                break;
            }
        }
    }
    closeDialog("Assign Agent");
}

function changeAgentTicket() {
    let agent;
    if (document.querySelector("input[type=radio][name=agent]:checked") != null) {
        agent = document.querySelector("input[type=radio][name=agent]:checked").getAttribute("id").substring(5);
        document.querySelector("input[type=radio][name=agent]:checked").checked = false;
    } else {
        return false;
    }
    
    let request = new XMLHttpRequest();
    request.addEventListener("load", finishChangeAgentTicket);
    request.open("post", "../actions/action_change_agent_ticket.php", true);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send(encodeForAjax({agent: agent}));
}

function finishChangeAgentTicket(event) {
    event.preventDefault();
    let agent = JSON.parse(this.responseText);
    if (agent == "") {
        location.reload();
        closeDialog("Assign Agent");
        return;
    }
    let p = document.querySelector("#ticket_container #agent");
    let newP = "<p id='agent'><strong><em>Assigned To: </em></strong>" + htmlEntities(agent.name) + " &nbsp; " +
        "<input class='edit_button' type='button' value='Change Agent'></p>";
    p.outerHTML = newP;
    if (agent.assigned) {
        p = document.querySelector("#ticket_container #status");
        newP = "<p id='status'><strong><em>Status: </em></strong>Assigned &nbsp; " +
            "<input class='edit_button' type='button' value='Change Status'></p>";
        p.outerHTML = newP;
    }
    reloadHistory(agent.ticket_update);
    closeDialog("Assign Agent");
}

function removeAgentTicket() {
    let agent;
    if (document.querySelector("input[type=radio][name=agent]:checked") != null) {
        agent = document.querySelector("input[type=radio][name=agent]:checked").getAttribute("id").substring(5);
        document.querySelector("input[type=radio][name=agent]:checked").checked = false;
    };
    
    let request = new XMLHttpRequest();
    request.addEventListener("load", finishRemoveAgentTicket);
    request.open("post", "../actions/action_remove_agent_department.php", true);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send(encodeForAjax({departmentID: id,
                                agent: agent}));
}

function finishRemoveAgentTicket(event) {
    event.preventDefault();
    let ul = document.getElementsByClassName("manage_accordion");
    let li;
    let department = JSON.parse(this.responseText);
    if (department == "") {
        location.reload();
        closeDialog("Assign Agent");
        return;
    }
    if (ul.length != 0) {
        for (let i = 0; i < ul[0].children.length; i++) {
            if (ul[0].children[i].querySelector("label").innerText.trim() == department.name) {
                li = ul[0].children[i].querySelector("div.manage_content");
                break;
            }
        }
    }
    for (let i = 0; i < li.childNodes.length; i++) {
        if (li.childNodes[i].innerText != undefined) {
            if (li.childNodes[i].innerText.trim() == department.agent) {
                li.childNodes[i].remove();
                break;
            }
        }
    }
    if (li.querySelector("span.lnr.lnr-arrow-right") == null) {
        for (let i = 0; i < li.childNodes.length; i++) {
            if (li.childNodes[i].innerText == "Assigned To:") {
                li.childNodes[i].remove();
                break;
            }
        }
    }
    closeDialog("Assign Agent");
}

function changeDepartment() {
    let department;
    if (document.querySelector("input[type=radio][name=department]:checked") != null) {
        department = document.querySelector("input[type=radio][name=department]:checked").getAttribute("id").substring(10);
        document.querySelector("input[type=radio][name=department]:checked").checked = false;
    } else {
        return false;
    }
    
    let request = new XMLHttpRequest();
    request.addEventListener("load", finishChangeDepartment);
    request.open("post", "../actions/api_change_department.php", true);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send(encodeForAjax({departmentID: department}));
}

function finishChangeDepartment(event) {
    event.preventDefault();
    let department = JSON.parse(this.responseText);
    if (department == "") {
        location.reload();
        closeDialog("Change Department");
        return;
    }
    let p = document.querySelector("#ticket_container #department");
    let newP = "<p id='department'><strong><em>Department: </em></strong>" + htmlEntities(department.name) + " &nbsp; " +
        "<input class='edit_button' type='button' value='Change Department'></p>";
    p.outerHTML = newP;
    reloadHistory(department.ticket_update);
    changeButtonDepartment();
    closeDialog("Change Department");
}

function changeStatus() {
    let status;
    if (document.querySelector("input[type=radio][name=status]:checked") != null) {
        status = document.querySelector("input[type=radio][name=status]:checked").getAttribute("id").substring(6);
        document.querySelector("input[type=radio][name=status]:checked").checked = false;
    } else {
        return false;
    }
    
    let request = new XMLHttpRequest();
    request.addEventListener("load", finishChangeStatus);
    request.open("post", "../actions/api_change_status.php", true);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send(encodeForAjax({status: status}));
}

function finishChangeStatus(event) {
    event.preventDefault();
    let status = JSON.parse(this.responseText);
    if (status == "") {
        location.reload();
        closeDialog("Change Status");
        return;
    }
    let p = document.querySelector("#ticket_container #status");
    let newP = "<p id='status'><strong><em>Status: </em></strong>" + htmlEntities(status.name).charAt(0).toUpperCase() + htmlEntities(status.name).slice(1) + " &nbsp; " +
        "<input class='edit_button' type='button' value='Change Status' onclick='openDialog(\"Change Status\")'></p>";
    p.outerHTML = newP;
    reloadHistory(status.ticket_update);
    changeButtonStatus();
    closeDialog("Change Status");
}

function changePriority() {
    let priority;
    if (document.querySelector("input[type=radio][name=priority]:checked") != null) {
        priority = document.querySelector("input[type=radio][name=priority]:checked").getAttribute("id").substring(8);
        document.querySelector("input[type=radio][name=priority]:checked").checked = false;
    } else {
        return false;
    }
    
    let request = new XMLHttpRequest();
    request.addEventListener("load", finishChangePriority);
    request.open("post", "../actions/api_change_priority.php", true);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send(encodeForAjax({priority: priority}));
}

function finishChangePriority(event) {
    event.preventDefault();
    let priority = JSON.parse(this.responseText);
    if (priority == "") {
        location.reload();
        closeDialog("Change Priority");
        return;
    }
    let p = document.querySelector("#ticket_container #priority");
    let newP = "<p id='priority'><strong><em>Priority: </em></strong>" + htmlEntities(priority.name).charAt(0).toUpperCase() + htmlEntities(priority.name).slice(1) + " &nbsp; " +
        "<input class='edit_button' type='button' value='Change Priority' onclick='openDialog(\"Change Priority\")'></p>";
    p.outerHTML = newP;
    reloadHistory(priority.ticket_update);
    changeButtonPriority();
    closeDialog("Change Priority");
}

function reloadHistory(ticket_update) {
    let ul = document.querySelector("#ticket_container #history ul");
    ul.innerHTML = "";
    let li;
    for (let i = 0; i < ticket_update.length; i++) {
        li = document.createElement("li");
        li.innerHTML = "<p>" + ticket_update[i].description + " <strong>" + ticket_update[i].update_date + "</strong></p>";
        ul.appendChild(li);
    }
}

function addTicket() {
    let department, priority, title, description;
    if (document.querySelector("input[type=radio][name=department]:checked") != null && document.querySelector("input[type=radio][name=priority]:checked") != null
    && document.querySelector("input[type=text][name=title]").value.trim() != "" && document.querySelector("textarea[name=description]").value.trim() != "") {
        department = document.querySelector("input[type=radio][name=department]:checked").getAttribute("id").substring(10);
        document.querySelector("input[type=radio][name=department]:checked").checked = false;
        priority = document.querySelector("input[type=radio][name=priority]:checked").getAttribute("id").substring(8);
        document.querySelector("input[type=radio][name=priority]:checked").checked = false;
        title = document.querySelector("input[type=text][name=title]").value.trim();
        document.querySelector("input[type=text][name=title]").value = "";
        description = document.querySelector("textarea[name=description]").value.trim();
        document.querySelector("textarea[name=description]").value = "";
    } else {
        return false;
    }

    let request = new XMLHttpRequest();
    request.addEventListener("load", finishAddTicket);
    request.open("post", "../actions/api_add_ticket.php", true);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send(encodeForAjax({
        title: title,
        description: description,
        department: department,
        priority: priority,
    }));
}

function finishAddTicket(event) {
    event.preventDefault();
    let ticket = JSON.parse(this.responseText);
    if (ticket == "") {
        location.reload();
        closeDialog("Add Ticket");
        return;
    }

    let grid_container = document.querySelector("#grid_container");
    let div = document.createElement("div");
    div.className = "list_box color" + ticket.color;
    div.innerHTML = "<div id='list_box_header'><h1>" + ticket.title + " #" + ticket.id + "</h1><button>" +
    "<i class='fa fa-bookmark' aria-hidden='true' style='color: " + ticket.color + "'></i></button></div>" +
    "<form action='../../actions/action_show_ticket.php' method='post' style='margin: auto'><input type='hidden' name='ticket_id' value='" + ticket.id + "'>" +
    "<input type='submit' value='See More'></form>";
    grid_container.appendChild(div);

    closeDialog("Add Ticket");
}

function htmlEntities(str) {
    return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}