<?php

class HomeController extends ApplicationController {

    static function show() {
        global $RENDER_VARS;
        require("app/view/Home/Home.php");
    }

    static function create() {}
    static function destroy() {}
    static function update() {}
    static function post() {}

}

HomeController::manageRequest();

?>