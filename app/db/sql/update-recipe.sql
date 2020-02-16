INSERT INTO recipes
    (recipe_name, author_id, description, ingredients, instructions)
VALUES
    (:recipe_name, :author_id, :description, :ingredients, :instructions)
ON DUPLICATE KEY UPDATE
    recipe_name = :recipe_name,
    author_id = :author_id,
    description = :description,
    ingredients = :ingredients,
    instructions = :instructions
;