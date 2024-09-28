<?php

declare(strict_types = 1);

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'opdracht 2' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'opdracht 2' . DIRECTORY_SEPARATOR . 'transaction_files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'opdracht 2' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);


/* HIER CODE (zie de instructies op Blackboard) */
require APP_PATH . 'app.php';
getTransactionFiles();
$files = getTransactionFiles();
var_dump($files);

