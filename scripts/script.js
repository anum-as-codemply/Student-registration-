function setFormMessage(formElement, type, message) {
    const messageElement = formElement.querySelector(".form__message");

    messageElement.textContent = message;
    messageElement.classList.remove("form__message--success", "form__message--error");
    messageElement.classList.add(`form__message--${type}`);
}

function setInputError(inputElement, message) {
    inputElement.classList.add("form__input--error");
    inputElement.parentElement.querySelector(".form__input-error-message").textContent = message;
}

function clearInputError(inputElement) {
    inputElement.classList.remove("form__input--error");
    inputElement.parentElement.querySelector(".form__input-error-message").textContent = "";
}

document.addEventListener("DOMContentLoaded", () => {
    const loginForm = document.querySelector("#login");
    const createAccountForm = document.querySelector("#createAccount");

    document.querySelector("#linkCreateAccount").addEventListener("click", e => {
        e.preventDefault();
        loginForm.classList.add("form--hidden");
        createAccountForm.classList.remove("form--hidden");
    });

    document.querySelector("#linkLogin").addEventListener("click", e => {
        e.preventDefault();
        loginForm.classList.remove("form--hidden");
        createAccountForm.classList.add("form--hidden");
    });
	
    createAccountForm.addEventListener("submit", e => {
		//e.preventDefault();
        document.querySelectorAll(".form__input").forEach(inputElement => {
			inputElement.addEventListener("blur", e => {
				if (e.target.id === "signupUsername" && !e.target.value.match("[0-9]{5}-[0-9]{7}-[0-9]{1}")) {
					e.preventDefault();
					setInputError(inputElement, "CNIC must be of format XXXXX-XXXXXXXX-X");
					
				}
				if (e.target.id === "signupPassword" && !e.target.value.match("(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,}")) {
					e.preventDefault();
					
					setInputError(inputElement, "Password must contain lower & uppercase letters and digits with minimum length 8");
				}
			});

			inputElement.addEventListener("input", e => {
				clearInputError(inputElement);
			});
		});

        //setFormMessage(loginForm, "error", "Invalid username/password");
    });

});