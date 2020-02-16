<?php

require_once("app/model/Recipe/Recipe.php");
require_once("app/model/Recipe/RecipeManager.php");

$RENDER_VARS["css"] = ["app/view/Recipe/css/recipe.css"];
$RENDER_VARS["js"] = ["app/view/Recipe/js/recipe.js"];

$recipe = RecipeManager::getRecipeById($_GET["id"]);

$RENDER_VARS = array_merge($RENDER_VARS, $recipe.getRenderInformation());

require("app/template/recipe.phtml");
?>