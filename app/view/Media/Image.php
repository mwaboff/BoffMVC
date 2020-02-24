<?php

require_once("app/model/Media/ImageManager.php");
$image = ImageManager::getImageById($_GET["id"]);
$RENDER_VARS["image_resource"] = $image->getResource();
require("ImageRender.php");

?>