/* Auth Page */
const loginForm = document.querySelector("#login-form");
const signUpForm = document.querySelector("#sign-up-form");
const loginBtn = document.querySelector("#login");
const signUpBtn = document.querySelector("#sign-up");
const specialistInputs = document.querySelector("#specialist-inputs");
const roleRadioInputs = document.querySelectorAll("input[name='role']");

signUpBtn.addEventListener("click", function (e){
    e.preventDefault();
    loginForm.classList.toggle("d-none");
    signUpForm.classList.toggle("d-none");
});

loginBtn.addEventListener("click", function (e){
    e.preventDefault();
    loginForm.classList.toggle("d-none");
    signUpForm.classList.toggle("d-none");
});

roleRadioInputs.forEach((input) => {
    input.addEventListener("change", function () {
        if (this.value === "specialist") {
            specialistInputs.classList.remove("d-none");
        } else {
            specialistInputs.classList.add("d-none");
        }
    });
});