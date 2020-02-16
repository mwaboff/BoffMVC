(function () {

    function main() {
        setFormSubmitHandler();
        setLoginFieldEventHandler();
        setLoginButtonEventHandler();
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

    function setLoginButtonEventHandler() {
        let login_button = document.getElementById("login-button");
        login_button.addEventListener("click", clickLoginButton);
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

    function clickLoginButton() {
        console.log('555555');
        event.preventDefault();
        window.location="?page=login";
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