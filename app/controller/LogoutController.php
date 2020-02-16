<?php

require_once("app/model/User/User.php");

class LoginController extends ApplicationController {

    static function show() {
        static::clearSession();
        require("app/view/Login/Login.php");
    }

    static function clearSession() {
        session_destroy();
        header("Location: index.php?page=home");
    }

    static function post() {}
    static function create() {}
    static function destroy() {}
    static function update() {}

}

LoginController::manageRequest();

?>