<?php

class Router {
    static function route() {
        if (static::isCSRFValid()) {
            $page = static::getRequestVar("page", "home");
            static::loadController($page);
        } else {
            ApplicationController::renderNotAcceptable();
        }
    }

    private static function isCSRFValid() {
        $success = true;
        if ($_SERVER["REQUEST_METHOD"] != "GET") {
            if (!isset($_REQUEST["csrf_token"]) || !hash_equals($_REQUEST["csrf_token"], $_SESSION["csrf_token"])) {
                $success = false;
            }
        }
        return $success;
    }

    static function getRequestVar($key, $default='') {
        return isset($_REQUEST[$key]) ? $_REQUEST[$key] : $default;
    }

    private static function loadController($page_name) {
        $controller_name = ucfirst($page_name) . "Controller.php";
        $controller_path = "app/controller/$controller_name";
        if(file_exists($controller_path)) {
            require($controller_path);
        } else {
            ApplicationController::renderNotFound();
        }
    }

}

Router::route();

?>