<?php

require_once("app/db/DBManager.php");
require_once("Image.php");

class MediaManager {

    static function isValidImageId($image_id) {
        return isPositiveInteger($image_id) && !empty(static::getImageById($image_id));
    }

    static function getImageById($id) {
        $result = null;
        $sql = "SELECT * FROM images WHERE id = :value";
        $query_result = DBManager::singleQuery($sql, ["id" => $id]);
        $result_array = $query_result["results"];
        if(!empty($result_array)) {
            $result = static::createSingleImageFromQuery($result_array[0]);
        }
        return  $result;
    }

    static function createSingleImageFromQuery($result) {
        $image_string = $result["image_data"];

        return new Picture.createFromString($image_string);
    }

}