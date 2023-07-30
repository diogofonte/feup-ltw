let username = document.querySelector("form input[name=username]");
if (username) username.addEventListener("input", validateUsername, false);
let currpassword = document.querySelector("form input[name=currpassword]");
if (currpassword)
currpassword.addEventListener("input", validatePassword, false);
let password = document.querySelector("form input[name=password]");
if (password) password.addEventListener("input", validatePassword, false);
let passwordagain = document.querySelector("form input[name=passwordagain]");
if (passwordagain) passwordagain.addEventListener("keyup", validateRepeat.bind(passwordagain, password), false);

let register = document.querySelector("form.register_form");
if (register) register.addEventListener("submit", validateRegister, false);

function validateUsername() {
    if (!/^[0-9a-z]{6,}$/.test(this.value)) this.classList.add("invalid");
    else this.classList.remove("invalid");
}

function validatePassword(other) {
    if (!/^.*(?=.*[A-Z])(?=.*[!@#$&*])(?=.*[0-9]).{6,}$/.test(this.value))
        this.classList.add("invalid");
    else this.classList.remove("invalid");
}

function validateRepeat(password) {
    if (this.value !== password.value) this.classList.add("invalid");
    else this.classList.remove("invalid");
}

function validateRegister(event) {
    let inputs = this.querySelectorAll("input");
    for (let i = 0; i < inputs.length; i++)
        if (inputs[i].classList.contains("invalid")) event.preventDefault();
}
