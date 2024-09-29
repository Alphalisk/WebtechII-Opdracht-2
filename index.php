<?php

// Hiermee wordt afgedwongen dat datatypes gelijk moeten blijven.
declare(strict_types = 1);

//__DIR__ gewijzigd naar __FILE__ omdat __DIR__ verwijst naar de parent directory en niet de current directory wat __FILE__ wel doet.
$root = dirname(__FILE__) . DIRECTORY_SEPARATOR;

// Hier worden constanten gemaakt die de path bevatten van de directory waar alle webpagina attributen zich bevinden.
// 'Opdracht 2' is als map toegevoegd omdat deze laatste map niet automatisch meegenomen wordt.
define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);


// Hier wordt app.php en helpers.php ingeladen.
require APP_PATH . 'app.php';
require APP_PATH . 'helpers.php';

// Hier wordt een array gemaakt met verwijzingen naar de bestanden in transaction_files.
$files = getTransactionFiles(FILES_PATH);

// Hier wordt de basispagina geopend.
require VIEWS_PATH . 'homepage.php';

// Dit controleert of een bestand geladen is middels een GET, zoja dan krijgt de variabele $file dat bestand als waarde.
if (!(empty($_GET))) {
    $file = $_GET['bestand'];
}

/** 
 * Als er een '$file' bestaat dan wordt er een array $transactions gemaakt die geladen wordt met alle elementen uit dat bestand.
 * Vervolgens wordt berekent wat de inkomsten, uitgaven en het netto bedrag is van het bestand.
 * Tot slot wordt de tabel ingeladen middels de view transactions.php.
 */
if (isset($file)) {
    $transactions= [];
    $transactions[] = getTransactions($file);
    $totals = calculateTotals($transactions);

    require VIEWS_PATH . 'transactions.php';
}

