<?php

require_once("app/db/DBManager.php");
require_once("Recipe.php");

class RecipeManager {

    static function isValidRecipeId($recipe_id) {
        return isPositiveInteger($recipe_id) && !empty(static::getRecipeById($recipe_id));
    }

    static function getRecipeById($id) {
        $result = null;
        $sql = "SELECT * FROM recipes WHERE id = :id";
        $query_result = DBManager::singleQuery($sql, ["id" => $id]);
        $result_array = $query_result["results"];
        if(!empty($result_array)) {
            $result = static::createSingleRecipeFromQuery($result_array[0]);;
        }
        return  $result;
    }

    static function createSingleRecipeFromQuery($result) {
        $id = $result["id"];
        $recipe_name = $result["recipe_name"];
        $author_id = $result["author_id"];
        $description = $result["description"];
        $ingredients = $result["ingredients"];
        $instructions = $result["instructions"];

        return new Recipe($recipe_name, $author_id, $description, $ingredients, $instructions, $id);
    }

    static function registerNewUser($username, $password, $email) {
        $result = [];
        $new_user = User::createNewUser($username, $password, $email);
        if($new_user) {
            $new_user->commit();
            $committed_user = static::getUserByUsername($username);
            $result = [
                "id" => $committed_user->getId(),
                "username" => $committed_user->getUsername()
            ];
        }
        return $result;
    }

    static function getAllRecipesByAge() {
        $sql = "SELECT * FROM recipes ORDER BY create_date";
        $query_result = DBManager::singleQuery($sql);
        $results = $query_result["results"];
        return static::createMultipleRecipesFromQuery($query_result["results"]); 
    }

    static function createMultipleRecipesFromQuery($result_set) {
        $recipes = [];
        foreach ($result_set as $result) {
            $new_user = static::createSingleRecipeFromQuery($result);
            array_push($recipes, $new_user);
        }
        return $recipes;
    }

}