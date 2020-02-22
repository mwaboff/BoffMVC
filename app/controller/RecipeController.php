<?php

require_once("app/model/Recipe/Recipe.php");
require_once("app/model/Recipe/RecipeManager.php");
require_once("app/model/Media/Image.php");

class RecipeController extends ApplicationController {

    static function show() {
        global $RENDER_VARS;
        if (static::isValidRecipeIdRequest()) {
            if (isset($_GET["action"]) && $_GET["action"] == "edit") {
                require("app/view/Recipe/RecipeEdit.php");
            } elseif (isset($_GET["action"]) && $_GET["action"] == "delete") {
                static::destroy();
            } else {
                require("app/view/Recipe/Recipe.php");
            }
            
        } elseif (isset($_GET["action"]) && $_GET["action"] == "create") {
            require("app/view/Recipe/RecipeCreate.php");
        }  else {
            require(CONFIG["404_page"]);
        }
    }

    static function isValidRecipeIdRequest() {
        return isset($_REQUEST["id"]) && RecipeManager::isValidRecipeId($_REQUEST["id"]);
    }

    static function destroy() {
        $recipe = RecipeManager::getRecipeById($_REQUEST["id"]);
        if (RecipeManager::isValidRecipeEditor($recipe, $_SESSION["id"])) {
            RecipeManager::deleteRecipe($recipe);
            header("Location: ?page=home");
        } else {
            print("You are not a valid editor for this page.");
        }
        
    }

    static function create() {
        if (static::isCreateRequest()) {
            // print("<pre>");
            print_r($_FILES);
            $pic = new Image($_FILES["recipe-picture"]);
            print("<br>" . $pic->testValidity());

            // $name = $_POST["recipe-name"];
            // $desc = $_POST["recipe-description"];
            // $ingredients = $_POST["recipe-ingredients"];
            // $instructions = $_POST["recipe-instructions"];
            // $recipe_info = RecipeManager::registerNewRecipe($name, $desc, $ingredients, $instructions);
            // static::processNewRecipeResponse($recipe_info);
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
    
    static function update() {
        if (static::isValidRecipeIdRequest() && isset($_REQUEST["action"]) && $_REQUEST["action"] == "edit") {
            if (static::isCreateRequest()) {
                static::processUpdate();
                header("Location: ?page=recipe&id=" . $_REQUEST["id"]);
            }
        }
    }

    static function processUpdate() {
        if (!static::isValidRecipeIdRequest()) {
            header("Location: ?page=home");
        }
        $recipe = RecipeManager::getRecipeById($_REQUEST["id"]);
        if (RecipeManager::isValidRecipeEditor($recipe, $_SESSION["id"])) {
            $recipe->setName($_POST["recipe-name"]);
            $recipe->setDescription($_POST["recipe-description"]);
            $recipe->setIngredients($_POST["recipe-ingredients"]);
            $recipe->setInstructions($_POST["recipe-instructions"]);
            $recipe->commit();
        } else {
            print("You are not a valid editor for this page.");
        }
    }

    static function post() {}

}

RecipeController::manageRequest();

?>