<?php


class Recipe {

    function __construct($recipe_name, $author_id, $description, $ingredients, $instructions, $id=null, $create_date=null, $last_update=null) {
        $this->recipe_name = $recipe_name;
        $this->author_id = $author_id;
        $this->description = $description;
        $this->ingredients = $ingredients;
        $this->instructions = $instructions;
        $this->id = $id;
        $this->create_date = $create_date;
        $this->last_update = $last_update;
    }

    static function createNewRecipe($name, $author_id, $description, $ingredients, $instructions) {
        $isValidParams = !empty($name) && !empty($description) && !empty($ingredients) && !empty($instructions);
        return ($isValidParams ? 
            new Recipe($name, $author_id, $description, $ingredients, $instructions) : null);
    }

    function commit() {
        $sql = DBManager::readSqlFile("app/db/sql/update-recipe.sql");
        $parameters = [
            "recipe_name" => $this->recipe_name,
            "author_id" => $this->author_id,
            "description" => $this->description,
            "ingredients" => $this->ingredients,
            "instructions" => $this->instructions
        ];

        $result = DBManager::singleQuery($sql, $parameters);
        $this->id = $result["lastInsertId"];
        return true;
    }

    function getShortRenderInformation() {
        return [
            "id" => $this->id,
            "recipe_name" => $this->recipe_name,
            "author_id" => $this->author_id,
            "description" => $this->description
        ];
    }

    function getRenderInformation() {
        return [
            "id" => $this->id,
            "recipe_name" => $this->recipe_name,
            "author_id" => $this->author_id,
            "description" => $this->description,
            "ingredients" => $this->ingredients,
            "instructions" => $this->instructions
        ];
    }

    function getId() {
        return $this->id;
    }

}

?>