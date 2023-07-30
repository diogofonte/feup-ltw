document.querySelector("#header_buttons > a").addEventListener("click", function() {
    openDialog("Add Ticket");
});

document.querySelector("#menu-icon").addEventListener("click", function() {
    openNav();
});

document.querySelector("#sidenav > a").addEventListener("click", function() {
    closeNav();
});
