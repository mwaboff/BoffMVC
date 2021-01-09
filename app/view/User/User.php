<?php


$user = UserManager::getUserById(Router::getRequestVar("uid"));
$RENDER_VARS = array_merge($RENDER_VARS, $user->getRenderInformation());

if (isset($_SESSION["id"])) {
    $RENDER_VARS["editor_status"] = UserManager::isValidUserEditor($user, $_SESSION["id"]);
    $RENDER_VARS["uid"] = $user->getId();
} else {
    $RENDER_VARS["editor_status"] = false;
}


require("app/template/user.phtml");

?>