<!-- De code voorafgaand is in de view homepage.php gekopieerd. Dit zodat maar 1 bestand bepaald wat de layout van het document is.-->
    <body>
        <table>
            <thead>
                <tr>
                    <th>Datum</th>
                    <th>Check #</th>
                    <th>Beschrijving</th>
                    <th>Bedrag</th>
                </tr>
            </thead>
            <tbody>
                <!-- 
                        Hier volgt een dubbele for-loop die elk element binnen een gekozen multidimensionale array nagaat en plot in een tabel.
                        Daarbij maakt het gebruik van de volgende functies komend uit app.php en helpers.php:
                            extractTransaction: Deze functie maakt van een gegeven rij uit een array een associatieve array met de keys; 
                                                date, checkNumber, description en amount en de bijhorende waarden. 
                            formatDate:         Deze functie format een gegeven datum naar het formaat <dag maand jaar> waarbij maand is uitgeschreven.
                            formatEuroAmount:   Deze functie voegt bij een gegeven float een euro teken toe.

                        Tot slot wordt bij de key 'amount' gecontroleerd of het een negatieve, positive of nulwaarde bevat. 
                        De output tekst wordt groen bij positief, rood bij negatief en ongewijzigd bij nul.
                 -->
                <?php if (!empty($transactions)): ?>
                    <?php foreach($transactions as $transaction): ?>
                        <?php foreach($transaction as $transaction1): ?>
                            <?php $transaction2 = extractTransaction($transaction1)?>
                            <tr>
                                <td><?= formatDate(($transaction2['date'])) ?></td>
                                <td><?= ($transaction2['checkNumber']) ?></td>
                                <td><?= ($transaction2['description']) ?></td>
                                <td>
                                    <?php if ($transaction2['amount'] < 0): ?>
                                        <span style="color: red;">
                                            <?= formatEuroAmount($transaction2['amount']) ?>
                                        </span>
                                    <?php elseif ($transaction2['amount'] > 0): ?>
                                        <span style="color: green;">
                                            <?= formatEuroAmount($transaction2['amount']) ?>
                                        </span>
                                    <?php else: ?>
                                        <?= formatEuroAmount($transaction2['amount']) ?>
                                    <?php endif ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php endforeach ?>
                <?php endif ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Totale Inkomsten:</th>
                    <td>
                        <!-- De array $totals is eerder aangemaakt en bevat de som van alle inkomsten in de key 'totalIncome' -->
                        <?= formatEuroAmount($totals['totalIncome']) ?>
                    </td>
                </tr>
                <tr>
                    <th colspan="3">Totale Uitgaven:</th>
                    <td>
                        <!-- De array $totals is eerder aangemaakt en bevat de som van alle uitgaven in de key 'totalExpense' -->
                        <?= formatEuroAmount($totals['totalExpense']) ?>
                    </td>
                </tr>
                <tr>
                    <th colspan="3">Netto totaal:</th>
                    <td>
                        <!-- De array $totals is eerder aangemaakt en bevat de netto som van het geheel in de key 'netTotal' -->
                         <?= formatEuroAmount($totals['netTotal']) ?>
                    </td>
                </tr>
            </tfoot>
        </table>
    </body>
</html>
