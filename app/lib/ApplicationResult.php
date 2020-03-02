<?php

class ApplicationResult {

    function __construct($success=true, $result=null, $error_type="", $error_message="") {
        $this->success = $success;
        $this->error_type = $error_type;
        $this->error_message = $error_message;
        $this->result = $result;
    }

    function reset() {
        $this->success = true;
        $this->error_type = "";
        $this->error_message = "";
    }

    function isSuccess() {
        return $this->success;
    }

    function setSuccess() {
        $this->success = true;
    }

    function setFailure() {
        $this->success = false;
    }

    function setErrorType($new_type) {
        $this->error_type = $new_type;
    }

    function getErrorType() {
        return $this->error_type;
    }

    function setErrorMessage($new_message) {
        $this->error_message = $new_message;
    }

    function getErrorMessage() {
        return $this->error_message;
    }

    function setResult($new_result) {
        $this->result = $new_result;
    }

    function getResult() {
        return $this->result;
    }

    function processCaughtException($error) {
        $this->setFailure();
        $this->setErrorType($error.getCode());
        $this->setErrorMessage($error.getMessage());
    }

    function __toString() {
        $result = "Successful Result";
        if (!$this->success) {
            $result = "ERROR: $this->error_type: $this->error_message";
        }
        return $result;
    }
}


?>