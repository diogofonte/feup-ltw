function addNewTicket() {
    let title = document.querySelector("input[name=title]").value;
    let description = document.querySelector("textarea[name=description]").value;
    let priority = document.querySelector("input[type=radio][name=priority]:checked");
    let department = document.querySelector("#label_form h2");
    if(priority != null) priority = priority.getAttribute("id");
    if(priority != null) priority = priority.substr(8);
    if(department != null) department = department.getAttribute("id");
    createTicketAjax(department, title, description, status, priority);
}

function createTicketAjax(department, title, description, status, priority) {
    let request = new XMLHttpRequest();
    request.open("post", "../actions/api_add_ticket.php", true);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send(encodeForAjax({ departmentID: department,
                                 title: title,
                                 description: description,
                                 status: status,
                                 priority: priority}));
    location.reload();
}