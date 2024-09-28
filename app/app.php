<?php

declare(strict_types = 1);

// HIER CODE
function getTransactionFiles(string $dirPath): array{

    $files = [];

    foreach (scandir($dirPath) as $file){
        if (is_dir($file)) {
            continue;
        }
        $files[] = $dirPath . $file;
    }
    return $files;
}

function getTransactions(string $fileName) :array
{
    if (!file_exists($fileName)) {
        trigger_error('File "' . $fileName . '" does not exist.', E_USER_ERROR);
    }
    $file = fopen($fileName, 'r');
    fgetcsv($file,0,";");
    $transactions = [];

    while (($transaction = fgetcsv($file,0,";")) !== false) {
        $transactions[] = $transaction;
    }
    return $transactions;
}

function extractTransaction(array $transactionRow): array
{
    [$date, $checkNumber, $description, $amount] = $transactionRow;

    $amount = (float) $amount;

    return [
        'date'        => $date,
        'checkNumber' => $checkNumber,
        'description' => $description,
        'amount'      => $amount,
    ];
}


