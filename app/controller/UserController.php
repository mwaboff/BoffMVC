<?php

require_once("app/model/User/User.php");

class UserController extends ApplicationController {

    static function show() {
        global $RENDER_VARS;
        $user_id = Router::getRequestVar("uid", -1);
        if (UserManager::isValidUserId($user_id)) {
            require("app/view/User/User.php");
        } else {
            require(CONFIG["404_page"]);
        }
    }

    static function post() {}
    static function create() {}
    static function destroy() {}
    static function update() {}

}

UserController::manageRequest();

?>