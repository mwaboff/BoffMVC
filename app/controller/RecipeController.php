<?php

require_once("app/model/Recipe/Recipe.php");
require_once("app/model/Recipe/RecipeManager.php");

class RecipeController extends ApplicationController {

    static function show() {
        global $RENDER_VARS;
        echo "<pre>";
        if (isset($_GET["id"]) && RecipeManager::isValidRecipeId($_GET["id"])) {
            require("app/view/Recipe/Recipe.php");
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