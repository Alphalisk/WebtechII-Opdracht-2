<!DOCTYPE html>
<html>
    <head>
        <title>Transacties</title>
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
                <?php if (! empty($transactions)): ?>
                    <?php foreach($transactions as $transaction): ?>
                        <?php foreach($transaction as $transaction1): ?>
                            <tr>
                                <td><?php echo ($transaction1[0]) ?></td>
                                <td><?php echo ($transaction1[1]) ?></td>
                                <td><?php echo ($transaction1[2]) ?></td>
                                <td><?php echo ($transaction1[3]) ?></td>
                            </tr>
                        <?php endforeach ?>
                    <?php endforeach ?>
                <?php endif ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Totale Inkomsten:</th>
                    <td><!-- HIER CODE --></td>
                </tr>
                <tr>
                    <th colspan="3">Totale Uitgaven:</th>
                    <td><!-- HIER CODE --></td>
                </tr>
                <tr>
                    <th colspan="3">Netto totaal:</th>
                    <td><!-- HIER CODE --></td>
                </tr>
            </tfoot>
        </table>
    </body>
</html>
