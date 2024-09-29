<?php

declare(strict_types = 1);

function getTransactionFiles(string $dirPath): array {
    /**Deze functie verwacht als invoer een directory path waarna het elke file die daar aanwezig is gaat toevoegen als string naar een array.
     * Een array wordt gereturned die alle pathnamen van de verschillende files bevat.  
     */ 
    $files = [];

    foreach (scandir($dirPath) as $file) {
        if (is_dir($file)) {
            continue;
        }
        $files[] = $dirPath . $file;
    }

    return $files;
}

function getTransactions(string $fileName) :array {
    /** Deze functie leest een csv bestand en stopt alle elementen in een array.
     * Om goed gebruik te maken van de transactietabel dienst de csv bestand gescheiden te zijn met een semicolon(;).
     * Verder moet de csv file in de structuur (<datum>,<nummer>,<beschrijving>,<bedrag>) zijn.
     * Andere formaten worden niet goed ingelezen in de later te genereren tabel.
     */
    if (!file_exists($fileName)) {
        trigger_error('File "' . $fileName . '" does not exist.', E_USER_ERROR);
    }

    $file = fopen($fileName, 'r');
    fgetcsv($file,0,";"); //Dit is toegevoegd om de eerste rij van een tabel over te slaan, hier staan namelijk geen waarden maar headers van de tabel.
    $transactions = [];

    while (($transaction = fgetcsv($file,0,";")) !== false) {
        $transactions[] = $transaction;
    }
    return $transactions;
}

function extractTransaction(array $transactionRow): array {
    /** Deze functie zet een geindexeerde array van 4 elementen om naar een geassocieerde arra van 4 elementen.
     * Daarbij worden de keys: date, checkNumber, description en amount gegenereerd.
     * Tevens wordt de parameter $amount gecast naar een float zodat er later berekeningen op gedaan kunnen worden. 
     */ 
    [$date, $checkNumber, $description, $amount] = $transactionRow;

    $amount = (float) str_replace(',', '.', $amount);

    return [
        'date'        => $date,
        'checkNumber' => $checkNumber,
        'description' => $description,
        'amount'      => $amount,
    ];
}

function calculateTotals(array $transactions): array {
    /** Deze functie gaat middels een dubbele for-loop alle elementen van een niet-lege gegeven multidimensionale array na.
     * Vervolgens gebruikt het de functie extratTransaction om per individuele rij de geindexeerde array geassocieerd te maken.
     * Daarna worden er drie waarden bijgehouden in een geassocieerde array met de keys; netTotal, totalIncome en totalExpense.
     * De geassocieerde array met de totalen wordt gereturned in een array.
     */ 
    $totals = ['netTotal' => 0, 'totalIncome' => 0, 'totalExpense' => 0];
    
    if (!empty($transactions)):
        foreach ($transactions as $transaction) :
            foreach ($transaction as $transaction1) :
                $transaction2 = extractTransaction($transaction1);
                $totals['netTotal'] += $transaction2['amount']; // berekening van de netto totaal som
                
                if ($transaction2['amount'] >= 0) {
                    $totals['totalIncome'] += $transaction2['amount']; // berekening van enkel inkomsten
                } else {
                    $totals['totalExpense'] += $transaction2['amount']; // bereking van enkel uitgaven
                }
            endforeach;
        endforeach;
    endif;

    return $totals;
}



