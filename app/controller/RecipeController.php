<?php

require_once("app/model/Recipe/Recipe.php");
require_once("app/model/Recipe/RecipeManager.php");

class RecipeController extends ApplicationController {

    static function show() {
        global $RENDER_VARS;
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

    static function create() {
        if (static::isCreateRequest()) {
            $name = $_POST["recipe-name"];
            $desc = $_POST["recipe-description"];
            $ingredients = $_POST["recipe-ingredients"];
            $instructions = $_POST["recipe-instructions"];
            $recipe_info = RecipeManager::registerNewRecipe($name, $desc, $ingredients, $instructions);
            static::processNewRecipeResponse($recipe_info);
        }
    }

    static function isCreateRequest() {
        return isset($_POST["recipe-name"]) && 
            isset($_POST["recipe-description"]) &&
            isset($_POST["recipe-ingredients"]) &&
            isset($_POST["recipe-instructions"]); 
    }

    static function processNewRecipeResponse($recipe_info) {
        if (!empty($recipe_info)) {
            header("Location: ?page=recipe&id=" . $recipe_info["id"]);
        }
    }

    static function post() {}
    static function destroy() {}
    static function update() {}
}

RecipeController::manageRequest();

?>