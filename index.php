<?php

declare(strict_types = 1);

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'opdracht 2' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'opdracht 2' . DIRECTORY_SEPARATOR . 'transaction_files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'opdracht 2' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);


/* HIER CODE (zie de instructies op Blackboard) */
require APP_PATH . 'app.php';
$files = getTransactionFiles(FILES_PATH);

$transactions= [];
foreach ($files as $file){
    $transactions[] = array_merge($transactions, getTransactions($file));
}
print_r($transactions);



