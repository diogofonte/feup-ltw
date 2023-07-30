function linkHashtagToTicket() {
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

function finishLinkHashtagToTicket(event) {
    event.preventDefault();
    let agent = JSON.parse(this.responseText);
    if (agent == "") {
        location.reload();
        closeDialog("Assign Agent");
        return;
    }
    let p = document.querySelector("#ticket_container #agent");
    let newP = "<p id='agent'><strong><em>Assigned To: </em></strong>" + htmlEntities(agent.name) + " &nbsp; " +
        "<input class='edit_button' type='button' value='Change Agent' onclick='openDialog(\"Assign Agent\")'></p>";
    p.outerHTML = newP;
    if (agent.assigned) {
        p = document.querySelector("#ticket_container #status");
        newP = "<p id='status'><strong><em>Status: </em></strong>Assigned &nbsp; " +
            "<input class='edit_button' type='button' value='Change Status' onclick='openDialog(\"Change Status\")'></p>";
        p.outerHTML = newP;
    }
    reloadHistory(agent.ticket_update);
    closeDialog("Assign Agent");
}

function removeHashtagFromTicket() {
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

function finishRemoveHashtagFromTicket(event) {
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