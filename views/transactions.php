<!DOCTYPE html>
<html>
    <head>
        <title>Transacties</title>
        
        <!-- Mobile first, proper rendering and touch controls -->
        <meta name="viewport" content="width=device-width, initial-scale=1"> 

        <!-- Externe link naar Bootstrap Versie 5 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

        <style>
            table {
                width: 100%;
                border-collapse: collapse;
                text-align: center;
            }

            table tr th, table tr td {
                padding: 5px;
                border: 1px #eee solid;
            }

            tfoot tr th, tfoot tr td {
                font-size: 20px;
            }

            tfoot tr th {
                text-align: right;
            }
        </style>
    </head>
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
                <!-- HIER CODE -->
                <?php if (!empty($transactions)): ?>
                    <?php foreach($transactions as $transaction): ?>
                        <?php foreach($transaction as $transaction1): ?>
                            <?php $transaction2 = extractTransaction($transaction1)?>
                            <tr>
                                <td><?= ($transaction2['date']) ?></td>
                                <td><?= ($transaction2['checkNumber']) ?></td>
                                <td><?= ($transaction2['description']) ?></td>
                                <td><?= ($transaction2['amount']) ?></td>
                            </tr>
                        <?php endforeach ?>
                    <?php endforeach ?>
                <?php endif ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Totale Inkomsten:</th>
                    <td><!-- HIER CODE --><?= formatEuroAmount($totals['totalIncome']) ?></td>
                </tr>
                <tr>
                    <th colspan="3">Totale Uitgaven:</th>
                    <td><!-- HIER CODE --><?= formatEuroAmount($totals['totalExpense']) ?></td>
                </tr>
                <tr>
                    <th colspan="3">Netto totaal:</th>
                    <td><!-- HIER CODE --><?= formatEuroAmount($totals['netTotal']) ?></td>
                </tr>
            </tfoot>
        </table>
    </body>
</html>
