<?php

require_once("app/model/Media/Image.php");
require_once("app/model/Media/ImageController.php");

class MediaController extends ApplicationController {

    static function show() {
        global $RENDER_VARS;
        if(isset($_GET["id"])) {}
        require("app/view/Media/Image.php");
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

MediaController::manageRequest();

?>