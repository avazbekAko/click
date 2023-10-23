<?php

require __DIR__ . '/vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;

$colourGreen = "\033[92m";
$colourRed = "\033[91m";
$colourReset = "\033[0m";

try {
    $dsn = "pgsql:host=postgres;port=5432;dbname=izi;";
    $pdo = new PDO($dsn, 'izi', '12345678', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    if ($pdo) {
        echo "Test postgresql connection - {$colourGreen}OK" . $colourReset . PHP_EOL;
    }
} catch (Exception $e) {
    die($e->getMessage() . PHP_EOL . "Test postgresql connection - {$colourRed}Failed" . $colourReset . PHP_EOL);
}

try {
    $redis = new Redis();

    if ($redis->connect('redis', 6379, 1, '', 0, 0)) {
        echo "Test redis connection - {$colourGreen}OK" . $colourReset . PHP_EOL;;
    }
} catch (Exception $e) {
    die($e->getMessage() . PHP_EOL . "Test redis connection - {$colourRed}Failed" . $colourReset . PHP_EOL);
}

sleep(9);

try {
    $connection = new AMQPStreamConnection('rabbitmq', '5672', 'izi', '12345678', '/');
    if (is_object($connection)) {
        echo "Test rabbitmq connection - {$colourGreen}OK" . $colourReset . PHP_EOL;
    }
} catch (Exception $e) {
    die($e->getMessage() . PHP_EOL . "Test rabbitmq connection - {$colourRed}Failed" . $colourReset . PHP_EOL);
}

die('test end.' . PHP_EOL);
