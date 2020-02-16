// Michael Aboff - DSN6060 - Week 3

(function () {

    function main() {
        setFormSubmitHandler();
        setLoginFieldEventHandler();
        setGuestButtonEventHandler();
        setRegisterButtonEventHandler();
    }

    function setFormSubmitHandler() {
        let login_form = document.getElementById("login-form");
        login_form.addEventListener("submit", overrideSubmit);
    }

    function setLoginFieldEventHandler() {
        let login_fields = document.getElementsByClassName("login-field");
        for (let i = 0; i < login_fields.length; i++) {
            login_fields[i].addEventListener("focusout", clearBadStatus);
        }
    }

    function setGuestButtonEventHandler() {
        let guest_button = document.getElementById("guest-button");
        guest_button.addEventListener("click", clickGuestButton);
    }

    function setRegisterButtonEventHandler() {
        let register_button = document.getElementById("register-button");
        register_button.addEventListener("click", clickRegisterButton);
    }

    function overrideSubmit() {
        event.preventDefault();

        if (isFormValid()) {
            event.target.submit();
        } else {
            manageInvalidForm();
        }
    }

    function clearBadStatus() {
        event.target.classList.remove("bad-login-field");
    }

    function clickGuestButton() {
        event.preventDefault();
        insertDefaultLoginCredentials();
    }

    function clickRegisterButton() {
        event.preventDefault();
        window.location="?page=register";
    }

    function isFormValid() {
        let input_fields = document.getElementsByClassName("login-field");
        let is_valid = true;
        for (let i = 0; i < input_fields.length; i++) {
            if (!isFieldValid(input_fields[i])) {
                setFieldAsBad(input_fields[i]);
                is_valid = false;
            };
        }
        return is_valid;
    }

    function manageInvalidForm() {
        let error_elem = document.getElementById("login-error");
        error_elem.innerText = "Failed Login: You must fill all required fields.";
    }

    function insertDefaultLoginCredentials() {
        let username_field = document.getElementById("username-field");
        let password_field = document.getElementById("password-field");
        username_field.value = "guest";
        password_field.value = "guest";
    }

    function isFieldValid(login_field) {
        let value = login_field.value;
        let is_valid = true;
        if (!value) {
            is_valid = false;
        }
        return is_valid;
    }

    function setFieldAsBad(login_field) {
        login_field.classList.add("bad-login-field");
    }
    
    main();
})();