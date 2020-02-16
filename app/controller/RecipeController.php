<?php

require_once("app/model/Recipe/Recipe.php");
require_once("app/model/Recipe/RecipeManager.php");

class RecipeController extends ApplicationController {

    static function show() {
        global $RENDER_VARS;
        // echo "<pre>";
        if (isset($_GET["id"]) && RecipeManager::isValidRecipeId($_GET["id"])) {
            require("app/view/Recipe/Recipe.php");
        } elseif (isset($_GET["action"])) {
            static::routeAction();
        } else {
            require(CONFIG["404_page"]);
        }
    }

    static function routeAction() {
        if ($_GET["action"] == "create") {
            require("app/view/Recipe/RecipeCreate.php");
        } elseif ($_GET["action"] == "edit") {
            require("app/view/Recipe/RecipeEdit.php");
        } else {
            require(CONFIG["404_page"]);
        }
    }

    static function post() {}
    static function create() {}
    static function destroy() {}
    static function update() {}
}

RecipeController::manageRequest();

?>