<?php
if($method === "GET"){
    setcookie("name", "", time() - 3600);
    setcookie("id", "", time() - 3600);
    setcookie("email", "", time() - 3600);
    setcookie("password", "", time() - 3600);
    exit("<meta http-equiv='refresh' content='0; url= /'>");
}