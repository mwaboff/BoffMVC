var BOFF_FORM_CLASS_ID = "boff-bakery-form";

var BOFF_FORM_ERRORS = {
    "password": "Must contain at least 8 characters, at least one uppercase letter, a lowercase letter, and a number.",
    "required": "This is a required field."
};

class BoffForm {
    constructor(form_dom_elem) {
        this.form = form_dom_elem;
        this.input_fields = [];
        this.filterFields();
    }

    static findBoffFormsOnPage() {
        let boff_forms = [];
        let boff_form_elems = document.getElementsByClassName(BOFF_FORM_CLASS_ID);
        for (let i = 0; i < boff_form_elems.length; i++) {
            let new_form = new BoffForm(boff_form_elems.item(i));
            new_form.initialize();
            boff_forms.push(new_form);
        }
        return boff_forms;
    }

    filterFields() {
        for (let i = 0; i < this.form.length; i++) {
            switch(this.form[i].tagName) {
                case "INPUT":
                    this.input_fields.push(this.form[i]);
                    break;
                case "TEXTAREA":
                    this.input_fields.push(this.form[i]);
                    break;
            }
        }
    }

    initialize() {
        this.initializeForm();
        this.initializeInputs();
    }

    initializeForm() {
        this.form.addEventListener("submit", this.overrideFormSubmit.bind(this));
    }

    initializeInputs() {
        for (let i = 0; i < this.input_fields.length; i++) {    
            this.input_fields[i].addEventListener("focusout", this.clearBadStatusIfValid.bind(this));
        }
    }

    overrideFormSubmit() {
        console.log("on form submit button");
        event.preventDefault();
        if (this.isValidForm()) {
            console.log("attempting to submit form");
            event.target.submit();
        }
    }

    clearBadStatusIfValid() {
        if (this.isErroredField(event.target)) {
            this.clearError(event.target);
        }
    }

    isValidForm() {
        let is_valid = true;
        for (let i = 0; i < this.input_fields.length; i++) {
            if (!this.isValidField(this.input_fields[i])) {
                is_valid = false;
            }
        }
        return is_valid;
    }

    isValidField(field_elem) {
        let value = field_elem.value;
        let is_valid = true;
        let error_message = "";

        if (field_elem.type == "password") {
            is_valid = this.isValidPassword(value);
            error_message = BOFF_FORM_ERRORS["password"];
        } else if (value.length < 1) {
            is_valid = false;
            error_message = BOFF_FORM_ERRORS["required"];
        }

        if (!is_valid) this.setError(field_elem, error_message);

        return is_valid;
    }

    isValidPassword(value) {
        // Min 8 characters, atleast one of: capital letter, lower case letter, number.
        // Credit: modified from https://stackoverflow.com/a/21456918        
        let med_strength = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)?.{8,}$/;
        let result = value.match(med_strength);

        return (result != null);
    }

    setError(field_elem, err_msg) {
        if (!this.isErroredField(field_elem)) {
            this.setBadStatus(field_elem);
            let label_elem = this.getLabelOfInput(field_elem);
            if (label_elem) this.setBadErrorMessage(label_elem, err_msg);
        }
    }

    isErroredField(field_elem) {
        return field_elem.classList.contains("bad-field");
    }

    setBadStatus(field_elem) {
        field_elem.classList.add("bad-field");
    }

    // Searches for the label element for given input field.
    getLabelOfInput(field_elem) {
        let result = null;
        var label_elems = document.getElementsByTagName('label');
        for (var i = 0; i < label_elems.length; i++) {
            if (label_elems[i].htmlFor != '') {
                if (label_elems[i].htmlFor == field_elem.name) {
                    result = label_elems[i];
                }
            }
        }

        return result;
    }

    setBadErrorMessage(label_elem, err_msg) {
        let err_msg_node = this.createErrorMessageElem(err_msg);
        label_elem.appendChild(err_msg_node);
    }

    createErrorMessageElem(err_msg) {
        let node = document.createElement("span");
        node.classList.add("form-error-message");
        node.innerText = "Error: " + err_msg;
        return node;
    }

    clearError(field_elem) {
        this.clearBadStatus(field_elem);
        let label_elem = this.getLabelOfInput(field_elem);
        if (label_elem) this.clearBadErrorMessage(label_elem);
    }

    clearBadStatus(field_elem) {
        field_elem.classList.remove("bad-field");
    }

    clearBadErrorMessage(label_elem) {
        let err_msg_elem = label_elem.childNodes[1];
        label_elem.removeChild(err_msg_elem);
    }

}

BoffForm.findBoffFormsOnPage();