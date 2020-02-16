<?php

$user = UserManager::getUserById(Router::getRequestVar("uid"));
$RENDER_VARS = array_merge($RENDER_VARS, $user->getRenderInformation());
require("app/template/user.phtml");

?>