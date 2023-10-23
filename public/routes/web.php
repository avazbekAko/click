<?php

if($route == "test"){
    require "controllers/test.php";
}
else if($route == "/"){
    require "controllers/main.php";
}
else if($route == "/reg"){
    require "controllers/register.php";
}
else if($route == "/auth"){
    require "controllers/auth.php";
}
else if($route == "/user"){
    require "controllers/user.php";
}
else if($route == "/logout"){
    require "controllers/logout.php";
}
else{
    require "controllers/redirect.php";
}