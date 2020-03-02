<?php

$RENDER_VARS = [];

class ApplicationController {
    static function create() {
        static::renderMethodNotAllowed();
    }
    static function show() {
        static::renderMethodNotAllowed();
    }
    static function post() {
        static::renderMethodNotAllowed();
    }
    static function update() {
        static::renderMethodNotAllowed();
    }
    static function destroy() {
        static::renderMethodNotAllowed();
    }

    function manageRequest() {
        switch ($_SERVER['REQUEST_METHOD']) {
            case "GET":
                static::show();
                break;
            case "POST":
                static::parsePOSTRequest();
            default:
                static::show();
                break;
        };
    }

    private static function parsePOSTRequest() {
        switch ($_REQUEST['_method']) {
            case "PUT":
                static::update();
                break;
            case "CREATE":
                static::create();
                break;
            case "DELETE":
                static::destroy();
                break;
            default:
                static::post();
                break;
        }
    }

    static function renderNotFound() {
        require_once(CONFIG["404_page"]);
    }

    static function renderUnauthorized() {
        require_once(CONFIG["401_page"]);
    }

    static function renderForbidden() {
        require_once(CONFIG["403_page"]);
    }

    static function renderNotAcceptable() {
        require_once(CONFIG["406_page"]);
    }

    static function renderMethodNotAllowed() {
        require_once(CONFIG["405_page"]);
    }

    static function renderNotImplemented() {
        require_once(CONFIG["501_page"]);
    }

}

?>