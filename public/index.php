<?php
require "./db/db.php";

$route = $_SERVER['REQUEST_URI'];

$host = $_SERVER['HTTP_HOST'];

$method = $_SERVER['REQUEST_METHOD'];

require "./routes/web.php";

?>
