<?php
require_once('db/config.php'); // Подключение файла конфигурации

try {
    $db = new PDO("pgsql:host=$db_host;dbname=$db_name", $db_user, $db_password);
    // Установите желаемые атрибуты для соединения
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    echo json_encode(array("error" => "Invalid connection DB", "data" => $e->getMessage()));
    return;
}
