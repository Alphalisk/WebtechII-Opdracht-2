<?php

declare(strict_types=1);

function formatEuroAmount(float $amount): string {
    /**
     * Deze functie zorgt ervoor dat een ingevoerde float getal een financieel formaat krijgt met een euro teken en twee decimalen.
     * Deze waarde wordt gereturned als string.
     */
    $isNegative = $amount < 0;
    return ($isNegative ? '-' : '') . '€' . number_format(abs($amount), 2, ',', '.');
}

function formatDate(string $date): string {
    /**
     * Deze functie maakt van een gegeven standaard datum string het formaat '<dag> <maand> <jaar>' waarbij maand is uitgeschreven.
     * Deze waarde wordt gereturned als string.
     */
    return date('j F Y', strtotime($date));
}

