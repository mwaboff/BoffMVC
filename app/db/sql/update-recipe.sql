INSERT INTO recipes
    (id, recipe_name, author_id, description, ingredients, instructions, image_id)
VALUES
    (:id, :recipe_name, :author_id, :description, :ingredients, :instructions, :image_id)
ON DUPLICATE KEY UPDATE
    id = :id,
    recipe_name = :recipe_name,
    author_id = :author_id,
    description = :description,
    ingredients = :ingredients,
    instructions = :instructions,
    image_id = :image_id
;