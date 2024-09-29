<!DOCTYPE html>
<html>
    <head>
        <title>Transacties</title>

        <!-- Mobile first, proper rendering and touch controls -->
        <meta name="viewport" content="width=device-width, initial-scale=1"> 

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

        <!-- Mobile first, proper rendering and touch controls -->
        <meta name="viewport" content="width=device-width, initial-scale=1"> 

        <!-- Externe link naar Bootstrap Versie 5 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

        <title>Home</title>
    </head>
    <body>

        <!-- Menubalk -->
        <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="navbar-brand" href="index.html">
                            <img src="static/logo.avif" alt="Hanze logo" style="width:40px;" class="rounded-pill"> 
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Home</a>
                    </li>
                </ul>
            </div>
        </nav>
        
        <!-- Welkomst tekst op homepage -->
        <div class="container-sm p-5 my-5 border">
            <div class="row">
                <div class="col">
                    <div class="container">
                        <h1>Transacties</h1>
                        <ul>
                            <?php 
                                foreach($files as $bestand) {
                                    echo "<li><a href=\"index.php?bestand=$bestand\">$bestand</a></li>";
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>